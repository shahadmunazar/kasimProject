<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\InvoiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display or download the customer tax invoice
     */
    public function show($id, Request $request)
    {
        $order = Order::where('user_id', Auth::id())->where('id', $id)->firstOrFail();

        // Only show order invoice to users once delivered
        if (!$order->isDelivered()) {
            return redirect()->route('frontend.dashboard.order.show', $order->id)
                ->with('info', 'Your Tax Invoice will be generated and available once your order has been delivered.');
        }

        // If requested with ?download=pdf or ?format=pdf
        if ($request->query('download') === 'pdf' || $request->query('format') === 'pdf') {
            return $this->downloadPdf($id);
        }

        $data = InvoiceService::getInvoiceData($order);
        $data['order'] = $order;

        return view('invoices.tax_invoice', $data);
    }

    /**
     * Download tax invoice as PDF file
     */
    public function downloadPdf($id)
    {
        $order = Order::where('user_id', Auth::id())->where('id', $id)->firstOrFail();

        // Only allow downloading invoice once delivered
        if (!$order->isDelivered()) {
            return redirect()->route('frontend.dashboard.order.show', $order->id)
                ->with('info', 'Your Tax Invoice will be generated and available once your order has been delivered.');
        }

        $pdfContent = InvoiceService::generatePdf($order);
        $fileName = 'Invoice_' . preg_replace('/[^A-Za-z0-9_-]/', '_', $order->effective_invoice_number) . '.pdf';

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
}
