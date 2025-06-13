<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php"); // Redirect to login if not logged in
    exit();
}

$firstName = $_SESSION['first_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            color: #333;
            font-family: 'Arial', sans-serif;
        }
        .sidebar {
            background-color:rgb(19, 85, 35);
            color: white;
            height: 100vh;
            padding-top: 20px;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999;
            padding-left: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px;
            display: block;
            margin-bottom: 10px;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #218838;
        }
        .sidebar .dropdown-menu {
            background-color: #28a745;
        }
        .sidebar .dropdown-item:hover {
            background-color: #218838;
        }
        .main-content {
            margin-left: 270px;
            padding: 30px;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card-header {
            background-color:rgb(19, 85, 35);
            color: white;
            font-size: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .card-body {
            color: #555;
            padding: 20px;
        }
        .btn-primary, .btn-success, .btn-info {
            background-color: #28a745;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover, .btn-success:hover, .btn-info:hover {
            background-color: #218838;
        }
        .dropdown-toggle {
            background-color: #28a745;
            color: white;
            border: none;
        }
        .dropdown-menu a:hover {
            background-color:rgb(19, 85, 35);
            color: white;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar position-fixed top-0 left-0">
    <h3 class="text-white mb-4">Dashboard</h3>
    <a href="dashboard.php">Home</a>
    <a href="profile.php">Profile</a>

    <!-- Donations Dropdown -->
    <div class="dropdown">
        <a href="#" role="button" id="donationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Donations 🔽
        </a>
        <ul class="dropdown-menu w-100" aria-labelledby="donationsDropdown">
            <li><a class="dropdown-item" href="totaldonations.php?action=view_all">View Total Donations</a></li>
            <li><a class="dropdown-item" href="newdonation.php?action=make_new">Make a New Donation</a></li>
            <li><a class="dropdown-item" href="pending.php?action=pending">Pending Donations</a></li>
            <li><a class="dropdown-item" href="approved.php?action=approved">Approved Donations</a></li>
            <li><a class="dropdown-item" href="rejected.php?action=rejected">Rejected Donations</a></li>
        </ul>
    </div>
    <a href="userbadge.php">My Badge</a>

<a href="#" onclick="confirmLogout()" >Logout</a>

</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Welcome, <?php echo $firstName; ?>!</h2>
                    </div>
                    <div class="card-body">
                        <p>Explore your dashboard to manage donations, profile, and more.</p>
                    </div>
                </div>

                <!-- Dashboard Overview -->
                <div class="row">
                    <!-- User Profile Card -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">User Profile</div>
                            <div class="card-body text-center">
                                <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
                                <p><a href="profile.php" class="btn btn-primary">View Profile</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Donations Card -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Recent Donations</div>
                            <div class="card-body text-center">
                                <p>Recent Donations.</p>
                                <p><a href="recent.php?action=make_new" class="btn btn-success">Click to see</a></p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">My Badge</div>
                            <div class="card-body text-center">
                                <p>Click to view my badge.</p>
                                <p><a href="userbadge.php" class="btn btn-success">View My Badge</a></p>
                            </div>
                        </div>
                    </div>

                  

                <!-- Content for Donations -->
                <div class="row">
                    <?php
                    if (isset($_GET['action'])) {
                        $action = $_GET['action'];

                        if ($action == 'view_all') {
                            echo '<div class="col-12"><div class="card"><div class="card-body"><h4>Total Donations</h4><p>Displaying total donations here.</p></div></div></div>';
                        } elseif ($action == 'make_new') {
                            echo '<div class="col-12"><div class="card"><div class="card-body"><h4>Make a New Donation</h4><p>Form to make a donation will go here.</p></div></div></div>';
                        } elseif ($action == 'pending') {
                            echo '<div class="col-12"><div class="card"><div class="card-body"><h4>Pending Donations</h4><p>List of pending donations here.</p></div></div></div>';
                        } elseif ($action == 'approved') {
                            echo '<div class="col-12"><div class="card"><div class="card-body"><h4>Approved Donations</h4><p>List of approved donations here.</p></div></div></div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function confirmLogout() {
    if (confirm("Are you sure you want to logout?")) {
      window.location.href = "logout.php";
    }
  }
</script>

</body>
</html>
