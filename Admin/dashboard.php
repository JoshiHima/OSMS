<?php
define('TITLE', 'dashboard');
define('PAGE', 'dashboard');
include('includes/header.php');
include('../dbConnection.php');
?>

<!-- Main Content -->
<main class="col-sm-10 py-5">
    <div class="centered-content">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['aName'] ?? 'Admin'); ?>!</h1>
        <p>This is the admin dashboard for ServiceEase. Use the sidebar to manage all the admin tasks.</p>
    </div>


    <div class="container-fluid px-4"> <!-- Start Dashboard Grid -->
        <div class="row g-4"> <!-- Start first column -->
            <div class="col-md-4 col-sm-6">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Requests Received</div>
                    <div class="card-body text-center">
                        <h4 class="card-title">43</h4>
                        <a class="btn btn-light btn-sm" href="#">View</a>
                    </div>
                </div>
            </div> <!-- End first column -->

            <div class="col-md-4 col-sm-6"> <!-- Start 2nd column -->
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Assigned Work</div>
                    <div class="card-body text-center">
                        <h4 class="card-title">12</h4>
                        <a class="btn btn-light btn-sm" href="#">View</a>
                    </div>
                </div>
            </div> <!-- End 2nd column -->

            <div class="col-md-4 col-sm-6">  <!-- Start 3rd column-->
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Technicians</div>
                    <div class="card-body text-center">
                        <h4 class="card-title">8</h4>
                        <a class="btn btn-light btn-sm" href="#">View</a>
                    </div>
                </div> <!-- End 3rd column-->
            </div>
        </div>

        <div class="max-5 mt-5 text-center">
            <p class="bg-secondary text-white p-2">List of Requesters</p>
            <?php
                $sql = "SELECT r_login_id, r_email, r_name FROM requesterlogin_tb";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    echo '
                    <div style="overflow: hidden;">
                    <table class="table table-bordered table-striped" style="box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-radius: 8px;">
                        <thead>
                            <tr>
                                <th scope="col">Requester ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>';
                        while($row = $result->fetch_assoc()){
                            echo '<tr>';
                            echo '<td>' . $row['r_login_id'] . '</td>';
                            echo '<td>' . $row['r_name'] . '</td>';
                            echo '<td>' . $row['r_email'] . '</td>';
                            echo '</tr>';
                        }      
                    echo '</tbody>
                    </table>               
                    </div>';
                }
                else{
                    echo '<div class="alert alert-warning mt-2">No Requesters Found</div>';
                }
            ?>
        </div>
<?php include('includes/footer.php'); ?>
