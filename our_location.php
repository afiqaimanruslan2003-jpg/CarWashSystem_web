<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXCLUSIVE CARWASH | Our Location</title>
    
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
            padding: 2rem;
        }
        
        .location-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header-section {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px;
            background: rgba(20, 20, 30, 0.8);
            border-radius: 20px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: var(--shadow-luxury);
        }
        
        .logo-text {
            font-size: 2.8rem;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 800;
            letter-spacing: 1.5px;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 10px;
        }
        
        .logo-subtext {
            color: var(--accent-silver);
            font-size: 1.1rem;
            letter-spacing: 3px;
            text-transform: uppercase;
        }
        
        .page-title {
            color: var(--accent-gold);
            font-family: 'Montserrat', sans-serif;
            font-size: 2.2rem;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
        
        .page-subtitle {
            color: var(--accent-silver);
            font-size: 1rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .location-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .address-card {
            background: var(--card-darker);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .card-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            color: var(--accent-gold);
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(212, 175, 55, 0.2);
        }
        
        .address-details {
            margin-bottom: 25px;
        }
        
        .address-line {
            color: var(--text-light);
            font-size: 1.1rem;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .address-line i {
            color: var(--accent-teal);
            width: 20px;
        }
        
        .highlight-address {
            background: rgba(212, 175, 55, 0.1);
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid var(--accent-gold);
            margin: 20px 0;
        }
        
        .highlight-address .address-line {
            color: var(--accent-gold);
            font-weight: 600;
            font-size: 1.2rem;
        }
        
        .facilities-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        
        .facilities-list li {
            color: var(--accent-silver);
            margin-bottom: 12px;
            padding-left: 25px;
            position: relative;
        }
        
        .facilities-list li:before {
            content: '✓';
            color: var(--accent-teal);
            position: absolute;
            left: 0;
            font-weight: bold;
        }
        
        .map-container {
            background: var(--card-darker);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.1);
            height: 100%;
        }
        
        .map-header {
            padding: 25px;
            background: rgba(212, 175, 55, 0.05);
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .map-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            color: var(--accent-gold);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .map-iframe {
            width: 100%;
            height: 400px;
            border: none;
        }
        
        .directions-section {
            background: var(--card-darker);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.1);
            margin-bottom: 40px;
        }
        
        .directions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }
        
        .direction-card {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .direction-icon {
            font-size: 2rem;
            color: var(--accent-gold);
            margin-bottom: 15px;
        }
        
        .direction-title {
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        
        .direction-desc {
            color: var(--accent-silver);
            font-size: 0.95rem;
            line-height: 1.5;
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
            font-family: 'Montserrat', sans-serif;
        }
        
        .opening-hours {
            background: rgba(46, 196, 182, 0.08);
            border-radius: 15px;
            padding: 20px;
            margin-top: 25px;
            border: 1px solid rgba(46, 196, 182, 0.2);
        }
        
        .opening-title {
            color: var(--accent-teal);
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .opening-time {
            color: var(--accent-silver);
            font-size: 1.1rem;
        }
        
        @media (max-width: 992px) {
            .location-info {
                grid-template-columns: 1fr;
            }
            
            .map-iframe {
                height: 350px;
            }
        }
        
        @media (max-width: 768px) {
            .logo-text {
                font-size: 2rem;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .address-card, .directions-section {
                padding: 25px;
            }
            
            .watermark {
                font-size: 6rem;
                bottom: 10px;
                right: 10px;
            }
            
            .directions-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }
            
            .header-section {
                padding: 20px;
            }
            
            .logo-text {
                font-size: 1.8rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .map-iframe {
                height: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="location-container">
        <!-- Watermark -->
        <div class="watermark">ECW</div>
        
        <!-- Header -->
        <div class="header-section">
            <div class="logo-text">EXCLUSIVE CARWASH</div>
            <div class="logo-subtext">OUR PREMIUM LOCATION</div>
            
            <h1 class="page-title">
                <i class="fas fa-map-marked-alt"></i>
                Find Our Location
            </h1>
            <p class="page-subtitle">
                Visit our premium car wash facility in Rawang. Experience luxury car care at its finest.
            </p>
        </div>
        
        <!-- Location Information -->
        <div class="location-info">
            <!-- Address Card -->
            <div class="address-card">
                <h3 class="card-title">
                    <i class="fas fa-map-pin"></i>
                    Our Address
                </h3>
                
                <div class="address-details">
                    <div class="highlight-address">
                        <div class="address-line">
                            <i class="fas fa-building"></i>
                            Exclusive Carwash
                        </div>
                         
                        <!-- buang -->
                        <div class="address-line">
                            <i class="fas fa-location-dot"></i>
                            No. 45 Jalan Bunga Raya 5A/3 <br>
                            Seksyen BS2, Bukit Sentosa <br>
                            48300 Rawang, Selangor
                        </div>
        
                    </div>
                </div>
                
                <h4 style="color: var(--accent-gold); margin-bottom: 15px; font-size: 1.2rem;">
                    <i class="fas fa-star"></i> Premium Facilities:
                </h4>
                <ul class="facilities-list">
                    <li>Covered washing bays</li>
                    <li>VIP waiting lounge with refreshments</li>
                    <li>Free Wi-Fi for customers</li>
                    <li>Secure parking area</li>
                    <li>Restrooms with premium amenities</li>
                    <li>Air-conditioned waiting area</li>
                </ul>
                
                <!-- Opening Hours -->
                <div class="opening-hours">
                    <div class="opening-title">
                        <i class="fas fa-clock"></i>
                        Operating Hours
                    </div>
                    <div class="opening-time">
                        <strong>Everyday:</strong> 10:00 AM - 8:00 PM
                    </div>
                    <div style="color: var(--accent-silver); font-size: 0.9rem; margin-top: 8px;">
                        <i class="fas fa-info-circle"></i>
                        Open daily including public holidays
                    </div>
                </div>
            </div>
            
            <!-- Map Container -->
            <div class="map-container">
                <div class="map-header">
                    <h3 class="map-title">
                        <i class="fas fa-map-marked-alt"></i>
                        Location Map
                    </h3>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244547.02983871716!2d101.36997583759035!3d3.273074550608866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc68e56a49e917%3A0xb1093c6dcc012570!2sLotus&#39;s%20Bukit%20Beruntung!5e0!3m2!1sen!2smy!4v1769107015345!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        
        <!-- Directions Section -->
        <div class="directions-section">
            <h3 class="card-title">
                <i class="fas fa-directions"></i>
                How to Get Here
            </h3>
            
            <div class="directions-grid">
                <!-- By Car -->
                <div class="direction-card">
                    <div class="direction-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <h4 class="direction-title">By Car</h4>
                    <p class="direction-desc">
                        From KL: Take NKVE highway towards Rawang. Exit at Rawang interchange, follow signs to Bukit Sentosa. Look for Jalan Bunga Raya.
                    </p>
                </div>
                
                
                
                <!-- Parking -->
                <div class="direction-card">
                    <div class="direction-icon">
                        <i class="fas fa-parking"></i>
                    </div>
                    <h4 class="direction-title">Parking</h4>
                    <p class="direction-desc">
                        Ample parking spaces available in front of our facility. Covered parking for customers undergoing service.
                    </p>
                </div>
                
                <!-- Landmarks -->
                <div class="direction-card">
                    <div class="direction-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h4 class="direction-title">Nearby Landmarks</h4>
                    <p class="direction-desc">
                        Near Bukit Sentosa commercial area, opposite LOTUS BUKIT BERUNTUNG RAWANG.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to direction cards
            const directionCards = document.querySelectorAll('.direction-card');
            directionCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateX(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateX(0)';
                }, index * 200);
            });
            
            // Make address copyable
            const addressElement = document.querySelector('.highlight-address');
            addressElement.style.cursor = 'pointer';
            
            addressElement.addEventListener('click', function() {
                const addressText = `
Exclusive Carwash
No. 45 Jalan Bunga Raya 5A/3
Seksyen BS2, Bukit Sentosa
48300 Rawang, Selangor
                `.trim();
                
                navigator.clipboard.writeText(addressText).then(() => {
                    const originalHTML = this.innerHTML;
                    this.innerHTML = `
                        <div class="address-line" style="color: var(--accent-teal);">
                            <i class="fas fa-check-circle"></i>
                            Address Copied!
                        </div>
                    `;
                    
                    setTimeout(() => {
                        this.innerHTML = originalHTML;
                    }, 2000);
                });
            });
            
            // Add tooltip for address
            addressElement.title = "Click to copy address";
        });
    </script>
</body>
</html>