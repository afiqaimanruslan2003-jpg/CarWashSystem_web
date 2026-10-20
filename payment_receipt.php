<?php
include('database001.php');

if (!isset($_GET['payment_id'])) {
    die("Error: Payment ID not provided!");
}

$payment_id = mysqli_real_escape_string($conn, $_GET['payment_id']);

// Get payment details
$sql_payment = "SELECT * FROM payments WHERE payment_id='$payment_id'";
$res_payment = mysqli_query($conn, $sql_payment);
if (!$res_payment || mysqli_num_rows($res_payment) == 0) {
    die("Error: Payment not found!");
}
$payment = mysqli_fetch_assoc($res_payment);

// Get booking details
$booking_id = $payment['booking_id'];
$sql_booking = "SELECT * FROM bookings WHERE booking_id='$booking_id'";
$res_booking = mysqli_query($conn, $sql_booking);
$booking = mysqli_fetch_assoc($res_booking);

// Get user details 
$sql_user = "SELECT name, phone FROM users WHERE IC='" . $booking['IC'] . "'";
$res_user = mysqli_query($conn, $sql_user);

// Handle user data with error checking
if ($res_user && mysqli_num_rows($res_user) > 0) {
    $user = mysqli_fetch_assoc($res_user);
} else {
    // Default values if user not found
    $user = [
        'name' => 'Customer not found',
        'phone' => 'N/A'
    ];
}

