<?php
session_start();

// Optional login check
if (!isset($_SESSION['admin_email'])) {
    header("Location: adminlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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
        border-bottom: 4px solid #1e7e34;
    }

    .header h1 {
        font-family: 'Pacifico', cursive;
        font-size: 40px;
        color: #d4edda;
        margin: 0;
        letter-spacing: 2px;
    }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-title {
            font-size: 1.25rem;
            color: #3ca55c;
            font-weight: bold;
        }

    
        .dashboard-heading {
            margin-top: 30px;
            color: #3ca55c;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>


<!-- Include Bootstrap and Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="header d-flex justify-content-between align-items-center p-3" style="color: white;">
    <h1 class="m-0">NeedNest</h1>

    <!-- Three-dot Dropdown Menu -->
    <div class="dropdown">
        <i class="bi bi-three-dots-vertical" id="adminMenu" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.5rem; cursor: pointer;"></i>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminMenu">
            <li><a class="dropdown-item" href="adminsetting.php">Admin Settings</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
    </div>
</div>

<!-- Add Bootstrap JS for dropdown to work -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- Dashboard -->
<div class="container mt-4">
    <h2 class="dashboard-heading">Welcome to the Admin Dashboard</h2>

    <div class="row mt-5">
        <div class="col-md-4 mb-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">Click to view, edit, or delete user accounts.</p>
                    <a href="manageusers.php" class="btn btn-success">Go to Users</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Total Donations</h5>
                    <p class="card-text">Click to view total donations of NeedNest</p>
                    <a href="admindonations.php" class="btn btn-success">Review Items</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Reports</h5>
                    <p class="card-text">View reports and analytics about platform activity.</p>
                    <a href="report.php" class="btn btn-success">View Reports</a>
                </div>
            </div>
        </div>

       <div class="col-md-4 mb-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Pending Donations</h5>
                    <p class="card-text">Review and approve pending item listings..</p>
                    <a href="adminpending.php" class="btn btn-success">View Donations</a>
                </div>
            </div>
        </div> <div class="col-md-4 mb-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Approved Donations</h5>
                    <p class="card-text">View reports and analytics about platform activity.</p>
                    <a href="adminapprove.php" class="btn btn-success">View Reports</a>
                </div>
            </div>
        </div> <div class="col-md-4 mb-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Give Badge</h5>
                    <p class="card-text">Assign users badge according to their donations.</p>
                    <a href="adminbadge.php" class="btn btn-success">View Badges</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Change Contact Info</h5>
                    <p class="card-text">View and Change Website Contact Us Information.</p>
                    <a href="changecontact.php" class="btn btn-success">Change Contact Info</a>
                </div>
            </div>
        </div> <div class="col-md-4 mb-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Edit Testimonials</h5>
                    <p class="card-text">View and update the testimonials on the website.</p>
                    <a href="manageTestimonial.php" class="btn btn-success">View Testimonials</a>
                </div>
            </div>
        </div> <div class="col-md-4 mb-4">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">Edit Mission & Vision</h5>
                    <p class="card-text">Update the mission and vision statements of the organization.</p>
                    <a href="manage_mission_vision.php" class="btn btn-success">Edit Mission & Vision</a>
                </div>
            </div>
        </div>

</body>
</html>
