<?php
include('database001.php');

if (!isset($_GET['service_id'])) {
    die("Service ID not provided!");
}

$service_id = mysqli_real_escape_string($conn, $_GET['service_id']);
$sql = "SELECT * FROM services WHERE service_id = '$service_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Service not found!");
}

$service = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusive Carwash | Update Service</title>
    
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
        
        .price-display {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            margin-top: 10px;
        }
        
        .calculated-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
        }
        
        @media (max-width: 768px) {
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
            <div class="logo-subtext">Update Service</div>
        </div>
        
        <div class="form-header">
            <h1><i class="fas fa-edit me-2"></i>Edit Service Details</h1>
            <p>Update service information for Service #<?php echo $service['service_id']; ?></p>
        </div>
        
        <form action="011pros_updateservices.php" method="post" name="updateForm">
            <input type="hidden" name="ud_service_id" value="<?php echo $service['service_id']; ?>">
            <input type="hidden" name="ud_booking_id" value="<?php echo $service['booking_id']; ?>">
            
            <div class="form-grid">
                <!-- Vehicle Type -->
                <div class="form-group">
                    <label for="ud_type_car" class="form-label">
                        <i class="fas fa-car"></i>
                        Vehicle Type
                    </label>
                    <select class="form-select" name="ud_type_car" id="ud_type_car" required onchange="calculatePrice()">
                        <option value="Sedan/Hatchback" <?php echo ($service['type_car'] == 'Sedan/Hatchback') ? 'selected' : ''; ?>>Sedan/Hatchback</option>
                        <option value="MPV" <?php echo ($service['type_car'] == 'MPV') ? 'selected' : ''; ?>>MPV</option>
                        <option value="SUV/L.MPV" <?php echo ($service['type_car'] == 'SUV/L.MPV') ? 'selected' : ''; ?>>SUV/L.MPV</option>
                        <option value="4x4" <?php echo ($service['type_car'] == '4x4') ? 'selected' : ''; ?>>4x4</option>
                    </select>
                </div>
                
                <!-- Service Name -->
                <div class="form-group">
                    <label for="ud_service_name" class="form-label">
                        <i class="fas fa-spa"></i>
                        Service Type
                    </label>
                    <select class="form-select" name="ud_service_name" id="ud_service_name" required onchange="calculatePrice()">
                        <option value="Signature Wash" <?php echo ($service['service_name'] == 'Signature Wash') ? 'selected' : ''; ?>>Signature Wash</option>
                        <option value="Executive Detailing" <?php echo ($service['service_name'] == 'Executive Detailing') ? 'selected' : ''; ?>>Executive Detailing</option>
                        <option value="Ceramic Coating" <?php echo ($service['service_name'] == 'Ceramic Coating') ? 'selected' : ''; ?>>Ceramic Coating</option>
                    </select>
                </div>
                
                <!-- Price Display -->
                <div class="price-display">
                    <div style="color: var(--accent-silver); font-size: 0.9rem; margin-bottom: 5px;">
                        Calculated Price
                    </div>
                    <div class="calculated-price" id="calculatedPrice">
                        RM <?php echo number_format($service['price'], 2); ?>
                    </div>
                    <div style="color: var(--accent-silver); font-size: 0.8rem; margin-top: 8px;">
                        Price will update automatically based on vehicle and service type
                    </div>
                </div>
                
                <!-- Price (hidden input that will be auto-filled) -->
                <input type="hidden" name="ud_price" id="ud_price" value="<?php echo $service['price']; ?>">
                
                <!-- Manual Price Override (optional) -->
                <div class="form-group">
                    <label for="manual_price" class="form-label">
                        <i class="fas fa-edit"></i>
                        Manual Price Override (Optional)
                    </label>
                    <input type="number" class="form-control" id="manual_price" 
                           step="0.01" min="0" placeholder="Leave empty to use calculated price"
                           onchange="updateManualPrice()">
                    <div style="color: var(--accent-silver); font-size: 0.8rem; margin-top: 5px;">
                        Leave empty to use calculated price, or enter custom amount
                    </div>
                </div>
            </div>
            
            <button type="submit" name="SUBMIT" class="btn-submit">
                <i class="fas fa-save"></i>
                UPDATE SERVICE DETAILS
            </button>
        </form>
    </div>

    <script>
        // Price matrix
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

        // Function to calculate price based on selections
        function calculatePrice() {
            const vehicleType = document.getElementById('ud_type_car').value;
            const serviceType = document.getElementById('ud_service_name').value;
            const manualPriceInput = document.getElementById('manual_price');
            
            // If manual price is set, don't auto-calculate
            if (manualPriceInput.value !== '') {
                return;
            }
            
            if (vehicleType && serviceType) {
                const price = priceMatrix[vehicleType][serviceType];
                if (price !== undefined) {
                    document.getElementById('calculatedPrice').innerHTML = 'RM ' + price.toFixed(2);
                    document.getElementById('ud_price').value = price;
                    
                    // Animate price change
                    const priceDisplay = document.getElementById('calculatedPrice');
                    priceDisplay.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        priceDisplay.style.transform = 'scale(1)';
                    }, 300);
                }
            }
        }

        // Function to update manual price
        function updateManualPrice() {
            const manualPriceInput = document.getElementById('manual_price');
            const calculatedPriceDisplay = document.getElementById('calculatedPrice');
            const hiddenPriceInput = document.getElementById('ud_price');
            
            if (manualPriceInput.value !== '') {
                const manualPrice = parseFloat(manualPriceInput.value);
                if (!isNaN(manualPrice) && manualPrice >= 0) {
                    calculatedPriceDisplay.innerHTML = 'RM ' + manualPrice.toFixed(2);
                    hiddenPriceInput.value = manualPrice;
                    
                    // Highlight manual price
                    calculatedPriceDisplay.style.color = '#FFD700';
                    
                    // Animate price change
                    calculatedPriceDisplay.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        calculatedPriceDisplay.style.transform = 'scale(1)';
                    }, 300);
                }
            } else {
                // If manual price is cleared, revert to auto-calculation
                calculatePrice();
                calculatedPriceDisplay.style.color = ''; // Reset to default
            }
        }

        // Initialize price on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial calculated price
            calculatePrice();
            
            // Add animation to form
            const formCard = document.querySelector('.update-card');
            formCard.style.opacity = '0';
            formCard.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                formCard.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                formCard.style.opacity = '1';
                formCard.style.transform = 'translateY(0)';
            }, 100);
            
            // Add hover effects to form elements
            const formElements = document.querySelectorAll('.form-control, .form-select');
            formElements.forEach(element => {
                element.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                element.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const vehicleType = document.getElementById('ud_type_car').value;
            const serviceType = document.getElementById('ud_service_name').value;
            const price = document.getElementById('ud_price').value;
            
            if (!vehicleType || !serviceType) {
                e.preventDefault();
                alert('Please select both vehicle type and service type!');
                return;
            }
            
            if (!price || parseFloat(price) <= 0) {
                e.preventDefault();
                alert('Please enter a valid price!');
                return;
            }
        });
    </script>
</body>
</html>