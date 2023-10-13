<?php
session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
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
    <title>Business Information - <?php echo $b['business_name']; ?> - Miagao Negosyo Center</title>
    <link rel="icon" type="image/png" sizes="310x310" href="../assets/img/Miagao-logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow navbar-shrink navbar-light" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.html"><img src="../assets/img/Miagao-logo.png" width="63" height="65"><img src="../assets/img/DTI-LOGO.png" width="67" height="64"><span style="margin-left: 5px;">Miagao <br>Negosyo Center</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="./browse.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link" href="./products.php">Products</a></li>
                    <li class="nav-item fw-bold d-flex align-items-center">
                        <div class="nav-item dropdown bg-primary border rounded-pill border-primary shadow d-flex align-items-center" style="padding-left: 14px;padding-right: 14px;"><a class="dropdown-toggle link-light" aria-expanded="false" data-bs-toggle="dropdown" href="#">Menu</a>
                            <div class="dropdown-menu text-break border rounded" style="margin-bottom: 0px;padding-left: 0px;padding-right: 0px;margin-right: 0px;margin-top: 0px;padding-top: 8px;padding-bottom: 8px;"><a class="dropdown-item" href="#" style="display: flex;overflow: hidden;"><img width="30" height="30" src="../assets/img/Screenshot_2021-01-28-04-41-56-92.jpg">&nbsp;<strong><?php echo $_SESSION['firstname']; ?></strong></a><a class="dropdown-item" href="./accountsettings.php">Account Settings</a><a class="dropdown-item" href="../logout.php">Log out</a></div>
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
                    <a href="browse.php">Home &gt;</a>
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
                                                    <img alt="business_logo" class="rounded w-100 d-block fit-cover card-img-top" src="../assets/img/<?php echo $b['business_image']; ?>" />
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
                                                    <div class="d-xl-flex justify-content-xl-start">
                                                        <button class="btn btn-primary btn-sm border rounded-pill" type="button" id="likeButton" onclick="like()">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                                                <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                                            </svg>
                                                            <span id="likeCount<?php echo $busi_id; ?>">
                                                                <?php echo $b['business_likes']; ?>
                                                            </span>
                                                        </button>
                                                        &emsp13;
                                                        <a class="btn btn-outline-primary btn-sm border rounded-pill" href="business.php">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="row mt-2">
                                                <h5>Featured Products</h5>
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
                                                                    <img class="rounded w-100" alt="Product Image" src="../assets/img/<?php echo $prod_img; ?>" />
                                                                    <div>
                                                                        <button class="btn btn-primary btn-sm border rounded-pill" type="button" id="likeButton" onclick="like()">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                                                                <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z" />
                                                                            </svg>
                                                                            <span id="likeCount<?php echo $prod_id; ?>">
                                                                                <?php echo $prod_like; ?>
                                                                            </span>
                                                                        </button>
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
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2023 Miagao Negosyo Center</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><img src="../assets/img/Miagao-logo.png" width="63" height="65"></li>
                    <li class="list-inline-item"><img src="../assets/img/DTI-LOGO.png" width="63" height="65"></li>
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