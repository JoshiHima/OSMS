<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS (CDN for reliability) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Font Awesome CSS (CDN only, remove local file) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    
    <!-- Custom Style -->
    <style>
        .navbar-nav.pl-5 {
            margin-left: 120px;
        }
        @media (max-width: 768px) {
            .navbar-nav.pl-5 {
                margin-left: 0;
            }
        }
        a{
            color: black;
        }
        .active{
            color: white;
            background-color: #dc3545;
        }
        a:hover{
            color: #f26571;
        }
        .fi-color{
            color: #dc3545;
        }
        .fi-color:hover{
            color: #e994a2;
        }
    </style>
    
    <title>ServiceEase</title>
</head>
<body>

<!-- Start Navigation -->
<nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
    <a href="index.php" class="navbar-brand">ServiceEase</a>
    <span class="navbar-text ml-3 mr-auto">Customer's satisfaction is our Aim.</span>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="myMenu">
        <ul class="navbar-nav pl-5 custom-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
            <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
            <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>
        </ul>
    </div>
</nav> <!-- End Navigation -->

<!-- Start Header Jumbotron --> 
<header class="jumbotron back-image" style="background-image: url(images/banner.jpeg); padding-right: 100px; padding-top: 80px; text-align: right;">
    <div class="myClass mainHeading">
        <h1 class="text-uppercase" style="color: #dc3545; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); font-weight: bold;">Welcome to ServiceEase</h1>
        <p style="color: #fff; text-shadow: 1px 1px 3px rgba(0,0,0,0.6); font-style: italic; font-size: 24px;">Best services and customer's satisfaction.</p>
        <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
        <a href="#registration" class="btn btn-danger mr-4">Sign Up</a>
    </div>
</header> <!-- End Header Jumbotron -->

<!-- Start Introduction Section -->
<div class="container" style="margin-top: 30px;">
    <div class="jumbotron" style="background-color: #e3f2fd;">
        <h3 class="text-center">ServiceEase Services</h3>
        <p class="text-center lead">
            We provide comprehensive service solutions to make your life easier. Our skilled professionals are ready to handle all your household and business needs with quality and reliability you can trust.
        </p>
        <p class="text-center">
            From home repairs and maintenance to technical support and professional services, ServiceEase connects you with verified experts who deliver exceptional results. Experience hassle-free service booking with transparent pricing and guaranteed satisfaction.
        </p>
    </div>
</div> <!-- End Introduction Section -->

<!-- Start Services Section -->
<div class="container text-center border-bottom" id="Services">
    <h2>Our Services</h2>
    <div class="row mt-4">
        <div class="col-sm-4 mb-4">
            <a href="#"><i class="fas fa-tv fa-3x text-success"></i></a>
            <h4 class="mt-4">Electronic Appliances</h4>
        </div>
        <div class="col-sm-4 mb-4">
            <a href="#"><i class="fas fa-sliders-h fa-3x text-primary"></i></a>
            <h4 class="mt-4">Preventive Maintenance</h4>
        </div>
        <div class="col-sm-4 mb-4">
            <a href="#"><i class="fas fa-cogs fa-3x text-success"></i></a>
            <h4 class="mt-4">Fault Repair</h4>
        </div>
    </div>
</div> <!-- End Services Section -->

<!-- Start Registration Form -->
<?php include('UserRegistration.php')?>
<!-- End Registration Form -->

<!-- Start Happy Customer-->
 <div class="jumbotron bg-danger">
        <div class="container">
            <h2 class="text-center text-white">Happy Customers</h2>
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-6"> <!-- Start 1st column-->
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/avatar1.jpg" class="img-fluid" style="border-radius:50%;" alt="avt1">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dolores hic vel placeat veniam dolorum alias assumenda necessitatibus enim eaque!</p>
                        </div>
                    </div>
                </div> <!-- End 1st column-->

                <div class="col-lg-3 col-sm-6"> <!-- Start 2nd column-->
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/avatar3.jpg" class="img-fluid" style="border-radius:50%;" alt="avt1">
                            <h4 class="card-title">Sonam Sharma</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dolores hic vel placeat veniam dolorum alias assumenda necessitatibus enim eaque!</p>
                        </div>
                    </div>
                </div> <!-- End 2nd column-->

                <div class="col-lg-3 col-sm-6"> <!-- Start 3rd column-->
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/avatar2.jpg" class="img-fluid" style="border-radius:50%;" alt="avt1">
                            <h4 class="card-title">Sumit Vyas</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dolores hic vel placeat veniam dolorum alias assumenda necessitatibus enim eaque!</p>
                        </div>
                    </div>
                </div> <!-- End 3rd column-->

                <div class="col-lg-3 col-sm-6"> <!-- Start 4th column-->
                    <div class="card shadow-lg mb-2">
                        <div class="card-body text-center">
                            <img src="images/avatar2.jpg" class="img-fluid" style="border-radius:50%;" alt="avt1">
                            <h4 class="card-title">Pravesh Khadka</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum dolores hic vel placeat veniam dolorum alias assumenda necessitatibus enim eaque!</p>
                        </div>
                    </div>
                </div>
            </div> <!-- Start 4th column-->
        </div>
 </div> <!-- End Happy Customer-->

<!-- Start Contact Us-->
<div class="container" id="Contact">
    <h2 class="text-center mb-4"> Contact Us</h2>
    <div class="row">
         <!-- Start 1st column-->
          <?php include('contactform.php')?>
            <!-- End 1st column-->

        <div class="col-md-4 text-center"> <!-- Start 2nd column-->
            <strong>Headquarter:</strong><br>
            ServiceEase Pvt.Ltd,<br>
            Dhobighat, Lalitpur <br>
            Siddhartha Cottage - 434567 <br>
            Phone: +0000000000 <br>
            <a href="#" target="_blank">www.serviceease.com</a><br>

            <br><br>
            <strong>Branch:</strong><br>
            ServiceEase Pvt.Ltd,<br>
            Dhobighat, Lalitpur <br>
            Siddhartha Cottage - 534567 <br>
            Phone: +0000000000 <br>
            <a href="#" target="_blank">www.serviceease.com</a><br>
        </div> <!-- End 2nd Column-->
    </div>
</div> <!-- End Contact Us-->

<!-- Start Footer-->
 <footer class="container-fluid bg-dark mt-5 text-white">
    <div class="container">
        <div class="row py-3">
            <div class="col-md-6"> <!-- Start 1st column-->
                <span class="pr-2">Follow Us</span>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-rss"></i></a>
            </div> <!-- End 1st column-->

            <div class="col-md-6 text-right"> <!-- Start 2nd column-->
                <small>Designed by ServiceEase &copy; 2025</small>
                <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
            </div> <!-- End 2nd column-->
        </div>
    </div>
 </footer>


<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>