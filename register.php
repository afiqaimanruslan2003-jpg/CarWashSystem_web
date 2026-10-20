<?php
require_once "database001.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // ===== CHECK USERNAME =====
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else {
        $sql = "SELECT id FROM userpassword WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $username_err = "Username already taken.";
            } else {
                $username = trim($_POST["username"]);
            }
            mysqli_stmt_close($stmt);
        }
    }

    // ===== CHECK PASSWORD =====
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must be at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // ===== CONFIRM PASSWORD =====
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if($password != $confirm_password){
            $confirm_password_err = "Password does not match.";
        }
    }

    // ===== INSERT DATA =====
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO userpassword (username, password, created_at) VALUES (?, ?, NOW())";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
                exit;
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
    <title>EXCLUSIVE CARWASH | Register</title>
    
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
        
        .register-card {
            max-width: 500px;
            width: 100%;
            background: var(--card-dark);
            border-radius: 30px;
            padding: 50px;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .register-card::before {
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
            margin-bottom: 2.5rem;
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
            margin-bottom: 8px;
        }
        
        .logo-subtext {
            color: var(--accent-silver);
            font-size: 0.9rem;
            letter-spacing: 3px;
            text-transform: uppercase;
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .register-header h2 {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        
        .register-header p {
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
        
        .password-requirements {
            background: rgba(46, 196, 182, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            border-left: 4px solid var(--accent-teal);
        }
        
        .password-requirements h6 {
            color: var(--accent-teal);
            font-size: 0.9rem;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .password-requirements ul {
            list-style: none;
            padding-left: 0;
            margin-bottom: 0;
        }
        
        .password-requirements li {
            color: var(--accent-silver);
            font-size: 0.85rem;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .password-requirements li i {
            font-size: 0.7rem;
            color: var(--accent-teal);
        }
        
        .btn-register {
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
        
        .btn-register:hover {
            background: linear-gradient(135deg, #b8941f 0%, var(--accent-gold) 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.3);
            color: #000;
        }
        
        .login-link {
            text-align: center;
            margin-top: 2rem;
            color: var(--accent-silver);
            font-size: 0.9rem;
        }
        
        .login-link a {
            color: var(--accent-teal);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .login-link a:hover {
            color: var(--accent-gold);
            text-decoration: underline;
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
            .register-card {
                padding: 40px 30px;
                max-width: 90%;
            }
            
            .logo-text {
                font-size: 2rem;
            }
            
            .password-toggle {
                top: 53px;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }
            
            .register-card {
                padding: 30px 20px;
                border-radius: 20px;
            }
            
            .logo-text {
                font-size: 1.8rem;
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
    <div class="register-card">
        <div class="watermark">ECW</div>
        
        <div class="logo-container">
            <div class="logo-text">EXCLUSIVE CARWASH</div>
            <div class="logo-subtext">ADMINISTRATOR REGISTRATION</div>
        </div>
        
        <div class="register-header">
            <h2><i class="fas fa-user-plus me-2"></i>Create Administrator Account</h2>
            <p>Register for premium system access</p>
        </div>
        
        <form method="post">
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-user"></i>
                    Username
                </label>
                <input type="text" name="username" class="form-control" 
                       placeholder="Choose a username"
                       value="<?php echo htmlspecialchars($username); ?>">
                <span class="text-danger"><?php echo $username_err; ?></span>
            </div>
            
            <div class="password-requirements">
                <h6><i class="fas fa-shield-alt me-2"></i>Password Requirements</h6>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Minimum 6 characters</li>
                    <li><i class="fas fa-check-circle"></i> Must be secure</li>
                    <li><i class="fas fa-check-circle"></i> Keep it confidential</li>
                </ul>
            </div>
            
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-lock"></i>
                    Password
                </label>
                <div style="position: relative;">
                    <input type="password" name="password" class="form-control" 
                           placeholder="Enter secure password" id="passwordField">
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <span class="text-danger"><?php echo $password_err; ?></span>
            </div>
            
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-lock"></i>
                    Confirm Password
                </label>
                <div style="position: relative;">
                    <input type="password" name="confirm_password" class="form-control" 
                           placeholder="Re-enter your password" id="confirmPasswordField">
                    <button type="button" class="password-toggle" id="toggleConfirmPassword">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                <span class="text-danger"><?php echo $confirm_password_err; ?></span>
            </div>
            
            <button type="submit" class="btn-register">
                <i class="fas fa-user-plus me-2"></i>
                CREATE ACCOUNT
            </button>
            
            <div class="login-link">
                Already have an account? <a href="login.php">Login Here</a>
            </div>
        </form>
    </div>

    <script>
        // Password toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle main password
            const togglePassword = document.getElementById('togglePassword');
            const passwordField = document.getElementById('passwordField');
            const eyeIcon = togglePassword.querySelector('i');
            
            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                
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
            
            // Toggle confirm password
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const confirmPasswordField = document.getElementById('confirmPasswordField');
            const confirmEyeIcon = toggleConfirmPassword.querySelector('i');
            
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordField.setAttribute('type', type);
                
                if (type === 'text') {
                    confirmEyeIcon.classList.remove('fa-eye');
                    confirmEyeIcon.classList.add('fa-eye-slash');
                    toggleConfirmPassword.setAttribute('title', 'Hide password');
                } else {
                    confirmEyeIcon.classList.remove('fa-eye-slash');
                    confirmEyeIcon.classList.add('fa-eye');
                    toggleConfirmPassword.setAttribute('title', 'Show password');
                }
            });
            
            // Real-time password validation
            function validatePassword() {
                const password = passwordField.value;
                const confirm = confirmPasswordField.value;
                
                // Clear previous styling
                passwordField.style.borderColor = '';
                confirmPasswordField.style.borderColor = '';
                
                // Validate length
                if (password.length > 0 && password.length < 6) {
                    passwordField.style.borderColor = '#f44336';
                }
                
                // Validate match
                if (confirm.length > 0 && password !== confirm) {
                    confirmPasswordField.style.borderColor = '#f44336';
                }
                
                // Show success
                if (password.length >= 6) {
                    passwordField.style.borderColor = '#2EC4B6';
                }
                
                if (password === confirm && confirm.length > 0) {
                    confirmPasswordField.style.borderColor = '#2EC4B6';
                }
            }
            
            passwordField.addEventListener('input', validatePassword);
            confirmPasswordField.addEventListener('input', validatePassword);
            
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
                const confirm = confirmPasswordField.value.trim();
                
                let hasError = false;
                
                if (!username) {
                    e.preventDefault();
                    document.querySelector('input[name="username"]').style.borderColor = '#f44336';
                    hasError = true;
                }
                
                if (!password || password.length < 6) {
                    e.preventDefault();
                    passwordField.style.borderColor = '#f44336';
                    hasError = true;
                }
                
                if (!confirm || password !== confirm) {
                    e.preventDefault();
                    confirmPasswordField.style.borderColor = '#f44336';
                    hasError = true;
                }
                
                if (hasError) {
                    // Scroll to first error
                    document.querySelector('.text-danger').scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            });
        });
    </script>
</body>
</html>