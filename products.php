<?php session_start();
include 'db.php';

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Products - Miagao Negosyo Center</title>
    <link rel="icon" type="image/png" sizes="310x310" href="assets/img/Miagao-logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow navbar-shrink navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html"><img src="assets/img/miagao_one.png" width="85" height="70" /><span style="margin-left: 5px;">One Miagao<br />Negosyo</span></a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link " href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link active" href="products.php">Products</a></li>

                    <a class="btn btn-primary border rounded-pill shadow" role="button" href="login.php">LOG IN</a><a class="btn btn-secondary border rounded-pill shadow" role="button" href="signup.php">SIGN UP</a>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="container py-4 py-xl-5 mb-5">
            <div class="row gy-4 gy-md-0" data-aos="zoom-out">
                <div class="col-md-5 col-lg-5 offset-md-1 offset-lg-1 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div style="max-width: 350px;">
                        <h1 class="display-6 fw-bold mb-4">Miagaowanon products in one&nbsp;<span class="underline">platform</span>.</h1>
                        <p class="my-4">See what is popular in list of products and help us recommend it to others.</p><a class="btn btn-primary border rounded-pill me-2" role="button" href="signup.php">Sign up</a><a class="btn btn-outline-primary border rounded-pill" role="button" href="login.php">Log in</a>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;" src="assets/img/illustrations/ranking.svg"></div>
                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-up">
        <div class="container">
            <div class="row" data-aos="zoom-out" data-aos-delay="150">
                <div class="col-sm-6 col-md-5 col-lg-5 col-xl-5 offset-md-1 offset-lg-1">
                    <h3 class="display-6 fw-bold pb-4 mb-4">Featuring our products to be more&nbsp;<span class="underline">known.</span></h3>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-5 col-xl-5 pt-4">
                    <p>We put our best foot forward with the power of technology to resurface our best catalogs of products based on how they leverage on the market.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 order-first order-md-last">
                    <h1 style="text-align: center;font-weight: bold;">Featured Products</h1>
                </div>
            </div>
            <div class="row w-100">
                <?php
                $product_list = 0;
                $get_products = mysqli_query($cxn, "SELECT * FROM product_list ORDER BY rand() LIMIT 4");

                if ($get_products->num_rows > 0) {
                    while ($p = mysqli_fetch_assoc($get_products)) {
                        $prod_id = $p['product_id'];
                        $prod_name = $p['product_name'];
                        $prod_type = $p['product_type'];
                        $prod_img = $p['product_image'];
                        $prod_like = $p['product_like'];
                        $product_list++;

                ?>

                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div class="card">
                                <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="assets/img/product_img/<?php echo $prod_img; ?>" />
                                <div class="card-body p-2 text-center">
                                    <h6 class="card-title fw-bold"><?php echo $prod_name; ?></h6>
                                    <p class="text-primary card-text mb-0"><?php echo $prod_type; ?></p>
                                </div>
                                <div class="card-footer text-body-secondary text-center">
                                    <a class="btn btn-outline-primary btn-sm border-primary rounded-pill mt-1" href="productview.php?id=<?php echo $prod_id; ?>" target="_self">More Info</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>


    <footer>
        <div class="container py-4 py-lg-5">
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2023 One Negosyo Miagao<br /><a href="entrep/index.php">Entrepreneur</a>&emsp14;|&emsp14;<a href="admin/index.php">Admin</a></p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><img src="assets/img/miagao_one.png" width="85" height="70" /></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>