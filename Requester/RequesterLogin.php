<?php
include('../dbConnection.php');

session_start();
if (!isset($_SESSION['is_login'])) {
    if (isset($_REQUEST['rEmail'])) {
        $rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
        $rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));

        $sql = "SELECT r_email, r_password FROM requesterlogin_tb WHERE r_email = '" . $rEmail . "' AND r_password = '" . $rPassword . "' LIMIT 1";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $_SESSION['is_login'] = true;
            $_SESSION['rEmail'] = $rEmail;
            echo "<script>location.href='RequesterProfile.php';</script>";
            exit;
        } else {
            $msg = '<div class="alert alert-warning mt-2">Enter valid Email and Password</div>';
        }
    }
} else {
    echo "<script>location.href='RequesterProfile.php';</script>";
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS (CDN for reliability) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome CSS (CDN only, remove local file) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">

    <style>
        .custom-margin{
            margin-top: 8vh;
        }
        
    </style>

    <title>Login</title>
</head>
<body>
    <div class="mb-3 mt-5 text-center" style="font-size: 30px;">
        <i class="fas fa-stethoscope"></i>
        <span>ServiceEase Management System</span>
    </div>
    <p class="text-center" style="font-size: 20px;"><i class="fas fa-user-secret text-danger"></i>User Login Area</p>

    <div class="container-fluid">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email" class="form-control" placeholder="Email" name="rEmail">
                        <small class="form-text">Your email will not be shared with anyone.</small>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Passsword</label><input type="password" class="form-control" placeholder="Password" name="rPassword">
                    </div>

                    <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm">Login</button>

                    <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                    ?>
                </form>

                <div class="text-center">
                    <a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    



<!-- Javascript Files-->  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>