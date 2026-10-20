<!DOCTYPE html>
<html>
<head>
<title>Exclusive Carwash | Services List</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

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
        color: var(--text-light);
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
        padding: 40px;
        background: var(--card-darker);
        border-radius: 20px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        box-shadow: var(--shadow-luxury);
        position: relative;
        overflow: hidden;
    }

    .header-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
    }

    .header-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 10px;
        letter-spacing: 1px;
        text-shadow: 0 0 30px rgba(212, 175, 55, 0.2);
    }

    .header-subtitle {
        color: var(--accent-silver);
        font-size: 1.1rem;
        letter-spacing: 3px;
        text-transform: uppercase;
        margin-top: 10px;
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

    /* Services Table */
    .luxury-table-container {
        background: var(--card-darker);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
        box-shadow: var(--shadow-luxury);
        position: relative;
        overflow: hidden;
    }

    .luxury-table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .table-title {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.8rem;
        color: var(--accent-gold);
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .table-title i {
        font-size: 1.5rem;
    }

    .stats-box {
        background: rgba(212, 175, 55, 0.1);
        padding: 12px 25px;
        border-radius: 10px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .stats-box i {
        color: var(--accent-gold);
        font-size: 1.2rem;
    }

    .stats-text {
        color: var(--accent-gold);
        font-weight: 600;
        font-size: 1.1rem;
    }

    .stats-number {
        color: var(--text-light);
        font-weight: 700;
        margin-left: 5px;
    }

    /* Custom Table */
    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .custom-table thead {
        background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(212, 175, 55, 0.05));
    }

    .custom-table th {
        padding: 20px 15px;
        color: var(--accent-gold);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: 'Montserrat', sans-serif;
        border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        text-align: left;
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
        background: rgba(212, 175, 55, 0.05);
        transform: translateX(5px);
    }

    .custom-table tbody tr:nth-child(even) {
        background: rgba(255, 255, 255, 0.02);
    }

    .custom-table td {
        padding: 18px 15px;
        color: #ddd;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    /* Table Cells Styling */
    .service-id-cell {
        font-family: 'Courier New', monospace;
        font-weight: 600;
        color: var(--accent-teal);
    }

    .booking-id-cell {
        font-family: 'Courier New', monospace;
        color: #4dabf7;
        font-weight: 500;
    }

    .car-type-cell {
        padding: 8px 16px;
        background: rgba(0, 123, 255, 0.1);
        border-radius: 20px;
        color: #4dabf7;
        font-weight: 500;
        font-size: 0.9rem;
        display: inline-block;
    }

    .service-type-cell {
        font-weight: 500;
        color: var(--text-light);
    }

    .service-price-cell {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        color: var(--accent-gold);
        font-size: 1.2rem;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
        font-family: 'Montserrat', sans-serif;
    }

    .btn-edit {
        background: rgba(212, 175, 55, 0.1);
        color: var(--accent-gold);
        border: 1px solid rgba(212, 175, 55, 0.3);
    }

    .btn-edit:hover {
        background: rgba(212, 175, 55, 0.2);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.2);
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 2.2rem;
        }
        
        .header-section {
            padding: 30px 20px;
        }
        
        .table-header {
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
        }
        
        .custom-table {
            display: block;
            overflow-x: auto;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 8px;
        }
        
        .btn-action {
            width: 100%;
            justify-content: center;
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
<?php
include ('database001.php');
$sql="SELECT * from services ORDER BY service_id ASC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$total_services = mysqli_num_rows($result);
?>

<div class="luxury-container">
    <div class="header-section">
        <div class="watermark">ECW</div>
        <h1 class="header-title">Services History</h1>
        <p class="header-subtitle">EXCLUSIVE CARWASH</p>
        <p class="mt-3" style="color: var(--accent-silver); max-width: 800px; margin: 20px auto 0; line-height: 1.6;">
            View all service records with vehicle and service details. Click Edit to update individual services.
        </p>
    </div>

    <!-- Services Table -->
    <div class="luxury-table-container">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-history"></i>
                Service Records
            </h3>
            <div class="stats-box">
                <i class="fas fa-chart-line"></i>
                <span class="stats-text">Total Services: <span class="stats-number"><?php echo $total_services; ?></span></span>
            </div>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th><i class="fas fa-hashtag"></i> ID</th>
                    <th><i class="fas fa-calendar-check"></i> Booking ID</th>
                    <th><i class="fas fa-car"></i> Vehicle Type</th>
                    <th><i class="fas fa-spa"></i> Service Type</th>
                    <th><i class="fas fa-money-bill-wave"></i> Price</th>
                    <th><i class="fas fa-cogs"></i> Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $counter = 0;
                while ($row=mysqli_fetch_array($result)) {
                    $counter++;
                    
                    echo "<tr>";
                    echo "<td><span class='service-id-cell'>#" . $row["service_id"] . "</span></td>";
                    echo "<td><span class='booking-id-cell'>#" . $row["booking_id"] . "</span></td>";
                    echo "<td><span class='car-type-cell'>" . $row["type_car"] . "</span></td>";
                    echo "<td><span class='service-type-cell'>" . $row["service_name"] . "</span></td>";
                    echo "<td class='service-price-cell'>RM " . number_format($row["price"], 2) . "</td>";
                    echo "<td>
                            <div class='action-buttons'>
                                <a href='011form_updateservices.php?service_id=" . $row["service_id"] . "' class='btn-action btn-edit'>
                                    <i class='fas fa-edit'></i> Edit
                                </a>
                            </div>
                          </td>";
                    echo "</tr>";
                }
                
                if ($total_services == 0) {
                    echo "<tr><td colspan='6' style='text-align: center; padding: 40px; color: var(--accent-silver);'>
                            <i class='fas fa-info-circle' style='font-size: 2rem; margin-bottom: 15px; color: var(--accent-gold); display: block;'></i>
                            No service records found
                          </td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Add fade-in animation to table rows
    const tableRows = document.querySelectorAll('.custom-table tbody tr');
    tableRows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            row.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Add animation to header
    const header = document.querySelector('.header-section');
    header.style.opacity = '0';
    header.style.transform = 'translateY(-20px)';
    
    setTimeout(() => {
        header.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
        header.style.opacity = '1';
        header.style.transform = 'translateY(0)';
    }, 300);

    // Add hover effects to table rows
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.backgroundColor = 'rgba(212, 175, 55, 0.05)';
        });
        
        row.addEventListener('mouseleave', function() {
            const isEven = Array.from(tableRows).indexOf(this) % 2 === 0;
            this.style.backgroundColor = isEven ? 'rgba(255, 255, 255, 0.02)' : 'transparent';
        });
    });

    // Add hover effects to action buttons
    const actionButtons = document.querySelectorAll('.btn-action');
    actionButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
</script>
</body>
</html>