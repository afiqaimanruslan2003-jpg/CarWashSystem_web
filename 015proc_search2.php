<?php
if (!isset($_POST['searchtype'], $_POST['searchterm'])) {
    die("Invalid access.");
}

$searchtype = $_POST['searchtype'];
$searchterm = trim($_POST['searchterm']);

if ($searchtype == "" || $searchterm == "") {
    die("Please enter your search again.");
}

include ('database001.php');

/* ===============================
   SECURITY: ALLOW ONLY VALID COLUMNS
   =============================== */
$allowed_columns = [
    'IC', 'name', 'booking_id',
    'booking_date', 'service_name', 'payment_date'
];

if (!in_array($searchtype, $allowed_columns)) {
    die("Invalid search type.");
}

$searchterm = mysqli_real_escape_string($conn, $searchterm);

/* ===============================
   QUERY
   =============================== */
$query = "
SELECT * 
FROM bookinginfo_qry 
WHERE $searchtype LIKE '%$searchterm%'
";

$result = mysqli_query($conn, $query);
$num_results = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Exclusive Carwash | Search Results</title>
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
            --table-dark: #1a1a1a;
            --table-darker: #141414;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
            min-height: 100vh;
            color: var(--text-light);
            background-attachment: fixed;
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
            backdrop-filter: blur(10px);
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 2.5rem;
            position: relative;
        }
        
        .logo-text {
            font-size: 2.5rem;
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
            width: 80px;
            height: 2px;
            background: linear-gradient(to right, transparent, var(--accent-gold), transparent);
            margin: 1.5rem auto 0;
        }
        
        .search-summary {
            background: rgba(30, 30, 30, 0.6);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .results-count {
            font-size: 1.3rem;
            color: var(--accent-gold);
            font-weight: 600;
        }
        
        .search-criteria {
            color: var(--accent-silver);
            font-size: 1rem;
        }
        
        /* Table Styling */
        .table-responsive {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .table {
            background: var(--table-darker);
            color: var(--text-light);
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table thead th {
            background: linear-gradient(to bottom, #2d2d2d, #1f1f1f);
            color: var(--accent-gold);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--accent-gold);
            padding: 1.2rem 0.75rem;
            font-family: 'Poppins', sans-serif;
        }
        
        .table tbody tr {
            background: var(--table-dark);
            transition: all 0.2s ease;
        }
        
        .table tbody tr:hover {
            background: rgba(212, 175, 55, 0.05);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .table tbody td {
            border-color: rgba(255, 255, 255, 0.05);
            padding: 1rem 0.75rem;
            vertical-align: middle;
        }
        
        .table tbody tr:nth-child(even) {
            background: rgba(40, 40, 40, 0.5);
        }
        
        .btn-back {
            background: linear-gradient(135deg, #333 0%, #222 100%);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 12px;
            padding: 0.9rem 2rem;
            font-weight: 600;
            color: var(--accent-silver);
            transition: all 0.3s;
            font-family: 'Montserrat', sans-serif;
        }
        
        .btn-back:hover {
            background: linear-gradient(135deg, #444 0%, #333 100%);
            border-color: var(--accent-gold);
            color: var(--accent-gold);
            transform: translateY(-2px);
        }
        
        .btn-back i {
            margin-right: 8px;
        }
        
        .no-results {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 12px;
            padding: 3rem 2rem;
        }
        
        .no-results i {
            font-size: 3rem;
            color: var(--accent-gold);
            margin-bottom: 1.5rem;
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
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, transparent 70%);
            z-index: -1;
            filter: blur(40px);
        }
        
        @media (max-width: 768px) {
            .logo-text {
                font-size: 2rem;
            }
            
            .table-responsive {
                font-size: 0.9rem;
            }
            
            .table thead th,
            .table tbody td {
                padding: 0.8rem 0.5rem;
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
    </style>
</head>
<body>
    <!-- Background glow effect -->
    <div class="glow-effect"></div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                
                <!-- Logo -->
                <div class="logo-container">
                    <div class="logo-text">EXCLUSIVE CARWASH</div>
                    <div class="logo-subtext">Search Results</div>
                </div>
                
                <!-- Main Card -->
                <div class="card position-relative">
                    <div class="watermark">ECW</div>
                    
                    <div class="card-header">
                        <h4 class="mb-0 text-center text-white">
                            <i class="fas fa-search me-2"></i>
                            Search Results
                        </h4>
                        <p class="text-center mb-0 mt-2" style="color: rgba(255,255,255,0.7); font-size: 0.9rem;">
                            Booking Information Search Results
                        </p>
                    </div>
                    
                    <div class="card-body p-4">
                        <!-- Search Summary -->
                        <div class="search-summary">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5 class="results-count">
                                        <i class="fas fa-list-alt me-2"></i>
                                        Total Records Found: <span class="text-white"><?php echo $num_results; ?></span>
                                    </h5>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <p class="search-criteria mb-0">
                                        <i class="fas fa-filter me-1"></i>
                                        Searched by: <span class="text-white"><?php echo htmlspecialchars($searchtype); ?></span> |
                                        <i class="fas fa-keyboard ms-3 me-1"></i>
                                        Keyword: <span class="text-white">"<?php echo htmlspecialchars($_POST['searchterm']); ?>"</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <?php if ($num_results > 0) { ?>
                        
                        <!-- Results Table -->
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>Identity Card (IC)</th>
                                        <th>Customer Name</th>
                                        <th>Booking ID</th>
                                        <th>Booking Date</th>
                                        <th>Service Type</th>
                                        <th>Payment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$row['IC']}</td>";
                                    echo "<td><strong>{$row['name']}</strong></td>";
                                    echo "<td><span class='badge bg-dark text-gold' style='background: rgba(212, 175, 55, 0.2)!important; color: var(--accent-gold)!important;'>#{$row['booking_id']}</span></td>";
                                    echo "<td>{$row['booking_date']}</td>";
                                    echo "<td><span class='badge' style='background: rgba(46, 196, 182, 0.2); color: var(--accent-teal);'>{$row['service_name']}</span></td>";
                                    echo "<td>{$row['payment_date']}</td>";
                                    echo "</tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <?php } else { ?>
                        
                        <!-- No Results -->
                        <div class="no-results text-center mb-4">
                            <i class="fas fa-search-minus"></i>
                            <h4 class="text-white mb-3">No Records Found</h4>
                            <p class="text-muted mb-0">
                                No booking records match your search criteria.<br>
                                Please try a different search term or search type.
                            </p>
                        </div>
                        
                        <?php } ?>
                        
                        <!-- Back Button -->
                        <div class="text-center mt-4">
                            <a href="014frm_search.php" class="btn btn-back">
                                <i class="fas fa-arrow-left"></i>
                                Back to Search
                            </a>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="text-center mt-4 text-muted">
                    <small>
                        <i class="fas fa-shield-alt me-2" style="color: var(--accent-gold);"></i>
                        Exclusive Carwash Booking System • Secure Database Access
                    </small>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Add animation to table rows
        document.addEventListener('DOMContentLoaded', function() {
            const tableRows = document.querySelectorAll('.table tbody tr');
            tableRows.forEach((row, index) => {
                row.style.opacity = '0';
                row.style.transform = 'translateY(10px)';
                
                setTimeout(() => {
                    row.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    row.style.opacity = '1';
                    row.style.transform = 'translateY(0)';
                }, 100 + (index * 50));
            });
            
            // Add hover effect to cards
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            });
        });
    </script>
    
</body>
</html>