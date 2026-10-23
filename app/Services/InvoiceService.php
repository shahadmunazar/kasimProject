<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Setting;
use Dompdf\Dompdf;
use Dompdf\Options;

class InvoiceService
{
    /**
     * Get Seller / Company details configured in settings
     */
    public static function getSellerDetails(): array
    {
        return [
            'company_name' => Setting::where('key', 'invoice_company_name')->value('value') ?: 'TC SMART TECHNOLOGY PRIVATE LIMITED',
            'brand_name' => Setting::where('key', 'invoice_brand_name')->value('value') ?: 'TC Smart Technology',
            'gstin' => Setting::where('key', 'invoice_gstin')->value('value') ?: '09AAACT9876Q1Z5',
            'pan' => Setting::where('key', 'invoice_pan')->value('value') ?: 'AAACT9876Q',
            'address' => Setting::where('key', 'invoice_address')->value('value') ?: 'G-194, Sector 63',
            'city' => Setting::where('key', 'invoice_city')->value('value') ?: 'Noida',
            'state' => Setting::where('key', 'invoice_state')->value('value') ?: 'Uttar Pradesh',
            'state_code' => Setting::where('key', 'invoice_state_code')->value('value') ?: '09',
            'pincode' => Setting::where('key', 'invoice_pincode')->value('value') ?: '201301',
            'phone' => Setting::where('key', 'invoice_phone')->value('value') ?: '+91 98765 43210',
            'email' => Setting::where('key', 'invoice_email')->value('value') ?: 'support@tcsmarttechnology.com',
            'website' => Setting::where('key', 'invoice_website')->value('value') ?: 'www.tcsmarttechnology.com',
            'prefix' => Setting::where('key', 'invoice_prefix')->value('value') ?: 'INV-',
            'default_hsn' => Setting::where('key', 'invoice_default_hsn')->value('value') ?: '8542',
            'tax_rate' => (float)(Setting::where('key', 'invoice_tax_rate')->value('value') ?: 18),
            'bank_name' => Setting::where('key', 'invoice_bank_name')->value('value') ?: 'HDFC Bank Ltd',
            'bank_account' => Setting::where('key', 'invoice_bank_account')->value('value') ?: '50200012345678',
            'bank_ifsc' => Setting::where('key', 'invoice_bank_ifsc')->value('value') ?: 'HDFC0001234',
            'bank_branch' => Setting::where('key', 'invoice_bank_branch')->value('value') ?: 'Sector 63, Noida',
            'upi_id' => Setting::where('key', 'invoice_upi_id')->value('value') ?: 'tcsmart@upi',
            'authorized_signatory' => Setting::where('key', 'invoice_authorized_signatory')->value('value') ?: 'For TC SMART TECHNOLOGY PVT LTD - Authorized Signatory',
            'terms' => Setting::where('key', 'invoice_terms')->value('value') ?: "1. Goods once sold are covered under standard manufacturer warranty.\n2. All disputes subject to Noida, UP jurisdiction.\n3. This is a computer generated tax invoice and requires no physical signature.",
        ];
    }

