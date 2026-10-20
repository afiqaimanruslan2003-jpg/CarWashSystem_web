<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Exclusive Carwash | Service Selection</title>
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
        
        .service-container {
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
        
        .service-card {
            background: var(--card-darker);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }
        
        .service-card::before {
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
        
        .service-header {
            margin-bottom: 2.5rem;
        }
        
        .service-header h1 {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
        }
        
        .service-header p {
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
        
        .price-display {
            grid-column: 1 / -1;
            background: rgba(212, 175, 55, 0.05);
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 0.5rem;
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
        
        .price-amount {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent-gold);
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }
        
        .price-label {
            text-align: center;
            color: var(--accent-silver);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .ready-time-display {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--accent-teal);
            text-align: center;
            padding-top: 0.5rem;
            font-family: 'Montserrat', sans-serif;
        }
        
        .time-info-text {
            font-size: 0.8rem;
            color: var(--accent-silver);
            text-align: center;
            margin-top: 0.25rem;
            opacity: 0.8;
        }
        
        @media (max-width: 992px) {
            .service-container {
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
            
            .service-card, .info-card {
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
            
            .price-amount, .ready-time-display {
                font-size: 1.8rem;
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

    if (isset($_GET['booking_id'])) {
        $booking_id = mysqli_real_escape_string($conn, $_GET['booking_id']);
        $sql = "SELECT * FROM bookings WHERE booking_id='$booking_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $booking = mysqli_fetch_assoc($result);
        } else { echo "Booking not found!"; exit; }
    } else { echo "Booking ID not provided!"; exit; }
    
    $sql_user = "SELECT name FROM users WHERE IC='" . $booking['IC'] . "'";
    $res_user = mysqli_query($conn, $sql_user);
    $user = mysqli_fetch_assoc($res_user);
    ?>
    
    <div class="service-container">
        <!-- Left Panel - Booking Info -->
        <div class="left-panel">
            <div class="info-card">
                <div class="logo-container">
                    <div class="logo-text">EXCLUSIVE CARWASH</div>
                    <div class="logo-subtext">Service Selection</div>
                </div>
                
                <div class="booking-info">
                    <div class="section-title">
                        <i class="fas fa-calendar-check"></i>
                        Booking Details
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
                            <i class="fas fa-id-card"></i>
                        </div>
                        <div class="info-content">
                            <h4>Customer IC</h4>
                            <p><?php echo $booking['IC']; ?></p>
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
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div class="info-content">
                            <h4>Booking Date</h4>
                            <p><?php echo $booking['booking_date']; ?></p>
                        </div>
                    </div>
                    
                    <div class="info-row">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h4>Booking Time</h4>
                            <p><?php echo $booking['booking_time']; ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="security-note">
                    <i class="fas fa-shield-alt"></i>
                    Secure service selection and pricing
                </div>
            </div>
        </div>
        
        <!-- Right Panel - Service Form -->
        <div class="right-panel">
            <div class="service-card">
                <div class="watermark">ECW</div>
                
                <div class="service-header">
                    <h1><i class="fas fa-spa me-2"></i>Select Service Package</h1>
                    <p>Choose your premium car wash service</p>
                </div>
                
                <form action="input_process_services003.php" method="post" name="form1">
                    <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                    
                    <div class="section-title">
                        <i class="fas fa-cogs"></i>
                        Service Configuration
                    </div>
                    
                    <div class="form-grid">
                        <!-- Car Type Selection -->
                        <div class="form-group">
                            <label for="type_car" class="form-label">
                                <i class="fas fa-car"></i>
                                Car Type
                            </label>
                            <select class="form-select" name="type_car" id="type_car" required onchange="updateTimeAndPrice()">
                                <option value="" disabled selected>-- Select Car Type --</option>
                                <option value="Sedan/Hatchback">Sedan/Hatchback</option>
                                <option value="MPV">MPV</option>
                                <option value="SUV/L.MPV">SUV/L.MPV</option>
                                <option value="4x4">4x4</option>
                            </select>
                        </div>

                        <!-- Service Selection -->
                        <div class="form-group">
                            <label for="service_name" class="form-label">
                                <i class="fas fa-spa"></i>
                                Service Package
                            </label>
                            <select class="form-select" name="service_name" id="service_name" required onchange="updateTimeAndPrice()">
                                <option value="" disabled selected>-- Select Service --</option>
                                <option value="Signature Wash">Signature Wash</option>
                                <option value="Executive Detailing">Executive Detailing</option>
                                <option value="Ceramic Coating">Ceramic Coating</option>
                            </select>
                        </div>
                        
                        <!-- Price and Time Display -->
                        <div class="price-display">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="price-label">Total Price</div>
                                    <div class="price-amount" id="price_display">RM 0.00</div>
                                    <input type="hidden" name="price" id="price" value="0.00">
                                </div>
                                <div class="col-md-6">
                                    <div class="price-label">Estimated Ready Time</div>
                                    <div class="ready-time-display" id="ready_time_display" title="Select service to see estimated ready time">
                                        --:--
                                    </div>
                                    <div class="time-info-text" id="duration_info">
                                        Select service to see duration
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-check-circle"></i>
                        CONFIRM SERVICE SELECTION
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
    // Duration mapping based on service
    const serviceDurations = {
        "Signature Wash": 30, // 30 minutes
        "Executive Detailing": 60, // 60 minutes
        "Ceramic Coating": 90 // 90 minutes
    };

    // Duration text for display
    const durationTexts = {
        "Signature Wash": "30 minutes",
        "Executive Detailing": "1 hour",
        "Ceramic Coating": "1 hour 30 minutes"
    };

    // Price matrix based on your catalog
    const priceMatrix = {
        "Sedan/Hatchback": {
            "Signature Wash": 20.00,
            "Executive Detailing": 70.00,
            "Ceramic Coating": 120.00
        },
        "MPV": {
            "Signature Wash": 25.00,
            "Executive Detailing": 80.00,
            "Ceramic Coating": 130.00
        },
        "SUV/L.MPV": {
            "Signature Wash": 30.00,
            "Executive Detailing": 85.00,
            "Ceramic Coating": 140.00
        },
        "4x4": {
            "Signature Wash": 40.00,
            "Executive Detailing": 100.00,
            "Ceramic Coating": 170.00
        }
    };

    // Function to format time (add leading zero)
    function formatTime(time) {
        return time < 10 ? '0' + time : time;
    }

    // Function to calculate ready time
    function calculateReadyTime(durationMinutes) {
        // Get booking time from PHP variable
        const bookingTime = "<?php echo $booking['booking_time']; ?>";
        const [hours, minutes] = bookingTime.split(':').map(Number);
        
        // Calculate total minutes
        let totalMinutes = hours * 60 + minutes + durationMinutes;
        
        // Calculate new hours and minutes
        let newHours = Math.floor(totalMinutes / 60) % 24;
        let newMinutes = totalMinutes % 60;
        
        // Format as HH:MM
        return formatTime(newHours) + ':' + formatTime(newMinutes);
    }

    // Main update function
    function updateTimeAndPrice() {
        const car = document.getElementById("type_car").value;
        const service = document.getElementById("service_name").value;
        let total = 0;
        let duration = 0;
        
        // Update price
        if (car && service && priceMatrix[car] && priceMatrix[car][service]) {
            total = priceMatrix[car][service];
        }
        
        document.getElementById("price").value = total.toFixed(2);
        document.getElementById("price_display").textContent = `RM ${total.toFixed(2)}`;
        
        // Update ready time and duration info
        if (car && service && serviceDurations[service]) {
            duration = serviceDurations[service];
            const readyTime = calculateReadyTime(duration);
            document.getElementById("ready_time_display").textContent = readyTime;
            document.getElementById("duration_info").textContent = `Service duration: ${durationTexts[service]}`;
            
            // Add animation to ready time display
            const readyTimeElement = document.getElementById("ready_time_display");
            readyTimeElement.style.transform = "scale(1.1)";
            setTimeout(() => {
                readyTimeElement.style.transform = "scale(1)";
            }, 300);
        } else {
            document.getElementById("ready_time_display").textContent = '--:--';
            document.getElementById("duration_info").textContent = 'Select service to see duration';
        }
        
        // Enable/disable submit button
        const submitBtn = document.querySelector('.btn-submit');
        if (car && service && total > 0) {
            submitBtn.disabled = false;
            submitBtn.style.opacity = "1";
            submitBtn.style.cursor = "pointer";
        } else {
            submitBtn.disabled = true;
            submitBtn.style.opacity = "0.7";
            submitBtn.style.cursor = "not-allowed";
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Add fade-in animation
        const cards = document.querySelectorAll('.info-card, .service-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100 + (index * 200));
        });
        
        // Add interactive effects to selects
        const selects = document.querySelectorAll('.form-select');
        selects.forEach(select => {
            select.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
                this.parentElement.style.transition = 'transform 0.3s ease';
            });
            
            select.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
            
            // Add change animation
            select.addEventListener('change', function() {
                this.style.transform = "scale(1.02)";
                setTimeout(() => {
                    this.style.transform = "scale(1)";
                }, 200);
            });
        });
        
        // Initialize button state
        updateTimeAndPrice();
        
        // Add tooltip functionality for ready time
        const readyTimeDisplay = document.getElementById("ready_time_display");
        readyTimeDisplay.addEventListener('mouseenter', function() {
            if (this.textContent !== '--:--') {
                const service = document.getElementById("service_name").value;
                if (service && durationTexts[service]) {
                    this.setAttribute('title', `Service duration: ${durationTexts[service]}`);
                }
            }
        });
        
        // Show helpful message when hovering over selects
        const carSelect = document.getElementById("type_car");
        const serviceSelect = document.getElementById("service_name");
        
        carSelect.setAttribute('title', 'Select your car type for accurate pricing');
        serviceSelect.setAttribute('title', 'Choose your desired service package');
    });
    </script>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>