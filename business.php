<?php session_start();
include 'db.php';

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Business - Miagao Negosyo Center</title>
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
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.html"><img src="assets/img/Miagao-logo.png" width="63" height="65"><img src="assets/img/DTI-LOGO.png" width="67" height="64"><span style="margin-left: 5px;">Miagao <br>Negosyo Center</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link " href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <a class="btn btn-primary border rounded-pill shadow" role="button" href="login.php">LOG IN</a><a class="btn btn-secondary border rounded-pill shadow" role="button" href="signup.php">SIGN UP</a>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="container py-4 py-xl-5">
            <div class="row gy-4 gy-md-0" data-aos="fade-up">
                <div class="col-sm-12 col-md-6 col-lg-5 offset-lg-1 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div style="max-width: 350px;">
                        <h1 class="display-5 fw-bold mb-4">Skyrocket your business with our&nbsp;<span class="underline">tools.</span></h1>
                        <p class="text-muted my-4">With our tools powered by technology, we help your business stand above all else.<br><br></p><a class="btn btn-primary me-2" role="button" href="signup.php" style="border-radius: 800px;">Sign up</a><a class="btn btn-outline-primary" role="button" href="login.php" style="border-radius: 800px;">Log in</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5" id="masthead-illustration">
                    <div><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;" src="assets/img/illustrations/presentation.svg"></div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 mx-auto" data-aos="fade-up" data-aos-delay="50" style="max-width: 900px;">
                <div class="col-sm-6 mb-5"><img class="rounded img-fluid" src="assets/img/illustrations/ranking.svg"></div>
                <div class="col-sm-6 d-md-flex align-items-md-end align-items-lg-center mb-5">
                    <div class="ms-md-3">
                        <h5 class="fs-3 fw-bold mb-4">User favorites</h5>
                        <p class="text-muted mb-4">Get more prospects of businesses in our town based on our users favorites..</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 mx-auto" data-aos="fade-up" data-aos-delay="50" style="max-width: 900px;">
                <div class="col-sm-6 order-md-last mb-5"><img class="rounded img-fluid" src="assets/img/illustrations/startup.svg"></div>
                <div class="col-sm-6 d-md-flex align-items-md-end align-items-lg-center mb-5">
                    <div class="ms-md-3">
                        <h5 class="fs-3 fw-bold mb-4">User recommendations</h5>
                        <p class="text-muted mb-4">See what the latest technology has to offer whether our local products or local enterprises.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 order-first order-md-last">
                    <h1 style="text-align: center;font-weight: bold;">Featured Businesses</h1>
                </div>
            </div>
            <div class="row">
                <?php
                $business_list = 0;
                $get_business = mysqli_query($cxn, "SELECT * FROM business_list ORDER BY rand() LIMIT 4");

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
                                <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="../assets/img/<?php echo $busi_img; ?>" />
                                <div class="card-body p-2 text-center">
                                    <h6 class="card-title" style="font-weight: bold;"><?php echo $busi_name; ?></h6>
                                    <p class="text-primary mb-0"><?php echo $busi_type; ?></p>
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
                <p class="mb-0">Copyright © 2023 Miagao Negosyo Center<br /><a href="entrep/index.php">Entrepreneur</a>&emsp14;|&emsp14;<a href="admin/index.php">Admin</a></p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><img src="assets/img/Miagao-logo.png" width="63" height="65"></li>
                    <li class="list-inline-item"><img src="assets/img/DTI-LOGO.png" width="63" height="65"></li>
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