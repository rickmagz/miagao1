<?php
session_start();
include '../db.php';

$id = $_GET['id'];

$get_product_info = mysqli_query($cxn, "SELECT * FROM product_list WHERE product_id='$id'");
if ($get_product_info->num_rows > 0) {
    $p = mysqli_fetch_assoc($get_product_info);
}

$get_business_info = mysqli_query($cxn, "SELECT * FROM business_list WHERE business_id='{$p['business_id']}'");
if ($get_business_info->num_rows > 0) {
    $b = mysqli_fetch_assoc($get_business_info);
}

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $p['product_name']; ?> - Entrepreneurs' Homepage - One Miagao Negosyo</title>
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
                    <li class="nav-item"><a class="nav-link " href="./business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./products.php">Products</a></li>
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
                    <a href="products.php">Products &gt;</a>
                    <a class="text-bg-primary border rounded-pill border-0" href="#">&emsp14;Product Information &emsp13;</a>
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
                            <h3>Product Information</h3>
                            <div class="row row-cols-5">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <div class="card" style="border-radius: 10px;background: var(--bs-info-bg-subtle);border-color: var(--bs-body-bg);">
                                        <div class="card-body" style="background: var(--bs-secondary-bg);border-radius: 10px;">
                                            <div class="row">
                                                <div class="col-5 col-sm-3 col-md-3 col-lg-2 col-xl-3 d-xl-flex align-self-center m-auto justify-content-xl-center"><img class="rounded w-100 d-block fit-cover card-img-top" src="../assets/img/product_img/<?php echo $p['product_image']; ?>" alt="product_img" /></div>
                                                <div id="business-info" class="col">
                                                    <h3><?php echo $p['product_name']; ?></h3>
                                                    <h6 class="text-muted mb-2">by <?php echo $b['business_name']; ?></h6>
                                                    <p><?php echo $p['product_desc']; ?></p>
                                                    <p><?php echo $p['product_specs']; ?></p>

                                                    <div class="btn-group btn-group-sm" role="group"><a class="btn btn-primary" style="margin-right: 8px;border-radius: 10px;" href="./editproductinfo.php?id=<?php echo $p['product_id']; ?>">Edit Product Info</button><a class="btn btn-outline-primary" role="button" style="border-radius: 10px;" href="editproductimage.php?id=<?php echo $p['product_id']; ?>">Change Product Image</a></div>


                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body" style="background: var(--bs-secondary-bg);border-radius: 10px;">
                                            <div class="row">
                                                <div id="business-info" class="col">
                                                    <h5>Product Specification</h5>
                                                    <p>
                                                        <?php
                                                        if ($p['product_specs'] == '') {
                                                            $product_specs = "No specification.";
                                                        } else {
                                                            $product_specs = $p['product_specs'];
                                                        }

                                                        echo $product_specs;
                                                        ?>
                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body" style="background: var(--bs-secondary-bg);border-radius: 10px;">
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Product Feedback</h5>
                                                    <?php
                                                    $feedback = 0;
                                                    $user = 0;
                                                    $get_feedback = mysqli_query($cxn, "SELECT * FROM user_product_feedback WHERE productID = '{$p['product_id']}'");

                                                    if (mysqli_num_rows($get_feedback) > 0) {
                                                        while ($f = mysqli_fetch_assoc($get_feedback)) {
                                                            $userID = $f['userID'];
                                                            $fback = $f['feedback'];

                                                            $get_user = mysqli_query($cxn, "SELECT first_name, last_name,image FROM user WHERE user_id='$userID'");
                                                            if (mysqli_num_rows($get_user) > 0) {
                                                                $u = mysqli_fetch_assoc($get_user);
                                                            }

                                                    ?>
                                                            <div class="row">
                                                                <div class="col-3 col-sm-2 col-md-1 col-lg-1 col-xl-1 col-xxl-1 offset-xxl-0 d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center justify-content-xxl-center align-items-xxl-center">
                                                                    <img class="rounded-circle " width="65" height="65" src="../assets/img/user_img/<?php echo $u['image']; ?>" alt="user_image" />
                                                                </div>
                                                                <div class="col-9 col-sm-9 col-md-10 col-lg-10 col-xl-10 col-xxl-10 offset-xxl-0">
                                                                    <div class="mt-3">
                                                                        <h5><?php echo $u['first_name']; ?> <?php echo $u['last_name']; ?></h5>
                                                                        <p><?php echo $f['feedback']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                    <?php


                                                        }
                                                        $feedback++;
                                                    } else {
                                                        echo '
                                                        <div class="row">
                                                                <div class="col-9 col-sm-9 col-md-10 col-lg-10 col-xl-10 col-xxl-10 offset-xxl-0">
                                                                    <div class="mt-3">
                                                                        <h6>No feedback yet.</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        ';
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