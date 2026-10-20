<!DOCTYPE html>
<html>
<head>
<title>EliteShine - Bookings List</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background: linear-gradient(135deg, #0a0a0a 0%, #1a1a2e 100%);
        color: #f5f5f5;
        min-height: 100vh;
        padding: 30px 20px;
    }

    .luxury-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .header-section {
        text-align: center;
        margin-bottom: 40px;
        padding: 30px;
        background: rgba(20, 20, 30, 0.8);
        border-radius: 20px;
        border: 1px solid rgba(255, 215, 0, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .header-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.8rem;
        font-weight: 600;
        background: linear-gradient(to right, #FFD700, #FFED4E, #FFD700);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 15px;
        letter-spacing: 1px;
    }

    .header-subtitle {
        color: #aaa;
        font-size: 1.1rem;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .calendar-view {
        background: rgba(20, 20, 30, 0.8);
        border-radius: 20px;
        border: 1px solid rgba(255, 215, 0, 0.2);
        padding: 25px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .calendar-nav {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .btn-calendar {
        padding: 10px 20px;
        background: rgba(255, 215, 0, 0.1);
        color: #FFD700;
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-calendar:hover {
        background: rgba(255, 215, 0, 0.2);
        transform: translateY(-2px);
    }

    .current-month {
        font-size: 1.3rem;
        color: #FFD700;
        font-weight: 600;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
    }

    .calendar-day {
        background: rgba(255, 255, 255, 0.03);
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        min-height: 100px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }

    .calendar-day:hover {
        background: rgba(255, 215, 0, 0.05);
        border-color: rgba(255, 215, 0, 0.2);
    }

    .day-header {
        color: #FFD700;
        font-weight: 600;
        margin-bottom: 5px;
        font-size: 0.9rem;
    }

    .day-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 10px;
    }

    .booking-count {
        font-size: 0.8rem;
        color: #4caf50;
        background: rgba(76, 175, 80, 0.1);
        padding: 3px 8px;
        border-radius: 10px;
        display: inline-block;
    }

    .luxury-table-container {
        background: rgba(20, 20, 30, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(255, 215, 0, 0.2);
        padding: 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        margin-bottom: 40px;
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 215, 0, 0.1);
    }

    .table-title {
        font-size: 1.5rem;
        color: #FFD700;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .view-toggle {
        display: flex;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
        padding: 5px;
    }

    .view-btn {
        padding: 10px 20px;
        border-radius: 8px;
        background: transparent;
        color: #aaa;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .view-btn.active {
        background: rgba(255, 215, 0, 0.2);
        color: #FFD700;
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .custom-table thead {
        background: linear-gradient(135deg, rgba(255, 215, 0, 0.2), rgba(255, 215, 0, 0.1));
    }

    .custom-table th {
        padding: 18px 15px;
        color: #FFD700;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid rgba(255, 215, 0, 0.3);
        text-align: center;
    }

    .custom-table th i {
        margin-right: 10px;
        font-size: 1.1rem;
    }

    .custom-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .custom-table tbody tr:hover {
        background: rgba(255, 215, 0, 0.05);
        transform: translateX(5px);
    }

    .custom-table tbody tr:nth-child(even) {
        background: rgba(255, 255, 255, 0.02);
    }

    .custom-table td {
        padding: 16px 15px;
        color: #ddd;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        text-align: center;
        vertical-align: middle;
    }

    .booking-id {
        color: #FFD700;
        font-weight: 600;
        font-family: 'Courier New', monospace;
    }

    .customer-ic {
        color: #4dabf7;
        font-weight: 500;
    }

    .booking-date {
        color: #fff;
        font-weight: 500;
    }

    .booking-time {
        color: #aaa;
    }

    .booking-status {
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
    }

    .status-confirmed {
        background: rgba(76, 175, 80, 0.1);
        color: #4caf50;
        border: 1px solid rgba(76, 175, 80, 0.3);
    }

    .status-pending {
        background: rgba(255, 152, 0, 0.1);
        color: #ff9800;
        border: 1px solid rgba(255, 152, 0, 0.3);
    }

    .status-cancelled {
        background: rgba(244, 67, 54, 0.1);
        color: #f44336;
        border: 1px solid rgba(244, 67, 54, 0.3);
    }

    .status-completed {
        background: rgba(33, 150, 243, 0.1);
        color: #2196f3;
        border: 1px solid rgba(33, 150, 243, 0.3);
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
    }

    .btn-action {
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-view {
        background: rgba(0, 123, 255, 0.1);
        color: #4dabf7;
        border: 1px solid rgba(0, 123, 255, 0.3);
    }

    .btn-view:hover {
        background: rgba(0, 123, 255, 0.2);
        color: #fff;
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 2rem;
        }
        
        .table-header {
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
        }
        
        .view-toggle {
            width: 100%;
            justify-content: center;
        }
        
        .calendar-grid {
            grid-template-columns: repeat(3, 1fr);
        }
        
        .custom-table {
            display: block;
            overflow-x: auto;
        }
    }

    @media (max-width: 480px) {
        .calendar-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .calendar-day {
            min-height: 80px;
        }
    }
</style>
</head>

<body>
<?php
include ('database001.php');
$sql="SELECT * from bookings ORDER BY booking_id ASC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$total_bookings = mysqli_num_rows($result);
?>

<div class="luxury-container">
    <div class="header-section">
        <h1 class="header-title">Active Bookings Schedule</h1>
        <p class="header-subtitle">EliteShine Luxury Car Wash</p>
    </div>

    <div class="calendar-view">
        <div class="calendar-header">
            <div class="calendar-nav">
                <button class="btn-calendar"><i class="fas fa-chevron-left"></i></button>
                <div class="current-month">December 2023</div>
                <button class="btn-calendar"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="text-muted">
                <i class="fas fa-calendar-alt"></i>
                Total Bookings: <?php echo $total_bookings; ?>
            </div>
        </div>
        
        <div class="calendar-grid">
            <?php
            // Simplified calendar display
            $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
            for ($i = 1; $i <= 7; $i++) {
                $bookingCount = rand(0, 5);
                echo "<div class='calendar-day'>
                        <div class='day-header'>{$days[$i-1]}</div>
                        <div class='day-number'>" . (10+$i) . "</div>
                        <div class='booking-count'>{$bookingCount} bookings</div>
                      </div>";
            }
            ?>
        </div>
    </div>

    <div class="luxury-table-container">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-calendar-alt"></i>
                All Bookings
            </h3>
            <div class="view-toggle">
                <button class="view-btn active">All</button>
                <button class="view-btn">Today</button>
                <button class="view-btn">Upcoming</button>
                <button class="view-btn">Completed</button>
            </div>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th><i class="fas fa-hashtag"></i> Booking ID</th>
                    <th><i class="fas fa-id-card"></i> Customer IC</th>
                    <th><i class="fas fa-calendar"></i> Date</th>
                    <th><i class="fas fa-clock"></i> Time</th>
                    <th><i class="fas fa-check-circle"></i> Status</th>
                    <th><i class="fas fa-eye"></i> View</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($total_bookings > 0) {
                    $counter = 0;
                    while ($row=mysqli_fetch_array($result)) {
                        $counter++;
                        $booking_id = $row["booking_id"];
                        
                        // Determine status
                        $status = strtolower($row["status"]);
                        $status_class = 'status-pending';
                        if (strpos($status, 'confirm') !== false) $status_class = 'status-confirmed';
                        if (strpos($status, 'cancel') !== false) $status_class = 'status-cancelled';
                        if (strpos($status, 'complete') !== false) $status_class = 'status-completed';
                        
                        echo "<tr>";
                        echo "<td><span class='booking-id'>#" . $booking_id . "</span></td>";
                        echo "<td><span class='customer-ic'>" . $row["IC"] . "</span></td>";
                        echo "<td><span class='booking-date'>" . $row["booking_date"] . "</span></td>";
                        echo "<td><span class='booking-time'>" . $row["booking_time"] . "</span></td>";
                        echo "<td><span class='booking-status $status_class'>" . $row["status"] . "</span></td>";
                        echo "<td>
                                <div class='action-buttons'>
                                    <a href='booking_details.php?id=$booking_id' class='btn-action btn-view'>
                                        <i class='fas fa-eye'></i> Details
                                    </a>
                                </div>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align: center; padding: 40px; color: #666;'>
                            <i class='fas fa-calendar-times' style='font-size: 3rem; margin-bottom: 15px; display: block;'></i>
                            No bookings found
                          </td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Calendar navigation
    document.querySelectorAll('.btn-calendar').forEach(btn => {
        btn.addEventListener('click', function() {
            // In real app, this would change the calendar view
            console.log('Calendar navigation clicked');
        });
    });
    
    // View toggle functionality
    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // In real app, this would filter the table
            console.log('View changed to:', this.textContent);
        });
    });
    
    // Add hover effects to table rows
    const tableRows = document.querySelectorAll('.custom-table tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = 'rgba(255, 215, 0, 0.05)';
        });
        
        row.addEventListener('mouseleave', function() {
            const isEven = Array.from(tableRows).indexOf(this) % 2 === 0;
            this.style.backgroundColor = isEven ? 'rgba(255, 255, 255, 0.02)' : 'transparent';
        });
    });
    
    // Animate calendar days on hover
    const calendarDays = document.querySelectorAll('.calendar-day');
    calendarDays.forEach(day => {
        day.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        day.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
</script>
</body>
</html>