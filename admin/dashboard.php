<?php
session_start();
include '../db.php';

//get total number of users
$stmt = $cxn->prepare("SELECT * FROM user");
$stmt->execute();
$user_reg = $stmt->get_result();
$total_users = $user_reg->num_rows;

//get total number of business favorites
$stmt = $cxn->prepare("SELECT * FROM user_business_reactions WHERE action='LIKED'");
$stmt->execute();
$user_business_visit = $stmt->get_result();
$total_business_visit = $user_business_visit->num_rows;

//get total number of product favorites
$stmt = $cxn->prepare("SELECT * FROM user_product_reactions WHERE action='LIKED'");
$stmt->execute();
$user_product_fave = $stmt->get_result();
$total_product_fave = $user_product_fave->num_rows;

//get total of approved entrep
$stmt = $cxn->prepare("SELECT * FROM entrep WHERE status='APPROVED'");
$stmt->execute();
$approve_entrep = $stmt->get_result();
$total_approve_entrep = $approve_entrep->num_rows;

//get total of pending entrep
$stmt = $cxn->prepare("SELECT * FROM entrep WHERE status='PENDING'");
$stmt->execute();
$pending_entrep = $stmt->get_result();
$total_pending_entrep = $pending_entrep->num_rows;

//get total profile visits
$stmt = $cxn->prepare("SELECT * FROM entrep WHERE profile_visits >= 1");
$stmt->execute();
$visits = $stmt->get_result();
$total_visits = $visits->num_rows;


