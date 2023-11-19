<?php
session_start();
include '../db.php';

$entrep_id = $_SESSION['entrep_id'];
$bus_id = $_SESSION['bus_id'];
$id = $_GET['id'];




?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Product Info - Entrepreneurs' Dashboard - Miagao One Negosyo Center</title>
    <link rel="icon" type="image/png" sizes="310x310" href="../assets/img/Miagao-logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow navbar-shrink navbar-light" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../assets/img/miagao_one.png" width="85" height="70" /><span style="margin-left: 5px;">One Miagao<br />Negosyo</span>
            </a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="./dashboard.php">Home</a></li>
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
                                <a class="dropdown-item" href="./systemsettings.php">System Settings</a>
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
                <div class="col"><a href="dashboard.php">Home &gt;</a><a class="border rounded-pill border-0" href="editproduct.php"> Choose Product Profile &gt;</a><a class="text-bg-primary border rounded-pill border-0" href="#"> Change Product Information &gt;</a></div>
            </div>
        </div>
    </section>
    <section id="main-section" style="margin-top: 20px;">
        <div class="container">
            <div id="editproduct-row" class="row">
                <div class="col">
                    <div class="card" style="border-radius: 12px;">
                        <?php
                        $product_info = mysqli_query($cxn, "SELECT * FROM product_list WHERE product_id = '$id'");
                        if ($product_info->num_rows > 0) {
                            $p = $product_info->fetch_array();
                            $product_id = $p['product_id'];
                            $product_name = $p['product_name'];
                            $product_type = $p['product_type'];
                            $product_desc = $p['product_desc'];

                        ?>
                            <div id="editproduct_cardbody" class="card-body">
                                <h3>Change product information for <strong><?php echo $product_name; ?></strong></h3>
                                <div class="row row-cols-5">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
                                        <form id="modproduct" action="saveproductinfo.php" method="post" name="addproduct">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 col-xl-5 col-xxl-6 text-start align-self-center">
                                                    <div class="select-control mb-3">
                                                        <input type="hidden" name="productid" value="<?php echo $product_id; ?>">
                                                        <label class="form-label">Current product type: <?php echo $product_type; ?></label>
                                                        <select class="form-select" style="border-radius: 10px;" name="producttype" required autofocus>
                                                            <option disabled selected>Select Product Type</option>
                                                            <option value="Electronics">Electronics</option>
                                                            <option value="Clothing">Clothing</option>
                                                            <option value="Food">Food</option>
                                                            <option value="Furniture">Furniture</option>
                                                            <option value="Appliances">Appliances</option>
                                                            <option value="Cosmetics">Cosmetics</option>
                                                            <option value="Books">Books</option>
                                                            <option value="Toys">Toys</option>
                                                            <option value="Jewelry">Jewelry</option>
                                                            <option value="Sports">Sports Equipment</option>
                                                            <option value="Music">Music Instruments</option>
                                                            <option value="Health">Health and Wellness</option>
                                                            <option value="Automotive">Automotive</option>
                                                            <option value="Home-decor">Home Decor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 align-self-center">
                                                    <div class="w-100"></div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 offset-xxl-0 align-self-center">
                                                    <div class="form-floating mb-3"><input class="form-control" type="text" placeholder="Enter Product Name" required style="border-radius: 10px;" name="productname" value="<?php echo $product_name; ?>" /><label class="form-label">Product Name</label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-12 align-self-center">
                                                    <div class="form-floating mb-3"><textarea class="form-control" name="product_desc" required style="min-height: 100px;border-radius: 10px;" placeholder="Product Description"><?php echo $product_desc; ?></textarea><label class="form-label">Product Description</label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-6 align-self-center">
                                                    <div class="text-start form-floating mb-3">
                                                        <div class="btn-group btn-group-sm" role="group"><button class="btn btn-primary" type="submit" style="margin-right: 8px;border-radius: 10px;" name="submit" form="modproduct">Save</button><a class="btn btn-outline-primary" role="button" style="border-radius: 10px;" href="editproduct.php">Cancel</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer>
        <div class="container py-4 py-lg-5">
            <hr />
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2023 Miagao Negosyo Center</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><img src="../assets/img/Miagao-logo.png" width="63" height="65" /></li>
                    <li class="list-inline-item"><img src="../assets/img/DTI-LOGO.png" width="63" height="65" /></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>