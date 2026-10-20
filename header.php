<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exclusive Carwash | Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #0A1A2D;
            --accent-gold: #D4AF37;
            --accent-teal: #2EC4B6;
            --accent-silver: #C0C0C0;
            --text-light: #F5F5F5;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0A1A2D 0%, #14142e 100%);
            color: var(--text-light);
            height: 75px;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 75px;
            padding: 0 30px;
            background: rgba(10, 26, 45, 0.95);
            border-bottom: 3px solid var(--accent-gold);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            position: relative;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-shrink: 0;
        }
        
        .logo-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--accent-gold), var(--accent-teal));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #000;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
        }
        
        .logo-text {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1.2px;
            white-space: nowrap;
        }
        
        .logo-subtext {
            color: var(--accent-silver);
            font-size: 0.8rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: 2px;
        }
        
        .header-controls {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
            justify-content: flex-end;
        }
        
        .datetime-display {
            background: rgba(255, 255, 255, 0.05);
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid rgba(212, 175, 55, 0.1);
            font-family: 'Montserrat', sans-serif;
            font-size: 0.85rem;
            color: var(--accent-silver);
            text-align: center;
            min-width: 180px;
        }
        
        .system-status {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            background: rgba(46, 196, 182, 0.1);
            border-radius: 20px;
            border: 1px solid rgba(46, 196, 182, 0.2);
        }
        
        .status-dot {
            width: 8px;
            height: 8px;
            background: var(--accent-teal);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        
        .status-text {
            color: var(--accent-teal);
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 16px;
            background: rgba(212, 175, 55, 0.08);
            border-radius: 10px;
            border: 1px solid rgba(212, 175, 55, 0.15);
            min-width: 180px;
        }
        
        .user-avatar {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, var(--accent-gold), #b8941f);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            font-weight: 600;
            font-size: 0.95rem;
        }
        
        .user-details {
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        
        .user-name {
            font-weight: 600;
            color: var(--text-light);
            font-size: 0.9rem;
            white-space: nowrap;
        }
        
        .user-role {
            color: var(--accent-teal);
            font-size: 0.75rem;
            opacity: 0.9;
        }
        
        /* Enhanced Logout Button */
        .logout-btn {
            padding: 10px 22px;
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.2), rgba(220, 53, 69, 0.1));
            color: #ff6b6b;
            border: 1px solid rgba(220, 53, 69, 0.3);
            border-radius: 8px;
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }
        
        .logout-btn:hover {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.3), rgba(220, 53, 69, 0.2));
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(220, 53, 69, 0.25);
            border-color: rgba(220, 53, 69, 0.5);
        }
        
        .logout-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.1), 
                transparent);
            transition: left 0.5s ease;
        }
        
        .logout-btn:hover::before {
            left: 100%;
        }
        
        .logout-btn i {
            font-size: 1rem;
        }
        
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
        
        @media (max-width: 1200px) {
            .logo-text {
                font-size: 1.6rem;
            }
            
            .datetime-display {
                min-width: 160px;
                font-size: 0.8rem;
            }
            
            .user-profile {
                min-width: 160px;
            }
            
            .logout-btn {
                padding: 8px 18px;
                font-size: 0.85rem;
            }
        }
        
        @media (max-width: 992px) {
            .header-container {
                padding: 0 20px;
            }
            
            .header-controls {
                gap: 15px;
            }
            
            .datetime-display {
                display: none;
            }
            
            .logo-text {
                font-size: 1.4rem;
            }
        }
        
        @media (max-width: 768px) {
            .user-profile {
                display: none;
            }
            
            .logout-btn {
                padding: 6px 15px;
                font-size: 0.8rem;
            }
            
            .logo-text {
                font-size: 1.2rem;
            }
            
            .logo-subtext {
                font-size: 0.7rem;
            }
        }
    </style>
    <script>
        function updateDateTime() {
            const now = new Date();
            const options = { 
                weekday: 'short', 
                month: 'short', 
                day: 'numeric',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };
            document.getElementById('datetime').textContent = now.toLocaleDateString('en-US', options);
        }
        
        setInterval(updateDateTime, 60000);
        window.onload = updateDateTime;
        
        // Confirm logout and redirect entire page
        document.addEventListener('DOMContentLoaded', function() {
            const logoutBtn = document.querySelector('.logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    if (confirm('Are you sure you want to logout?')) {
                        // Method 1: If you're using frameset
                        if (window.top) {
                            window.top.location.href = 'logout.php';
                        }
                        // Method 2: If you're using iframes
                        else if (window.parent) {
                            window.parent.location.href = 'logout.php';
                        }
                        // Method 3: Regular page
                        else {
                            window.location.href = 'logout.php';
                        }
                    }
                });
            }
        });
    </script>
</head>
<body>
    <div class="header-container">
        <div class="logo-section">
            <div class="logo-icon">EC</div>
            <div>
                <div class="logo-text">EXCLUSIVE CARWASH</div>
                <div class="logo-subtext">Admin System</div>
            </div>
        </div>
        
        <div class="header-controls">
            <div class="datetime-display" id="datetime"></div>
            <div class="system-status">
                <div class="status-dot"></div>
                <div class="status-text">Online</div>
            </div>
            <div class="user-profile">
                <div class="user-avatar">
                    <i class="fas fa-user-crown"></i>
                </div>
                <div class="user-details">
                    <div class="user-name"><?php echo htmlspecialchars($_SESSION["username"] ?? 'Administrator'); ?></div>
                    <div class="user-role">System Administrator</div>
                </div>
            </div>
            <a href="#" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</body>
</html>