?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Dashboard - Miagao One Negosyo Center</title>
    <link rel="icon" type="image/png" sizes="310x310" href="../assets/img/Miagao-logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow navbar-shrink navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../assets/img/miagao_one.png" width="85" height="70" /><span style="margin-left: 5px;">One Miagao<br />Negosyo</span>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="./dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link " href="./business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link" href="./products.php">Products</a></li>
                    <li class="nav-item">
                        <a class="nav-link active bg-light" href="./notifications.php" style="border-radius: 10px; margin-right: 10px;">
                            Notifications&emsp13;<span class="badge rounded-pill text-bg-danger">
                                <?php echo $total_pending_entrep; ?></span>
                        </a>
                    </li>
                    <li class="nav-item fw-bold d-flex align-items-center">
                        <div class="nav-item dropdown bg-primary border rounded-pill border-primary shadow d-flex align-items-center" style="padding-left: 14px;padding-right: 14px;"><a class="dropdown-toggle link-light" aria-expanded="false" data-bs-toggle="dropdown" href="#">Menu</a>
                            <div class="dropdown-menu text-break border rounded" style="margin-bottom: 0px;padding-left: 0px;padding-right: 0px;margin-right: 0px;margin-top: 0px;padding-top: 8px;padding-bottom: 8px;">
                                <a class="dropdown-item" href="#" style="display: flex;overflow: hidden;">
                                    <img width="30" height="30" src="../assets/img/Screenshot_2021-01-28-04-41-56-92.jpg">
                                    &nbsp;<strong><?php echo $_SESSION['firstname']; ?></strong>
                                </a>
                                <a class="dropdown-item" href="./accountsettings.php">Account Settings</a>
                                <a class="dropdown-item" href="./systemsettings.php">System Settings</a>
                                <a class="dropdown-item" href="../logout.php">Log out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="masthead">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h1 class="text-center">Welcome to<br /><strong>Administrators&#39;</strong><br /><strong>Dashboard</strong></h1>
                </div>
                <div class="col"><img src="../assets/img/illustrations/presentation.svg"></div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><strong>Overview</strong></h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Users</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 offset-1 offset-xxl-0" style="text-align: center;margin-left: 0px;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Registered</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1"><?php echo $total_users; ?></h1>
                        </div>
                    </div>
                </div>

                <div class="col-10 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 offset-1 offset-xxl-0" style="text-align: center;margin-left: 0px;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Business Favorites</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1"><?php echo $total_business_visit; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 offset-1 offset-xxl-0" style="text-align: center;margin-left: 0px;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Product Favorites</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1"><?php echo $total_product_fave; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col">
                    <h3>Entrepreneurs</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-10 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 offset-1 offset-xxl-0" style="text-align: center;margin-left: 0px;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Approved</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1"><?php echo $total_approve_entrep; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 offset-1 offset-xxl-0" style="text-align: center;margin-left: 0px;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Pending</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1"><?php echo $total_pending_entrep; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 offset-1 offset-xxl-0" style="text-align: center;margin-left: 0px;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Profile Visits</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1"><?php echo $total_visits; ?></h1>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section>
        <div class="container py-4 py-xl-5">
            <div class="row">
                <div class="col-xl-12">
                    <h2>New Entrepreneur Request</h2>
                </div>
                <?php
                //get pending requests
                $pending = 0;
                $get_pending = mysqli_query($cxn, "SELECT * FROM entrep WHERE status='PENDING' ORDER BY added ASC LIMIT 3");
                if (mysqli_num_rows($get_pending) > 0) {
                    while ($pn = mysqli_fetch_array($get_pending)) {

                ?>
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-4 m-2" style="background: var(--bs-secondary-bg);border-radius: 10px;">
                            <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                                <div class="bs-icon-md bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center me-4 d-inline-block bs-icon xl"><svg class="bi bi-bell" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                                    </svg></div>
                                <div>
                                    <h4><?php echo $pn['first_name']; ?> <?php echo $pn['last_name']; ?></h4>
                                    <p><?php echo $pn['added']; ?></p>
                                    <a class="btn btn-primary btn-sm" style="border-radius: 10px;" href="./functions/accept.php?id=<?php echo $pn['entrep_id']; ?>">Accept</a>
                                    <a class="btn btn-outline-danger btn-sm mx-2" style="border-radius: 10px;" href="./functions/decline.php?id=<?php echo $pn['entrep_id']; ?>">Decline</a>
                                </div>
                            </div>
                        </div>
                <?php
                        $pending++;
                    }
                } else {
                    echo '<div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-4 m-2" style="background: var(--bs-secondary-bg);border-radius: 10px;">
                    <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                        <div class="bs-icon-md bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center me-4 d-inline-block bs-icon xl"><svg class="bi bi-bell" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                            </svg></div>
                        <div class="text-center">
                            <h4>No pending requests.</h4>
                        </div>
                    </div>
                </div>';
                }
                ?>

            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <h1><strong>Insights</strong></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <h3>Registered Businesses</h3>
                    <div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="table-light">
                                    <th>Name of Business</th>
                                    <th>Business Type</th>
                                    <th>Registration Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //get list of business
                                $blist = 0;
                                $get_business = mysqli_query($cxn, "SELECT * FROM business_list ORDER BY added ASC LIMIT 5");
                                if (mysqli_num_rows($get_business) > 0) {
                                    while ($b = mysqli_fetch_array($get_business)) {

                                ?>
                                        <tr>
                                            <td><?php echo $b['business_name']; ?></td>
                                            <td><?php echo $b['business_type']; ?></td>
                                            <td><?php echo $b['added']; ?></td>
                                        </tr>
                                <?php

                                        $blist++;
                                    }
                                } else {
                                    echo "
                                            <td colspan='3' class='text-center'> None at the moment</td>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center"><a href="./business.php">
                            See More</a></p>

                </div>
                <div class="col-xxl-12">
                    <h3>Registered Products</h3>
                    <div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="table-light">
                                    <th>Name of Product</th>
                                    <th>Product Type</th>
                                    <th>Date Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    //get list of products
                                    $plist = 0;
                                    $get_product = mysqli_query($cxn, "SELECT * FROM product_list ORDER BY added ASC LIMIT 5");
                                    if (mysqli_num_rows($get_product) > 0) {
                                        while ($p = mysqli_fetch_array($get_product)) {
                                            $added = $p['added'];




                                    ?>
                                            <td><?php echo $p['product_name']; ?></td>
                                            <td><?php echo $p['product_type']; ?></td>
                                            <td><?php echo $added; ?></td>
                                </tr>
                        <?php
                                            $plist++;
                                        }
                                    } else {
                                        echo "
                                                <td colspan='3' class='text-center'> None at the moment</td>";
                                    }
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center"><a href="./products.php">See More</a></p>
                </div>
                <div class="col-xxl-12">
                    <h3>Registered Entrepreneurs</h3>
                    <div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="table-light">
                                    <th>Entrepreneur ID</th>
                                    <th>Name of Entrepreneur</th>
                                    <th>Date Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    //get list of entrepreneurs
                                    $elist = 0;
                                    $get_entrep = mysqli_query($cxn, "SELECT * FROM entrep WHERE status='APPROVED' ORDER BY added ASC LIMIT 5");
                                    if (mysqli_num_rows($get_entrep) > 0) {
                                        while ($e = mysqli_fetch_array($get_entrep)) {


                                    ?>
                                            <td><?php echo $e['entrep_id']; ?></td>
                                            <td><?php echo $e['first_name']; ?> <?php echo $e['last_name']; ?></td>
                                            <td><?php echo $e['added']; ?></td>
                                </tr>
                        <?php
                                            $elist++;
                                        }
                                    } else {
                                        echo "
                                                <td colspan='4' class='text-center'> None at the moment</td>";
                                    }
                        ?>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center"><a href="./entrep.php">See More</a></p>
                </div>
            </div>
        </div>
    </section>


    <footer>
        <div class="container py-4 py-lg-5">
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2023 One Negosyo Miagao</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><img src="../assets/img/miagao_one.png" width="85" height="70" /></li>

                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>