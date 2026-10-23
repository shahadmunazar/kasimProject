<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display or download the admin tax invoice
     */
    public function show($id, Request $request)
    {
        $order = Order::findOrFail($id);

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
        $order = Order::findOrFail($id);
        $pdfContent = InvoiceService::generatePdf($order);
        $fileName = 'Invoice_' . preg_replace('/[^A-Za-z0-9_-]/', '_', $order->effective_invoice_number) . '.pdf';

        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }
}
