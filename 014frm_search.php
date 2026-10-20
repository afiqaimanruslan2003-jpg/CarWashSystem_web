<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Exclusive Carwash | Search Booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
            --shadow-luxury: 0 15px 50px rgba(0, 0, 0, 0.3);
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            color: var(--text-light);
            background-attachment: fixed;
        }
        
        .container {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
        
        .brand-header {
            font-family: 'Montserrat', sans-serif;
            color: var(--accent-gold);
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-blue) 100%);
            border: none;
            padding: 1.8rem;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
        }
        
        .card {
            background: var(--card-darker);
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-luxury);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            backdrop-filter: blur(10px);
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            border-color: rgba(212, 175, 55, 0.2);
        }
        
        .form-control, .form-select {
            background: rgba(30, 30, 30, 0.8);
            border: 1.5px solid #333;
            border-radius: 12px;
            padding: 0.85rem 1.2rem;
            font-size: 1rem;
            transition: all 0.3s;
            color: var(--text-light);
            font-family: 'Inter', sans-serif;
        }
        
        .form-control::placeholder {
            color: #666;
        }
        
        .form-control:focus, .form-select:focus {
            background: rgba(40, 40, 40, 0.9);
            border-color: var(--accent-gold);
            box-shadow: 0 0 0 0.25rem rgba(212, 175, 55, 0.15);
            color: var(--text-light);
        }
        
        .form-label {
            font-weight: 600;
            color: var(--accent-silver);
            margin-bottom: 0.5rem;
            font-family: 'Poppins', sans-serif;
        }
        
        .btn-search {
            background: linear-gradient(135deg, var(--accent-gold) 0%, #b8941f 100%);
            border: none;
            border-radius: 12px;
            padding: 1.1rem;
            font-weight: 600;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            color: #000;
            font-family: 'Montserrat', sans-serif;
            position: relative;
            overflow: hidden;
        }
        
        .btn-search::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .btn-search:hover {
            background: linear-gradient(135deg, #b8941f 0%, var(--accent-gold) 100%);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);
            color: #000;
        }
        
        .btn-search:hover::before {
            left: 100%;
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }
        
        .logo-text {
            font-size: 3rem;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            text-shadow: 0 0 30px rgba(212, 175, 55, 0.2);
            letter-spacing: 1.5px;
        }
        
        .logo-subtext {
            color: var(--accent-silver);
            font-size: 0.9rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-top: -8px;
            opacity: 0.8;
        }
        
        .logo-container::after {
            content: '';
            display: block;
            width: 100px;
            height: 2px;
            background: linear-gradient(to right, transparent, var(--accent-gold), transparent);
            margin: 1.5rem auto 0;
        }
        
        .card-body {
            padding: 2.8rem;
        }
        
        .watermark {
            position: absolute;
            bottom: 20px;
            right: 20px;
            opacity: 0.03;
            font-size: 10rem;
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
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, transparent 70%);
            z-index: -1;
            filter: blur(40px);
        }
        
        .footer-note {
            background: rgba(30, 30, 30, 0.7);
            border-radius: 10px;
            padding: 1rem;
            margin-top: 2rem;
            border: 1px solid rgba(212, 175, 55, 0.1);
            backdrop-filter: blur(5px);
        }
        
        .search-icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .section-divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(212, 175, 55, 0.2), transparent);
            margin: 1.5rem 0;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 2rem;
            }
            
            .logo-text {
                font-size: 2.2rem;
            }
            
            .watermark {
                font-size: 6rem;
                bottom: 10px;
                right: 10px;
            }
            
            .btn-search {
                padding: 1rem;
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
        
        ::-webkit-scrollbar-thumb:hover {
            background: #b8941f;
        }
        
        /* Selection color */
        ::selection {
            background: rgba(212, 175, 55, 0.3);
            color: var(--text-light);
        }
        
        /* Option styling for dark theme */
        option {
            background: var(--card-darker);
            color: var(--text-light);
        }
        
        /* Form hints */
        .form-hint {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 0.3rem;
            display: block;
        }
    </style>
</head>
<body>
    <!-- Background glow effect -->
    <div class="glow-effect"></div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                
                <!-- Logo -->
                <div class="logo-container">
                    <div class="logo-text">EXCLUSIVE CARWASH</div>
                    <div class="logo-subtext">Premium Detailing Services</div>
                </div>
                
                <!-- Search Card -->
                <div class="card position-relative">
                    <div class="watermark">ECW</div>
                    
                    <div class="card-header">
                        <h4 class="mb-0 text-center text-white">
                            <div class="search-icon-wrapper">
                                <i class="fas fa-search"></i>
                            </div>
                            Search Booking Information
                        </h4>
                        <p class="text-center mb-0 mt-2" style="color: rgba(255,255,255,0.7); font-size: 0.9rem;">
                            Find and manage customer bookings
                        </p>
                    </div>
                    
                    <div class="card-body">
                        <form action="015proc_search2.php" method="post">
                            
                            <!-- Search Type -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="fas fa-filter me-2" style="color: var(--accent-gold);"></i>
                                    Search By
                                </label>
                                <select name="searchtype" class="form-select" required>
                                    <option value="">-- Select Search Type --</option>
                                    <option value="IC">Identity Card (IC)</option>
                                    <option value="name">Customer Name</option>
                                    <option value="booking_id">Booking ID</option>
                                    <option value="booking_date">Booking Date</option>
                                    <option value="service_name">Service Type</option>
                                    <option value="payment_date">Payment Date</option>
                                </select>
                                <span class="form-hint">
                                    Choose the criteria you want to search by
                                </span>
                            </div>
                            
                            <div class="section-divider"></div>
                            
                            <!-- Search Term -->
                            <div class="mb-4">
                                <label class="form-label">
                                    <i class="fas fa-keyboard me-2" style="color: var(--accent-gold);"></i>
                                    Enter Search Keyword
                                </label>
                                <input type="text" name="searchterm" class="form-control" 
                                       placeholder="Enter keyword (e.g., name, ID, date...)" required>
                                <span class="form-hint">
                                    Enter specific details related to your search type
                                </span>
                            </div>
                            
                            <!-- Button -->
                            <div class="d-grid mt-5 pt-2">
                                <button type="submit" name="search" class="btn btn-search">
                                    <i class="fas fa-search me-2"></i>
                                    SEARCH BOOKING
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
                
                <!-- Footer Note -->
                <div class="footer-note text-center">
                    <small>
                        <i class="fas fa-shield-alt me-2" style="color: var(--accent-gold);"></i>
                        <span style="color: var(--accent-silver);">
                            Secure search • Exclusive Carwash Booking System • Premium Service
                        </span>
                    </small>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Add subtle animation to card on load
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.card');
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
            
            // Add focus effects to form elements
            const formElements = document.querySelectorAll('.form-control, .form-select');
            formElements.forEach(el => {
                el.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                el.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
    
</body>
</html>