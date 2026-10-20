<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exclusive Carwash | Bookings Dashboard</title>
    <meta charset="utf-8">
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
            padding: 2rem;
        }
        
        .luxury-container {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        .dashboard-header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 2.5rem;
            background: rgba(26, 26, 40, 0.7);
            border-radius: 25px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: var(--shadow-luxury);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }
        
        .dashboard-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal), var(--accent-gold));
        }
        
        .dashboard-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            letter-spacing: 1px;
            text-shadow: 0 0 40px rgba(212, 175, 55, 0.2);
        }
        
        .dashboard-subtitle {
            color: var(--accent-silver);
            font-size: 1.1rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            opacity: 0.8;
        }
        
        .luxury-table-container {
            background: rgba(26, 26, 40, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            border: 1px solid rgba(212, 175, 55, 0.2);
            padding: 2.5rem;
            box-shadow: var(--shadow-luxury);
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }
        
        .table-title {
            font-size: 1.8rem;
            color: var(--accent-gold);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-family: 'Montserrat', sans-serif;
        }
        
        .table-title i {
            font-size: 1.3rem;
        }
        
        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: var(--card-darker);
            border-radius: 15px;
            overflow: hidden;
        }
        
        .custom-table thead {
            background: linear-gradient(135deg, rgba(212, 175, 55, 0.2), rgba(46, 196, 182, 0.1));
        }
        
        .custom-table th {
            padding: 1.2rem 1.5rem;
            color: var(--accent-gold);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid var(--accent-gold);
            text-align: left;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
        }
        
        .custom-table th i {
            margin-right: 0.75rem;
            font-size: 1rem;
        }
        
        .custom-table tbody tr {
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            background: rgba(30, 30, 30, 0.8);
        }
        
        .custom-table tbody tr:hover {
            background: rgba(212, 175, 55, 0.08);
            transform: translateX(5px);
        }
        
        .custom-table tbody tr:nth-child(even) {
            background: rgba(40, 40, 40, 0.5);
        }
        
        .custom-table td {
            padding: 1.2rem 1.5rem;
            color: var(--text-light);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .customer-ic {
            color: var(--accent-gold);
            font-weight: 600;
            font-family: 'Courier New', monospace;
            letter-spacing: 0.5px;
        }
        
        .customer-name {
            font-weight: 500;
            color: var(--text-light);
            font-size: 1.05rem;
        }
        
        .booking-id {
            color: var(--accent-gold);
            font-weight: 600;
            font-family: 'Courier New', monospace;
        }
        
        .booking-date {
            color: var(--accent-silver);
            font-size: 0.9rem;
        }
        
        .service-name {
            padding: 0.4rem 1rem;
            background: rgba(46, 196, 182, 0.1);
            border-radius: 20px;
            color: var(--accent-teal);
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-block;
        }
        
        .amount {
            color: var(--accent-gold);
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .payment-status {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
        }
        
        .status-paid {
            background: rgba(76, 175, 80, 0.1);
            color: #4caf50;
            border: 1px solid rgba(76, 175, 80, 0.3);
        }
        
        .status-pending {
            background: rgba(255, 152, 0, 0.1);
            color: #ff9800;
            border: 1px solid rgba(255, 152, 0, 0.3);
        }
        
        .payment-date {
            color: var(--accent-silver);
            font-size: 0.9rem;
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
        
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .dashboard-title {
                font-size: 2rem;
            }
            
            .table-header {
                flex-direction: column;
                gap: 1.5rem;
                align-items: flex-start;
            }
            
            .custom-table {
                display: block;
                overflow-x: auto;
            }
        }
        
        /* Animation for table rows */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .custom-table tbody tr {
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }
        
        .custom-table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .custom-table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .custom-table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .custom-table tbody tr:nth-child(4) { animation-delay: 0.4s; }
        .custom-table tbody tr:nth-child(5) { animation-delay: 0.5s; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
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
    </style>
</head>

<body>
<?php
include ('database001.php');
$sql="SELECT * FROM bookinginfo_qry ORDER BY IC ASC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
?>

<div class="luxury-container">
    <div class="dashboard-header">
        <div class="watermark">ECW</div>
        <h1 class="dashboard-title">Exclusive Carwash</h1>
        <p class="dashboard-subtitle">Bookings Dashboard</p>
    </div>

    <div class="luxury-table-container">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-list-alt"></i>
                Complete Booking Information
            </h3>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th><i class="fas fa-id-card"></i> IC Number</th>
                    <th><i class="fas fa-user"></i> Customer Name</th>
                    <th><i class="fas fa-ticket-alt"></i> Booking ID</th>
                    <th><i class="fas fa-calendar"></i> Date</th>
                    <th><i class="fas fa-clock"></i> Time</th>
                    <th><i class="fas fa-spa"></i> Service</th>
                    <th><i class="fas fa-money-bill"></i> Amount</th>
                    <th><i class="fas fa-check-circle"></i> Payment Status</th>
                    <th><i class="fas fa-calendar-alt"></i> Payment Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $counter = 0;
                while ($row=mysqli_fetch_array($result)) {
                    $counter++;
                    
                    // Determine payment status
                    $status = strtolower($row["payment_status"]);
                    $status_class = 'status-pending';
                    if (strpos($status, 'thank') !== false || strpos($status, 'paid') !== false) {
                        $status_class = 'status-paid';
                    }
                    
                    echo "<tr>";
                    echo "<td><span class='customer-ic'>" . $row["IC"] . "</span></td>";
                    echo "<td><span class='customer-name'>" . $row["name"] . "</span></td>";
                    echo "<td><span class='booking-id'>" . $row["booking_id"] . "</span></td>";
                    echo "<td><span class='booking-date'>" . $row["booking_date"] . "</span></td>";
                    echo "<td><span class='booking-date'>" . $row["booking_time"] . "</span></td>";
                    echo "<td><span class='service-name'>" . $row["service_name"] . "</span></td>";
                    echo "<td class='amount'>RM " . $row["amount"] . "</td>";
                    echo "<td><span class='payment-status $status_class'>" . $row["payment_status"] . "</span></td>";
                    echo "<td><span class='payment-date'>" . $row["payment_date"] . "</span></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Add hover effects to table rows
    const tableRows = document.querySelectorAll('.custom-table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = 'rgba(212, 175, 55, 0.08)';
        });
        
        row.addEventListener('mouseleave', function() {
            const index = Array.from(tableRows).indexOf(this);
            const isEven = index % 2 === 0;
            this.style.backgroundColor = isEven ? 'rgba(40, 40, 40, 0.5)' : 'rgba(30, 30, 30, 0.8)';
        });
    });
    
    // Animate table rows on load
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('.custom-table tbody tr');
        rows.forEach((row, index) => {
            row.style.animationDelay = `${index * 0.1}s`;
        });
    });
</script>

</body>
</html>