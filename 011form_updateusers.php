<?php
include('database001.php');

if (!isset($_GET['IC'])) {
    die("Customer IC not provided!");
}

$IC = mysqli_real_escape_string($conn, $_GET['IC']);
$sql = "SELECT * FROM users WHERE IC = '$IC'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Customer not found!");
}

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusive Carwash | Update Customer</title>
    
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
            max-width: 600px;
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
        
        .btn-delete {
            width: 100%;
            background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
            color: white;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.9rem;
            font-size: 1.1rem;
            transition: all 0.3s;
            border: none;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 0.5px;
            margin-top: 1rem;
        }
        
        .btn-delete:hover {
            background: linear-gradient(135deg, #d32f2f 0%, #f44336 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(244, 67, 54, 0.3);
            color: white;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
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
        
        .button-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        @media (max-width: 768px) {
            .update-card {
                padding: 30px 20px;
            }
            
            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="update-card">
        <div class="watermark">ECW</div>
        
        <div class="logo-container">
            <div class="logo-text">EXCLUSIVE CARWASH</div>
            <div class="logo-subtext">Manage Customer</div>
        </div>
        
        <div class="form-header">
            <h1><i class="fas fa-user-edit me-2"></i>Edit Customer Details</h1>
            <p>Update customer information for IC: <?php echo $user['IC']; ?></p>
        </div>
        
        <form action="011pros_updateusers.php" method="post" name="updateForm">
            <input type="hidden" name="ud_IC" value="<?php echo $user['IC']; ?>">
            
            <div class="form-grid">
                <!-- Identity Card Number -->
                <div class="form-group">
                    <label for="ud_IC" class="form-label">
                        <i class="fas fa-id-card"></i>
                        Identity Card Number
                    </label>
                    <input type="text" class="form-control" name="ud_IC_display" id="ud_IC_display" 
                           value="<?php echo $user['IC']; ?>" readonly>
                    <div style="color: var(--accent-silver); font-size: 0.8rem; margin-top: 5px;">
                        IC number cannot be changed
                    </div>
                </div>
                
                <!-- Customer Name -->
                <div class="form-group">
                    <label for="ud_name" class="form-label">
                        <i class="fas fa-user"></i>
                        Customer Name
                    </label>
                    <input type="text" class="form-control" name="ud_name" id="ud_name" 
                           value="<?php echo $user['name']; ?>" required>
                </div>
                
                <!-- Phone Number -->
                <div class="form-group">
                    <label for="ud_phone" class="form-label">
                        <i class="fas fa-phone"></i>
                        Phone Number
                    </label>
                    <input type="text" class="form-control" name="ud_phone" id="ud_phone" 
                           value="<?php echo $user['phone']; ?>" required>
                </div>
            </div>
            
            <div class="button-group">
                <button type="submit" name="SUBMIT" class="btn-submit">
                    <i class="fas fa-save"></i>
                    UPDATE CUSTOMER
                </button>
            </div>
        </form>
        
        <hr style="border-color: rgba(255,255,255,0.1); margin: 2rem 0;">
        
        
        </form>
    </div>

    <script>
        function confirmDelete() {
            const customerName = document.getElementById('ud_name').value;
            const icNumber = document.getElementById('ud_IC_display').value;
            
            return confirm(`⚠️ WARNING: Are you sure you want to PERMANENTLY delete customer:\n\n${customerName} (IC: ${icNumber})\n\nThis will delete ALL associated records (bookings, services, payments) and CANNOT be undone!`);
        }

        // Add animation to form
        document.addEventListener('DOMContentLoaded', function() {
            const formCard = document.querySelector('.update-card');
            formCard.style.opacity = '0';
            formCard.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                formCard.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                formCard.style.opacity = '1';
                formCard.style.transform = 'translateY(0)';
            }, 100);
            
            // Add hover effects to form elements
            const formElements = document.querySelectorAll('.form-control');
            formElements.forEach(element => {
                element.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                element.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
            
            // Form validation
            document.querySelector('form[name="updateForm"]').addEventListener('submit', function(e) {
                const name = document.getElementById('ud_name').value.trim();
                const phone = document.getElementById('ud_phone').value.trim();
                
                if (!name) {
                    e.preventDefault();
                    alert('Please enter customer name!');
                    document.getElementById('ud_name').focus();
                    return;
                }
                
                if (!phone) {
                    e.preventDefault();
                    alert('Please enter phone number!');
                    document.getElementById('ud_phone').focus();
                    return;
                }
                
                // Validate phone number format (basic validation)
                const phoneRegex = /^[0-9\-\+\(\) ]+$/;
                if (!phoneRegex.test(phone)) {
                    e.preventDefault();
                    alert('Please enter a valid phone number!');
                    document.getElementById('ud_phone').focus();
                    return;
                }
            });
        });
    </script>
</body>
</html>