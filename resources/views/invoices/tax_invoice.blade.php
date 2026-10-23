<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Invoice - {{ $invoice_number }} | {{ $seller['brand_name'] }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <style>
        body {
            background-color: #f1f5f9;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1e293b;
            margin: 0;
            padding: 0;
        }
        .invoice-wrapper {
            max-width: 900px;
            margin: 30px auto;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        .action-header {
            background: #0f172a;
            color: #ffffff;
            padding: 14px 24px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .invoice-body {
            padding: 40px;
        }
        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }
        .table-invoice th {
            background: #f8fafc;
            color: #475569;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            padding: 12px 14px;
        }
        .table-invoice td {
            padding: 14px;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            font-size: 13px;
        }
        .party-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 18px;
            height: 100%;
        }
        .meta-pill {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 12.5px;
        }
        .stamp-box {
            border: 2px dashed #94a3b8;
            border-radius: 10px;
            padding: 12px 20px;
            display: inline-block;
            text-align: center;
            background: #fafafa;
        }

        @media (max-width: 768px) {
            .invoice-wrapper {
                margin: 0;
                border-radius: 0;
                border: none;
            }
            .invoice-body {
                padding: 20px 15px;
            }
            .table-invoice th, .table-invoice td {
                padding: 10px 8px;
                font-size: 12px;
            }
        }

        @media print {
            body {
                background: #ffffff !important;
                color: #000000 !important;
            }
            .action-header, .no-print {
                display: none !important;
            }
            .invoice-wrapper {
                max-width: 100% !important;
                margin: 0 !important;
                box-shadow: none !important;
                border: none !important;
            }
            .invoice-body {
                padding: 0 !important;
            }
        }
    </style>
</head>
<body>

    <!-- Sticky Top Action Bar (Hidden during Print) -->
    <div class="action-header no-print">
        <div class="container d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex align-items-center gap-2">
                <i class="fa fa-file-invoice text-primary fs-5"></i>
                <span class="fw-bold fs-6">Tax Invoice</span>
                <span class="badge bg-secondary font-mono">{{ $invoice_number }}</span>
                @if($is_delivered)
                    <span class="badge bg-success"><i class="fa fa-check-circle me-1"></i>Delivered</span>
                @endif
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ url()->previous() ?: route('frontend.dashboard.orders') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                    <i class="fa fa-arrow-left me-1"></i> Back
                </a>
                <a href="{{ request()->fullUrlWithQuery(['download' => 'pdf']) }}" class="btn btn-primary btn-sm rounded-pill px-3 fw-bold">
                    <i class="fa fa-file-pdf me-1"></i> Download PDF
                </a>
                <button onclick="window.print()" class="btn btn-light btn-sm rounded-pill px-3 fw-bold">
                    <i class="fa fa-print me-1"></i> Print Invoice
                </button>
            </div>
        </div>
    </div>

    <!-- Main Invoice Document Canvas -->
    <div class="invoice-wrapper">
        <div class="invoice-body">
            <!-- Header Section: Seller Brand & Document Type -->
            <div class="row align-items-start mb-4 pb-3 border-bottom">
                <div class="col-sm-7">
                    <h3 class="fw-bold text-dark mb-1">{{ $seller['company_name'] }}</h3>
                    <div class="text-primary fw-semibold mb-2">{{ $seller['brand_name'] }}</div>
                    <div class="text-muted small">
                        {{ $seller['address'] }}<br>
                        {{ $seller['city'] }}, {{ $seller['state'] }} - {{ $seller['pincode'] }}<br>
                        <strong>GSTIN:</strong> <span class="font-mono text-dark">{{ $seller['gstin'] }}</span> | 
                        <strong>PAN:</strong> <span class="font-mono text-dark">{{ $seller['pan'] }}</span><br>
                        <strong>Email:</strong> {{ $seller['email'] }} | <strong>Phone:</strong> {{ $seller['phone'] }}
                    </div>
                </div>
                <div class="col-sm-5 text-sm-end mt-3 mt-sm-0">
                    <div class="badge bg-primary fs-6 px-3 py-2 text-uppercase rounded-3 mb-2">
                        Tax Invoice
                    </div>
                    <div class="small text-muted fw-bold">ORIGINAL FOR RECIPIENT</div>
                    <div class="mt-2">
                        @if($is_delivered)
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill">
                                <i class="fa fa-check-circle me-1"></i> DELIVERED ORDER
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Invoice & Order Metadata Grid -->
            <div class="row g-2 mb-4">
                <div class="col-6 col-md-3">
                    <div class="meta-pill">
                        <small class="text-muted d-block">Invoice No:</small>
                        <strong class="font-mono text-primary">{{ $invoice_number }}</strong>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="meta-pill">
                        <small class="text-muted d-block">Invoice Date:</small>
                        <strong>{{ $invoice_date ? $invoice_date->format('d M, Y') : date('d M, Y') }}</strong>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="meta-pill">
                        <small class="text-muted d-block">Order Ref:</small>
                        <strong class="font-mono">#{{ $order_number }}</strong>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="meta-pill">
                        <small class="text-muted d-block">Place of Supply:</small>
                        <strong>{{ $buyer['state'] ?: $seller['state'] }} ({{ $buyer['state_code'] }})</strong>
                    </div>
                </div>
                @if($courier_name || $tracking_id)
                <div class="col-6 col-md-6">
                    <div class="meta-pill">
                        <small class="text-muted d-block">Fulfillment & Carrier:</small>
                        <strong>{{ $courier_name ?: 'Courier Partner' }}</strong> 
                        @if($tracking_id)
                            - AWB: <span class="font-mono text-dark">{{ $tracking_id }}</span>
                        @endif
                    </div>
                </div>
                @endif
                <div class="col-6 col-md-{{ ($courier_name || $tracking_id) ? '6' : '12' }}">
                    <div class="meta-pill">
                        <small class="text-muted d-block">Payment Mode & Status:</small>
                        <strong>{{ $payment_method }}</strong> 
                        <span class="badge bg-{{ $payment_status === 'PAID' ? 'success' : 'warning text-dark' }} ms-1">{{ $payment_status }}</span>
                        @if($transaction_id)
                            <small class="text-muted ms-1 font-mono">(Txn: {{ $transaction_id }})</small>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Seller vs Buyer Parties -->
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <div class="party-card">
                        <h6 class="fw-bold text-primary text-uppercase border-bottom pb-2 mb-2" style="font-size: 12px; letter-spacing: 0.5px;">
                            <i class="fa fa-building me-1"></i> Sold By (Seller)
                        </h6>
                        <strong class="text-dark">{{ $seller['company_name'] }}</strong><br>
                        <span class="text-muted small">
                            {{ $seller['address'] }}<br>
                            {{ $seller['city'] }}, {{ $seller['state'] }} - {{ $seller['pincode'] }}<br>
                            State: {{ $seller['state'] }} (State Code: {{ $seller['state_code'] }})<br>
                            <strong>GSTIN:</strong> <span class="font-mono">{{ $seller['gstin'] }}</span><br>
                            <strong>PAN:</strong> <span class="font-mono">{{ $seller['pan'] }}</span>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="party-card">
                        <h6 class="fw-bold text-success text-uppercase border-bottom pb-2 mb-2" style="font-size: 12px; letter-spacing: 0.5px;">
                            <i class="fa fa-user me-1"></i> Billed &amp; Shipped To (Buyer)
                        </h6>
                        <strong class="text-dark">{{ $buyer['name'] }}</strong><br>
                        <span class="text-muted small">
                            {{ $buyer['address'] }}<br>
                            {{ $buyer['city'] }}, {{ $buyer['state'] }} - {{ $buyer['pincode'] }}<br>
                            State: {{ $buyer['state'] }} (State Code: {{ $buyer['state_code'] }})<br>
                            <strong>Mobile:</strong> <a href="tel:{{ $buyer['phone'] }}" class="text-decoration-none text-dark font-mono">{{ $buyer['phone'] }}</a><br>
                            <strong>Email:</strong> {{ $buyer['email'] ?: 'N/A' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Itemized Products Table -->
            <div class="table-responsive mb-4 rounded-3 border">
                <table class="table table-invoice mb-0">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Description of Goods</th>
                            <th class="text-center">HSN</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Unit Rate</th>
                            <th class="text-end">Taxable Val</th>
                            <th class="text-end">Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td class="text-center text-muted">{{ $item['s_no'] }}</td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $item['name'] }}</div>
                                    <small class="text-muted">{{ $item['category'] }} | SKU: {{ $item['sku'] }}</small>
                                </td>
                                <td class="text-center font-mono small">{{ $item['hsn'] }}</td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border font-mono">x{{ $item['quantity'] }}</span>
                                </td>
                                <td class="text-end font-mono">
                                    @if($item['unit_price'] > 0)
                                        ₹{{ number_format($item['unit_price'], 2) }}
                                    @else
                                        <span class="badge bg-success-subtle text-success">FREE</span>
                                    @endif
                                </td>
                                <td class="text-end font-mono">₹{{ number_format($item['taxable_value'], 2) }}</td>
                                <td class="text-end font-mono fw-bold text-dark">₹{{ number_format($item['line_total'], 2) }}</td>
                            </tr>
                        @endforeach
                        @if($delivery_charge > 0)
                            <tr>
                                <td class="text-center text-muted">{{ count($items) + 1 }}</td>
                                <td>
                                    <div class="fw-bold text-dark">Courier Shipping &amp; Handling Charge</div>
                                    @if($delivery_distance_km)
                                        <small class="text-muted font-mono">Dispatch Distance: {{ $delivery_distance_km }} km from warehouse</small>
                                    @endif
                                </td>
                                <td class="text-center font-mono small">9968</td>
                                <td class="text-center"><span class="badge bg-light text-dark border font-mono">x1</span></td>
                                <td class="text-end font-mono">₹{{ number_format($delivery_charge, 2) }}</td>
                                <td class="text-end font-mono">₹{{ number_format($delivery_charge, 2) }}</td>
                                <td class="text-end font-mono fw-bold text-dark">₹{{ number_format($delivery_charge, 2) }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Amount in Words & Totals Grid -->
            <div class="row g-4 mb-4">
                <div class="col-md-7">
                    <div class="p-3 bg-light rounded-3 border mb-3">
                        <small class="text-muted fw-bold d-block text-uppercase" style="font-size: 11px;">Amount in Words:</small>
                        <div class="fw-bold text-dark fst-italic">{{ $amount_in_words }}</div>
                    </div>

                    <div class="p-3 bg-white rounded-3 border small">
                        <div class="fw-bold text-primary mb-1"><i class="fa fa-university me-1"></i> Bank Payment Details:</div>
                        <div class="row">
                            <div class="col-sm-6 text-muted">Bank Name: <strong class="text-dark">{{ $seller['bank_name'] }}</strong></div>
                            <div class="col-sm-6 text-muted">A/C No: <strong class="text-dark font-mono">{{ $seller['bank_account'] }}</strong></div>
                            <div class="col-sm-6 text-muted">IFSC: <strong class="text-dark font-mono">{{ $seller['bank_ifsc'] }}</strong></div>
                            <div class="col-sm-6 text-muted">Branch: <strong class="text-dark">{{ $seller['bank_branch'] }}</strong></div>
                            <div class="col-12 text-muted mt-1">UPI ID: <strong class="text-primary font-mono">{{ $seller['upi_id'] }}</strong></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card border rounded-3 p-3 bg-light">
                        <div class="d-flex justify-content-between py-1 border-bottom">
                            <span class="text-muted small">Items Subtotal:</span>
                            <span class="font-mono fw-semibold">₹{{ number_format($items_subtotal, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-1 border-bottom">
                            <span class="text-muted small">Shipping &amp; Delivery:</span>
                            <span class="font-mono fw-semibold">
                                @if($delivery_charge > 0)
                                    ₹{{ number_format($delivery_charge, 2) }}
                                @else
                                    <span class="badge bg-success-subtle text-success">FREE</span>
                                @endif
                            </span>
                        </div>
                        @if($is_interstate)
                        <div class="d-flex justify-content-between py-1 border-bottom">
                            <span class="text-muted small">IGST ({{ $seller['tax_rate'] }}% incl.):</span>
                            <span class="font-mono small">₹{{ number_format($total_igst, 2) }}</span>
                        </div>
                        @else
                        <div class="d-flex justify-content-between py-1 border-bottom">
                            <span class="text-muted small">CGST ({{ $seller['tax_rate'] / 2 }}% incl.):</span>
                            <span class="font-mono small">₹{{ number_format($total_cgst, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-1 border-bottom">
                            <span class="text-muted small">SGST ({{ $seller['tax_rate'] / 2 }}% incl.):</span>
                            <span class="font-mono small">₹{{ number_format($total_sgst, 2) }}</span>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center pt-3 mt-1">
                            <div>
                                <span class="fw-bold fs-6 text-dark d-block">Grand Total:</span>
                                <small class="text-muted" style="font-size: 10.5px;">All taxes included</small>
                            </div>
                            <span class="fw-bold fs-4 text-primary font-mono">₹{{ number_format($grand_total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer: Terms & Authorized Signatory -->
            <div class="row align-items-end pt-3 border-top mt-4">
                <div class="col-sm-8 small text-muted">
                    <strong class="text-dark d-block mb-1">Terms &amp; Conditions:</strong>
                    {!! nl2br(e($seller['terms'])) !!}
                </div>
                <div class="col-sm-4 text-sm-end mt-3 mt-sm-0">
                    <div class="stamp-box">
                        <strong class="text-dark d-block">{{ $seller['brand_name'] }}</strong>
                        <small class="text-muted d-block" style="font-size: 11px;">Authorized Signatory</small>
                        <span class="badge bg-success-subtle text-success border border-success-subtle mt-1" style="font-size: 10px;">
                            <i class="fa fa-certificate me-1"></i> Digitally Verified
                        </span>
                    </div>
                    <div class="text-muted mt-2" style="font-size: 10px;">
                        Computer generated tax invoice. Valid without physical signature.
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(request()->has('print'))
        <script>
            window.addEventListener('load', function() {
                window.print();
            });
        </script>
    @endif
</body>
</html>
