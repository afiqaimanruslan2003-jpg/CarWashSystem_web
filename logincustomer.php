<?php
session_start();

// Kalau dah login, terus masuk sistem
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: framesetcustomer.html");
    exit;
}

require_once "database001.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // ===== CHECK USERNAME =====
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // ===== CHECK PASSWORD =====
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // ===== VALIDATE LOGIN =====
    if(empty($username_err) && empty($password_err)){

        // 👉 TABLE BETUL
        $sql = "SELECT id, username, password FROM userpasswordcustomer WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $db_username, $hashed_password);
                    mysqli_stmt_fetch($stmt);

                    if(password_verify($password, $hashed_password)){
                        // LOGIN SUCCESS
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $db_username;

                        header("location: framesetcustomer.html");
                        exit;
                    } else {
                        $login_err = "Invalid username or password.";
                    }
                } else {
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Something went wrong.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXCLUSIVE CARWASH | Login</title>
    
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
            --text-light: #F5F5F5;
            --shadow-luxury: 0 20px 60px rgba(0, 0, 0, 0.4);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
        
        .login-container {
            display: flex;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: var(--shadow-luxury);
            background: var(--card-dark);
        }
        
        .brand-section {
            flex: 1;
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.1) 0%, rgba(46, 196, 182, 0.1) 100%);
            padding: 60px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .brand-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path fill="%23D4AF37" fill-opacity="0.05" d="M0,0 L100,0 L100,100 L0,100 Z"/></svg>');
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 3rem;
            z-index: 1;
        }
        
        .logo-text {
            font-size: 3.2rem;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 800;
            letter-spacing: 2px;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 10px;
        }
        
        .logo-subtext {
            color: var(--accent-silver);
            font-size: 1rem;
            letter-spacing: 4px;
            text-transform: uppercase;
        }
        
        .luxury-tagline {
            font-size: 1.2rem;
            color: var(--accent-silver);
            text-align: center;
            max-width: 300px;
            line-height: 1.8;
            margin-top: 2rem;
            font-family: 'Poppins', sans-serif;
            z-index: 1;
        }
        
        .watermark {
            position: absolute;
            font-size: 15rem;
            font-weight: 900;
            color: var(--accent-gold);
            opacity: 0.03;
            transform: rotate(-45deg);
            font-family: 'Montserrat', sans-serif;
            z-index: 0;
        }
        
        .login-section {
            flex: 1;
            padding: 60px 50px;
            background: rgba(30, 30, 30, 0.95);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-header {
            margin-bottom: 2.5rem;
        }
        
        .login-header h2 {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .login-header p {
            color: var(--accent-silver);
            font-size: 0.9rem;
        }
        
        .form-group {
            margin-bottom: 1.8rem;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--accent-silver);
            margin-bottom: 0.8rem;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 0.95rem;
        }
        
        .form-label i {
            color: var(--accent-gold);
            width: 20px;
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1rem 3rem 1rem 1.2rem;
            font-size: 1rem;
            transition: all 0.3s;
            color: var(--text-light);
            width: 100%;
        }
        
        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--accent-gold);
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.15);
            color: var(--text-light);
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 55px;
            background: transparent;
            border: none;
            color: var(--accent-silver);
            cursor: pointer;
            padding: 5px;
            transition: color 0.3s;
            z-index: 10;
        }
        
        .password-toggle:hover {
            color: var(--accent-gold);
        }
        
        .password-toggle i {
            font-size: 1.2rem;
        }
        
        .text-danger {
            color: #ff6b6b !important;
            font-size: 0.85rem;
            margin-top: 8px;
            display: block;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .alert-danger {
            background: rgba(244, 67, 54, 0.1);
            color: #ff6b6b;
            border-left: 4px solid #f44336;
        }
        
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, var(--accent-gold) 0%, #b8941f 100%);
            color: #000;
            font-weight: 600;
            border-radius: 12px;
            padding: 1rem;
            font-size: 1.1rem;
            transition: all 0.3s;
            border: none;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 0.5px;
            margin-top: 1rem;
        }
        
        .btn-login:hover {
            background: linear-gradient(135deg, #b8941f 0%, var(--accent-gold) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            color: #000;
        }
        
        .register-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--accent-silver);
            font-size: 0.9rem;
        }
        
        .register-link a {
            color: var(--accent-teal);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .register-link a:hover {
            color: var(--accent-gold);
            text-decoration: underline;
        }
        
        .footer-text {
            text-align: center;
            margin-top: 2rem;
            color: #666;
            font-size: 0.8rem;
        }
        
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 450px;
            }
            
            .brand-section {
                padding: 40px 20px;
                min-height: 250px;
            }
            
            .login-section {
                padding: 40px 30px;
            }
            
            .logo-text {
                font-size: 2.5rem;
            }
            
            .watermark {
                font-size: 8rem;
            }
            
            .password-toggle {
                top: 53px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }
            
            .login-container {
                border-radius: 20px;
            }
            
            .brand-section, .login-section {
                padding: 30px 20px;
            }
            
            .logo-text {
                font-size: 2rem;
            }
            
            .form-control {
                padding: 0.8rem 2.5rem 0.8rem 1rem;
            }
            
            .password-toggle {
                right: 10px;
                top: 48px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Brand Section -->
        <div class="brand-section">
            <div class="watermark">ECW</div>
            <div class="logo-container">
                <div class="logo-text">EXCLUSIVE CARWASH</div>
                <div class="logo-subtext">PREMIUM SERVICE</div>
            </div>
            <p class="luxury-tagline">
                Experience unparalleled luxury car care. Where excellence meets perfection in every detail.
            </p>
        </div>
        
        <!-- Login Form Section -->
        <div class="login-section">
            <div class="login-header">
                <h2><i class="fas fa-user-shield me-2"></i>Customer Login</h2>
                <p>Access the premium management system</p>
            </div>
            
            <?php if(!empty($login_err)): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <?php echo $login_err; ?>
                </div>
            <?php endif; ?>
            
            <form method="post">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user"></i>
                        Username
                    </label>
                    <input type="text" name="username" class="form-control" 
                           placeholder="Enter your username"
                           value="<?php echo htmlspecialchars($username); ?>">
                    <span class="text-danger"><?php echo $username_err; ?></span>
                </div>
                
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-lock"></i>
                        Password
                    </label>
                    <div style="position: relative;">
                        <input type="password" name="password" class="form-control" 
                               placeholder="Enter your password" id="passwordField">
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <span class="text-danger"><?php echo $password_err; ?></span>
                </div>
                
                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>
                    LOGIN TO SYSTEM
                </button>
                
                <div class="register-link">
                    Don't have an account? <a href="registercustomer.php">Create Account</a>
                </div>
            </form>
            
            <div class="footer-text">
                © 2026 EXCLUSIVE CARWASH. All rights reserved.
            </div>
        </div>
    </div>

    <script>
        // Password toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordField = document.getElementById('passwordField');
            const eyeIcon = togglePassword.querySelector('i');
            
            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                
                // Toggle the eye icon
                if (type === 'text') {
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                    togglePassword.setAttribute('title', 'Hide password');
                } else {
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                    togglePassword.setAttribute('title', 'Show password');
                }
            });
            
            // Add focus animations
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.parentElement.style.transform = 'translateY(0)';
                });
            });
            
            // Form validation
            const form = document.querySelector('form');
            form.addEventListener('submit', function(e) {
                const username = document.querySelector('input[name="username"]').value.trim();
                const password = passwordField.value.trim();
                
                if (!username || !password) {
                    e.preventDefault();
                    
                    if (!username) {
                        const usernameInput = document.querySelector('input[name="username"]');
                        usernameInput.style.borderColor = '#f44336';
                        usernameInput.focus();
                    } else if (!password) {
                        passwordField.style.borderColor = '#f44336';
                        passwordField.focus();
                    }
                }
            });
        });
    </script>
</body>
</html>