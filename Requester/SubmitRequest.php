<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Dynamic title for the page
define('TITLE', 'Submit Request');
define('PAGE', 'SubmitRequest');

include('includes/header.php');
include('../dbConnection.php');

// Check if session is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail']; 
} else{
    echo "<script>location.href='RequesterLogin.php'</script>";
}

if(isset($_REQUEST['submitrequest'])){
    // Checking for empty fields
    if(($_REQUEST['requestinfo'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") 
        || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") 
        || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterZip'] == "") || ($_REQUEST['requesteremail'] == "") || 
        ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requestdate'] == "")){
        $msg = "<div class='alert alert-warning col-sm-6 ml-5 mt-2'>Please fill the the fields properly!! <button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
    } else {
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requestdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterZip'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rdate = $_REQUEST['requestdate'];

        $sql = "INSERT INTO submitrequest_tb (request_info, request_desc, requester_name, requester_add1, 
                requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, 
                request_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Debug: Prepare failed: " . htmlspecialchars($conn->error) . " <button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
        } else {
            $stmt->bind_param("sssssssssss", $rinfo, $rdesc, $rname, $radd1, $radd2, $rcity, $rstate, $rzip, $remail, $rmobile, $rdate);
            if($stmt->execute()){
                $genid = $conn->insert_id; // Get the last inserted ID
                $_SESSION['myid'] = $genid; // Store the ID in session
                header("Location: submitrequestsuccess.php?myid=$genid"); // Redirect with myid
                exit;
            } else {
                $msg = "<div class='alert alert-danger col-sm-6 ml-5 mt-2'>Unable to submit the request!! <button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
            }
            $stmt->close();
        }
    }
}
?>

<style>
    .form-row.spaced-row .form-group {
        margin-right: 4px; /* Small gap */
        margin-left: 4px;
    }
    .form-row.spaced-row .form-group .form-control {
        width: 100%; /* Fit within column */
        max-width: 100%; /* Override header.php's 120% */
    }
    .form-row.spaced-row {
        display: flex;
        flex-wrap: nowrap; /* Prevent wrapping */
    }
</style>

<div class="col-sm-9 col-md-10 mt-5"> <!-- Start Service Request Form 2nd column-->
<form class="mx-5" action="" method="POST">
    <div class="form-group">
        <label for="inputRequestInfo">Request Info</label>
        <input type="text" class="form-control" id="inputRequestInfo" placeholder="Enter your request details" name="requestinfo">
    </div>
    <div class="form-group">
        <label for="inputRequestDescription">Description</label>
        <input type="text" class="form-control" id="inputRequestDescription" placeholder="Describe your request" name="requestdesc">
    </div>
    <div class="form-group">
        <label for="inputName">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Enter your name" name="requestername">
    </div>
    <div class="form-row spaced-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Address Line 1</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="House No." name="requesteradd1">
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress2">Address Line 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Your Address." name="requesteradd2">
        </div>
    </div>
    <div class="form-row spaced-row">
        <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" name="requestercity">
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <input type="text" class="form-control" id="inputState" name="requesterstate">
        </div>
        <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip" name="requesterZip" onkeypress="isInputNumber(event)">
        </div>
    </div>
    <div class="form-row spaced-row">
        <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="requesteremail" value="<?php echo htmlspecialchars($rEmail); ?>" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="inputMobile">Mobile No.</label>
            <input type="text" class="form-control" id="inputMobile" name="requestermobile" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group col-md-2">
            <label for="inputDate">Date</label>
            <input type="date" class="form-control" id="inputDate" name="requestdate">
        </div>
    </div>
    <button type="submit" class="btn btn-danger" name="submitrequest">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</form>
<?php if(isset($msg)) {echo $msg;} ?>
</div> <!-- End Service Request Form 2nd column-->

<!-- Only number for input fields-->
<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>

<?php
include('includes/footer.php');
?>