<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusive Carwash | New Customer Registration</title>
    
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
            margin: 0;
        }
        
        .horizontal-container {
            max-width: 1000px;
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .horizontal-card {
            background: var(--card-darker);
            border-radius: 30px;
            padding: 40px;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.2);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }
        
        .horizontal-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo-text {
            font-size: 2.5rem;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            text-shadow: 0 0 40px rgba(212, 175, 55, 0.3);
            letter-spacing: 1.5px;
            font-family: 'Montserrat', sans-serif;
        }
        
        .logo-subtext {
            color: var(--accent-silver);
            font-size: 0.9rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-top: -8px;
            opacity: 0.9;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .form-header h1 {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }
        
        .form-header p {
            color: var(--accent-silver);
            font-size: 1rem;
            margin: 0 auto;
        }
        
        .form-row {
            display: flex;
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .form-column {
            flex: 1;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--accent-silver);
            margin-bottom: 0.7rem;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            font-size: 1rem;
        }
        
        .form-label i {
            margin-right: 12px;
            color: var(--accent-gold);
            width: 24px;
            font-size: 1.1rem;
        }
        
        .form-control {
            background: rgba(30, 30, 30, 0.8);
            border: 1.5px solid #333;
            border-radius: 14px;
            padding: 14px 18px;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            color: var(--text-light);
            font-family: 'Inter', sans-serif;
            width: 100%;
        }
        
        .form-control::placeholder {
            color: #666;
            font-style: italic;
        }
        
        .form-control:focus {
            background: rgba(40, 40, 40, 0.9);
            border-color: var(--accent-gold);
            box-shadow: 0 0 0 0.3rem rgba(212, 175, 55, 0.15);
            color: var(--text-light);
        }
        
        .form-hint {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 0.4rem;
            margin-left: 36px;
            display: block;
        }
        
        .input-wrapper {
            position: relative;
            margin-bottom: 1rem;
        }
        
        .input-icon {
            position: absolute;
            right: 18px;
            top: 14px;
            color: var(--accent-gold);
            opacity: 0.7;
        }
        
        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, var(--accent-gold) 0%, #b8941f 100%);
            color: #000;
            font-weight: 700;
            border-radius: 14px;
            padding: 16px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            border: none;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 0.8px;
            margin-top: 1rem;
        }
        
        .btn-submit:hover {
            background: linear-gradient(135deg, #b8941f 0%, var(--accent-gold) 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);
            color: #000;
        }
        
        .btn-submit i {
            margin-right: 12px;
            font-size: 1.1rem;
        }
        
        .watermark {
            position: absolute;
            bottom: 20px;
            right: 20px;
            opacity: 0.04;
            font-size: 10rem;
            font-weight: 900;
            color: var(--accent-gold);
            pointer-events: none;
            z-index: 0;
            font-family: 'Montserrat', sans-serif;
        }
        
        .glow-effect {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.12) 0%, transparent 70%);
            z-index: -1;
            filter: blur(60px);
        }
        
        .security-note {
            background: rgba(212, 175, 55, 0.08);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 12px;
            padding: 1.2rem;
            margin-top: 2rem;
            text-align: center;
        }
        
        .security-note i {
            color: var(--accent-gold);
            margin-right: 8px;
        }
        
        .security-note span {
            color: var(--accent-silver);
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 1rem;
            }
            
            .horizontal-card {
                padding: 25px;
                margin: 15px;
            }
            
            .logo-text {
                font-size: 2rem;
            }
            
            .form-header h1 {
                font-size: 1.8rem;
            }
            
            .watermark {
                font-size: 6rem;
                bottom: 10px;
                right: 10px;
            }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(30, 30, 30, 0.5);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--accent-gold);
            border-radius: 5px;
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
    
    <div class="horizontal-container">
        <div class="horizontal-card">
            <div class="watermark">ECW</div>
            
            <!-- Logo -->
            <div class="logo-container">
                <div class="logo-text">EXCLUSIVE CARWASH</div>
            </div>
            
    
            
            <form action="input_process_users003.php" method="post" enctype="multipart/form-data" name="form1" id="memberForm">
                
                <div class="form-row">
                    <!-- Identity Card (IC) - Left Column -->
                    <div class="form-column">
                        <div class="input-wrapper">
                            <label for="IC" class="form-label">
                                <i class="fas fa-id-card"></i>
                                Identity Card (IC)
                            </label>
                            <input type="text" class="form-control" name="IC" id="IC" 
                                   placeholder="e.g., 010203-10-1234" required 
                                   pattern="[0-9]{6}-[0-9]{2}-[0-9]{4}"
                                   title="Format: XXXXXX-XX-XXXX">
                            <span class="input-icon"><i class="fas fa-fingerprint"></i></span>
                            <span class="form-hint">Format: XXXXXX-XX-XXXX (Malaysian IC)</span>
                        </div>
                    </div>
                    
                    <!-- Name - Middle Column -->
                    <div class="form-column">
                        <div class="input-wrapper">
                            <label for="name" class="form-label">
                                <i class="fas fa-user-tie"></i>
                                Full Name
                            </label>
                            <input type="text" class="form-control" name="name" id="name" 
                                   placeholder="Enter full name as per IC" required>
                            <span class="input-icon"><i class="fas fa-signature"></i></span>
                            <span class="form-hint">Enter your complete legal name</span>
                        </div>
                    </div>
                    
                    <!-- Phone Number - Right Column -->
                    <div class="form-column">
                        <div class="input-wrapper">
                            <label for="phone" class="form-label">
                                <i class="fas fa-mobile-alt"></i>
                                Phone Number
                            </label>
                            <input type="tel" class="form-control" name="phone" id="phone" 
                                   placeholder="e.g., 0123456789" required 
                                   pattern="[0-9]{10,11}"
                                   title="10-11 digit phone number">
                            <span class="input-icon"><i class="fas fa-phone-volume"></i></span>
                            <span class="form-hint">10-11 digit Malaysian phone number</span>
                        </div>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-gem"></i>
                    Submit
                </button>
                
                <!-- Security Note -->
                <div class="security-note">
                    <i class="fas fa-shield-alt"></i>
                    <span>Your information is protected with enterprise-grade security</span>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Real-time input validation
            const icInput = document.getElementById('IC');
            const phoneInput = document.getElementById('phone');
            
            // IC format auto-dash
            icInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 6) value = value.slice(0,6) + '-' + value.slice(6);
                if (value.length > 9) value = value.slice(0,9) + '-' + value.slice(9);
                e.target.value = value.slice(0, 14);
            });
            
            // Phone number validation
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                e.target.value = value;
            });
            
            // Form submission animation
            const form = document.getElementById('memberForm');
            form.addEventListener('submit', function(e) {
                const submitBtn = document.querySelector('.btn-submit');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> PROCESSING...';
                submitBtn.disabled = true;
            });
        });
    </script>
    
</body>
</html>