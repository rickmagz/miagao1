<?php
session_start();
include '../db.php';

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Business List - Entrepreneurs' Homepage - One Negosyo Miagao</title>
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
                    <li class="nav-item"><a class="nav-link " href="./dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./business.php">Business</a></li>
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
    <section id="masthead">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h1 class="display-4 text-end">Enterpreneurs'<br>Business Dashboard</h1>
                </div>
                <div class="col"><img src="../assets/img/illustrations/startup.svg"></div>
            </div>
        </div>
    </section>

    <section data-aos="fade-up"">
        <div class=" container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2><strong>Your Businesses</strong></h2>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" style="margin-top: -65px;">
            <?php
            $business_list = 0;
            $get_business = mysqli_query($cxn, "SELECT * FROM business_list WHERE entrep_id = {$_SESSION['entrep_id']} ORDER BY business_name asc");

            if ($get_business->num_rows > 0) {
                while ($b = mysqli_fetch_assoc($get_business)) {
                    $busi_id = $b['business_id'];
                    $busi_name = $b['business_name'];
                    $busi_type = $b['business_type'];
                    $busi_add = $b['business_address'];
                    $busi_img = $b['business_image'];
                    $busi_like = $b['business_likes'];
                    $business_list++;
            ?>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 h-100">
                        <div class="card">
                            <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="../assets/img/business_img/<?php echo $busi_img; ?>" />
                            <div class="card-body p-2 text-center">
                                <h6 class="card-title" style="font-weight: bold;"><?php echo $busi_name; ?></h6>
                                <p class="text-primary mb-0"><?php echo $busi_type; ?></p>
                            </div>
                            <div class="card-footer text-body-secondary text-center">
                                <a class="btn btn-outline-primary btn-sm border-primary rounded-pill mt-1" href="./business_view.php?id=<?php echo $busi_id; ?>" target="_self">More Info</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "None at the moment.";
            }
            ?>
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
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>