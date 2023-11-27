<?php session_start();
include 'db.php';

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
                                                <div class="col-5 col-sm-3 col-md-3 col-lg-2 col-xl-3 d-xl-flex align-self-center m-auto justify-content-xl-center">
                                                    <img class="rounded w-100 d-block fit-cover card-img-top" src="../assets/img/product_img/<?php echo $p['product_image']; ?>" alt="product_img" />
                                                </div>
                                                <div id="business-info" class="col">
                                                    <h3><?php echo $p['product_name']; ?></h3>
                                                    <h6 class="text-muted mb-2">by <?php echo $b['business_name']; ?></h6>
                                                    <p><?php echo $p['product_desc']; ?></p>
                                                    <div class="d-xl-flex justify-content-xl-start">
                                                        <a class="btn btn-outline-primary btn-sm border rounded-pill" href="products.php">Back</a>
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
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2023 One Negosyo Miagao<br /></p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><img src="./assets/img/miagao_one.png" width="85" height="70" /></li>

                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/main.js"></script>

</body>

</html>