<?php 
include('dbConnection.php');

if(isset($_REQUEST['rSignup'])){
    //checking for empty fields
    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")){
        $regmsg =  '<div class="alert alert-warning mt-2" role="alert">All fields are required.<div>';
    }else{
        //email already registered
        $sql = "SELECT r_email FROM requesterlogin_tb WHERE r_email = '".$_REQUEST['rEmail']."'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $regmsg = '<div class = "alert alert-warning mt-2" role="alert">Email ID already registered</div>';
        } else{
            //assigning user's values to variables
            $rName = $_REQUEST['rName'];
            $rEmail = $_REQUEST['rEmail'];
            $rPassword = $_REQUEST['rPassword'];

            $sql = "INSERT INTO requesterlogin_tb(r_name, r_email, r_password) VALUES('$rName', '$rEmail', '$rPassword')";

            if($conn->query($sql) == TRUE){
                $regmsg = '<div class="alert alert-success mt-2" role="alert">Account Created Successfully.</div>';
            }
            else{
                $regmsg = '<div class="alert alert-danger mt-2" role="alert>Unable to create account</div>';
            }

       }
    
    }
} 


?>



<!-- Start Registration Form -->
<div class="container pt-5" id="registration">
    <h2 class="text-center">Create an Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <label for="name" class="font-weight-bold pl-2"><i class="fas fa-user pr-2"></i>Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="rName" required>
                </div>

                <div class="form-group">
                    <label for="email" class="font-weight-bold pl-2"><i class="fas fa-user pr-2"></i>Email</label>
                    <input type="email" class="form-control" placeholder="Name" name="rEmail" required>
                    <small class="form-text">Your email will not be shared with anyone</small>
                </div>

                <div class="form-group">
                    <label for="password" class="font-weight-bold pl-2"><i class="fas fa-key pr-2"></i>New Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="rPassword" required>
                </div>

                <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup">Sign Up</button>
                <em style="font-size: 12px;">Note- By Clicking Sign Up, you agree to our terms, data policy and cookie policy</em>

                <?php if(isset($regmsg)) {echo $regmsg;}?>
            </form>
        </div>
    </div>
</div> <!-- End Registration Form -->