<?php
session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];

$get_product_info = mysqli_query($cxn, "SELECT * FROM product_list");
if ($get_product_info->num_rows > 0) {
    $p = mysqli_fetch_assoc($get_product_info);
}


?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Featured Products - Miagao Negosyo Center</title>
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
        <div class="container"> <a class="navbar-brand d-flex align-items-center" href="browse.php">
                <img src="../assets/img/miagao_one.png" width="85" height="70" /><span style="margin-left: 5px;">One Miagao<br />Negosyo</span>
            </a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link " href="./browse.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./products.php">Products</a></li>
                    <li class="nav-item fw-bold d-flex align-items-center">
                        <div class="nav-item dropdown bg-primary border rounded-pill border-primary shadow d-flex align-items-center" style="padding-left: 14px;padding-right: 14px;"><a class="dropdown-toggle link-light" aria-expanded="false" data-bs-toggle="dropdown" href="#">Menu</a>
                            <div class="dropdown-menu text-break border rounded" style="margin-bottom: 0px;padding-left: 0px;padding-right: 0px;margin-right: 0px;margin-top: 0px;padding-top: 8px;padding-bottom: 8px;"><a class="dropdown-item" href="#" style="display: flex;overflow: hidden;">
                                    <img width="30" height="30" src="../assets/img/Screenshot_2021-01-28-04-41-56-92.jpg">&nbsp;<strong><?php echo $_SESSION['firstname']; ?></strong>
                                </a>
                                <a class="dropdown-item" href="./accountsettings.php">Account Settings</a>
                                <a class="dropdown-item" href="../logout.php">Log out </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Featured Products For You</h2>
                    <p class="w-lg-50">Here the list of products based on your interests.</p>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" style="margin-top: -65px;">
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
                                <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="../assets/img/product_img/<?php echo $prod_img; ?>" />
                                <div class="card-body p-2 text-center">
                                    <p class="text-primary card-text mb-0"><?php echo $prod_type; ?></p>
                                    <h5 class="card-title"><?php echo $prod_name; ?></h5>
                                </div>
                                <div class="card-footer text-body-secondary text-center">
                                    <a class="btn btn-outline-primary btn-sm border-primary rounded-pill mt-1" href="./productview.php?id=<?php echo $prod_id; ?>" target="_self">More Info</a>
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

    <!-- recommendations -->
    <section data-aos="fade-up" style="margin-top: -40px;">
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2><strong>Product Recommendations</strong></h2>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" style="margin-top: -65px;">
                <!-- algorithm starts here -->
                <?php

                //all product visited by current user
                $product_visitedItems = array();
                $product_visitQuery = mysqli_query($cxn, "SELECT productID FROM user_product_visits WHERE userID = '$user_id'");
                while ($product_visitedRow = mysqli_fetch_assoc($product_visitQuery)) {
                    $product_visitedItems[] = $product_visitedRow['productID'];
                }

                //all faved product by the current user
                $product_faveItems = array();
                $product_faveQuery = mysqli_query($cxn, "SELECT productID FROM user_product_faves WHERE userID = '$user_id'");
                while ($product_faveRow = mysqli_fetch_assoc($product_faveQuery)) {
                    $product_faveItems[] = $product_faveRow['productID'];
                }

                //all products not visited or liked by the current user
                $unseenProducts = array();
                $unseenProducts_query = mysqli_query($cxn, "SELECT product_id FROM product_list WHERE product_id NOT IN(" . implode(',', $product_visitedItems) . ") AND product_id NOT IN (" . implode(',', $product_faveItems) . ")");
                while ($unseenProduct_row = mysqli_fetch_assoc($unseenProducts_query)) {
                    $unseenProductItems[] = $unseenProduct_row['product_id'];
                }

                //Calculation of similarity scores of products between the current user and other users
                $product_similarityScore = array();
                foreach ($unseenProductItems as $unseenProductID) {
                    $product_similarityScore[$unseenProductID] = 0;

                    //get all users who have visited or faved the unseen product
                    $product_similarUsersQuery = mysqli_query($cxn, "SELECT userID FROM user_product_visits WHERE productID = $unseenProductID UNION SELECT userID FROM user_product_faves WHERE productID = $unseenProductID");
                    while ($similarProduct_userRow = mysqli_fetch_assoc($product_similarUsersQuery)) {
                        $similarProduct_userID = $similarProduct_userRow['userID'];

                        //Check if current user has visited or liked the same products as the similar user, then increment the similarity score
                        if ($user_id != $similarProduct_userID) {
                            $similarProduct_query = mysqli_query($cxn, "SELECT productID FROM user_product_visits WHERE userID = $user_id AND productID IN (SELECT productID FROM user_product_visits WHERE userID = $similarProduct_userID) UNION SELECT productID from user_product_faves WHERE userID = $user_id AND productID IN(SELECT productID FROM user_product_faves WHERE userID = $similarProduct_userID)");
                            $num_SimilarProductsItems = mysqli_num_rows($similarProduct_query);

                            $product_similarityScore[$unseenProductID] += $num_SimilarProductsItems;
                        }
                    }
                }

                //Sort the similariity scores in descending order
                arsort($product_similarityScore);

                //Recommend the top unseen products with the highest similarity scores
                $recommendedProductItems = array_slice(array_keys($product_similarityScore), 0, 10);

                // echo "Recommended Products: ";
                foreach ($recommendedProductItems as $recommendedProductID) {
                    //echo $recommendedProductID . ", ";

                    $product = 0;
                    $recommendProduct = mysqli_query($cxn, "SELECT * FROM product_list WHERE product_id = '$recommendedProductID'");
                    if (mysqli_num_rows($recommendProduct) > 0) {
                        while ($pr = mysqli_fetch_assoc($recommendProduct)) {
                ?>
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="card">
                                    <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="../assets/img/product_img/<?php echo $pr['product_image']; ?>" />
                                    <div class="card-body p-2 text-center">
                                        <p class="text-primary card-text mb-0"><?php echo $pr['product_type']; ?></p>
                                        <h5 class="card-title"><?php echo $pr['product_name']; ?></h5>
                                    </div>
                                    <div class="card-footer text-body-secondary text-center">
                                        <a class="btn btn-outline-primary btn-sm border-primary rounded-pill mt-1" href="./productview.php?id=<?php echo $pr['product_id']; ?>" target="_self">More Info</a>
                                    </div>
                                </div>
                            </div>
                <?php

                        }
                        $product++;
                    } else {
                        echo ' <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3"><p class="text-center">No recommendations for now.</p></div>';
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
                <p class="mb-0">Copyright © 2023 One Negosyo Miagao<br /></p>
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