    /**
     * Build all structured invoice data for an order
     */
    public static function getInvoiceData(Order $order): array
    {
        $seller = self::getSellerDetails();
        $orderItems = OrderItem::where('order_id', $order->id)->get();

        // If order has no line items, fallback to single item on order
        if ($orderItems->isEmpty() && $order->product_id) {
            $orderItems = collect([
                (object)[
                    'product_id' => $order->product_id,
                    'quantity' => $order->quantity ?: 1,
                    'price' => (float)$order->amount - (float)($order->delivery_charge ?? 0),
                ]
            ]);
        }

        $taxRate = $seller['tax_rate'];
        $sellerState = strtolower(trim($seller['state']));
        $buyerState = strtolower(trim($order->state ?? ''));
        $isInterstate = !empty($buyerState) && !str_contains($sellerState, $buyerState) && !str_contains($buyerState, $sellerState);

        $items = [];
        $totalTaxable = 0;
        $totalCgst = 0;
        $totalSgst = 0;
        $totalIgst = 0;
        $itemsSubtotal = 0;
        $sNo = 1;

        foreach ($orderItems as $item) {
            $prod = Product::find($item->product_id);
            $qty = (int)($item->quantity ?: 1);
            $unitPrice = (float)($item->price ?? 0);
            $lineTotal = $unitPrice * $qty;
            $itemsSubtotal += $lineTotal;

            // Compute taxable value and tax (inclusive tax model)
            if ($taxRate > 0 && $lineTotal > 0) {
                $taxableValue = round($lineTotal / (1 + ($taxRate / 100)), 2);
                $taxAmount = round($lineTotal - $taxableValue, 2);
            } else {
                $taxableValue = $lineTotal;
                $taxAmount = 0;
            }

            $totalTaxable += $taxableValue;

            if ($isInterstate) {
                $igstRate = $taxRate;
                $igstAmount = $taxAmount;
                $cgstRate = 0;
                $cgstAmount = 0;
                $sgstRate = 0;
                $sgstAmount = 0;
                $totalIgst += $igstAmount;
            } else {
                $cgstRate = $taxRate / 2;
                $cgstAmount = round($taxAmount / 2, 2);
                $sgstRate = $taxRate / 2;
                $sgstAmount = $taxAmount - $cgstAmount;
                $igstRate = 0;
                $igstAmount = 0;
                $totalCgst += $cgstAmount;
                $totalSgst += $sgstAmount;
            }

            $items[] = [
                's_no' => $sNo++,
                'name' => $prod ? $prod->name : ('Product #' . $item->product_id),
                'category' => $prod && $prod->category ? $prod->category->name : 'Industrial Electronics',
                'sku' => $prod && !empty($prod->model_number) ? $prod->model_number : ('SKU-' . $item->product_id),
                'hsn' => $seller['default_hsn'],
                'quantity' => $qty,
                'unit_price' => $unitPrice,
                'line_total' => $lineTotal,
                'taxable_value' => $taxableValue,
                'tax_rate' => $taxRate,
                'cgst_rate' => $cgstRate,
                'cgst_amount' => $cgstAmount,
                'sgst_rate' => $sgstRate,
                'sgst_amount' => $sgstAmount,
                'igst_rate' => $igstRate,
                'igst_amount' => $igstAmount,
                'tax_amount' => $taxAmount,
            ];
        }

        $deliveryCharge = (float)($order->delivery_charge ?? 0);
        $grandTotal = (float)$order->amount;
        if ($grandTotal <= 0) {
            $grandTotal = $itemsSubtotal + $deliveryCharge;
        }

        $totalTax = $totalCgst + $totalSgst + $totalIgst;

        return [
            'seller' => $seller,
            'buyer' => [
                'name' => $order->customer_name ?: 'Valued Customer',
                'address' => $order->address ?: 'N/A',
                'city' => $order->city ?: '',
                'state' => $order->state ?: '',
                'pincode' => $order->pincode ?: '',
                'phone' => $order->mobile ?: '',
                'email' => $order->email ?: '',
                'state_code' => self::getStateCode($order->state ?? ''),
            ],
            'invoice_number' => $order->effective_invoice_number,
            'invoice_date' => $order->effective_invoice_date,
            'order_number' => $order->order_number ?: $order->id,
            'order_date' => $order->created_at,
            'delivery_date' => $order->isDelivered() ? ($order->updated_at) : null,
            'is_delivered' => $order->isDelivered(),
            'courier_name' => $order->effective_courier_name,
            'tracking_id' => $order->effective_tracking_id,
            'delivery_status' => $order->effective_delivery_status,
            'delivery_status_label' => $order->delivery_status_label,
            'payment_method' => $order->payment_method === 'cod' ? 'Cash on Delivery (COD)' : 'UPI / QR Transfer',
            'payment_status' => $order->isPaid() ? 'PAID' : 'PENDING VERIFICATION',
            'transaction_id' => $order->transaction_id,
            'utr_number' => $order->utr_number,
            'payment_date' => $order->payment_date,
            'items' => $items,
            'items_subtotal' => $itemsSubtotal,
            'delivery_charge' => $deliveryCharge,
            'delivery_distance_km' => $order->delivery_distance_km,
            'total_taxable' => $totalTaxable,
            'total_cgst' => $totalCgst,
            'total_sgst' => $totalSgst,
            'total_igst' => $totalIgst,
            'total_tax' => $totalTax,
            'grand_total' => $grandTotal,
            'amount_in_words' => self::amountToWords($grandTotal),
            'is_interstate' => $isInterstate,
        ];
    }

