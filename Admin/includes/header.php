<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include('../dbConnection.php'); // Connect to servicedb

if (!isset($_SESSION['is_adminlogin']) || !isset($_SESSION['aEmail'])) {
    echo "<script>location.href='dashboard.php'</script>";
    exit;
}

$adminEmail = $_SESSION['aEmail'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE; ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <style>
        .container-fluid {
            min-height: 100vh;
        }
        .sidebar {
            min-width: 200px;
            background-color: #e9ecef;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            height: 100vh;
            position: fixed; /* fix position */
            top: 56px; /* below navbar */
            left: 0;
            overflow-y: auto; /* enable scroll if sidebar too tall */
            padding-top: 20px;
            z-index: 1030;
        }

        main {
            margin-left: 200px; /* avoid content under sidebar */
        }

                /* Center content wrapper */
        .centered-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        /* For work.php, reduce top margin */
        .work-content {
            margin-top: 20px; /* smaller margin, adjust as needed */
        }


        .sidebar .nav-link {
            color: #000000 !important;
            font-weight: bold;
            white-space: nowrap;
            padding: 8px 8px;
        }
        .sidebar .nav-link i {
            color: #000000 !important;
            margin-right: 16px;
        }
        /* Restored and improved hover effect */
        .sidebar .nav-link:hover {
            background-color: #f0aab1;
            border-left: 4px solid #dc3545;
            color: #000 !important;
        }
        .sidebar .nav-link.active {
            background-color: #f0aab1;
            border-left: 4px solid #dc3545;
            width: 100%;
        }
        /* Center card headers */
        .card-header {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
        <a href="dashboard.php" class="navbar-brand col-sm-3 col-md-2 mr-0">ServiceEase</a>
    </nav>

    <!-- Container -->
    <div class="container-fluid" style="margin-top: 40px;">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-sm-2 sidebar py-5">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'dashboard') { echo 'active'; } ?>" href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'work') { echo 'active'; } ?>" href="work.php">
                                <i class="fas fa-file-alt"></i> Work Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'request') { echo 'active'; } ?>" href="request.php">
                                <i class="fas fa-comments"></i> Requests
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'assets') { echo 'active'; } ?>" href="assets.php">
                                <i class="fas fa-cubes"></i> Assets
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'technician') { echo 'active'; } ?>" href="technician.php">
                                <i class="fas fa-users"></i> Technicians
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'requesters') { echo 'active'; } ?>" href="requester.php">
                                <i class="fas fa-users"></i> Requesters
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'soldproductreport') { echo 'active'; } ?>" href="soldproductreport.php">
                                <i class="fas fa-table"></i> Sell Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'workreport') { echo 'active'; } ?>" href="workreport.php">
                                <i class="fas fa-table"></i> Work Report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'changepass') { echo 'active'; } ?>" href="changepass.php">
                                <i class="fas fa-key"></i> Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
