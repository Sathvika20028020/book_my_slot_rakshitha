
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book My Slot - Invoice Preview</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #F1F5F9;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #0A0F1D;
        }

        .page {
            max-width: 950px;
            margin: 35px auto;
            padding: 0 15px;
        }

        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 12px;
        }

        .toolbar a {
            color: #64748B;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
        }

        .download {
            background: #0A0F1D;
            color: white;
            border: 0;
            padding: 13px 20px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .download:hover {
            background: #F59E0B;
            color: #0A0F1D;
        }

        .invoice {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(0,0,0,.06);
        }

        .success {
            background: #F0FDF4;
            padding: 22px 35px;
            display: flex;
            align-items: center;
            gap: 15px;
            border-bottom: 1px solid #DCFCE7;
        }

        .success-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #DCFCE7;
            color: #15803D;
            display: grid;
            place-items: center;
            font-size: 20px;
        }

        .success h3 {
            margin: 0 0 5px;
            color: #166534;
            font-size: 17px;
        }

        .success p {
            margin: 0;
            font-size: 13px;
            color: #477354;
        }

        .content { padding: 38px; }

        .brand-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding-bottom: 28px;
            border-bottom: 1px solid #E2E8F0;
        }

        .brand h2 {
            font-size: 24px;
            margin: 0 0 7px;
            font-weight: 800;
        }

        .brand p {
            margin: 4px 0;
            font-size: 12px;
            color: #64748B;
        }

        .invoice-heading { text-align: right; }

        .invoice-heading h1 {
            margin: 0 0 8px;
            font-size: 30px;
            letter-spacing: 2px;
        }

        .paid-tag {
            background: #DCFCE7;
            color: #15803D;
            padding: 7px 13px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 800;
        }

        .meta {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
            padding: 25px 0;
            border-bottom: 1px solid #E2E8F0;
        }

        .label {
            color: #94A3B8;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .6px;
            margin-bottom: 7px;
        }

        .value {
            font-size: 14px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .section { margin-top: 28px; }

        .section h3 {
            font-size: 15px;
            margin: 0 0 18px;
            font-weight: 800;
        }

        .details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .detail-label {
            font-size: 12px;
            color: #94A3B8;
            margin-bottom: 6px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 700;
            color: #334155;
        }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 400px;
        }

        th {
            background: #F8FAFC;
            padding: 14px;
            color: #64748B;
            font-size: 11px;
            text-align: left;
            text-transform: uppercase;
        }

        td {
            padding: 16px 14px;
            border-bottom: 1px solid #E2E8F0;
            font-size: 13px;
            font-weight: 600;
        }

        th:last-child, td:last-child { text-align: right; }

        .totals {
            max-width: 350px;
            margin: 20px 0 0 auto;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 9px 0;
            font-size: 13px;
            color: #64748B;
        }

        .total-row strong { color: #0A0F1D; }

        .grand {
            border-top: 1px solid #E2E8F0;
            padding-top: 15px;
            margin-top: 8px;
            font-size: 16px;
            font-weight: 800;
        }

        .paid { color: #15803D; }
        .balance { color: #B45309; }

        .payment-box {
            margin-top: 25px;
            padding: 16px;
            background: #FFFBEB;
            border: 1px solid #FDE68A;
            border-radius: 9px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            color: #92400E;
            font-size: 13px;
            font-weight: 700;
        }

        .footer {
            border-top: 1px dashed #CBD5E1;
            margin-top: 35px;
            padding-top: 22px;
            text-align: center;
        }

        .footer h4 { margin: 0 0 8px; font-size: 14px; }
        .footer p { color: #94A3B8; font-size: 12px; line-height: 1.7; }

        @media(max-width: 600px) {
            .page { margin: 18px auto; }
            .content { padding: 22px 17px; }
            .success { padding: 18px; }
            .brand-row { flex-direction: column; }
            .invoice-heading { text-align: left; }
            .details { gap: 18px 12px; }
            .toolbar { align-items: flex-start; }
            .download { padding: 11px 13px; }
        }

        @media print {
            @page { size: A4; margin: 12mm; }
            body { background: white; }
            .page { margin: 0; max-width: 100%; padding: 0; }
            .toolbar, .success { display: none !important; }
            .invoice { box-shadow: none; border-radius: 0; }
            .content { padding: 0; }
            * { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        }
    </style>
</head>

<body>
<div class="page">

    <div class="toolbar">
        <a href="javascript:history.back()">
            <i class="fas fa-arrow-left"></i> Back
        </a>

        <button class="download" onclick="window.print()">
            <i class="fas fa-download"></i> Download Invoice
        </button>
    </div>

    <div class="invoice">

        <div class="success">
            <div class="success-icon"><i class="fas fa-check"></i></div>
            <div>
                <h3>Payment Successful!</h3>
                <p>Your payment has been received. Your invoice is ready.</p>
            </div>
        </div>

        <div class="content">

            <div class="brand-row">
                <div class="brand">
                    <h2>BOOK MY SLOT</h2>
                    <p>Convention Centre Booking Platform</p>
                    <p>Booking Confirmation & Payment Receipt</p>
                </div>

                <div class="invoice-heading">
                    <h1>INVOICE</h1>
                    <span class="paid-tag">PAYMENT RECEIPT</span>
                </div>
            </div>

            <div class="meta">
                <div>
                    <div class="label">Invoice Number</div>
                    <div class="value">INV-BMS-2026-001</div>
                </div>
                <div>
                    <div class="label">Invoice Date</div>
                    <div class="value">17 November 2026</div>
                </div>
                <div>
                    <div class="label">Booking ID</div>
                    <div class="value">BMS-2026-001</div>
                </div>
                <div>
                    <div class="label">Payment Status</div>
                    <div class="value" style="color:#15803D;">✓ Payment Received</div>
                </div>
            </div>

            <div class="section">
                <h3>Customer Details</h3>
                <div class="details">
                    <div>
                        <div class="detail-label">Full Name</div>
                        <div class="detail-value">Rahul Sharma</div>
                    </div>
                    <div>
                        <div class="detail-label">Mobile Number</div>
                        <div class="detail-value">+91 98765 43210</div>
                    </div>
                    <div>
                        <div class="detail-label">Email Address</div>
                        <div class="detail-value">rahul@example.com</div>
                    </div>
                    <div>
                        <div class="detail-label">City</div>
                        <div class="detail-value">Bengaluru</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Convention Centre & Event Details</h3>
                <div class="details">
                    <div>
                        <div class="detail-label">Convention Centre</div>
                        <div class="detail-value">Bengaluru Convention Centre</div>
                    </div>
                    <div>
                        <div class="detail-label">Location</div>
                        <div class="detail-value">Bengaluru, Karnataka</div>
                    </div>
                    <div>
                        <div class="detail-label">Event Type</div>
                        <div class="detail-value">Wedding Reception</div>
                    </div>
                    <div>
                        <div class="detail-label">Event Date</div>
                        <div class="detail-value">20 December 2026</div>
                    </div>
                    <div>
                        <div class="detail-label">Event Time</div>
                        <div class="detail-value">10:00 AM – 10:00 PM</div>
                    </div>
                    <div>
                        <div class="detail-label">Expected Guests</div>
                        <div class="detail-value">500 Guests</div>
                    </div>
                </div>
            </div>

            <div class="section">
                <h3>Payment Summary</h3>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Convention Centre Booking</td>
                                <td>₹1,00,000.00</td>
                            </tr>
                            <tr>
                                <td>GST</td>
                                <td>₹18,000.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="totals">
                    <div class="total-row">
                        <span>Subtotal</span>
                        <strong>₹1,00,000.00</strong>
                    </div>
                    <div class="total-row">
                        <span>GST</span>
                        <strong>₹18,000.00</strong>
                    </div>
                    <div class="total-row grand">
                        <span>Total Amount</span>
                        <strong>₹1,18,000.00</strong>
                    </div>
                    <div class="total-row">
                        <span>Amount Paid</span>
                        <strong class="paid">₹50,000.00</strong>
                    </div>
                    <div class="total-row">
                        <span>Remaining Balance</span>
                        <strong class="balance">₹68,000.00</strong>
                    </div>
                </div>

                <div class="payment-box">
                    <span><i class="fas fa-check-circle"></i> Advance Payment Received</span>
                    <strong>₹50,000.00</strong>
                </div>
            </div>

            <div class="section">
                <h3>Transaction Details</h3>
                <div class="details">
                    <div>
                        <div class="detail-label">Payment ID</div>
                        <div class="detail-value">PAY-BMS-2026-001</div>
                    </div>
                    <div>
                        <div class="detail-label">Payment Method</div>
                        <div class="detail-value">UPI</div>
                    </div>
                    <div>
                        <div class="detail-label">Payment Date</div>
                        <div class="detail-value">17 November 2026</div>
                    </div>
                    <div>
                        <div class="detail-label">Transaction Status</div>
                        <div class="detail-value" style="color:#15803D;">Successful</div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <h4>Thank You for Booking with Book My Slot!</h4>
                <p>
                    This is a computer-generated invoice.<br>
                    Please keep this invoice for your records.
                </p>
            </div>

        </div>
    </div>
</div>

</body>
</html>
