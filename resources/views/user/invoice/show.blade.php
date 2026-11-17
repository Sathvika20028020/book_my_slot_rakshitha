
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice | Book My Slot</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --navy: #0A0F1D;
            --gold: #F59E0B;
            --gold-light: #FFFBEB;
            --text: #334155;
            --muted: #64748B;
            --border: #E2E8F0;
        }

        body {
            margin: 0;
            padding: 35px 15px;
            background: #F1F5F9;
            font-family: Arial, sans-serif;
            color: var(--text);
        }

        .invoice-actions {
            max-width: 950px;
            margin: 0 auto 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .invoice-actions a,
        .invoice-actions button {
            border: none;
            border-radius: 8px;
            padding: 11px 17px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .back-btn {
            background: #fff;
            color: var(--navy);
            border: 1px solid var(--border) !important;
        }

        .download-btn {
            background: var(--navy);
            color: var(--gold);
        }

        .print-btn {
            background: var(--gold);
            color: var(--navy);
        }

        .invoice-paper {
            max-width: 950px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(15, 23, 42, .08);
        }

        .invoice-header {
            background: var(--navy);
            color: white;
            padding: 38px 42px;
            position: relative;
            overflow: hidden;
        }

        .invoice-header::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border: 35px solid rgba(245, 158, 11, .10);
            border-radius: 50%;
            right: -65px;
            top: -110px;
        }

        .brand {
            font-size: 25px;
            font-weight: 900;
            letter-spacing: .5px;
            color: white;
        }

        .brand span {
            color: var(--gold);
        }

        .brand-tagline {
            color: #CBD5E1;
            font-size: 11px;
            letter-spacing: 2px;
            margin-top: 5px;
        }

        .invoice-heading {
            text-align: right;
            position: relative;
            z-index: 1;
        }

        .invoice-heading h1 {
            font-size: 34px;
            font-weight: 900;
            letter-spacing: 2px;
            margin: 0;
        }

        .invoice-heading p {
            color: #CBD5E1;
            font-size: 12px;
            margin: 6px 0 0;
        }

        .invoice-body {
            padding: 38px 42px;
        }

        .paid-stamp {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 16px;
            border: 2px solid #16A34A;
            color: #15803D;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 1px;
            transform: rotate(-4deg);
        }

        .invoice-meta {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin: 28px 0;
            flex-wrap: wrap;
        }

        .meta-label {
            color: var(--muted);
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 7px;
        }

        .meta-value {
            color: var(--navy);
            font-size: 14px;
            font-weight: 800;
        }

        .meta-sub {
            color: var(--muted);
            font-size: 12px;
            margin-top: 5px;
        }

        .invoice-divider {
            border: 0;
            border-top: 1px solid var(--border);
            margin: 27px 0;
        }

        .section-heading {
            color: var(--navy);
            font-size: 15px;
            font-weight: 900;
            margin-bottom: 17px;
        }

        .section-heading i {
            color: var(--gold);
            margin-right: 8px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px 30px;
        }

        .detail-item label {
            display: block;
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .detail-item strong {
            color: var(--navy);
            font-size: 13px;
            font-weight: 800;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .invoice-table th {
            background: var(--navy);
            color: #fff;
            padding: 14px 15px;
            font-size: 11px;
            text-align: left;
            letter-spacing: .5px;
        }

        .invoice-table td {
            padding: 17px 15px;
            border-bottom: 1px solid var(--border);
            font-size: 13px;
            color: var(--text);
        }

        .invoice-table td strong {
            color: var(--navy);
        }

        .text-right {
            text-align: right !important;
        }

        .payment-box {
            background: #F8FAFC;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 20px;
            margin-top: 25px;
        }

        .payment-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            padding: 8px 0;
            font-size: 13px;
        }

        .payment-row span {
            color: var(--muted);
        }

        .payment-row strong {
            color: var(--navy);
            text-align: right;
        }

        .grand-total {
            background: var(--navy);
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .grand-total span {
            font-size: 13px;
            font-weight: 700;
        }

        .grand-total strong {
            color: var(--gold);
            font-size: 25px;
            font-weight: 900;
        }

        .payment-success {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            color: #166534;
            border-radius: 9px;
            padding: 15px;
            margin-top: 22px;
            font-size: 12px;
            line-height: 1.7;
        }

        .invoice-footer {
            background: #F8FAFC;
            border-top: 1px solid var(--border);
            padding: 25px 42px;
            text-align: center;
        }

        .invoice-footer h6 {
            color: var(--navy);
            font-size: 13px;
            font-weight: 900;
        }

        .invoice-footer p {
            color: var(--muted);
            font-size: 11px;
            margin: 5px 0;
        }

        .footer-brand {
            color: var(--navy);
            font-size: 12px;
            font-weight: 900;
            margin-top: 14px;
        }

        .footer-brand span {
            color: var(--gold);
        }

        @media(max-width: 600px) {
            body {
                padding: 15px 8px;
            }

            .invoice-header,
            .invoice-body {
                padding: 25px 18px;
            }

            .invoice-heading {
                text-align: left;
                margin-top: 25px;
            }

            .invoice-heading h1 {
                font-size: 27px;
            }

            .details-grid {
                grid-template-columns: 1fr 1fr;
                gap: 17px 12px;
            }

            .invoice-table th,
            .invoice-table td {
                padding: 11px 8px;
                font-size: 11px;
            }

            .invoice-footer {
                padding: 22px 15px;
            }

            .grand-total strong {
                font-size: 20px;
            }
        }

        @media print {
            @page {
                size: A4;
                margin: 10mm;
            }

            body {
                padding: 0;
                background: white;
            }

            .invoice-actions {
                display: none !important;
            }

            .invoice-paper {
                max-width: 100%;
                box-shadow: none;
                border-radius: 0;
            }

            .invoice-header,
            .invoice-table th,
            .grand-total {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }
    </style>
</head>

<body>

    <!-- ACTION BUTTONS -->
    <div class="invoice-actions">
        <a href="javascript:history.back()" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i> Back
        </a>

        <div class="d-flex gap-2">
            <button class="print-btn" onclick="window.print()">
                <i class="fas fa-print me-2"></i> Print
            </button>

            <button class="download-btn" onclick="downloadInvoice()">
                <i class="fas fa-download me-2"></i> Download PDF
            </button>
        </div>
    </div>

    <!-- INVOICE -->
    <div class="invoice-paper" id="invoiceContent">

        <!-- HEADER -->
        <div class="invoice-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="brand">BOOK MY <span>SLOT</span></div>
                    <div class="brand-tagline">YOUR EVENT. YOUR PERFECT VENUE.</div>
                </div>

                <div class="col-md-6">
                    <div class="invoice-heading">
                        <h1>INVOICE</h1>
                        <p>OFFICIAL PAYMENT RECEIPT</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoice-body">

            <!-- INVOICE STATUS -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <div class="meta-label">Payment Status</div>
                    <div class="paid-stamp">
                        <i class="fas fa-check-circle"></i> PAID
                    </div>
                </div>

                <div class="text-md-end">
                    <div class="meta-label">Invoice Number</div>
                    <div class="meta-value">BMS-INV-2026-00125</div>
                    <div class="meta-sub">Invoice Date: 17 November 2026</div>
                </div>
            </div>

            <hr class="invoice-divider">

            <!-- BILLING INFORMATION -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="meta-label">Billed To</div>
                    <div class="meta-value">Rahul Kumar</div>
                    <div class="meta-sub">Mobile: +91 9876543210</div>
                    <div class="meta-sub">Bengaluru, Karnataka</div>
                </div>

                <div class="col-md-6">
                    <div class="meta-label">Venue / Convention Centre</div>
                    <div class="meta-value">Grand Palace Convention Hall</div>
                    <div class="meta-sub">Bengaluru, Karnataka, India</div>
                    <div class="meta-sub">Booking Reference: BMS-BOOK-00125</div>
                </div>
            </div>

            <hr class="invoice-divider">

            <!-- EVENT DETAILS -->
            <h6 class="section-heading">
                <i class="fas fa-calendar-check"></i> Event & Booking Details
            </h6>

            <div class="details-grid">

                <div class="detail-item">
                    <label>Hall Name</label>
                    <strong>Grand Palace Convention Hall</strong>
                </div>

                <div class="detail-item">
                    <label>Hall Type</label>
                    <strong>AC Hall</strong>
                </div>

                <div class="detail-item">
                    <label>Event Type</label>
                    <strong>Wedding Reception</strong>
                </div>

                <div class="detail-item">
                    <label>Expected Guests</label>
                    <strong>500 Guests</strong>
                </div>

                <div class="detail-item">
                    <label>Check-in Date & Time</label>
                    <strong>20 November 2026, 7:00 PM</strong>
                </div>

                <div class="detail-item">
                    <label>Check-out Date & Time</label>
                    <strong>22 November 2026, 10:00 AM</strong>
                </div>

                <div class="detail-item">
                    <label>Booking Duration</label>
                    <strong>3 Days</strong>
                </div>

                <div class="detail-item">
                    <label>Booking Status</label>
                    <strong style="color:#15803D;">Confirmed</strong>
                </div>

            </div>

            <hr class="invoice-divider">

            <!-- PRICE DETAILS -->
            <h6 class="section-heading">
                <i class="fas fa-receipt"></i> Invoice Breakdown
            </h6>

            <div class="table-responsive">
                <table class="invoice-table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Duration</th>
                            <th class="text-right">Rate</th>
                            <th class="text-right">Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <strong>AC Hall Rental</strong>
                                <div class="text-muted small">Grand Palace Convention Hall</div>
                            </td>
                            <td>3 Days</td>
                            <td class="text-right">₹25,000</td>
                            <td class="text-right"><strong>₹75,000</strong></td>
                        </tr>

                        <tr>
                            <td>Additional Services</td>
                            <td>—</td>
                            <td class="text-right">₹0</td>
                            <td class="text-right">₹0</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- PAYMENT DETAILS -->
            <div class="payment-box">
                <h6 class="section-heading mb-2">
                    <i class="fas fa-credit-card"></i> Payment Information
                </h6>

                <div class="payment-row">
                    <span>Payment Method</span>
                    <strong>UPI</strong>
                </div>

                <div class="payment-row">
                    <span>Transaction ID</span>
                    <strong>TXN2026111700125</strong>
                </div>

                <div class="payment-row">
                    <span>Payment Date</span>
                    <strong>17 November 2026</strong>
                </div>

                <div class="payment-row">
                    <span>Payment Status</span>
                    <strong style="color:#15803D;">Successful</strong>
                </div>
            </div>

            <!-- TOTAL -->
            <div class="grand-total">
                <span>Total Amount Paid</span>
                <strong>₹75,000</strong>
            </div>

            <div class="payment-success">
                <i class="fas fa-check-circle me-2"></i>
                <strong>Payment received successfully!</strong>
                <br>
                Your venue booking has been confirmed. Please retain this invoice
                as proof of payment and booking confirmation.
            </div>

        </div>

        <!-- FOOTER -->
        <div class="invoice-footer">
            <h6>Thank You for Choosing Book My Slot!</h6>
            <p>This is a computer-generated invoice for the booking and payment details shown above.</p>
            <p>For booking-related assistance, please contact the convention centre.</p>

            <div class="footer-brand">
                BOOK MY <span>SLOT</span>
            </div>

            <p class="mt-2">Making every event memorable.</p>
        </div>

    </div>

    <!-- PDF DOWNLOAD -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        function downloadInvoice() {

            const invoice = document.getElementById('invoiceContent');

            const options = {
                margin: 5,
                filename: 'Book-My-Slot-Invoice-BMS-INV-2026-00125.pdf',

                image: {
                    type: 'jpeg',
                    quality: 0.98
                },

                html2canvas: {
                    scale: 2,
                    useCORS: true,
                    backgroundColor: '#ffffff'
                },

                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                },

                pagebreak: {
                    mode: ['avoid-all', 'css', 'legacy']
                }
            };

            html2pdf()
                .set(options)
                .from(invoice)
                .save();
        }
    </script>

</body>
</html>
