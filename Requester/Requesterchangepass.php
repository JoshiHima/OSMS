<?php
define('TITLE', 'Change Password');
define('PAGE', 'Requesterchangepass');

include('includes/header.php');
include('../dbConnection.php');

// Check if session is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['is_login'])){
    $rEmail = $_SESSION['rEmail']; 
} else {
    echo "<script>location.href='RequesterLogin.php'</script>";
    exit;
}

$passmsg = ''; // Initialize message variable

if(isset($_REQUEST['passupdate'])) {
    if(empty($_REQUEST['rPassword'])) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please fill the password field!! <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
    } else {
        $rPass = $_REQUEST['rPassword'];
        // Use prepared statement to prevent SQL injection
        $sql = "UPDATE requesterlogin_tb SET r_password = ? WHERE r_email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Prepare failed: ' . htmlspecialchars($conn->error) . ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        } else {
            $stmt->bind_param("ss", $rPass, $rEmail);
            if($stmt->execute()) {
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Password updated successfully!! <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            } else {
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to update password!! <button type="button" class="close" data-dismiss="alert">&times;</button></div>';
            }
            $stmt->close();
        }
    }
}
?>

<div class="col-sm-9 col-md-10"> <!-- Start User Change Password 2nd column-->
    <form class="mt-5 mx-5" action="" method="POST">
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" value="<?php echo htmlspecialchars($rEmail); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="inputnewpassword">New Password</label>
            <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="rPassword">
        </div>
        <button type="submit" class="btn btn-danger mr-4 mt-4" name="passupdate">Update</button>
        <button type="reset" class="btn btn-secondary mt-4">Reset</button>
        <?php if(!empty($passmsg)) { echo $passmsg; } ?>
    </form>
</div> <!-- End User Change Password 2nd column-->

<?php
include('includes/footer.php');
?>