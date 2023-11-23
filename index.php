<?php
session_start();
include 'db.php';

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Miagao Negosyo Center</title>
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
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="assets/img/miagao_one.png" width="85" height="70" /><span style="margin-left: 5px;">One Miagao<br />Negosyo</span>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>

                    <a class="btn btn-primary border rounded-pill shadow" role="button" href="login.php">LOG IN</a><a class="btn btn-secondary border rounded-pill shadow" role="button" href="signup.php">SIGN UP</a>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="container pt-4 pt-xl-5">
            <div class="row" data-aos="zoom-out">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-5 col-xxl-6 offset-lg-1 offset-xxl-0 text-center text-md-start align-self-center">
                    <div class="text-center">
                        <h1 class="display-4 fw-bold text-start mb-5">Linking and<br>promoting businesses<br><span class="text-uppercase underline">together</span>.</h1>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-7 col-lg-6 col-xl-6 mx-auto">
                    <div class="text-center position-relative"><img class="img-fluid" src="assets/img/illustrations/meeting.svg" style="width: 800px;"></div>
                </div>
            </div>
        </div>
    </header>
    <section data-aos="flip-down">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 offset-lg-0">
                    <div class="card border-light border-1 p-4">
                        <div class="card-body text-center">
                            <div class="bs-icon-lg bs-icon-rounded bs-icon-secondary d-inline-block mb-4 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-player-play">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 4v16l13 -8z"></path>
                                </svg></div>
                            <div>
                                <h5 class="fw-bold">Start a Business</h5>
                                <p class="text-muted">Know what you need to jumpstart your own business.<br></p><a class="btn btn-sm px-0" role="button" href="startbusiness.html">Learn More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                    </svg><br></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 offset-lg-0">
                    <div class="card border-light border-1 d-flex justify-content-center p-4">
                        <div class="card-body text-center">
                            <div class="bs-icon-lg bs-icon-rounded bs-icon-secondary d-inline-block mb-4 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-registered">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path d="M9 16v-8h4a2 2 0 0 1 0 4h-4m3 0l3 4"></path>
                                </svg></div>
                            <div>
                                <h5 class="fw-bold">Register your Business</h5>
                                <p class="text-muted">All the info you need to set-up your business formally</p><a class="btn btn-sm px-0" role="button" href="registerbusiness.html">Learn More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                    </svg><br></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="card border-light border-1 d-flex justify-content-center p-4">
                        <div class="card-body text-center">
                            <div class="bs-icon-lg bs-icon-rounded bs-icon-secondary d-inline-block mb-4 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-activity">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 12h4l3 8l4 -16l3 8h4"></path>
                                </svg></div>
                            <div>
                                <h5 class="fw-bold">Grow your business</h5>
                                <p class="text-muted">Get the latest news, trends and tips on your industry.</p><a class="btn btn-sm px-0" role="button" href="growbusiness.html">Learn More&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-arrow-right">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                    </svg><br></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5 offset-lg-1">
                    <h3 class="display-6 fw-bold pb-md-4">Make your business&nbsp;<span class="underline">GROW</span></h3>
                    <p class="text-muted mb-4">Having established your business, your primary concern is now viability and sustainability. The Negosyo Center gathers and provides opportunities for businesses to grow by providing an avenue to connect buyers and suppliers hasten the business fulfilment process.<br></p><a class="btn btn-primary btn-sm" role="button" style="border-radius: 10px;" href="https://dtinegosyocenter.online/grow-your-business/2">FInd Resources</a>
                </div>
                <div class="col-md-6 col-lg-5 col-xl-5 order-first order-md-last">
                    <div><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;" src="assets/img/illustrations/teamwork.svg"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="m-5" data-aos="fade-up">
        <div class="container">
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
                                <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="../assets/img/<?php echo $prod_img; ?>" />
                                <div class="card-body p-2 text-center">
                                    <h6 class="card-title fw-bold"><?php echo $prod_name; ?></h6>
                                    <p class="text-primary card-text mb-0"><?php echo $prod_type; ?></p>
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
    <section class="m-5" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 order-first order-md-last">
                    <h1 style="text-align: center;font-weight: bold;">Featured Businesses</h1>
                </div>
            </div>
            <div class="row w-100">
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

    <section data-aos="fade-up" data-aos-delay="150" class="py-4 py-xl-5">
        <div class="container">
            <div class="bg-primary border rounded border-0 border-primary overflow-hidden">
                <div class="row g-0">
                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <div class="text-white p-4 p-md-5">
                            <h2 class="fw-bold text-white mb-3">Find business recommendation<br><span class="underline" style="text-decoration: underline;">JUST FOR YOU</span></h2>
                            <div class="my-3"><a class="btn btn-warning border rounded-pill me-2 mt-2" role="button" href="login.php">Log in</a><a class="btn btn-light border rounded-pill mt-2" role="button" href="signup.php">Sign up</a></div>
                        </div>
                    </div>
                    <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img class="w-100 h-100 fit-contain pt-5 pt-md-0" src="assets/img/illustrations/web-development.svg"></div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container py-4 py-lg-5">
            <hr />
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