<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Exclusive Carwash | New Booking</title>
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
        
        .booking-container {
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
        
        .booking-card {
            background: var(--card-darker);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }
        
        .booking-card::before {
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
        
        .booking-header {
            margin-bottom: 2.5rem;
        }
        
        .booking-header h1 {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }
        
        .booking-header p {
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
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
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
        
        textarea.form-control {
            resize: vertical;
            min-height: 80px;
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
        
        .customer-info {
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
        
        .date-time-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }
        
        @media (max-width: 992px) {
            .booking-container {
                flex-direction: column;
                gap: 2rem;
            }
            
            .left-panel {
                max-width: 100%;
            }
            
            .date-time-group {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .booking-card, .info-card {
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
    
    if(isset($_GET['IC'])){
        $IC = mysqli_real_escape_string($conn, $_GET['IC']);
        $sql = "SELECT * FROM users WHERE IC='$IC'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
    } else {
        echo '<div class="alert alert-danger position-absolute top-0 start-50 translate-middle-x mt-3" style="max-width: 500px; background: rgba(220,53,69,0.9); color: white; border: 1px solid rgba(212,175,55,0.2); border-radius: 10px; z-index: 1000;">
                <i class="fas fa-exclamation-circle me-2"></i>Customer IC not provided!
              </div>';
        exit;
    }
    ?>
    
    <div class="booking-container">
        <!-- Left Panel - Customer Info -->
        <div class="left-panel">
            <div class="info-card">
                <div class="logo-container">
                    <div class="logo-text">EXCLUSIVE CARWASH</div>
                    <div class="logo-subtext">Premium Booking</div>
                </div>
                
                <div class="customer-info">
                    <div class="section-title">
                        <i class="fas fa-user-circle"></i>
                        Customer Details
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div class="info-content">
                            <h4>Identity Card</h4>
                            <p><?php echo $user['IC']; ?></p>
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
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h4>Contact Number</h4>
                            <p><?php echo $user['phone']; ?></p>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-hashtag"></i>
                        </div>
                        <div class="info-content">
                            <h4>Booking ID</h4>
                            <p id="booking_id_display" style="font-family: 'Courier New', monospace;">Generating...</p>
                        </div>
                    </div>
                </div>
                
                <div class="security-note">
                    <i class="fas fa-shield-alt"></i>
                    Your information is protected with enterprise-grade security
                </div>
            </div>
        </div>
        
        <!-- Right Panel - Booking Form -->
        <div class="right-panel">
            <div class="booking-card">
                <div class="watermark">ECW</div>
                
                <div class="booking-header">
                    <h1><i class="fas fa-calendar-plus me-2"></i>New Premium Booking</h1>
                    <p>Schedule your exclusive car wash appointment</p>
                </div>
                
                <form action="input_process_bookings003.php" method="post">
                    <input type="hidden" name="IC" value="<?php echo $user['IC']; ?>">
                    <input type="hidden" name="name" value="<?php echo $user['name']; ?>">
                    <input type="hidden" name="booking_id" id="booking_id" value="">
                    <input type="hidden" name="status" value="Pending">
                    
                    <div class="section-title">
                        <i class="fas fa-calendar-alt"></i>
                        Appointment Details
                    </div>
                    
                    <div class="form-grid">
                        <!-- Date and Time in one row -->
                        <div class="date-time-group">
                            <!-- Booking Date -->
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-calendar-day"></i>
                                    Date
                                </label>
                                <input type="date" class="form-control" name="booking_date" required>
                            </div>
                            
                            <!-- Booking Time -->
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-clock"></i>
                                    Time
                                </label>
                                <input type="time" class="form-control" name="booking_time" min="10:00" max="20:00" step="1800" required>
                                <small style="color: var(--text-muted); font-size: 0.8rem; display: block; margin-top: 0.25rem;">
                                    10:00 AM - 8:00 PM
                                </small>
                            </div>
                        </div>
                        
                        <!-- Special Instructions -->
                        
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-calendar-check"></i>
                        CONFIRM BOOKING
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const date = new Date();
            const year = date.getFullYear();
            const month = String(date.getMonth()+1).padStart(2,'0');
            const day = String(date.getDate()).padStart(2,'0');
            const randomNum = Math.floor(1000 + Math.random()*9000);
            
            // Generate booking ID with luxury prefix
            const bookingId = `ECW-${year}${month}${day}-${randomNum}`;
            document.getElementById("booking_id").value = bookingId;
            document.getElementById("booking_id_display").textContent = bookingId;
            
            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            document.querySelector('input[name="booking_date"]').setAttribute('min', today);
            
            // Set default time to next available slot
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            
            // Round up to next 30-minute interval
            if (minutes > 30) {
                hours += 1;
                minutes = 0;
            } else if (minutes > 0) {
                minutes = 30;
            }
            
            // Format time as HH:MM
            const defaultTime = `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;
            document.querySelector('input[name="booking_time"]').value = defaultTime;
            
            // Add fade-in animation
            const cards = document.querySelectorAll('.info-card, .booking-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 + (index * 200));
            });
        });
    </script>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>