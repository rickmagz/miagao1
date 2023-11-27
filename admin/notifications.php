<?php
session_start();
include '../db.php';

//get total number of users
$stmt = $cxn->prepare("SELECT * FROM user");
$stmt->execute();
$user_reg = $stmt->get_result();
$total_users = $user_reg->num_rows;

//get total number of business favorites
$stmt = $cxn->prepare("SELECT * FROM user_business_faves WHERE action='LIKED'");
$stmt->execute();
$user_business_visit = $stmt->get_result();
$total_business_visit = $user_business_visit->num_rows;

//get total number of product favorites
$stmt = $cxn->prepare("SELECT * FROM user_product_faves WHERE action='LIKED'");
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
                                <a class="dropdown-item" href="./getdata.php">Download system data</a>
                                <a class="dropdown-item" href="../logout.php">Log out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container py-3 py-xl-5">
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
        <div class="container py-3 py-xl-5">
            <div class="row">
                <div class="col-xl-12">
                    <h2>Declined Requests</h2>
                </div>
                <?php
                //get pending requests
                $declined = 0;
                $get_declined = mysqli_query($cxn, "SELECT * FROM entrep WHERE status='DECLINED' ORDER BY added ASC LIMIT 3");
                if (mysqli_num_rows($get_declined) > 0) {
                    while ($d = mysqli_fetch_array($get_declined)) {

                ?>
                        <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-4 m-2" style="background: var(--bs-secondary-bg);border-radius: 10px;">
                            <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                                <div class="bs-icon-md bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center me-4 d-inline-block bs-icon xl"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
                                        <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg></div>
                                <div>
                                    <h4><?php echo $d['first_name']; ?> <?php echo $d['last_name']; ?></h4>
                                    <p><?php echo $d['added']; ?></p>

                                </div>
                            </div>
                        </div>
                <?php
                        $declined++;
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