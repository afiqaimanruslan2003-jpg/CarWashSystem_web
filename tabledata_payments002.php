<!DOCTYPE html>
<html>
<head>
<title>Exclusive Carwash - Payment List</title>
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
        --text-light: #F5F5F5;
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
        background: var(--card-dark);
        border-radius: 20px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
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
        font-size: 2.8rem;
        font-weight: 700;
        background: linear-gradient(to right, var(--accent-gold), var(--accent-teal));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 10px;
        letter-spacing: 1px;
    }

    .header-subtitle {
        color: var(--accent-silver);
        font-size: 1.1rem;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .revenue-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: rgba(30, 30, 40, 0.6);
        border-radius: 15px;
        padding: 25px;
        border: 1px solid rgba(212, 175, 55, 0.1);
        transition: all 0.3s ease;
        text-align: center;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        border-color: rgba(212, 175, 55, 0.3);
        box-shadow: 0 10px 25px rgba(212, 175, 55, 0.1);
    }

    .stat-icon {
        font-size: 2.5rem;
        color: var(--accent-gold);
        margin-bottom: 15px;
    }

    .stat-value {
        font-size: 2.2rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 5px;
    }

    .stat-label {
        color: var(--accent-silver);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .luxury-table-container {
        background: var(--card-dark);
        border-radius: 20px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        padding: 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        margin-bottom: 40px;
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
        background: linear-gradient(to right, var(--accent-teal), var(--accent-gold));
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(212, 175, 55, 0.1);
    }

    .table-title {
        font-size: 1.5rem;
        color: var(--accent-gold);
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        font-family: 'Montserrat', sans-serif;
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .custom-table thead {
        background: linear-gradient(135deg, rgba(212, 175, 55, 0.15), rgba(212, 175, 55, 0.05));
    }

    .custom-table th {
        padding: 18px 15px;
        color: var(--accent-gold);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid rgba(212, 175, 55, 0.3);
        text-align: left;
        font-family: 'Montserrat', sans-serif;
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
        padding: 16px 15px;
        color: #ddd;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .payment-id {
        color: var(--accent-teal);
        font-weight: 600;
        font-family: 'Courier New', monospace;
    }

    .booking-id {
        color: #4dabf7;
        font-weight: 500;
    }

    .payment-method {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-block;
    }

    .method-card {
        background: rgba(46, 196, 182, 0.1);
        color: var(--accent-teal);
        border: 1px solid rgba(46, 196, 182, 0.3);
    }

    .method-cash {
        background: rgba(212, 175, 55, 0.1);
        color: var(--accent-gold);
        border: 1px solid rgba(212, 175, 55, 0.3);
    }

    .method-online {
        background: rgba(156, 39, 176, 0.1);
        color: #9c27b0;
        border: 1px solid rgba(156, 39, 176, 0.3);
    }

    .payment-amount {
        color: var(--accent-gold);
        font-weight: 600;
        font-size: 1.1rem;
    }

    .payment-status {
        padding: 6px 15px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
        letter-spacing: 0.5px;
    }

    .status-paid {
        background: rgba(46, 196, 182, 0.1);
        color: var(--accent-teal);
        border: 1px solid rgba(46, 196, 182, 0.3);
    }

    .status-pending {
        background: rgba(212, 175, 55, 0.1);
        color: var(--accent-gold);
        border: 1px solid rgba(212, 175, 55, 0.3);
    }

    .status-failed {
        background: rgba(244, 67, 54, 0.1);
        color: #f44336;
        border: 1px solid rgba(244, 67, 54, 0.3);
    }

    .payment-date {
        color: #aaa;
        font-size: 0.9rem;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
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
        font-family: 'Montserrat', sans-serif;
    }

    .btn-edit {
        background: rgba(46, 196, 182, 0.1);
        color: var(--accent-teal);
        border: 1px solid rgba(46, 196, 182, 0.3);
    }

    .btn-edit:hover {
        background: rgba(46, 196, 182, 0.2);
        color: #fff;
    }

    .btn-receipt {
        background: rgba(212, 175, 55, 0.1);
        color: var(--accent-gold);
        border: 1px solid rgba(212, 175, 55, 0.3);
    }

    .btn-receipt:hover {
        background: rgba(212, 175, 55, 0.2);
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
        
        .custom-table {
            display: block;
            overflow-x: auto;
        }
        
        .revenue-stats {
            grid-template-columns: 1fr;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 5px;
        }
        
        .btn-action {
            width: 100%;
            justify-content: center;
        }
    }
</style>
</head>

<body>
<?php
include ('database001.php');
$sql="SELECT * from payments ORDER BY payment_id ASC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

// Calculate totals
$total_payments = mysqli_num_rows($result);
$sql_total = "SELECT SUM(amount) as total_amount FROM payments";
$result_total = mysqli_query($conn, $sql_total);
$total_row = mysqli_fetch_assoc($result_total);
$total_revenue = $total_row['total_amount'] ?? 0;
?>

<div class="luxury-container">
    <div class="header-section">
        <h1 class="header-title">Financial Transactions</h1>
        <p class="header-subtitle">EXCLUSIVE CARWASH</p>
    </div>

    <div class="revenue-stats">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <div class="stat-value">RM <?php echo number_format($total_revenue, 2); ?></div>
            <div class="stat-label">Total Revenue</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-receipt"></i>
            </div>
            <div class="stat-value"><?php echo $total_payments; ?></div>
            <div class="stat-label">Total Transactions</div>
        </div>
    </div>

    <div class="luxury-table-container">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-credit-card"></i>
                Payment History
            </h3>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th><i class="fas fa-hashtag"></i> Payment ID</th>
                    <th><i class="fas fa-calendar-check"></i> Booking ID</th>
                    <th><i class="fas fa-wallet"></i> Method</th>
                    <th><i class="fas fa-money-bill-wave"></i> Amount</th>
                    <th><i class="fas fa-check-circle"></i> Status</th>
                    <th><i class="fas fa-calendar-alt"></i> Date</th>
                    <th><i class="fas fa-cogs"></i> Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $counter = 0;
                while ($row=mysqli_fetch_array($result)) {
                    $counter++;
                    
                    // Determine payment method class
                    $method = strtolower($row["payment_method"]);
                    $method_class = 'method-card';
                    if (strpos($method, 'cash') !== false) $method_class = 'method-cash';
                    if (strpos($method, 'online') !== false) $method_class = 'method-online';
                    
                    // Determine status class
                    $status = strtolower($row["payment_status"]);
                    $status_class = 'status-pending';
                    if (strpos($status, 'paid') !== false || strpos($status, 'thank') !== false) $status_class = 'status-paid';
                    if (strpos($status, 'fail') !== false) $status_class = 'status-failed';
                    
                    echo "<tr>";
                    echo "<td><span class='payment-id'>#" . $row["payment_id"] . "</span></td>";
                    echo "<td><span class='booking-id'>#" . $row["booking_id"] . "</span></td>";
                    echo "<td><span class='payment-method $method_class'>" . $row["payment_method"] . "</span></td>";
                    echo "<td class='payment-amount'>RM " . number_format($row["amount"], 2) . "</td>";
                    echo "<td><span class='payment-status $status_class'>" . $row["payment_status"] . "</span></td>";
                    echo "<td><span class='payment-date'>" . $row["payment_date"] . "</span></td>";
                    echo "<td>
                    
                            <div class='action-buttons'> 
                                <a href=\"011form_updatepayment.php?payment_id=" . $row["payment_id"] . "\" class='btn-action btn-edit'>
                                    <i class='fas fa-edit'></i> Edit
                                </a>
                                <a href='payment_receipt.php?payment_id=" . $row["payment_id"] . "' class='btn-action btn-receipt'>
                                    <i class='fas fa-receipt'></i> Receipt
                                </a>
                            </div>
                          </td>";
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
            this.style.backgroundColor = 'rgba(212, 175, 55, 0.05)';
        });
        
        row.addEventListener('mouseleave', function() {
            const isEven = Array.from(tableRows).indexOf(this) % 2 === 0;
            this.style.backgroundColor = isEven ? 'rgba(255, 255, 255, 0.02)' : 'transparent';
        });
    });

    // Animate stat cards on hover
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
</script>
</body>
</html>