// Get service details
$sql_service = "SELECT service_name, price, type_car FROM services WHERE booking_id='$booking_id'";
$res_service = mysqli_query($conn, $sql_service);
if ($res_service && mysqli_num_rows($res_service) > 0) {
    $service = mysqli_fetch_assoc($res_service);
} else {
    // Default values if service not found
    $service = [
        'service_name' => 'Service not found',
        'price' => 0.00,
        'type_car' => 'N/A'
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusive Carwash | Payment Receipt</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    
    <style>
        :root {
            --primary-dark: #0A1A2D;
            --accent-gold: #D4AF37;
            --accent-teal: #2EC4B6;
            --accent-silver: #C0C0C0;
            --card-dark: #1E1E1E;
            --card-darker: #171717;
            --text-light: #F5F5F5;
            --text-muted: #AAAAAA;
            --shadow-luxury: 0 20px 60px rgba(0, 0, 0, 0.4);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            color: var(--text-light);
            padding: 2rem;
        }
        
        .receipt-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .receipt-card {
            background: var(--card-darker);
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .receipt-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
        }
        
        .logo-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }
        
        .logo-text {
            font-size: 2.5rem;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 800;
            letter-spacing: 1.5px;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 5px;
        }
        
        .logo-subtext {
            color: var(--accent-silver);
            font-size: 1rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        
        .receipt-title {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .receipt-title h1 {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 2rem;
        }
        
        .receipt-title p {
            color: var(--accent-silver);
            font-size: 1rem;
        }
        
        .receipt-info {
            background: rgba(212, 175, 55, 0.05);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .info-item {
            display: flex;
            flex-direction: column;
        }
        
        .info-label {
            color: var(--accent-silver);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .info-value {
            color: var(--text-light);
            font-size: 1.1rem;
            font-weight: 500;
        }
        
        .info-value.amount {
            color: var(--accent-gold);
            font-size: 1.3rem;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
        }
        
        .service-table {
            width: 100%;
            margin: 30px 0;
            border-collapse: collapse;
        }
        
        .service-table th {
            background: rgba(212, 175, 55, 0.1);
            color: var(--accent-gold);
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid rgba(212, 175, 55, 0.3);
            font-family: 'Montserrat', sans-serif;
        }
        
        .service-table td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .service-table tr:last-child td {
            border-bottom: none;
        }
        
        .payment-summary {
            background: rgba(46, 196, 182, 0.05);
            border: 1px solid rgba(46, 196, 182, 0.2);
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .summary-row:last-child {
            border-bottom: none;
            font-weight: 700;
            color: var(--accent-gold);
            font-size: 1.2rem;
        }
        
        .summary-label {
            color: var(--accent-silver);
        }
        
        .summary-value {
            color: var(--text-light);
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            justify-content: center;
        }
        
        .btn-action {
            padding: 12px 30px;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-family: 'Montserrat', sans-serif;
        }
        
        .btn-print {
            background: linear-gradient(135deg, var(--accent-teal) 0%, #1e9c8f 100%);
            color: white;
        }
        
        .btn-print:hover {
            background: linear-gradient(135deg, #1e9c8f 0%, var(--accent-teal) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(46, 196, 182, 0.3);
            color: white;
        }
        
        .btn-download {
            background: linear-gradient(135deg, var(--accent-gold) 0%, #b8941f 100%);
            color: #000;
        }
        
        .btn-download:hover {
            background: linear-gradient(135deg, #b8941f 0%, var(--accent-gold) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            color: #000;
        }
        
        .btn-back {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .btn-back:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);
        }
        
        .watermark {
            position: absolute;
            bottom: 20px;
            right: 20px;
            opacity: 0.03;
            font-size: 8rem;
            font-weight: 900;
            color: var(--accent-gold);
            pointer-events: none;
            z-index: 0;
            font-family: 'Montserrat', sans-serif;
        }
        
        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
        }
        
        .status-paid {
            background: rgba(46, 196, 182, 0.1);
            color: var(--accent-teal);
            border: 1px solid rgba(46, 196, 182, 0.3);
        }
        
        .status-pending {
            background: rgba(212, 175, 55, 0.1);
            color: var(--accent-gold);
            border: 1px solid rgba(212, 175, 55, 0.3);
        }
        
        .company-info {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--accent-silver);
            font-size: 0.9rem;
        }
        
        .company-info p {
            margin: 5px 0;
        }
        
        .print-only {
            display: none;
        }
        
        @media print {
            body {
                background: white !important;
                color: black !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            
            .receipt-card {
                box-shadow: none !important;
                border: 1px solid #000 !important;
                border-radius: 0 !important;
                padding: 20px !important;
            }
            
            .action-buttons,
            .btn-action,
            .watermark {
                display: none !important;
            }
            
            .print-only {
                display: block !important;
                text-align: center;
                margin-top: 30px;
                font-size: 0.8rem;
                color: #666;
            }
            
            .company-info {
                border-top: 1px solid #000 !important;
            }
        }
        
        @media (max-width: 768px) {
            .receipt-card {
                padding: 25px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn-action {
                width: 100%;
                justify-content: center;
            }
            
            .watermark {
                font-size: 5rem;
                bottom: 10px;
                right: 10px;
            }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(30, 30, 30, 0.5);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--accent-gold);
            border-radius: 4px;
        }
        
        /* Selection color */
        ::selection {
            background: rgba(212, 175, 55, 0.3);
            color: var(--text-light);
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-card" id="receiptContent">
            <div class="watermark">ECW</div>
            
            <div class="logo-header">
                <div class="logo-text">EXCLUSIVE CARWASH</div>
                <div class="logo-subtext">PAYMENT RECEIPT</div>
            </div>
            
            <div class="receipt-title">
                <h1><i class="fas fa-receipt me-2"></i>Payment Confirmation</h1>
                <p>Transaction #<?php echo $payment['payment_id']; ?> • <?php echo date('F d, Y', strtotime($payment['payment_date'])); ?></p>
            </div>
            
            <div class="receipt-info">
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Receipt Number</span>
                        <span class="info-value">#<?php echo $payment['payment_id']; ?></span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Booking ID</span>
                        <span class="info-value">#<?php echo $booking['booking_id']; ?></span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Customer Name</span>
                        <span class="info-value"><?php echo htmlspecialchars($user['name']); ?></span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Customer Contact</span>
                        <span class="info-value"><?php echo isset($user['phone']) ? htmlspecialchars($user['phone']) : 'Not provided'; ?></span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Payment Date</span>
                        <span class="info-value"><?php echo date('F d, Y', strtotime($payment['payment_date'])); ?></span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Payment Method</span>
                        <span class="info-value"><?php echo htmlspecialchars($payment['payment_method']); ?></span>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-label">Payment Status</span>
                        <span class="status-badge <?php echo (strpos(strtolower($payment['payment_status']), 'paid') !== false || strpos(strtolower($payment['payment_status']), 'thank') !== false) ? 'status-paid' : 'status-pending'; ?>">
                            <?php echo htmlspecialchars($payment['payment_status']); ?>
                        </span>
                    </div>
                </div>
            </div>
            
            <table class="service-table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Vehicle Type</th>
                        <th>Service Type</th>
                        <th>Amount (RM)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Car Wash Service</td>
                        <td><?php echo htmlspecialchars($service['type_car']); ?></td>
                        <td><?php echo htmlspecialchars($service['service_name']); ?></td>
                        <td style="text-align: right; font-weight: 600;">RM <?php echo number_format($service['price'], 2); ?></td>
                    </tr>
                </tbody>
            </table>
            
            <div class="payment-summary">
                <div class="summary-row">
                    <span class="summary-label">Subtotal</span>
                    <span class="summary-value">RM <?php echo number_format($service['price'], 2); ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Tax (0%)</span>
                    <span class="summary-value">RM 0.00</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Discount</span>
                    <span class="summary-value">RM 0.00</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Total Amount</span>
                    <span class="summary-value" style="color: var(--accent-gold); font-weight: 700; font-size: 1.3rem;">
                        RM <?php echo number_format($service['price'], 2); ?>
                    </span>
                </div>
            </div>
            
            <div class="company-info">
                <p><strong>Exclusive Carwash</strong></p>
                <p>No. 45 Jalan Bunga Raya 5A/3, Seksyen BS2, Bukit Sentosa, 48300 Rawang, Selangor</p>
                <p>Phone: +60 3-1234 5678 | Email: info@exclusivecarwash.com</p>
                <p>Website: www.exclusivecarwash.com</p>
                <p style="margin-top: 10px; font-size: 0.8rem;">
                    <em>Thank you for choosing Exclusive Carwash!</em>
                </p>
            </div>
            
            <div class="print-only">
                This is an official receipt. Please keep it for your records.
            </div>
        </div>
        
        <div class="action-buttons">
            <button onclick="printReceipt()" class="btn-action btn-print">
                <i class="fas fa-print"></i> Print Receipt
            </button>
            <button onclick="downloadPDF()" class="btn-action btn-download">
                <i class="fas fa-download"></i> Download as PDF
            </button>
            <a href="tabledata_payments002.php" class="btn-action btn-back">
                <i class="fas fa-arrow-left"></i> Back to Payments
            </a>
        </div>
    </div>

    <script>
        // function print 
    function printReceipt() {
        window.print();
    }
    // function download
    async function downloadPDF() {
        const { jsPDF } = window.jspdf;
        const receipt = document.getElementById('receiptContent');
        
        // Show loading 
        const downloadBtn = document.querySelector('.btn-download');
        const originalText = downloadBtn.innerHTML;
        downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating PDF...';
        downloadBtn.disabled = true;
        
        try {
            // Use html2canvas to capture the receipt
            const canvas = await html2canvas(receipt, {
                scale: 2,
                useCORS: true,
                backgroundColor: '#171717'
            });
            
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jsPDF('p', 'mm', 'a4');
            const imgWidth = 190;
            const pageHeight = 295;
            const imgHeight = canvas.height * imgWidth / canvas.width;
            let heightLeft = imgHeight;
            let position = 10;
            
            pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;
            
            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                pdf.addPage();
                pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }
            
            pdf.save('Receipt_<?php echo $payment['payment_id']; ?>_<?php echo date('Ymd'); ?>.pdf');
            
            // Success message
            const successAlert = document.createElement('div');
            successAlert.className = 'alert alert-success position-fixed';
            successAlert.style.top = '20px';
            successAlert.style.right = '20px';
            successAlert.style.zIndex = '9999';
            successAlert.innerHTML = '<i class="fas fa-check-circle me-2"></i> PDF downloaded successfully!';
            document.body.appendChild(successAlert);
            
            setTimeout(() => {
                successAlert.remove();
            }, 3000);
            
        } catch (error) {
            console.error('Error generating PDF:', error);
            alert('Error generating PDF. Please try again.');
        } finally {
            // Restore button
            downloadBtn.innerHTML = originalText;
            downloadBtn.disabled = false;
        }
    }
    
    // Add fade-in animation
    document.addEventListener('DOMContentLoaded', function() {
        const receiptCard = document.querySelector('.receipt-card');
        receiptCard.style.opacity = '0';
        receiptCard.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            receiptCard.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            receiptCard.style.opacity = '1';
            receiptCard.style.transform = 'translateY(0)';
        }, 100);
        
        // Add hover effects to buttons
        const buttons = document.querySelectorAll('.btn-action');
        buttons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
    </script>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>