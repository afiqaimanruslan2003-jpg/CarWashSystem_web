<!DOCTYPE html>
<html>
<head>
<title>EliteShine - Customer List</title>
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
        max-width: 1200px;
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

    .stats-card {
        background: rgba(255, 215, 0, 0.05);
        border: 1px solid rgba(255, 215, 0, 0.1);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        gap: 20px;
    }

    .stat-item {
        text-align: center;
        padding: 15px 25px;
        min-width: 200px;
    }

    .stat-icon {
        font-size: 2.5rem;
        color: #FFD700;
        margin-bottom: 10px;
    }

    .stat-value {
        font-size: 2.2rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 5px;
    }

    .stat-label {
        color: #aaa;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
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

    .search-box {
        position: relative;
        width: 300px;
    }

    .search-input {
        width: 100%;
        padding: 12px 20px 12px 45px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 10px;
        color: #fff;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: #FFD700;
        box-shadow: 0 0 15px rgba(255, 215, 0, 0.2);
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
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
    }

    .customer-id {
        color: #FFD700;
        font-weight: 600;
        font-family: 'Courier New', monospace;
    }

    .customer-name {
        font-weight: 500;
        color: #fff;
    }

    .customer-phone {
        color: #aaa;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .btn-edit, .btn-delete {
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-edit {
        background: rgba(255, 193, 7, 0.1);
        color: #FFD700;
        border: 1px solid rgba(255, 193, 7, 0.3);
    }

    .btn-edit:hover {
        background: rgba(255, 193, 7, 0.2);
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

    .pagination-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .page-btn {
        padding: 10px 20px;
        background: rgba(255, 255, 255, 0.05);
        color: #ddd;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .page-btn:hover {
        background: rgba(255, 215, 0, 0.1);
        color: #FFD700;
        border-color: rgba(255, 215, 0, 0.3);
    }

    .page-btn.active {
        background: rgba(255, 215, 0, 0.2);
        color: #FFD700;
        border-color: #FFD700;
        font-weight: 600;
    }

    .export-btn {
        background: linear-gradient(135deg, rgba(255, 215, 0, 0.2), rgba(255, 215, 0, 0.1));
        color: #FFD700;
        border: 1px solid rgba(255, 215, 0, 0.3);
        padding: 12px 25px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
        text-decoration: none;
    }

    .export-btn:hover {
        background: linear-gradient(135deg, rgba(255, 215, 0, 0.3), rgba(255, 215, 0, 0.2));
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(255, 215, 0, 0.2);
        color: #fff;
        text-decoration: none;
    }

    /* SMALLER DELETE MODAL STYLES */
    .delete-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s ease;
    }

    .delete-modal.show {
        display: flex;
    }

    .delete-modal-content {
        background: rgba(25, 25, 35, 0.95);
        border-radius: 15px;
        width: 90%;
        max-width: 400px; /* Smaller width */
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
        border: 2px solid rgba(244, 67, 54, 0.3);
        overflow: hidden;
        animation: slideUp 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .delete-modal-header {
        padding: 20px;
        background: linear-gradient(135deg, rgba(244, 67, 54, 0.2) 0%, rgba(211, 47, 47, 0.1) 100%);
        border-bottom: 1px solid rgba(244, 67, 54, 0.3);
        text-align: center;
    }

    .delete-modal-icon {
        font-size: 2.8rem; /* Smaller icon */
        color: #f44336;
        margin-bottom: 10px;
    }

    .delete-modal-title {
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        color: #ff6b6b;
        font-size: 1.5rem; /* Smaller title */
        margin-bottom: 5px;
    }

    .delete-modal-subtitle {
        color: #aaa;
        font-size: 0.8rem; /* Smaller subtitle */
    }

    .delete-modal-body {
        padding: 20px; /* Less padding */
        text-align: center;
    }

    .delete-modal-message {
        color: #ddd;
        font-size: 1rem; /* Smaller text */
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .customer-id-highlight {
        background: rgba(244, 67, 54, 0.1);
        padding: 12px 20px; /* Smaller padding */
        border-radius: 8px;
        border: 1px solid rgba(244, 67, 54, 0.3);
        margin: 15px 0;
        font-family: 'Courier New', monospace;
        font-size: 1.1rem; /* Smaller font */
        color: #ff6b6b;
        font-weight: 600;
    }

    .customer-name-highlight {
        background: rgba(244, 67, 54, 0.1);
        padding: 12px 20px; /* Smaller padding */
        border-radius: 8px;
        border: 1px solid rgba(244, 67, 54, 0.3);
        margin: 15px 0;
        font-family: 'Montserrat', sans-serif;
        font-size: 1.1rem; /* Smaller font */
        color: #ff6b6b;
        font-weight: 600;
    }

    .delete-warning {
        background: rgba(244, 67, 54, 0.1);
        border-radius: 8px;
        padding: 12px; /* Smaller padding */
        margin: 15px 0;
        border-left: 3px solid #f44336; /* Smaller border */
    }

    .delete-warning p {
        color: #ff6b6b;
        margin: 0;
        font-size: 0.85rem; /* Smaller font */
    }

    .delete-modal-footer {
        padding: 15px 20px; /* Smaller padding */
        background: rgba(30, 30, 40, 0.8);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        justify-content: center;
        gap: 15px; /* Smaller gap */
    }

    .btn-modal-cancel {
        background: rgba(108, 117, 125, 0.8);
        color: white;
        border: none;
        padding: 10px 20px; /* Smaller padding */
        border-radius: 6px;
        font-weight: 600;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s;
        cursor: pointer;
        min-width: 120px; /* Smaller width */
        font-size: 0.9rem; /* Smaller font */
    }

    .btn-modal-cancel:hover {
        background: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
    }

    .btn-modal-delete {
        background: linear-gradient(135deg, #f44336 0%, #d32f2f 100%);
        color: white;
        border: none;
        padding: 10px 20px; /* Smaller padding */
        border-radius: 6px;
        font-weight: 600;
        font-family: 'Montserrat', sans-serif;
        transition: all 0.3s;
        cursor: pointer;
        min-width: 120px; /* Smaller width */
        font-size: 0.9rem; /* Smaller font */
    }

    .btn-modal-delete:hover {
        background: linear-gradient(135deg, #d32f2f 0%, #f44336 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(244, 67, 54, 0.3);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideUp {
        from { 
            opacity: 0; 
            transform: translateY(20px); 
        }
        to { 
            opacity: 1; 
            transform: translateY(0); 
        }
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
        
        .search-box {
            width: 100%;
        }
        
        .custom-table {
            display: block;
            overflow-x: auto;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 5px;
        }
        
        .btn-edit, .btn-delete {
            width: 100%;
            justify-content: center;
        }
        
        .delete-modal-content {
            max-width: 90%; /* Responsive on mobile */
            margin: 20px;
        }
        
        .delete-modal-footer {
            flex-direction: column;
        }
        
        .btn-modal-cancel, .btn-modal-delete {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .delete-modal-content {
            max-width: 95%;
            margin: 10px;
        }
        
        .delete-modal-header {
            padding: 15px;
        }
        
        .delete-modal-body {
            padding: 15px;
        }
        
        .delete-modal-footer {
            padding: 15px;
        }
    }
</style>
</head>

<body>
<?php
include ('database001.php');
$sql="SELECT * from users ORDER BY IC ASC";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
$total_customers = mysqli_num_rows($result);
?>

<div class="luxury-container">
    <div class="header-section">
        <h1 class="header-title">Premium Customer Registry</h1>
        <p class="header-subtitle">EliteShine Luxury Car Wash</p>
    </div>

    <div class="stats-card">
        <div class="stat-item">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value"><?php echo $total_customers; ?></div>
            <div class="stat-label">Total Customers</div>
        </div>
        
        <div class="stat-item">
            <div class="stat-icon">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="stat-value"><?php echo rand(85, 95); ?>%</div>
            <div class="stat-label">Satisfaction Rate</div>
        </div>
        
        <div class="stat-item">
            <div class="stat-icon">
                <i class="fas fa-calendar-star"></i>
            </div>
            <div class="stat-value"><?php echo rand(120, 180); ?></div>
            <div class="stat-label">Monthly Visits</div>
        </div>
    </div>

    <div class="luxury-table-container">
        <div class="table-header">
            <h3 class="table-title">
                <i class="fas fa-id-card"></i>
                Customer Directory
            </h3>
            <div class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Search customers...">
            </div>
        </div>

        <table class="custom-table">
            <thead>
                <tr>
                    <th><i class="fas fa-fingerprint"></i> Identity Number</th>
                    <th><i class="fas fa-user-tie"></i> Customer Name</th>
                    <th><i class="fas fa-phone-alt"></i> Contact Details</th>
                    <th><i class="fas fa-cogs"></i> Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $counter = 0;
                while ($row=mysqli_fetch_array($result)) {
                    $counter++;
                    $row_class = $counter % 2 == 0 ? 'even' : 'odd';
                    echo "<tr class='$row_class'>";
                    echo "<td><span class='customer-id' id='customer_ic_" . $counter . "'>" . $row["IC"] . "</span></td>";
                    echo "<td><span class='customer-name' id='customer_name_" . $counter . "'>" . $row["name"] . "</span></td>";
                    echo "<td><div class='customer-phone'><i class='fas fa-phone'></i>" . $row["phone"] . "</div></td>";
                    echo "<td>
                            <div class='action-buttons'>
                                <a href='011form_updateusers.php?IC=" . $row["IC"] . "' class='btn-edit'><i class='fas fa-edit'></i> Edit</a>
                                <button class='btn-delete' onclick='openDeleteModal(\"" . $row["IC"] . "\", \"" . addslashes($row["name"]) . "\", " . $counter . ")'><i class='fas fa-trash'></i> Delete</button>
                            </div>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="pagination-container">
            <a href="#" class="page-btn"><i class="fas fa-chevron-left"></i> Previous</a>
            <a href="#" class="page-btn active">1</a>
            <a href="#" class="page-btn">2</a>
            <a href="#" class="page-btn">3</a>
            <a href="#" class="page-btn">Next <i class="fas fa-chevron-right"></i></a>
        </div>

        <center>
            <a href="#" class="export-btn">
                <i class="fas fa-download"></i>
                Export Customer List
            </a>
        </center>
    </div>
</div>

<!-- SMALLER DELETE CONFIRMATION MODAL -->
<div class="delete-modal" id="deleteModal">
    <div class="delete-modal-content">
        <div class="delete-modal-header">
            <div class="delete-modal-icon">⚠</div>
            <h3 class="delete-modal-title">Confirm Deletion</h3>
            <p class="delete-modal-subtitle">CUSTOMER MANAGEMENT</p>
        </div>
        
        <div class="delete-modal-body">
            <p class="delete-modal-message">Are you sure you want to delete this customer?</p>
            
            <div class="customer-name-highlight" id="customerNameDisplay">John Doe</div>
            <div class="customer-id-highlight" id="customerICDisplay">IC: 123456-78-9012</div>
            
            <p class="delete-modal-message">This action cannot be undone.</p>
            
            <div class="delete-warning">
                <p>⚠ All customer data will be permanently removed.</p>
            </div>
        </div>
        
        <div class="delete-modal-footer">
            <button type="button" class="btn-modal-cancel" id="cancelDeleteBtn">Cancel</button>
            <!-- This form will submit to your delete PHP file -->
            <form action="011pros_deleteusers.php" method="post" id="deleteForm" style="display: inline;">
                <input type="hidden" name="delete_IC" id="deleteICInput" value="">
                <button type="submit" class="btn-modal-delete">Delete Customer</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Variables to store customer data
    let currentCustomerIC = '';
    let currentCustomerName = '';

    // Function to open delete modal
    function openDeleteModal(customerIC, customerName, rowIndex) {
        currentCustomerIC = customerIC;
        currentCustomerName = customerName;
        
        // Update modal display
        document.getElementById('customerNameDisplay').textContent = customerName;
        document.getElementById('customerICDisplay').textContent = 'IC: ' + customerIC;
        document.getElementById('deleteICInput').value = customerIC;
        
        // Show modal
        document.getElementById('deleteModal').classList.add('show');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
        
        // Set focus to cancel button for accessibility
        setTimeout(() => {
            document.getElementById('cancelDeleteBtn').focus();
        }, 100);
    }

    // Function to close delete modal
    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.remove('show');
        document.body.style.overflow = ''; // Restore scrolling
        currentCustomerIC = '';
        currentCustomerName = '';
    }

    // Event Listeners
    document.addEventListener('DOMContentLoaded', function() {
        // Cancel button
        document.getElementById('cancelDeleteBtn').addEventListener('click', closeDeleteModal);
        
        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && document.getElementById('deleteModal').classList.contains('show')) {
                closeDeleteModal();
            }
        });
        
        // Search functionality
        const searchInput = document.querySelector('.search-input');
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.custom-table tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });
        
        // Add row hover effects
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
        
        // Form submission handler (optional additional confirmation)
        document.getElementById('deleteForm').addEventListener('submit', function(e) {
            // You can add additional validation here if needed
            console.log('Deleting customer:', currentCustomerIC, currentCustomerName);
        });
    });

    // Old confirmation function (kept for compatibility)
    function confirmDeleteOld() {
        return confirm('Are you sure you want to delete this customer? This action cannot be undone.');
    }
</script>
</body>
</html>