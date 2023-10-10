<?php
session_start();
include '../db.php';

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Entrepreneurs' Homepage - Miagao One Negosyo Center</title>
    <link rel="icon" type="image/png" sizes="310x310" href="../assets/img/Miagao-logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow navbar-shrink navbar-light" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="./dashboard.php"><img src="../assets/img/Miagao-logo.png" width="63" height="65"><img src="../assets/img/DTI-LOGO.png" width="67" height="64"><span style="margin-left: 5px;">Miagao <br>Negosyo Center</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
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
                <div class="col">
                    <a href="dashboard.php">Home &gt;</a>
                    <a href="addbusiness.php">Add Business Profile &gt;</a>
                    <a class="text-bg-primary rounded-pill border border-0" href="#"> Add Product Information &gt;</a>
                </div>
            </div>
        </div>
    </section>

    <section id="main-form" style="margin-top: 20px;">
        <div class="container">
            <div id="addproduct-row" class="row">
                <div class="col">
                    <div class="card" style="border-radius: 12px;">
                        <div id="addproduct_form" class="card-body">
                            <h3>Add Business Product</h3>
                            <form id="addproduct" action="addproduct.php" method="post" name="addproduct">
                                <div class="row">
                                    <div class="col-sm-11 col-md-10 col-lg-8 col-xl-8 col-xxl-6">
                                        <div class="select-control mb-3">
                                            <select class="form-select" style="border-radius: 10px;" name="businessname" required autofocus>
                                                <option disabled selected>Select Business Name</option>

                                                <?php
                                                $sel_business = mysqli_query($cxn, "SELECT business_id, business_name FROM business_list");

                                                if ($sel_business->num_rows > 0) {
                                                    while ($get_bus = $sel_business->fetch_assoc()) {
                                                        echo "<option value='" . $get_bus['business_id'] . "'>" . $get_bus['business_name'] . "</option>";
                                                    }
                                                } else {
                                                    echo "None listed at the moment.";
                                                }


                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-11 col-md-10 col-lg-8 col-xl-8 col-xxl-6">
                                        <div class="select-control mb-3"><select class="form-select" style="border-radius: 10px;" name="producttype" required autofocus>
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
                                </div>
                                <div class="row">
                                    <div class="col-sm-11 col-md-10 col-lg-8 col-xl-8 col-xxl-6 align-self-center">
                                        <div class="form-floating mb-3"><input class="form-control" type="text" required style="border-radius: 10px;" name="productname" placeholder="Enter Product Name" /><label class="form-label">Product Name</label></div>
                                    </div>
                                    <div class="col-sm-11 col-md-10 col-lg-8 col-xl-8 col-xxl-12 align-self-center">
                                        <div class="form-floating mb-3"><textarea class="form-control" style="border-radius: 10px;min-height: 100px;" name="productdesc" placeholder="Product Description" spellcheck="true" required></textarea><label class="form-label">Product Description</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-6 align-self-center">
                                        <div class="form-floating mb-3">
                                            <div class="btn-group btn-group-sm" role="group"><button class="btn btn-primary" type="submit" style="margin-right: 8px;border-radius: 10px;" name="submit" form="addproduct">Save</button><a class="btn btn-outline-primary" href="dashboard.php" style="border-radius: 10px;">Back to home</a></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_POST['submit'])) {
        $entrep_id = $_SESSION['entrep_id'];
        $business_id = $_POST['businessname'];

        function random_strings($length_of_string)
        {
            return substr(md5(time()), 0, $length_of_string);
        }

        $product_id = random_strings(10);
        $product_name = $_POST['productname'];
        $product_type = $_POST['producttype'];
        $product_desc = $_POST['productdesc'];

        $add_product = mysqli_query($cxn, "INSERT INTO product_list(product_id,business_id,product_name,product_type,product_desc) VALUES('$product_id','$business_id','$product_name','$product_type','$product_desc')") or die("Error in query: $add_product." . mysqli_error($cxn));

        echo "<script type='text/javascript'> alert('Product Added!'); location.href = 'addproduct.php'; </script>";
    }
    ?>

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