    /**
     * Render and generate PDF binary for the given order
     */
    public static function generatePdf(Order $order): string
    {
        $data = self::getInvoiceData($order);
        $data['order'] = $order;
        $data['is_pdf'] = true;

        $html = view('invoices.tax_invoice_pdf', $data)->render();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->output();
    }

    /**
     * Convert currency amount to words (Indian Rupees and Paise)
     */
    public static function amountToWords(float $amount): string
    {
        $number = floor($amount);
        $paise = round(($amount - $number) * 100);

        $words = self::convertNumberToWordsIndian((int)$number) . ' Rupees';
        if ($paise > 0) {
            $words .= ' and ' . self::convertNumberToWordsIndian((int)$paise) . ' Paise';
        }
        $words .= ' Only';

        return ucwords(trim($words));
    }

    /**
     * Helper for Indian Numbering System (Crores, Lakhs, Thousands, Hundreds)
     */
    private static function convertNumberToWordsIndian(int $num): string
    {
        if ($num === 0) {
            return 'Zero';
        }

        $ones = [
            0 => '', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five',
            6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten',
            11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen',
            15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen'
        ];

        $tens = [
            2 => 'twenty', 3 => 'thirty', 4 => 'forty', 5 => 'fifty',
            6 => 'sixty', 7 => 'seventy', 8 => 'eighty', 9 => 'ninety'
        ];

        $words = '';

        if ($num >= 10000000) {
            $words .= self::convertNumberToWordsIndian(intdiv($num, 10000000)) . ' crore ';
            $num %= 10000000;
        }

        if ($num >= 100000) {
            $words .= self::convertNumberToWordsIndian(intdiv($num, 100000)) . ' lakh ';
            $num %= 100000;
        }

        if ($num >= 1000) {
            $words .= self::convertNumberToWordsIndian(intdiv($num, 1000)) . ' thousand ';
            $num %= 1000;
        }

        if ($num >= 100) {
            $words .= self::convertNumberToWordsIndian(intdiv($num, 100)) . ' hundred ';
            $num %= 100;
        }

        if ($num > 0) {
            if ($words !== '') {
                $words .= 'and ';
            }

            if ($num < 20) {
                $words .= $ones[$num] . ' ';
            } else {
                $words .= $tens[intdiv($num, 10)] . ' ';
                if ($num % 10 > 0) {
                    $words .= $ones[$num % 10] . ' ';
                }
            }
        }

        return trim($words);
    }

    /**
     * Map Indian State Name to standard 2-digit GST state code
     */
    public static function getStateCode(string $stateName): string
    {
        $map = [
            'jammu and kashmir' => '01',
            'himachal pradesh' => '02',
            'punjab' => '03',
            'chandigarh' => '04',
            'uttarakhand' => '05',
            'haryana' => '06',
            'delhi' => '07',
            'rajasthan' => '08',
            'uttar pradesh' => '09',
            'bihar' => '10',
            'sikkim' => '11',
            'arunachal pradesh' => '12',
            'nagaland' => '13',
            'manipur' => '14',
            'mizoram' => '15',
            'tripura' => '16',
            'meghalaya' => '17',
            'assam' => '18',
            'west bengal' => '19',
            'jharkhand' => '20',
            'odisha' => '21',
            'chhattisgarh' => '22',
            'madhya pradesh' => '23',
            'gujarat' => '24',
            'daman and diu' => '25',
            'dadra and nagar haveli' => '26',
            'maharashtra' => '27',
            'andhra pradesh' => '28',
            'karnataka' => '29',
            'goa' => '30',
            'lakshadweep' => '31',
            'kerala' => '32',
            'tamil nadu' => '33',
            'puducherry' => '34',
            'andaman and nicobar islands' => '35',
            'telangana' => '36',
            'ladakh' => '38',
        ];

        $clean = strtolower(trim($stateName));
        return $map[$clean] ?? '09';
    }
}
