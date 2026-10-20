<?php
include('database001.php');

if (!isset($_GET['payment_id'])) {
    die("Payment ID not provided!");
}

$payment_id = mysqli_real_escape_string($conn, $_GET['payment_id']);
$sql = "SELECT * FROM payments WHERE payment_id = '$payment_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Payment not found!");
}

$payment = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusive Carwash | Update Payment</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary-dark: #0A1A2D;
            --accent-gold: #D4AF37;
            --accent-teal: #2EC4B6;
            --accent-silver: #C0C0C0;
            --card-dark: #1E1E1E;
            --card-darker: #171717;
            --text-light: #F5F5F5;
            --shadow-luxury: 0 20px 60px rgba(0, 0, 0, 0.4);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            color: var(--text-light);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        
        .update-card {
            max-width: 800px;
            width: 100%;
            background: var(--card-darker);
            border-radius: 30px;
            padding: 40px;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .update-card::before {
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
            background-clip: text;
            color: transparent;
            font-weight: 800;
            letter-spacing: 1.5px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .logo-subtext {
            color: var(--accent-silver);
            font-size: 0.9rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: -5px;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .form-header h1 {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }
        
        .form-header p {
            color: var(--accent-silver);
            margin: 0;
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
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
            margin-bottom: 1rem;
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
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .update-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="update-card">
        <div class="watermark">ECW</div>
        
        <div class="logo-container">
            <div class="logo-text">EXCLUSIVE CARWASH</div>
            <div class="logo-subtext">Update Payment</div>
        </div>
        
        <div class="form-header">
            <h1><i class="fas fa-edit me-2"></i>Edit Payment Details</h1>
            <p>Update payment information for Booking #<?php echo $payment['booking_id']; ?></p>
        </div>
        
        <form action="011pros_updatepayment.php" method="post" name="updateForm">
            <input type="hidden" name="ud_payment_id" value="<?php echo $payment['payment_id']; ?>">
            <input type="hidden" name="ud_booking_id" value="<?php echo $payment['booking_id']; ?>">
            
            <div class="form-grid">
                <!-- Payment Method -->
                <div class="form-group">
                    <label for="ud_payment_method" class="form-label">
                        <i class="fas fa-wallet"></i>
                        Payment Method
                    </label>
                    <select class="form-select" name="ud_payment_method" id="ud_payment_method" required>
                        <option value="Credit Card" <?php echo ($payment['payment_method'] == 'Credit Card') ? 'selected' : ''; ?>>Credit Card</option>
                        <option value="Cash" <?php echo ($payment['payment_method'] == 'Cash') ? 'selected' : ''; ?>>Cash</option>
                        <option value="Online Transfer" <?php echo ($payment['payment_method'] == 'Online Transfer') ? 'selected' : ''; ?>>Online Transfer</option>
                        <option value="E-Wallet" <?php echo ($payment['payment_method'] == 'E-Wallet') ? 'selected' : ''; ?>>E-Wallet</option>
                    </select>
                </div>
                
                <!-- Amount -->
                <div class="form-group">
                    <label for="ud_amount" class="form-label">
                        <i class="fas fa-money-bill-wave"></i>
                        Amount (RM)
                    </label>
                    <input type="number" class="form-control" name="ud_amount" id="ud_amount" 
                           value="<?php echo $payment['amount']; ?>" step="0.01" min="0" required>
                </div>
                
                <!-- Payment Status -->
                <div class="form-group">
                    <label for="ud_payment_status" class="form-label">
                        <i class="fas fa-check-circle"></i>
                        Payment Status
                    </label>
                    <select class="form-select" name="ud_payment_status" id="ud_payment_status" required>
                        <option value="Pending" <?php echo ($payment['payment_status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Paid" <?php echo ($payment['payment_status'] == 'Paid') ? 'selected' : ''; ?>>Paid</option> 
                        <option value="Failed" <?php echo ($payment['payment_status'] == 'Failed') ? 'selected' : ''; ?>>Failed</option>
                    </select>
                </div>
                
                <!-- Payment Date -->
                <div class="form-group">
                    <label for="ud_payment_date" class="form-label">
                        <i class="fas fa-calendar-alt"></i>
                        Payment Date
                    </label>
                    <input type="date" class="form-control" name="ud_payment_date" id="ud_payment_date" 
                           value="<?php echo $payment['payment_date']; ?>" required>
                </div>
            </div>
            
            <button type="submit" name="SUBMIT" class="btn-submit">
                <i class="fas fa-save"></i>
                UPDATE PAYMENT DETAILS
            </button>
        </form>
    </div>
</body>
</html>