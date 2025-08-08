<?php
// Define constants if not already defined
defined('TITLE') || define('TITLE', 'ServiceEase');
defined('PAGE') || define('PAGE', basename($_SERVER['PHP_SELF'], '.php'));

// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Inline CSS -->
    <style>
        .container-fluid {
            min-height: 100vh; /* Full viewport height */
        }
        .sidebar {
            min-width: 200px;
            background-color: #e9ecef;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            height: 100%;
            box-sizing: border-box;
            overflow: hidden; /* Clip any overflow */
        }
        .sidebar .nav-link {
            color: #000000 !important;
            font-weight: bold;
            white-space: nowrap;
            box-sizing: border-box;
            padding: 8px 8px; /* Further reduced padding */
        }
        .sidebar .nav-link i {
            color: #000000 !important;
            margin-right: 16px;
            white-space: nowrap;
        }
        .sidebar .nav-link:hover {
            color: #333333 !important;
        }
        .sidebar .nav-link.active {
            background-color: #f0aab1;
            border-left: 4px solid #dc3545;
            white-space: nowrap;
            width: calc(100% - 4px); /* Account for border */
            margin-left: 0; /* Remove negative margin */
        }
        .alert {
            white-space: nowrap;
            display: inline-block;
            width: 100%;
            margin-top: 10px;
        }
        .form-control {
            width: 120%;
            max-width: 500px;
        }
    </style>
    <title><?php echo TITLE; ?></title>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-0 shadow">
        <a href="RequesterProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">ServiceEase</a>
    </nav>
    <!-- Container -->
    <div class="container-fluid" style="margin-top: 40px;">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-sm-2 sidebar py-5">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'RequesterProfile') { echo 'active'; } ?>" href="RequesterProfile.php">
                                <i class="fas fa-user"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'SubmitRequest') { echo 'active'; } ?>" href="SubmitRequest.php">
                                <i class="fas fa-file-alt"></i> Submit Request
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'CheckStatus') { echo 'active'; } ?>" href="CheckStatus.php">
                                <i class="fas fa-clipboard-check"></i> Service Status
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if (PAGE == 'Requesterchangepass') { echo 'active'; } ?>" href="Requesterchangepass.php">
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
            <!-- End Sidebar -->