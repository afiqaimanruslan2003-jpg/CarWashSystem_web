<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusive Carwash | Payment Processing</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-dark: #0A1A2D;
            --primary-blue: #1A365D;
            --accent-gold: #D4AF37;
            --accent-teal: #2EC4B6;
            --accent-silver: #C0C0C0;
            --dark-bg: #121212;
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
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        
        .payment-container {
            width: 100%;
            max-width: 1000px;
            display: flex;
            gap: 2rem;
        }
        
        .left-panel {
            flex: 1;
            max-width: 400px;
        }
        
        .right-panel {
            flex: 2;
        }
        
        .info-card {
            background: var(--card-darker);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.2);
            backdrop-filter: blur(10px);
            height: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
        }
        
        .payment-card {
            background: var(--card-darker);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }
        
        .payment-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo-text {
            font-size: 2.2rem;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            text-shadow: 0 0 30px rgba(212, 175, 55, 0.2);
            letter-spacing: 1.5px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .logo-subtext {
            color: var(--accent-silver);
            font-size: 0.9rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: -5px;
            opacity: 0.8;
        }
        
        .payment-header {
            margin-bottom: 2.5rem;
        }
        
        .payment-header h1 {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }
        
        .payment-header p {
            color: var(--accent-silver);
            margin: 0;
        }
        
        .section-title {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .section-title i {
            font-size: 1.2rem;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .payment-amount {
            grid-column: 1 / -1;
            background: rgba(212, 175, 55, 0.05);
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 0;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--accent-silver);
            margin-bottom: 0.5rem;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }
        
        .form-label i {
            color: var(--accent-gold);
            width: 20px;
        }
        
        .form-control, .form-select {
            background: rgba(30, 30, 30, 0.8);
            border: 1.5px solid #333;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s;
            color: var(--text-light);
            font-family: 'Inter', sans-serif;
            width: 100%;
        }
        
        .form-control[readonly] {
            background: rgba(40, 40, 40, 0.6);
            border-color: rgba(212, 175, 55, 0.2);
            color: var(--accent-silver);
            cursor: not-allowed;
        }
        
        .form-control:focus, .form-select:focus {
            background: rgba(40, 40, 40, 0.9);
            border-color: var(--accent-gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.15);
            color: var(--text-light);
        }
        
        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, var(--accent-gold) 0%, #b8941f 100%);
            color: #000;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.9rem;
            font-size: 1.1rem;
            transition: all 0.3s;
            border: none;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            margin-top: 2rem;
        }
        
        .btn-submit:hover {
            background: linear-gradient(135deg, #b8941f 0%, var(--accent-gold) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            color: #000;
        }
        
        .btn-submit i {
            margin-right: 0.5rem;
        }
        
        .booking-info {
            background: rgba(212, 175, 55, 0.05);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .info-row:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--accent-gold);
            flex-shrink: 0;
        }
        
        .info-content h4 {
            color: var(--accent-gold);
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0 0 0.25rem 0;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .info-content p {
            color: var(--text-light);
            margin: 0;
            font-size: 1rem;
            font-weight: 500;
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
        
        .glow-effect {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, transparent 70%);
            z-index: -1;
            filter: blur(60px);
        }
        
        .security-note {
            background: rgba(212, 175, 55, 0.05);
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 10px;
            padding: 1rem;
            margin-top: 2rem;
            text-align: center;
            font-size: 0.85rem;
            color: var(--accent-silver);
        }
        
        .security-note i {
            color: var(--accent-gold);
            margin-right: 0.5rem;
        }
        
        .amount-display {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent-gold);
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }
        
        .amount-label {
            text-align: center;
            color: var(--accent-silver);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .status-message {
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .status-cash {
            background: rgba(255, 193, 7, 0.1);
            color: #FFC107;
            border: 1px solid rgba(255, 193, 7, 0.2);
        }
        
        .status-online {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.2);
        }
        
        @media (max-width: 992px) {
            .payment-container {
                flex-direction: column;
                gap: 2rem;
            }
            
            .left-panel {
                max-width: 100%;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .payment-card, .info-card {
                padding: 1.5rem;
            }
            
            .logo-text {
                font-size: 1.8rem;
            }
            
            .watermark {
                font-size: 5rem;
                bottom: 10px;
                right: 10px;
            }
            
            .amount-display {
                font-size: 2rem;
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
    <!-- Background glow effect -->
    <div class="glow-effect"></div>
    
    <?php
    include('database001.php');

    if (!isset($_GET['booking_id'])) {
        echo "Error: Booking ID not provided!";
        exit;
    }

    $booking_id = mysqli_real_escape_string($conn, $_GET['booking_id']);

    // Ambil info booking
    $sql_booking = "SELECT * FROM bookings WHERE booking_id='$booking_id'";
    $res_booking = mysqli_query($conn, $sql_booking);
    if (!$res_booking || mysqli_num_rows($res_booking) == 0) {
        echo "Error: Booking not found!";
        exit;
    }
    $booking = mysqli_fetch_assoc($res_booking);

    // Ambil info customer
    $sql_user = "SELECT name FROM users WHERE IC='" . $booking['IC'] . "'";
    $res_user = mysqli_query($conn, $sql_user);
    $user = mysqli_fetch_assoc($res_user);

    // Ambil service info
    $sql_service = "SELECT service_name, price FROM services WHERE booking_id='$booking_id'";
    $res_service = mysqli_query($conn, $sql_service);
    $service = mysqli_fetch_assoc($res_service);
    ?>
    
    <div class="payment-container">
        <!-- Left Panel - Booking & Service Info -->
        <div class="left-panel">
            <div class="info-card">
                <div class="logo-container">
                    <div class="logo-text">EXCLUSIVE CARWASH</div>
                    <div class="logo-subtext">Payment Processing</div>
                </div>
                
                <div class="booking-info">
                    <div class="section-title">
                        <i class="fas fa-receipt"></i>
                        Invoice Details
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-hashtag"></i>
                        </div>
                        <div class="info-content">
                            <h4>Booking ID</h4>
                            <p style="font-family: 'Courier New', monospace;"><?php echo $booking['booking_id']; ?></p>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="info-content">
                            <h4>Customer Name</h4>
                            <p><?php echo $user['name']; ?></p>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-spa"></i>
                        </div>
                        <div class="info-content">
                            <h4>Service Type</h4>
                            <p><?php echo $service['service_name']; ?></p>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="info-content">
                            <h4>Booking Date</h4>
                            <p><?php echo $booking['booking_date']; ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="security-note">
                    <i class="fas fa-shield-alt"></i>
                    Secure payment processing
                </div>
            </div>
        </div>
        
        <!-- Right Panel - Payment Form -->
        <div class="right-panel">
            <div class="payment-card">
                <div class="watermark">ECW</div>
                
                <div class="payment-header">
                    <h1><i class="fas fa-credit-card me-2"></i>Complete Payment</h1>
                    <p>Process your payment securely</p>
                </div>
                
                <form action="input_process_payments003.php" method="post">
                    <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                    
                    <div class="section-title">
                        <i class="fas fa-money-bill-wave"></i>
                        Payment Information
                    </div>
                    
                    <div class="form-grid">
                        <!-- Payment Amount -->
                        <div class="payment-amount">
                            <div class="amount-label">Total Amount Due</div>
                            <div class="amount-display">RM <?php echo number_format($service['price'], 2); ?></div>
                            <input type="hidden" name="amount" value="<?php echo $service['price']; ?>">
                        </div>
                        
                        <!-- Payment Method -->
                        <div class="form-group">
                            <label for="payment_method" class="form-label">
                                <i class="fas fa-credit-card"></i>
                                Payment Method
                            </label>
                            <select class="form-select" name="payment_method" id="payment_method" required onchange="updatePaymentMessage()">
                                <option value="" disabled selected>-- Select Method --</option>
                                <option value="Cash">Cash</option>
                                <option value="Online Banking">Online Banking</option>
                            </select>
                        </div>

                        <!-- Payment Date -->
                        <div class="form-group">
                            <label for="payment_date" class="form-label">
                                <i class="fas fa-calendar-day"></i>
                                Payment Date
                            </label>
                            <input type="date" class="form-control" name="payment_date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        
                        <!-- Payment Status -->
                        <div class="form-group" style="grid-column: 1 / -1;">
                            <label class="form-label">
                                <i class="fas fa-info-circle"></i>
                                Payment Status
                            </label>
                            <div class="status-message" id="payment_status_display">
                                Select payment method to see status
                            </div>
                            <input type="hidden" name="payment_status" id="payment_status_hidden">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-lock"></i>
                        PROCESS PAYMENT
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function updatePaymentMessage() {
        const method = document.getElementById("payment_method").value;
        const statusDisplay = document.getElementById("payment_status_display");
        const statusHidden = document.getElementById("payment_status_hidden");

        let msg = "";
        let statusClass = "";
        
        if (method === "Cash") {
            msg = "Please pay at counter";
            statusClass = "status-cash";
        } else if (method === "Online Banking") {
            msg = "Paid ~ Thank you";
            statusClass = "status-online";
        }

        statusDisplay.textContent = msg;
        statusDisplay.className = "status-message " + statusClass;
        statusHidden.value = msg;
    }
    
    document.addEventListener("DOMContentLoaded", function() {
        // Add fade-in animation
        const cards = document.querySelectorAll('.info-card, .payment-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100 + (index * 200));
        });
        
        // Prevent submit if method not chosen
        document.querySelector('form').addEventListener('submit', function(e){
            if (!document.getElementById("payment_method").value){
                e.preventDefault();
                alert("Please select a payment method!");
            }
        });
        
        // Add interactive effects
        const selects = document.querySelectorAll('.form-select');
        selects.forEach(select => {
            select.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            select.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    });
    </script>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>