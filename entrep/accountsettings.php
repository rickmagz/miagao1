<?php
session_start();
include '../db.php';

$user_id = $_SESSION['entrep_id'];

$entrep = mysqli_query($cxn, "SELECT * FROM entrep WHERE entrep_id='$user_id'");
if (mysqli_num_rows($entrep) > 0) {
    $e = mysqli_fetch_assoc($entrep);
}

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Entrepreneur Account Settings - Miagao One Negosyo Center</title>
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
                    <li class="nav-item fw-bold d-flex align-items-center">
                        <div class="nav-item dropdown bg-primary border rounded-pill border-primary shadow d-flex align-items-center" style="padding-left: 14px;padding-right: 14px;"><a class="dropdown-toggle link-light" aria-expanded="false" data-bs-toggle="dropdown" href="#">Menu</a>
                            <div class="dropdown-menu text-break border rounded" style="margin-bottom: 0px;padding-left: 0px;padding-right: 0px;margin-right: 0px;margin-top: 0px;padding-top: 8px;padding-bottom: 8px;">
                                <a class="dropdown-item" href="#" style="display: flex;overflow: hidden;">
                                    <img width="30" height="30" src="../assets/img/Screenshot_2021-01-28-04-41-56-92.jpg">
                                    &nbsp;<strong><?php echo $_SESSION['firstname']; ?></strong>
                                </a>
                                <a class="dropdown-item" href="./accountsettings.php">Account Settings</a>
                                <a class="dropdown-item" href="../logout.php">Log out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <section>
        <div class="container py-3 py-xl-5">
            <div class="row">
                <div class="col-xl-12">
                    <h2>Entrepreneur Account Settings</h2>
                </div>

                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <rect x="19" y="19" width="20" height="20" fill="#93dbe9">
                            <animate attributeName="fill" values="#689cc5;#93dbe9;#93dbe9" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="40" y="19" width="20" height="20" fill="#93dbe9">
                            <animate attributeName="fill" values="#689cc5;#93dbe9;#93dbe9" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.125s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="61" y="19" width="20" height="20" fill="#93dbe9">
                            <animate attributeName="fill" values="#689cc5;#93dbe9;#93dbe9" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.25s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="19" y="40" width="20" height="20" fill="#93dbe9">
                            <animate attributeName="fill" values="#689cc5;#93dbe9;#93dbe9" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.875s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="61" y="40" width="20" height="20" fill="#93dbe9">
                            <animate attributeName="fill" values="#689cc5;#93dbe9;#93dbe9" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.375s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="19" y="61" width="20" height="20" fill="#93dbe9">
                            <animate attributeName="fill" values="#689cc5;#93dbe9;#93dbe9" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.75s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="40" y="61" width="20" height="20" fill="#93dbe9">
                            <animate attributeName="fill" values="#689cc5;#93dbe9;#93dbe9" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.625s" calcMode="discrete"></animate>
                        </rect>
                        <rect x="61" y="61" width="20" height="20" fill="#93dbe9">
                            <animate attributeName="fill" values="#689cc5;#93dbe9;#93dbe9" keyTimes="0;0.125;1" dur="1s" repeatCount="indefinite" begin="0.5s" calcMode="discrete"></animate>
                        </rect>
                    </svg>

                    <div class="text-center">
                        Page is still under development....
                    </div>
                </span> -->



    <!-- 
    </div>
    </div>
    </section> -->

    <section id="page-locator" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="dashboard.php">Home &gt;</a>
                    <a class="text-bg-primary border rounded-pill border-0" href="#">&emsp14; My Account &emsp14;</a>
                </div>
            </div>
        </div>
    </section>

    <section id="main-section" style="margin-top: 20px;">
        <div class="container">
            <div id="editproduct-row" class="row">
                <div class="col">
                    <div class="card" style="border-radius: 12px;">
                        <div id="editproduct_cardbody" class="card-body">
                            <h3>My Entrepreneur Account</h3>
                            <div class="row row-cols-5">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card" style="border-radius: 10px;background: var(--bs-info-bg-subtle);border-color: var(--bs-body-bg);">
                                        <div class="card-body" style="background: var(--bs-secondary-bg);border-radius: 10px;">
                                            <div class="row mt-2">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">

                                                    <div class="row">
                                                        <div class="col-5 col-sm-3 col-md-3 col-lg-2 col-xl-3 d-xl-flex align-self-center m-auto justify-content-xl-center"><img class="rounded w-100 d-block fit-cover card-img-top" src="../assets/img/entrep_img/<?php echo $e['image']; ?>" alt="Account_image" />

                                                        </div>
                                                        <div id="business-info" class="col offset-xl-0">
                                                            <h3><?php echo $e['first_name']; ?> <?php echo $e['last_name']; ?></h3>
                                                            <h6 class="text-muted mb-2">USER ID: <?php echo $e['entrep_id']; ?></h6>
                                                            <span>E-mail Address: <?php echo $e['email_add']; ?> <br /></span>
                                                            <span>Date Registered: <?php echo $e['added']; ?> </span>
                                                            <div class="d-xl-flex justify-content-xl-start mt-2">
                                                                <a class="btn btn-primary btn-sm" href="editaccountsettings.php?id=<?php echo $e['entrep_id']; ?>" style="border-radius:20px;">Edit Account Details</a>&emsp14;


                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <footer>
        <div class="container py-4 py-lg-5">
            <hr />
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2023 One Negosyo Miagao</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><img src="../assets/img/miagao_one.png" width="85" height="70" /></li>

                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>