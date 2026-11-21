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
            --text: #334155;
            --muted: #64748B;
            --border: #E2E8F0;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px 15px;
            background: #F1F5F9;
            font-family: Arial, sans-serif;
            color: var(--text);
        }

        /* ACTION BUTTONS */
        .invoice-actions {
            max-width: 950px;
            margin: 0 auto 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .invoice-actions a,
        .invoice-actions button {
            padding: 10px 15px;
            border: none;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        .back-btn {
            background: white;
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

        /* INVOICE PAPER */
        .invoice-paper {
            width: 100%;
            max-width: 950px;
            margin: auto;
            background: white;
            border-radius: 9px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(15, 23, 42, .08);
        }

        /* HEADER */
        .invoice-header {
            background: var(--navy);
            color: white;
            padding: 23px 32px;
            text-align: center;
        }

        .header-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            text-align: center;
        }

        .invoice-heading {
            width: 100%;
            text-align: center;
            margin: 0 auto;
        }

        .brand {
            color: white;
            font-size: 22px;
            font-weight: 900;
            letter-spacing: .4px;
        }

        .brand span,
        .footer-brand span {
            color: var(--gold);
        }

        .brand-tagline {
            color: #CBD5E1;
            font-size: 9px;
            letter-spacing: 1.5px;
            margin-top: 4px;
        }

        .invoice-heading h1 {
            font-size: 29px;
            font-weight: 900;
            letter-spacing: 2px;
            margin: 10px 0 0;
        }

        .invoice-heading p {
            color: #CBD5E1;
            font-size: 9px;
            letter-spacing: .8px;
            margin: 4px 0 0;
        }

        /* INVOICE BODY */
        .invoice-body {
            padding: 23px 32px;
        }

        .meta-label {
            color: var(--muted);
            font-size: 9px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 4px;
        }

        .meta-value {
            color: var(--navy);
            font-size: 12px;
            font-weight: 800;
        }

        .meta-sub {
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        /* INVOICE NUMBER AND PAYMENT STATUS */
        .invoice-top {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 15px;
        }

        .invoice-identifiers {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
        }

        .paid-area {
            text-align: right;
        }

        .paid-stamp {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 13px;
            border: 2px solid #16A34A;
            border-radius: 5px;
            color: #15803D;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: 1px;
            transform: none !important;
        }

        .invoice-divider {
            border: 0;
            border-top: 1px solid var(--border);
            margin: 15px 0;
            opacity: 1;
        }

        /* BILLING INFORMATION */
        .billing-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .billing-right {
            text-align: right;
        }

        /* SECTION HEADINGS */
        .section-heading {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--navy);
            font-size: 12px;
            font-weight: 900;
            margin-bottom: 10px;
        }

        .section-heading i {
            color: var(--gold);
            width: 16px;
            text-align: center;
            flex-shrink: 0;
        }

        /* EVENT DETAILS */
        .details-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px 18px;
        }

        .detail-item label {
            display: block;
            color: var(--muted);
            font-size: 9px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .detail-item strong {
            color: var(--navy);
            font-size: 10px;
            font-weight: 800;
        }

        /* INVOICE TABLE */
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        .invoice-table th {
            background: var(--navy);
            color: white;
            padding: 9px 11px;
            font-size: 9px;
            text-align: left;
            letter-spacing: .3px;
        }

        .invoice-table td {
            padding: 10px 11px;
            border-bottom: 1px solid var(--border);
            font-size: 10px;
            color: var(--text);
        }

        .invoice-table td strong {
            color: var(--navy);
        }

        .text-right {
            text-align: right !important;
        }

        /* PAYMENT INFORMATION */
        .payment-box {
            background: #F8FAFC;
            border: 1px solid var(--border);
            border-radius: 7px;
            padding: 12px 15px;
            margin-top: 14px;
        }

        .payment-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
        }

        .payment-item span {
            display: block;
            color: var(--muted);
            font-size: 9px;
            margin-bottom: 4px;
        }

        .payment-item strong {
            display: block;
            color: var(--navy);
            font-size: 10px;
            overflow-wrap: anywhere;
        }

        /* TOTAL */
        .grand-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            background: var(--navy);
            color: white;
            border-radius: 7px;
            padding: 12px 17px;
            margin-top: 12px;
        }

        .grand-total span {
            font-size: 11px;
            font-weight: 700;
        }

        .grand-total strong {
            color: var(--gold);
            font-size: 21px;
            font-weight: 900;
        }

        /* PAYMENT SUCCESS */
        .payment-success {
            background: #F0FDF4;
            border: 1px solid #BBF7D0;
            color: #166534;
            border-radius: 6px;
            padding: 9px 12px;
            margin-top: 12px;
            font-size: 10px;
            line-height: 1.5;
        }

        /* FOOTER */
        .invoice-footer {
            background: #F8FAFC;
            border-top: 1px solid var(--border);
            padding: 13px 25px;
            text-align: center;
        }

        .invoice-footer h6 {
            color: var(--navy);
            font-size: 11px;
            font-weight: 900;
            margin-bottom: 4px;
        }

        .invoice-footer p {
            color: var(--muted);
            font-size: 9px;
            margin: 3px 0;
        }

        .footer-brand {
            color: var(--navy);
            font-size: 11px;
            font-weight: 900;
            margin-top: 7px;
        }

        /* MOBILE RESPONSIVE */
        @media (max-width: 600px) {
            body {
                padding: 12px 7px;
            }

            .invoice-header {
                padding: 20px 15px;
            }

            .header-grid,
            .invoice-heading {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center !important;
            }

            .brand {
                font-size: 17px;
                text-align: center;
            }

            .brand-tagline,
            .invoice-heading h1,
            .invoice-heading p {
                text-align: center !important;
            }

            .invoice-heading h1 {
                font-size: 25px;
            }

            .invoice-body {
                padding: 18px 14px;
            }

            .invoice-top {
                grid-template-columns: 1fr 1fr;
            }

            .invoice-identifiers {
                flex-direction: column;
                gap: 10px;
            }

            .billing-grid {
                gap: 12px;
            }

            .billing-right {
                text-align: right;
            }

            .details-grid,
            .payment-grid {
                grid-template-columns: 1fr 1fr;
                gap: 12px 9px;
            }

            .invoice-table th,
            .invoice-table td {
                padding: 8px 5px;
                font-size: 9px;
            }

            .grand-total strong {
                font-size: 18px;
            }

            .invoice-footer {
                padding: 13px 10px;
            }
        }

        /* PRINT */
        @media print {
            @page {
                size: A4 portrait;
                margin: 7mm;
            }

            html,
            body {
                width: 100%;
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
            }

            .invoice-actions {
                display: none !important;
            }

            .invoice-paper {
                width: 100% !important;
                max-width: none !important;
                margin: 0 !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                overflow: visible !important;
            }

            .invoice-header {
                padding: 17px 23px !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .header-grid,
            .invoice-heading {
                display: flex !important;
                flex-direction: column !important;
                justify-content: center !important;
                align-items: center !important;
                text-align: center !important;
            }

            .invoice-body {
                padding: 17px 23px !important;
            }

            .invoice-divider {
                margin: 11px 0 !important;
            }

            .details-grid {
                gap: 9px 14px !important;
            }

            .payment-box {
                padding: 9px 12px !important;
                margin-top: 10px !important;
            }

            .grand-total {
                padding: 9px 14px !important;
                margin-top: 9px !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .payment-success {
                padding: 7px 10px !important;
                margin-top: 9px !important;
            }

            .invoice-footer {
                padding: 10px 15px !important;
            }

            .invoice-table th {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            .invoice-table,
            .payment-box,
            .grand-total,
            .payment-success,
            .billing-grid,
            .details-grid {
                break-inside: avoid;
                page-break-inside: avoid;
            }

            * {
                box-shadow: none !important;
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
    <div class="header-grid">
        <div class="invoice-heading">
            <div class="brand">BOOK MY <span>SLOT</span></div>
            <div class="brand-tagline">YOUR EVENT. YOUR PERFECT VENUE.</div>
            <h1>INVOICE</h1>
            <p>OFFICIAL PAYMENT RECEIPT</p>
        </div>
    </div>
</div>

        <div class="invoice-body">

            <!-- INVOICE NUMBER AND PAID STATUS -->
            <div class="invoice-top">

                <div class="invoice-identifiers">
                    <div>
                        <div class="meta-label">Invoice Number</div>
                        <div class="meta-value">BMS-INV-2026-00125</div>
                        <div class="meta-sub">Invoice Date: 17 November 2026</div>
                    </div>

                    <div>
                        <div class="meta-label">Booking Reference</div>
                        <div class="meta-value">BMS-BOOK-00125</div>
                    </div>
                </div>

                <div class="paid-area">
                    <div class="meta-label">Payment Status</div>
                    <div class="paid-stamp">
                        <i class="fas fa-check-circle"></i> PAID
                    </div>
                </div>

            </div>

            <hr class="invoice-divider">

            <!-- BILLING INFORMATION -->
            <div class="billing-grid">

                <div>
                    <div class="meta-label">Billed To</div>
                    <div class="meta-value">Rahul Kumar</div>
                    <div class="meta-sub">Mobile: +91 9876543210</div>
                    <div class="meta-sub">Bengaluru, Karnataka</div>
                </div>

                <div class="billing-right">
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
                            <div class="text-muted">Grand Palace Convention Hall</div>
                        </td>
                        <td>3 Days</td>
                        <td class="text-right">₹25,000</td>
                        <td class="text-right"><strong>₹75,000</strong></td>
                    </tr>

                    <tr>
                        <td><strong>Additional Services</strong></td>
                        <td>—</td>
                        <td class="text-right">₹0</td>
                        <td class="text-right">₹0</td>
                    </tr>
                </tbody>
            </table>

            <!-- PAYMENT DETAILS -->
            <div class="payment-box">

                <h6 class="section-heading mb-2">
                    <i class="fas fa-credit-card"></i> Payment Information
                </h6>

                <div class="payment-grid">

                    <div class="payment-item">
                        <span>Payment Method</span>
                        <strong>UPI</strong>
                    </div>

                    <div class="payment-item">
                        <span>Transaction ID</span>
                        <strong>TXN2026111700125</strong>
                    </div>

                    <div class="payment-item">
                        <span>Payment Date</span>
                        <strong>17 November 2026</strong>
                    </div>

                    <div class="payment-item">
                        <span>Payment Status</span>
                        <strong style="color:#15803D;">Successful</strong>
                    </div>

                </div>
            </div>

            <!-- TOTAL -->
            <div class="grand-total">
                <span>Total Amount Paid</span>
                <strong>₹75,000</strong>
            </div>

            <!-- SUCCESS MESSAGE -->
            <div class="payment-success">
                <i class="fas fa-check-circle me-2"></i>
                <strong>Payment received successfully!</strong>
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

            <p>Making every event memorable.</p>

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
                    backgroundColor: '#ffffff',
                    scrollY: 0
                },

                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                },

                // Export the complete invoice as one A4 page.
                pagebreak: {
                    mode: ['avoid-all']
                }
            };

            html2pdf()
                .set(options)
                .from(invoice)
                .toPdf()
                .get('pdf')
                .then(function(pdf) {

                    // Keep the PDF to one page for this compact invoice.
                    while (pdf.internal.getNumberOfPages() > 1) {
                        pdf.deletePage(pdf.internal.getNumberOfPages());
                    }

                })
                .save();
        }
    </script>

</body>

</html>