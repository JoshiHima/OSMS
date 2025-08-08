<?php
define('TITLE', 'Success');
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

// Validate myid parameter
$requestId = isset($_REQUEST['myid']) && is_numeric($_REQUEST['myid']) ? (int)$_REQUEST['myid'] : (isset($_SESSION['myid']) && is_numeric($_SESSION['myid']) ? (int)$_SESSION['myid'] : null);
if ($requestId === null) {
    echo "<div class='ml-5 mt-5 alert alert-warning col-sm-6'>Invalid or missing request ID!! <button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
    include('includes/footer.php');
    exit;
}

// Query using prepared statement
$sql = "SELECT * FROM submitrequest_tb WHERE request_id = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo "<div class='ml-5 mt-5 alert alert-danger col-sm-6'>Prepare failed: " . htmlspecialchars($conn->error) . " <button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
    include('includes/footer.php');
    exit;
}
$stmt->bind_param("i", $requestId);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 1){
    $row = $result->fetch_assoc();
?>

<style>
    .table-container {
        width: 100%;
        max-width: 100%;
    }
    .btn-print {
        width: 100%; /* Match table width */
        max-width: 100%;
    }
    @media print {
        .sidebar, .navbar {
            display: none !important; /* Hide sidebar and navbar */
        }
        .container-fluid, .row {
            margin: 0 !important; /* Remove parent margins */
            padding: 0 !important;
            width: 100% !important;
        }
        .ml-5.mt-5 {
            margin: 0 !important; /* Remove margins */
            padding: 0 !important;
            text-align: center !important; /* Fallback centering */
        }
        .table-container {
            margin: 0 auto !important; /* Center container */
            width: auto !important;
            max-width: 600px !important; /* Limit width */
            page-break-inside: avoid; /* Prevent table splitting */
        }
        .table {
            font-size: 14px !important; /* Keep font size */
            width: 100% !important; /* Full width within container */
            max-width: 600px !important; /* Match container */
            margin: 0 auto !important; /* Center table */
            page-break-inside: avoid; /* Ensure single page */
        }
        .table td, .table th {
            padding: 8px !important; /* Keep compact padding */
        }
        body, html {
            margin: 0 !important;
            padding: 0 !important;
        }
        @page {
            margin: 0.5cm !important; /* Minimal page margins */
        }
    }
</style>

<div class='ml-5 mt-5'>
    <div class='table-container'>
        <table class='table table-bordered table-striped' style='box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; font-size: 15px;'>
        <tbody>
            <tr style='text-align: center;'>
                <th style='padding: 12px;'>Request ID</th>
                <td style='padding: 12px;'><?php echo htmlspecialchars($row['request_id']); ?></td>
            </tr>
            <tr style='text-align: center;'>
                <th style='padding: 12px;'>Name</th>
                <td style='padding: 12px;'><?php echo htmlspecialchars($row['requester_name']); ?></td>
            </tr>
            <tr style='text-align: center;'>
                <th style='padding: 12px;'>Email ID</th>
                <td style='padding: 12px;'><?php echo htmlspecialchars($row['requester_email']); ?></td>
            </tr>
            <tr style='text-align: center;'>
                <th style='padding: 12px;'>Request Info</th>
                <td style='padding: 12px;'><?php echo htmlspecialchars($row['request_info']); ?></td>
            </tr>
            <tr style='text-align: center;'>
                <th style='padding: 12px;'>Request Description</th>
                <td style='padding: 12px;'><?php echo htmlspecialchars($row['request_desc']); ?></td>
            </tr>
            <tr style='text-align: center;'>
                <td colspan='2' style='padding: 12px;'>
                    <button class='btn btn-danger d-print-none w-100 btn-print' onclick='window.print()'>Print</button>
                </td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
<?php
} else {
    echo "<div class='ml-5 mt-5 alert alert-warning col-sm-6'>Request not found!! <button type='button' class='close' data-dismiss='alert'>&times;</button></div>";
}
$stmt->close();

include('includes/footer.php');
?>