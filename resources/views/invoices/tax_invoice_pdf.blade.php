<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tax Invoice - {{ $invoice_number }}</title>
    <style>
        @page {
            size: A4;
            margin: 15mm 15mm 15mm 15mm;
        }
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #1e293b;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            background: #ffffff;
        }
        .invoice-container {
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .header-table td {
            vertical-align: top;
        }
        .company-title {
            font-size: 16px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 2px;
        }
        .invoice-badge-title {
            font-size: 18px;
            font-weight: bold;
            color: #0284c7;
            text-align: right;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .invoice-type {
            font-size: 10px;
            color: #64748b;
            text-align: right;
            font-weight: bold;
        }
        .divider {
            height: 1px;
            background: #cbd5e1;
            margin: 10px 0;
        }
        .meta-table {
            margin-bottom: 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }
        .meta-table td {
            padding: 6px 10px;
            font-size: 10.5px;
            border: 1px solid #e2e8f0;
        }
        .meta-label {
            color: #64748b;
            font-weight: bold;
            width: 25%;
        }
        .meta-value {
            color: #0f172a;
            font-weight: bold;
            width: 25%;
        }
        .parties-table {
            margin-bottom: 14px;
        }
        .party-box {
            border: 1px solid #cbd5e1;
            padding: 8px 10px;
            vertical-align: top;
            width: 50%;
        }
        .party-box-title {
            font-size: 11px;
            font-weight: bold;
            color: #0284c7;
            text-transform: uppercase;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 4px;
            margin-bottom: 6px;
        }
        .items-table {
            margin-bottom: 12px;
            border: 1px solid #cbd5e1;
        }
        .items-table th {
            background: #f1f5f9;
            color: #334155;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            padding: 6px 8px;
            border: 1px solid #cbd5e1;
            text-align: left;
        }
        .items-table td {
            padding: 6px 8px;
            border: 1px solid #e2e8f0;
            font-size: 10.5px;
            vertical-align: middle;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .fw-bold { font-weight: bold; }
        
        .totals-table {
            width: 45%;
            margin-left: auto;
            margin-bottom: 14px;
            border: 1px solid #cbd5e1;
        }
        .totals-table td {
            padding: 5px 8px;
            font-size: 10.5px;
            border-bottom: 1px solid #e2e8f0;
        }
        .totals-table .grand-row td {
            background: #f8fafc;
            font-size: 13px;
            font-weight: bold;
            color: #0284c7;
            border-top: 2px solid #0284c7;
        }
        .words-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 8px 10px;
            margin-bottom: 12px;
            font-size: 11px;
        }
        .footer-table td {
            vertical-align: top;
            font-size: 9.5px;
            color: #475569;
        }
        .sign-box {
            text-align: right;
            vertical-align: bottom;
            height: 70px;
        }
        .stamp-box {
            border: 1px dashed #cbd5e1;
            display: inline-block;
            padding: 8px 16px;
            text-align: center;
            font-size: 9.5px;
            color: #64748b;
            background: #fafafa;
        }
        .delivered-pill {
            background: #dcfce7;
            color: #15803d;
            border: 1px solid #86efac;
            padding: 2px 6px;
            font-size: 9px;
            font-weight: bold;
            border-radius: 4px;
            display: inline-block;
        }
    </style>
</head>
<body>
<div class="invoice-container">
    <!-- Header: Seller Brand & Document Title -->
    <table class="header-table">
        <tr>
            <td style="width: 60%;">
                <div class="company-title">{{ $seller['company_name'] }}</div>
                <div style="color: #64748b; font-size: 10.5px;">{{ $seller['brand_name'] }}</div>
                <div style="font-size: 10px; color: #475569; margin-top: 3px;">
                    {{ $seller['address'] }}, {{ $seller['city'] }}, {{ $seller['state'] }} - {{ $seller['pincode'] }}<br>
                    <strong>GSTIN:</strong> {{ $seller['gstin'] }} | <strong>PAN:</strong> {{ $seller['pan'] }}<br>
                    <strong>Email:</strong> {{ $seller['email'] }} | <strong>Phone:</strong> {{ $seller['phone'] }}
                </div>
            </td>
            <td style="width: 40%; text-align: right;">
                <div class="invoice-badge-title">Tax Invoice</div>
                <div class="invoice-type">Original For Recipient</div>
                <div style="margin-top: 6px;">
                    @if($is_delivered)
                        <span class="delivered-pill">&#10003; DELIVERED</span>
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <div class="divider"></div>

    <!-- Metadata Grid -->
    <table class="meta-table">
        <tr>
            <td class="meta-label">Invoice Number:</td>
            <td class="meta-value">{{ $invoice_number }}</td>
            <td class="meta-label">Invoice Date:</td>
            <td class="meta-value">{{ $invoice_date ? $invoice_date->format('d-M-Y') : date('d-M-Y') }}</td>
        </tr>
        <tr>
            <td class="meta-label">Order Number:</td>
            <td class="meta-value">#{{ $order_number }}</td>
            <td class="meta-label">Order Date:</td>
            <td class="meta-value">{{ $order_date ? $order_date->format('d-M-Y') : 'N/A' }}</td>
        </tr>
        <tr>
            <td class="meta-label">Place of Supply:</td>
            <td class="meta-value">{{ $buyer['state'] ?: $seller['state'] }} (Code: {{ $buyer['state_code'] }})</td>
            <td class="meta-label">Payment Method:</td>
            <td class="meta-value">{{ $payment_method }} ({{ $payment_status }})</td>
        </tr>
        @if($courier_name || $tracking_id)
        <tr>
            <td class="meta-label">Courier Partner:</td>
            <td class="meta-value">{{ $courier_name ?: 'Express Courier' }}</td>
            <td class="meta-label">Tracking AWB:</td>
            <td class="meta-value">{{ $tracking_id ?: 'Assigned' }}</td>
        </tr>
        @endif
        @if($transaction_id || $utr_number)
        <tr>
            <td class="meta-label">Txn / UTR Ref:</td>
            <td class="meta-value" colspan="3">{{ $transaction_id ?: $utr_number }}</td>
        </tr>
        @endif
    </table>

    <!-- Parties Table: Sold By vs Billed & Shipped To -->
    <table class="parties-table">
        <tr>
            <td class="party-box" style="padding-right: 10px;">
                <div class="party-box-title">Sold By (Seller)</div>
                <strong>{{ $seller['company_name'] }}</strong><br>
                {{ $seller['address'] }}<br>
                {{ $seller['city'] }}, {{ $seller['state'] }} - {{ $seller['pincode'] }}<br>
                State: {{ $seller['state'] }} (State Code: {{ $seller['state_code'] }})<br>
                <strong>GSTIN:</strong> {{ $seller['gstin'] }}<br>
                <strong>PAN:</strong> {{ $seller['pan'] }}
            </td>
            <td class="party-box" style="margin-left: 10px;">
                <div class="party-box-title">Billed &amp; Shipped To (Buyer)</div>
                <strong>{{ $buyer['name'] }}</strong><br>
                {{ $buyer['address'] }}<br>
                {{ $buyer['city'] }}, {{ $buyer['state'] }} - {{ $buyer['pincode'] }}<br>
                State: {{ $buyer['state'] }} (State Code: {{ $buyer['state_code'] }})<br>
                <strong>Mobile:</strong> {{ $buyer['phone'] }}<br>
                <strong>Email:</strong> {{ $buyer['email'] ?: 'N/A' }}
            </td>
        </tr>
    </table>

    <!-- Items Table -->
    <table class="items-table">
        <thead>
            <tr>
                <th style="width: 5%;" class="text-center">#</th>
                <th style="width: 40%;">Description of Goods</th>
                <th style="width: 10%;" class="text-center">HSN</th>
                <th style="width: 8%;" class="text-center">Qty</th>
                <th style="width: 12%;" class="text-right">Unit Rate</th>
                <th style="width: 12%;" class="text-right">Taxable</th>
                <th style="width: 13%;" class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td class="text-center">{{ $item['s_no'] }}</td>
                    <td>
                        <span class="fw-bold">{{ $item['name'] }}</span>
                        <div style="font-size: 9.5px; color: #64748b;">
                            {{ $item['category'] }} | SKU: {{ $item['sku'] }}
                        </div>
                    </td>
                    <td class="text-center">{{ $item['hsn'] }}</td>
                    <td class="text-center">{{ $item['quantity'] }}</td>
                    <td class="text-right">
                        @if($item['unit_price'] > 0)
                            &#8377;{{ number_format($item['unit_price'], 2) }}
                        @else
                            FREE
                        @endif
                    </td>
                    <td class="text-right">&#8377;{{ number_format($item['taxable_value'], 2) }}</td>
                    <td class="text-right fw-bold">&#8377;{{ number_format($item['line_total'], 2) }}</td>
                </tr>
            @endforeach
            @if($delivery_charge > 0)
                <tr>
                    <td class="text-center">{{ count($items) + 1 }}</td>
                    <td>
                        <span class="fw-bold">Courier Shipping &amp; Handling Charge</span>
                        @if($delivery_distance_km)
                            <div style="font-size: 9.5px; color: #64748b;">Distance: {{ $delivery_distance_km }} km from warehouse</div>
                        @endif
                    </td>
                    <td class="text-center">9968</td>
                    <td class="text-center">1</td>
                    <td class="text-right">&#8377;{{ number_format($delivery_charge, 2) }}</td>
                    <td class="text-right">&#8377;{{ number_format($delivery_charge, 2) }}</td>
                    <td class="text-right fw-bold">&#8377;{{ number_format($delivery_charge, 2) }}</td>
                </tr>
            @endif
        </tbody>
    </table>

    <!-- Totals Table -->
    <table style="width: 100%;">
        <tr>
            <td style="width: 55%; vertical-align: top;">
                <div class="words-box">
                    <strong>Amount in Words:</strong><br>
                    <em>{{ $amount_in_words }}</em>
                </div>

                <!-- Bank Details -->
                <div style="border: 1px solid #e2e8f0; padding: 6px 10px; font-size: 9.5px; color: #475569; background: #fafafa;">
                    <strong>Bank Details for Wire Transfer / Verification:</strong><br>
                    Bank Name: {{ $seller['bank_name'] }} | A/C No: {{ $seller['bank_account'] }}<br>
                    IFSC: {{ $seller['bank_ifsc'] }} | Branch: {{ $seller['bank_branch'] }} | UPI: {{ $seller['upi_id'] }}
                </div>
            </td>
            <td style="width: 45%; vertical-align: top;">
                <table class="totals-table">
                    <tr>
                        <td class="text-right">Items Subtotal:</td>
                        <td class="text-right fw-bold" style="width: 40%;">&#8377;{{ number_format($items_subtotal, 2) }}</td>
                    </tr>
                    @if($delivery_charge > 0)
                    <tr>
                        <td class="text-right">Shipping &amp; Delivery:</td>
                        <td class="text-right fw-bold">&#8377;{{ number_format($delivery_charge, 2) }}</td>
                    </tr>
                    @else
                    <tr>
                        <td class="text-right">Shipping &amp; Delivery:</td>
                        <td class="text-right fw-bold" style="color: #16a34a;">FREE</td>
                    </tr>
                    @endif
                    @if($is_interstate)
                    <tr>
                        <td class="text-right">IGST ({{ $seller['tax_rate'] }}% incl.):</td>
                        <td class="text-right">&#8377;{{ number_format($total_igst, 2) }}</td>
                    </tr>
                    @else
                    <tr>
                        <td class="text-right">CGST ({{ $seller['tax_rate'] / 2 }}% incl.):</td>
                        <td class="text-right">&#8377;{{ number_format($total_cgst, 2) }}</td>
                    </tr>
                    <tr>
                        <td class="text-right">SGST ({{ $seller['tax_rate'] / 2 }}% incl.):</td>
                        <td class="text-right">&#8377;{{ number_format($total_sgst, 2) }}</td>
                    </tr>
                    @endif
                    <tr class="grand-row">
                        <td class="text-right">Grand Total:</td>
                        <td class="text-right">&#8377;{{ number_format($grand_total, 2) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="divider"></div>

    <!-- Footer Terms & Signatory -->
    <table class="footer-table">
        <tr>
            <td style="width: 65%;">
                <strong>Terms &amp; Conditions:</strong><br>
                {!! nl2br(e($seller['terms'])) !!}
            </td>
            <td style="width: 35%; text-align: right;" class="sign-box">
                <div class="stamp-box">
                    <strong>{{ $seller['brand_name'] }}</strong><br>
                    <span style="font-size: 8.5px;">Authorized Signatory</span><br>
                    <span style="color: #10b981; font-weight: bold;">[DIGITALLY SIGNED]</span>
                </div>
                <div style="font-size: 8.5px; color: #94a3b8; margin-top: 4px;">
                    Computer generated document, valid without physical seal.
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
