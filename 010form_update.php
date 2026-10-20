<?php
include ('database001.php');

/* ===============================
   GET BOOKING DATA
   =============================== */
if (!isset($_GET['booking_id'])) {
    die("Booking ID not found.");
}

$booking_id = mysqli_real_escape_string($conn, $_GET['booking_id']);

$query = "SELECT * FROM bookings WHERE booking_id='$booking_id'";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Booking record not found.");
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>EliteShine | Update Booking</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Google Fonts -->
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
        max-width: 900px;
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
        font-size: 2.5rem;
        font-weight: 600;
        background: linear-gradient(to right, #FFD700, #FFED4E, #FFD700);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin-bottom: 10px;
        letter-spacing: 1px;
    }

    .header-subtitle {
        color: #aaa;
        font-size: 1rem;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .luxury-card {
        background: rgba(20, 20, 30, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        border: 1px solid rgba(255, 215, 0, 0.2);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, rgba(255, 215, 0, 0.2), rgba(255, 215, 0, 0.1));
        border-bottom: 1px solid rgba(255, 215, 0, 0.2);
        padding: 25px 30px;
    }

    .card-title {
        font-size: 1.5rem;
        color: #FFD700;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }

    .card-body {
        padding: 40px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .form-group {
        margin-bottom: 0;
    }

    .form-label {
        color: #ddd;
        font-weight: 500;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: #FFD700;
        font-size: 1.1rem;
        width: 20px;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 215, 0, 0.2);
        border-radius: 10px;
        color: #fff;
        padding: 14px 18px;
        font-size: 1rem;
        transition: all 0.3s ease;
        height: auto;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.08);
        border-color: #FFD700;
        box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.1);
        color: #fff;
    }

    .form-control:read-only {
        background: rgba(255, 255, 255, 0.03);
        border-color: rgba(255, 215, 0, 0.1);
        color: #aaa;
        cursor: not-allowed;
    }

    .form-control:read-only:focus {
        background: rgba(255, 255, 255, 0.03);
        border-color: rgba(255, 215, 0, 0.1);
        box-shadow: none;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23FFD700' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 18px center;
        background-size: 16px;
        padding-right: 45px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn {
        padding: 14px 30px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .btn-back {
        background: rgba(255, 255, 255, 0.05);
        color: #ddd;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-back:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-submit {
        background: linear-gradient(135deg, rgba(255, 215, 0, 0.2), rgba(255, 215, 0, 0.1));
        color: #FFD700;
        border: 1px solid rgba(255, 215, 0, 0.3);
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, rgba(255, 215, 0, 0.3), rgba(255, 215, 0, 0.2));
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(255, 215, 0, 0.2);
    }

    @media (max-width: 768px) {
        .header-title {
            font-size: 2rem;
        }
        
        .card-body {
            padding: 25px;
        }
        
        .form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 15px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
</head>

<body>
<div class="luxury-container">
    <!-- Header Section -->
    <div class="header-section">
        <h1 class="header-title">Update Booking</h1>
        <p class="header-subtitle">EliteShine Luxury Car Wash</p>
    </div>

    <!-- Booking Card -->
    <div class="luxury-card">
        <!-- Card Header -->
        <div class="card-header">
            <h2 class="card-title">
                <i class="fas fa-edit"></i>
                Update Booking Details
            </h2>
        </div>

        <!-- Card Body -->
        <div class="card-body">
            <!-- Update Form -->
            <form action="011pros_update.php" method="post">
                <div class="form-grid">
                    <!-- Booking ID -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-hashtag"></i>
                            Booking ID
                        </label>
                        <input type="text" 
                               name="ud_booking_id" 
                               class="form-control" 
                               value="<?php echo $data['booking_id']; ?>" 
                               readonly>
                    </div>

                    <!-- IC -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-id-card"></i>
                            Identity Card (IC)
                        </label>
                        <input type="text" 
                               name="ud_IC" 
                               class="form-control" 
                               value="<?php echo $data['IC']; ?>" 
                               required readonly>
                    </div>

                    <!-- Booking Date -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-calendar"></i>
                            Booking Date
                        </label>
                        <input type="date" 
                               name="ud_booking_date" 
                               class="form-control" 
                               value="<?php echo $data['booking_date']; ?>" 
                               required>
                    </div>

                    <!-- Booking Time -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-clock"></i>
                            Booking Time
                        </label>
                        <input type="time" 
                               name="ud_booking_time" 
                               class="form-control" 
                               value="<?php echo $data['booking_time']; ?>" 
                               required>
                    </div>

                    <!-- Status -->
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label">
                            <i class="fas fa-check-circle"></i>
                            Status
                        </label>
                        <select name="ud_status" class="form-control" required>
                            <option value="Pending" <?php if($data['status']=="Pending") echo "selected"; ?>>Pending</option>
                            <option value="Confirmed" <?php if($data['status']=="Confirmed") echo "selected"; ?>>Confirmed</option>
                            <option value="Completed" <?php if($data['status']=="Completed") echo "selected"; ?>>Completed</option>
                            <option value="Cancelled" <?php if($data['status']=="Cancelled") echo "selected"; ?>>Cancelled</option>
                        </select>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="tabledata_edit&deletebooking.php" class="btn btn-back">
                        <i class="fas fa-arrow-left"></i>
                        Cancel
                    </a>
                    <button type="submit" name="SUBMIT" class="btn btn-submit">
                        <i class="fas fa-save"></i>
                        Update Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Add visual feedback for form inputs
    const formInputs = document.querySelectorAll('.form-control');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            if (!this.readOnly) {
                this.style.borderColor = '#FFD700';
                this.style.boxShadow = '0 0 0 3px rgba(255, 215, 0, 0.1)';
            }
        });
        
        input.addEventListener('blur', function() {
            if (!this.readOnly) {
                this.style.borderColor = 'rgba(255, 215, 0, 0.2)';
                this.style.boxShadow = 'none';
            }
        });
    });
    
    // Initialize date picker with restrictions
    const dateInput = document.querySelector('input[name="ud_booking_date"]');
    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;
    
    // Set max date to 3 months from now
    const maxDate = new Date();
    maxDate.setMonth(maxDate.getMonth() + 3);
    dateInput.max = maxDate.toISOString().split('T')[0];
</script>
</body>
</html>