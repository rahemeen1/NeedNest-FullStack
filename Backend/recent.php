<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
    header("Location: signup.php");
    exit();
}

// Get today's date and date 7 days ago
$today = date('Y-m-d');
$last_week = date('Y-m-d', strtotime('-7 days'));
 $username = $_SESSION['first_name'];

// Fetch money donations
$money_sql = "SELECT * FROM donatemoney WHERE donation_date BETWEEN '$last_week' AND '$today' AND username=\"$username\" ORDER BY donation_date DESC";

$money_result = mysqli_query($conn, $money_sql);

// Fetch item donations
$item_sql = "SELECT * FROM donateitem 
             WHERE DATE(created_at) BETWEEN '$last_week' AND '$today' 
             AND username = '$username' 
             ORDER BY created_at DESC";

$item_result = mysqli_query($conn, $item_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recent Donations</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto&display=swap" rel="stylesheet">
  <style>
    body {
        background-color: #f0fdf4;
        font-family: 'Roboto', sans-serif;
        color: #333;
    }

    .header {
        background-color: #14532d;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        margin-bottom: 40px;
        margin-top: 0;
        border-bottom: 4px solid #1e7e34;
    }

    .header h1 {
        font-family: 'Pacifico', cursive;
        font-size: 40px;
        color: #d4edda;
        margin: 0;
        letter-spacing: 2px;
    }
       
        .container {
            margin-top: 40px;
        }
        .card {
            border-radius: 16px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #444;
            margin: 20px 0;
        }
        .table th {
            background-color: #e2e8f0;
        }
         .btn-secondary {
        background-color: #14532d;
        border: none;
        transition: 0.3s;
    }

    .btn-secondary:hover {
        background-color: #1e7e34;
    }
    </style>
</head>
<body>
    <div class="header">
    <h1>NeedNest</h1>
</div>

<!-- Content -->
<div class="container">
    <div class="card p-4 mb-4">
        <h4 class="section-title">💸 Recent Money Donations (Last 7 Days)</h4>
        <?php if (mysqli_num_rows($money_result) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                       
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($money_result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td>Rs. <?php echo htmlspecialchars($row['amount']); ?></td>
                        <td><?php echo htmlspecialchars($row['donation_date']); ?></td>
                       
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p>No money donations found in the last week.</p>
        <?php endif; ?>
    </div>

    <div class="card p-4">
        <h4 class="section-title">🎁 Recent Item Donations (Last 7 Days)</h4>
        <?php if (mysqli_num_rows($item_result) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Item</th>
                        <th>Category</th>
                        <th>Condition</th> 
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($item_result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['category']); ?></td>
                        <td><?php echo htmlspecialchars($row['condition']); ?></td>
                        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p>No item donations found in the last week.</p>
        <?php endif; ?>
    </div>
</div>
 <div class="text-center mt-4">
        <a href="dashboard.php" class="btn btn-secondary px-4 py-2">Return to Dashboard</a>
    </div>
</body>
</html>
