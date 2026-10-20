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
    <title>EXCLUSIVE CARWASH | Contact Us</title>
    
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
        
        .contact-container {
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
        
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .contact-card {
            background: var(--card-darker);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.1);
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
            border-color: var(--accent-gold);
        }
        
        .card-icon {
            font-size: 2.5rem;
            color: var(--accent-gold);
            margin-bottom: 20px;
            display: inline-block;
            padding: 15px;
            background: rgba(212, 175, 55, 0.1);
            border-radius: 12px;
        }
        
        .card-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            color: var(--accent-gold);
            margin-bottom: 20px;
        }
        
        .contact-info {
            margin-top: 20px;
        }
        
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .info-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        
        .info-icon {
            color: var(--accent-teal);
            font-size: 1.2rem;
            margin-top: 3px;
            min-width: 25px;
        }
        
        .info-content {
            flex: 1;
        }
        
        .info-label {
            color: var(--text-light);
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 1rem;
        }
        
        .info-value {
            color: var(--accent-silver);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .info-link {
            color: var(--accent-teal);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .info-link:hover {
            color: var(--accent-gold);
            text-decoration: underline;
        }
        
        .hours-section {
            background: var(--card-darker);
            border-radius: 20px;
            padding: 30px;
            box-shadow: var(--shadow-luxury);
            border: 1px solid rgba(212, 175, 55, 0.1);
            margin-bottom: 40px;
        }
        
        .hours-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .hours-table th {
            padding: 15px;
            text-align: left;
            color: var(--accent-gold);
            font-weight: 600;
            border-bottom: 2px solid rgba(212, 175, 55, 0.2);
        }
        
        .hours-table td {
            padding: 15px;
            color: var(--accent-silver);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .hours-table tr:last-child td {
            border-bottom: none;
        }
        
        .highlight {
            color: var(--accent-gold);
            font-weight: 600;
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
        
        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
            
            .logo-text {
                font-size: 2rem;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            .contact-card {
                padding: 25px;
            }
            
            .watermark {
                font-size: 6rem;
                bottom: 10px;
                right: 10px;
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
        }
    </style>
</head>
<body>
    <div class="contact-container">
        <!-- Watermark -->
        <div class="watermark">ECW</div>
        
        <!-- Header -->
        <div class="header-section">
            <div class="logo-text">EXCLUSIVE CARWASH</div>
            <div class="logo-subtext">CONTACT INFORMATION</div>
            
            <h1 class="page-title">
                <i class="fas fa-headset"></i>
                Contact Us
            </h1>
            <p class="page-subtitle">
                Get in touch with our premium car wash team. We're here to assist you with any inquiries or bookings.
            </p>
        </div>
        
        <!-- Contact Grid -->
        <div class="contact-grid">
            <!-- Phone Contact -->
            <div class="contact-card">
                <div class="card-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3 class="card-title">Phone & WhatsApp</h3>
                <div class="contact-info">
                    <div class="info-item">
                        <i class="fas fa-phone info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">Main Phone Line</div>
                            <a href="tel:+60 11-16 286258" class="info-value info-link">+60 11-16 286258</a>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fab fa-whatsapp info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">WhatsApp Business</div>
                            <a href="https://wa.me/601116286258" target="_blank" class="info-value info-link">+60 11-16 286258</a>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fas fa-phone-square-alt info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">Booking Hotline</div>
                            <a href="tel:+60361234567" class="info-value info-link">+603-6123 4567</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Email Contact -->
            <div class="contact-card">
                <div class="card-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 class="card-title">Email & Online</h3>
                <div class="contact-info">
                    <div class="info-item">
                        <i class="fas fa-envelope-open-text info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">General Inquiries</div>
                            <a href="mailto:info@exclusivecarwash.com" class="info-value info-link">info@exclusivecarwash.com</a>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fas fa-calendar-check info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">Booking & Reservations</div>
                            <a href="mailto:booking@exclusivecarwash.com" class="info-value info-link">booking@exclusivecarwash.com</a>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fas fa-headset info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">Customer Support</div>
                            <a href="mailto:support@exclusivecarwash.com" class="info-value info-link">support@exclusivecarwash.com</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Social Media -->
            <div class="contact-card">
                <div class="card-icon">
                    <i class="fas fa-share-alt"></i>
                </div>
                <h3 class="card-title">Social Media</h3>
                <div class="contact-info">
                    <div class="info-item">
                        <i class="fab fa-facebook info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">Facebook</div>
                            <a href="https://facebook.com/exclusivecarwash" target="_blank" class="info-value info-link">@exclusivecarwash</a>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fab fa-instagram info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">Instagram</div>
                            <a href="https://instagram.com/exclusivecarwash" target="_blank" class="info-value info-link">@exclusivecarwash</a>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fab fa-tiktok info-icon"></i>
                        <div class="info-content">
                            <div class="info-label">TikTok</div>
                            <a href="https://tiktok.com/@exclusivecarwash" target="_blank" class="info-value info-link">@exclusivecarwash</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Business Hours -->
        <div class="hours-section">
            <h3 class="card-title">
                <i class="fas fa-clock"></i>
                Operating Hours
            </h3>
            <table class="hours-table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Opening Hours</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Monday - Sunday</td>
                        <td>10:00 AM - 8:00 PM</td>
                        <td class="highlight">OPEN</td>
                    </tr>
                    <tr>
                        <td>Public Holidays</td>
                        <td>10:00 AM - 8:00 PM</td>
                        <td class="highlight">OPEN</td>
                    </tr>
                </tbody>
            </table>
            <p style="color: var(--accent-silver); margin-top: 20px; font-size: 0.9rem;">
                <i class="fas fa-info-circle" style="color: var(--accent-teal); margin-right: 8px;"></i>
                We are open EVERYDAY from 10:00 AM to 8:00 PM, including public holidays.
            </p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to contact cards
            const cards = document.querySelectorAll('.contact-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 200);
            });
            
            // Click to copy phone number
            const phoneNumbers = document.querySelectorAll('a[href^="tel:"]');
            phoneNumbers.forEach(number => {
                number.addEventListener('click', function(e) {
                    const phoneNumber = this.textContent;
                    navigator.clipboard.writeText(phoneNumber).then(() => {
                        const originalText = this.textContent;
                        this.textContent = 'Copied!';
                        setTimeout(() => {
                            this.textContent = originalText;
                        }, 2000);
                    });
                });
            });
        });
    </script>
</body>
</html>