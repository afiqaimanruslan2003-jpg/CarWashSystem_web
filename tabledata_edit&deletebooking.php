<!DOCTYPE html>
<html>
<head>
<title>Exclusive Carwash - Manage Bookings</title>
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

    .management-tools {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding: 20px;
        background: rgba(212, 175, 55, 0.05);
        border: 1px solid rgba(212, 175, 55, 0.1);
        border-radius: 15px;
    }

    .tools-left {
        display: flex;
        gap: 15px;
    }

    .btn-tool {
        padding: 12px 25px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-family: 'Montserrat', sans-serif;
    }

    .btn-add {
        background: linear-gradient(135deg, rgba(46, 196, 182, 0.2), rgba(46, 196, 182, 0.1));
        color: var(--accent-teal);
        border: 1px solid rgba(46, 196, 182, 0.3);
    }

    .btn-add:hover {
        background: linear-gradient(135deg, rgba(46, 196, 182, 0.3), rgba(46, 196, 182, 0.2));
        color: #fff;
        transform: translateY(-3px);
    }

    .btn-refresh {
        background: rgba(33, 150, 243, 0.1);
        color: #2196f3;
        border: 1px solid rgba(33, 150, 243, 0.3);
    }

    .btn-refresh:hover {
        background: rgba(33, 150, 243, 0.2);
        color: #fff;
        transform: translateY(-3px);
    }

    .search-box {
        position: relative;
        width: 300px;
    }

    .search-input {
        width: 100%;
        padding: 12px 20px 12px 45px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(212, 175, 55, 0.2);
        border-radius: 10px;
        color: #fff;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--accent-gold);
        box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--accent-gold);
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
        text-align: center;
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
        text-align: center;
        vertical-align: middle;
    }

    .booking-id {
        color: var(--accent-teal);
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
        letter-spacing: 0.5px;
    }

    .status-confirmed {
        background: rgba(46, 196, 182, 0.1);
        color: var(--accent-teal);
        border: 1px solid rgba(46, 196, 182, 0.3);
    }

    .status-pending {
        background: rgba(212, 175, 55, 0.1);
        color: var(--accent-gold);
        border: 1px solid rgba(212, 175, 55, 0.3);
    }

    .status-cancelled {
        background: rgba(244, 67, 54, 0.1);
        color: #f44336;
        border: 1px solid rgba(244, 67, 54, 0.3);
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
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
    }

    .btn-delete {
        background: rgba(244, 67, 54, 0.1);
        color: #f44336;
        border: 1px solid rgba(244, 67, 54, 0.3);
    }

    .btn-delete:hover {
        background: rgba(244, 67, 54, 0.2);
        color: #fff;
        transform: translateY(-2px);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #666;
    }

    .empty-icon {
        font-size: 4rem;
        color: var(--accent-gold);
        margin-bottom: 20px;
        opacity: 0.3;
    }

    .confirmation-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background: rgba(30, 30, 40, 0.95);
        border-radius: 20px;
        padding: 40px;
        max-width: 500px;
        width: 90%;
        border: 1px solid rgba(212, 175, 55, 0.3);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .modal-title {
        color: var(--accent-gold);
        margin-bottom: 20px;
        font-size: 1.5rem;
        font-family: 'Montserrat', sans-serif;
    }

    .modal-message {
        color: #ddd;
        margin-bottom: 30px;
        line-height: 1.6;
    }

    .modal-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }

    .btn-modal {
        padding: 12px 25px;
        border-radius: 10px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Montserrat', sans-serif;
    }

    .btn-cancel {
        background: rgba(255, 255, 255, 0.05);
        color: #ddd;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-cancel:hover {
        background: rgba(255, 255, 255, 0.1);
    }

    .btn-confirm {
        background: rgba(244, 67, 54, 0.2);
        color: #f44336;
        border: 1px solid rgba(244, 67, 54, 0.3);
    }

    .btn-confirm:hover {
        background: rgba(244, 67, 54, 0.3);
        color: #fff;
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 2rem;
        }
        
        .management-tools {
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
        }
        
        .search-box {
            width: 100%;
        }
        
        .custom-table {
            display: block;
            overflow-x: auto;
        }
        
        .action-buttons {
            flex-wrap: wrap;
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
        <h1 class="header-title">Booking Management</h1>
        <p class="header-subtitle">Edit & Delete Bookings</p>
    </div>

    <div class="management-tools">
        <div class="tools-left">
            <a href="new_form_users003.html" class="btn-tool btn-add">
                <i class="fas fa-plus-circle"></i>
                Add New Booking
            </a>
            <a href="#" class="btn-tool btn-refresh" onclick="location.reload()">
                <i class="fas fa-sync-alt"></i>
                Refresh List
            </a>
        </div>
        <div class="search-box">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Search bookings...">
        </div>
    </div>

    <div class="luxury-table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th><i class="fas fa-hashtag"></i> Booking ID</th>
                    <th><i class="fas fa-id-card"></i> Customer IC</th>
                    <th><i class="fas fa-calendar-alt"></i> Date</th>
                    <th><i class="fas fa-clock"></i> Time</th>
                    <th><i class="fas fa-check-circle"></i> Status</th>
                    <th><i class="fas fa-cogs"></i> Actions</th>
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
                        if (strpos($status, 'complete') !== false) $status_class = 'status-confirmed';
                        
                        echo "<tr>";
                        echo "<td><span class='booking-id'>#" . $booking_id . "</span></td>";
                        echo "<td><span class='customer-ic'>" . $row["IC"] . "</span></td>";
                        echo "<td><span class='booking-date'>" . $row["booking_date"] . "</span></td>";
                        echo "<td><span class='booking-time'>" . $row["booking_time"] . "</span></td>";
                        echo "<td><span class='booking-status $status_class'>" . $row["status"] . "</span></td>";
                        echo "<td>
                                <div class='action-buttons'>
                                    <a href=\"010form_update.php?booking_id=$booking_id\" class='btn-action btn-edit'>
                                        <i class='fas fa-edit'></i> Edit
                                    </a>
                                    <a href=\"#\" class='btn-action btn-delete' onclick=\"showDeleteConfirmation('$booking_id')\">
                                        <i class='fas fa-trash'></i> Delete
                                    </a>
                                </div>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>
                            <div class='empty-state'>
                                <div class='empty-icon'>
                                    <i class='fas fa-calendar-times'></i>
                                </div>
                                <h3>No Bookings Found</h3>
                                <p>Start by adding your first booking</p>
                            </div>
                          </td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmationModal" class="confirmation-modal">
    <div class="modal-content">
        <h3 class="modal-title">
            <i class="fas fa-exclamation-triangle"></i>
            Confirm Deletion
        </h3>
        <p class="modal-message" id="modalMessage">
            Are you sure you want to delete this booking? This action cannot be undone.
        </p>
        <div class="modal-actions">
            <button class="btn-modal btn-cancel" onclick="hideModal()">Cancel</button>
            <button class="btn-modal btn-confirm" id="confirmDelete">Delete Booking</button>
        </div>
    </div>
</div>

<script>
    let bookingToDelete = null;
    
    function showDeleteConfirmation(bookingId) {
        bookingToDelete = bookingId;
        document.getElementById('modalMessage').innerHTML = 
            `Are you sure you want to delete booking <strong>#${bookingId}</strong>? This action cannot be undone.`;
        document.getElementById('confirmationModal').style.display = 'flex';
    }
    
    function hideModal() {
        document.getElementById('confirmationModal').style.display = 'none';
        bookingToDelete = null;
    }
    
    document.getElementById('confirmDelete').addEventListener('click', function() {
        if (bookingToDelete) {
            // In real application, this would redirect to delete script
            window.location.href = `012pros_delete.php?booking_id=${bookingToDelete}`;
        }
    });
    
    // Search functionality
    document.querySelector('.search-input').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('.custom-table tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
    
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
    
    // Close modal when clicking outside
    document.getElementById('confirmationModal').addEventListener('click', function(e) {
        if (e.target === this) {
            hideModal();
        }
    });
</script>
</body>
</html>