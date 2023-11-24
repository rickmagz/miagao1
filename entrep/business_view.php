<?php
session_start();
include '../db.php';

$id = $_GET['id'];

$get_business_info = mysqli_query($cxn, "SELECT * FROM business_list WHERE business_id='$id'");
if ($get_business_info->num_rows > 0) {
    $b = mysqli_fetch_assoc($get_business_info);
}

?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $b['business_name']; ?> - Entrepreneurs' Dashboard - One Miagao Negosyo</title>
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
                    <li class="nav-item"><a class="nav-link " href="./products.php">Products</a></li>
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

    <section id="page-locator" style="margin-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="dashboard.php">Home &gt;</a>
                    <a href="business.php">Business &gt;</a>
                    <a class="text-bg-primary border rounded-pill border-0" href="#">&emsp14;Business Information &emsp13;</a>
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
                            <h3>Business Information</h3>
                            <div class="row row-cols-5">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card" style="border-radius: 10px;background: var(--bs-info-bg-subtle);border-color: var(--bs-body-bg);">
                                        <div class="card-body" style="background: var(--bs-secondary-bg);border-radius: 10px;">

                                            <div class="row">
                                                <div class="col-5 col-sm-3 col-md-3 col-lg-2 col-xl-3 d-xl-flex align-self-center m-auto justify-content-xl-center">
                                                    <img alt="business_logo" class="rounded w-100 d-block fit-cover card-img-top" src="../assets/img/business_img/<?php echo $b['business_image']; ?>" />
                                                </div>
                                                <div class="col" id="business_info">
                                                    <style>
                                                        @media (max-width: 400px) {
                                                            #business_info {
                                                                text-align: center;
                                                            }
                                                        }
                                                    </style>
                                                    <h3><?php echo $b['business_name']; ?></h3>
                                                    <h6 class="text-muted mb-2"><?php echo $b['business_type']; ?></h6>
                                                    <p><?php echo $b['business_desc']; ?></p>
                                                    <p>Address: <?php echo $b['business_address']; ?></p>
                                                    <!-- <p>Contact Number: </p> -->

                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row mt-2">
                                                <h5>Business Products</h5>
                                                <?php
                                                $product = 0;
                                                $get_products = mysqli_query($cxn, "SELECT * FROM product_list WHERE business_id='$id' LIMIT 4");

                                                if ($get_products->num_rows > 0) {
                                                    while ($p = mysqli_fetch_assoc($get_products)) {
                                                        $prod_id = $p['product_id'];
                                                        $prod_name = $p['product_name'];
                                                        $prod_type = $p['product_type'];
                                                        $prod_img = $p['product_image'];
                                                        $prod_like = $p['product_like'];
                                                        $product++;
                                                ?>
                                                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                                                            <div class="card" style="border-radius: 10px;">
                                                                <div class="card-body text-center">
                                                                    <h6 class="text-muted card-subtitle mb-2"><?php echo $prod_name; ?></h6>
                                                                    <img class="card-img-top w-100 d-block fit-cover" alt="Product Image" src="../assets/img/product_img/<?php echo $prod_img; ?>" />
                                                                    <div>

                                                                        <a class="btn btn-outline-primary btn-sm border-primary rounded-pill mt-1" href="./productview.php?id=<?php echo $prod_id; ?>" target="_self">More Info</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                                                    No products available.
                                                    </div>';
                                                }
                                                ?>
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
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>