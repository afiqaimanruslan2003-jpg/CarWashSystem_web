<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusive Carwash | Navigation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #0A1A2D;
            --accent-gold: #D4AF37;
            --accent-teal: #2EC4B6;
            --accent-silver: #C0C0C0;
            --text-light: #F5F5F5;
            --sidebar-bg: #0c1424;
            --hover-bg: rgba(212, 175, 55, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--sidebar-bg);
            color: var(--text-light);
            height: calc(100vh - 0px);
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar {
            width: 220px;
            background: linear-gradient(180deg, #0c1424 0%, #0a1a2d 100%);
            border-right: 1px solid rgba(212, 175, 55, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .sidebar-content {
            flex: 1;
            overflow-y: auto;
            padding: 20px 0;
        }
        
        .sidebar-content::-webkit-scrollbar {
            width: 5px;
        }
        
        .sidebar-content::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .sidebar-content::-webkit-scrollbar-thumb {
            background: var(--accent-gold);
            border-radius: 3px;
        }
        
        .nav-header {
            padding: 0 15px 20px 15px;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .nav-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.1rem;
            color: var(--accent-gold);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .nav-subtitle {
            color: var(--accent-silver);
            font-size: 0.75rem;
            margin-top: 3px;
            opacity: 0.7;
        }
        
        .nav-menu {
            list-style: none;
            padding: 0 10px;
            margin: 0 0 25px 0;
        }
        
        .menu-category {
            padding: 15px 5px 8px 5px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--accent-gold);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 15px;
            border-bottom: 1px solid rgba(212, 175, 55, 0.15);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .menu-category:first-child {
            margin-top: 0;
        }
        
        .nav-item {
            margin-bottom: 3px;
            border-radius: 8px;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: var(--accent-silver);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            background: transparent;
        }
        
        .nav-link:hover {
            background: var(--hover-bg);
            color: var(--accent-gold);
            border-left-color: var(--accent-gold);
        }
        
        .nav-link.active {
            background: rgba(212, 175, 55, 0.15);
            color: var(--accent-gold);
            border-left-color: var(--accent-gold);
            font-weight: 600;
        }
        
        .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 1rem;
            color: inherit;
            margin-right: 12px;
        }
        
        .nav-text {
            flex: 1;
        }
        
        .arrow {
            font-size: 0.8rem;
            transition: transform 0.3s ease;
            color: var(--accent-silver);
        }
        
        .nav-link.collapsed .arrow {
            transform: rotate(-90deg);
        }
        
        .submenu {
            list-style: none;
            padding: 0;
            margin: 0;
            background: rgba(20, 20, 35, 0.7);
            border-left: 2px solid rgba(212, 175, 55, 0.2);
            margin-left: 15px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease;
            border-radius: 0 0 8px 8px;
        }
        
        .submenu.show {
            max-height: 300px;
        }
        
        .submenu-item {
            margin: 0;
        }
        
        .submenu-link {
            display: flex;
            align-items: center;
            padding: 10px 15px 10px 30px;
            color: var(--accent-silver);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            border-left: 2px solid transparent;
            transition: all 0.3s ease;
        }
        
        .submenu-link:hover {
            color: var(--accent-gold);
            background: rgba(212, 175, 55, 0.08);
            border-left-color: var(--accent-gold);
        }
        
        .submenu-link.active {
            color: var(--accent-gold);
            background: rgba(212, 175, 55, 0.1);
            border-left-color: var(--accent-gold);
            font-weight: 600;
        }
        
        .submenu-icon {
            width: 16px;
            text-align: center;
            font-size: 0.9rem;
            color: inherit;
            margin-right: 10px;
        }
        
        .stats-panel {
            background: rgba(212, 175, 55, 0.05);
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin: 0 15px 20px 15px;
        }
        
        .stat-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .stat-item:last-child {
            border-bottom: none;
        }
        
        .stat-label {
            color: var(--accent-silver);
            font-size: 0.8rem;
        }
        
        .stat-value {
            color: var(--accent-gold);
            font-weight: 600;
            font-size: 0.95rem;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                width: 180px;
            }
            
            .nav-link {
                padding: 10px 12px;
                font-size: 0.85rem;
            }
            
            .nav-icon {
                margin-right: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-content">
            <div class="nav-header">
                <div class="nav-title">
                    <i class="fas fa-compass"></i> Navigation
                </div>
                <div class="nav-subtitle">Customer Menu</div>
            </div>
            
            <div class="stats-panel">
                <div class="stat-item">
                    <span class="stat-label">Active</span>
                    <span class="stat-value">Online</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Version</span>
                    <span class="stat-value">v2.0</span>
                </div>
            </div>
            
            <ul class="nav-menu">
                <div class="menu-category"><i class="fas fa-calendar-alt"></i> Bookings</div>
                
                <!-- BOOKING SLOT - NOW USING NAV-LINK LIKE CONTACT US -->
                <li class="nav-item">
                    <a href="new_form_users003.php" target="RightFrame" class="nav-link">
                        <i class="fas fa-plus-circle nav-icon"></i>
                        <span class="nav-text">Booking Slot</span>
                    </a>
                </li>
                
                <!-- CONTACT US LINK -->
                <li class="nav-item">
                    <a href="contact_us.php" target="RightFrame" class="nav-link">
                        <i class="fas fa-phone nav-icon"></i>
                        <span class="nav-text">Contact Us</span>
                    </a>
                </li>
                
                <!-- LOCATION LINK -->
                <li class="nav-item">
                    <a href="our_location.php" target="RightFrame" class="nav-link">
                        <i class="fas fa-map-marker-alt nav-icon"></i>
                        <span class="nav-text">Our Location</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle submenus
            document.querySelectorAll('[data-toggle="submenu"]').forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = this.getAttribute('data-target');
                    const submenu = document.querySelector(target);
                    const arrow = this.querySelector('.arrow');
                    
                    // Toggle current submenu
                    submenu.classList.toggle('show');
                    this.classList.toggle('collapsed');
                    
                    // Rotate arrow
                    if (submenu.classList.contains('show')) {
                        arrow.style.transform = 'rotate(0deg)';
                    } else {
                        arrow.style.transform = 'rotate(-90deg)';
                    }
                    
                    // Close other submenus
                    document.querySelectorAll('[data-toggle="submenu"]').forEach(function(otherToggle) {
                        if (otherToggle !== this) {
                            const otherTarget = otherToggle.getAttribute('data-target');
                            const otherSubmenu = document.querySelector(otherTarget);
                            const otherArrow = otherToggle.querySelector('.arrow');
                            
                            if (otherSubmenu.classList.contains('show')) {
                                otherSubmenu.classList.remove('show');
                                otherToggle.classList.add('collapsed');
                                otherArrow.style.transform = 'rotate(-90deg)';
                            }
                        }
                    }.bind(this));
                });
            });
            
            // Highlight active link based on current frame
            function highlightActiveLink() {
                const links = document.querySelectorAll('.nav-link, .submenu-link');
                links.forEach(link => link.classList.remove('active'));
                
                try {
                    // Get current frame URL
                    const currentUrl = parent.frames['RightFrame'].location.href;
                    const filename = currentUrl.split('/').pop().split('?')[0];
                    
                    // Find and highlight matching link
                    links.forEach(link => {
                        const href = link.getAttribute('href');
                        if (href && href !== '#') {
                            const linkFilename = href.split('/').pop().split('?')[0];
                            if (filename === linkFilename) {
                                link.classList.add('active');
                                
                                // Open parent submenu if it's a submenu link
                                if (link.classList.contains('submenu-link')) {
                                    const parentItem = link.closest('.nav-item');
                                    const toggle = parentItem.querySelector('[data-toggle="submenu"]');
                                    const target = toggle.getAttribute('data-target');
                                    const submenu = document.querySelector(target);
                                    const arrow = toggle.querySelector('.arrow');
                                    
                                    submenu.classList.add('show');
                                    toggle.classList.remove('collapsed');
                                    arrow.style.transform = 'rotate(0deg)';
                                }
                            }
                        }
                    });
                } catch (e) {
                    console.log('Cannot access frame URL');
                }
            }
            
            // Update highlight when links are clicked
            document.querySelectorAll('.nav-link[href], .submenu-link[href]').forEach(link => {
                link.addEventListener('click', function() {
                    setTimeout(highlightActiveLink, 100);
                });
            });
            
            // Initial highlight
            highlightActiveLink();
        });
    </script>
</body>
</html>