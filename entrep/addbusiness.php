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
                <div class="col"><a href="dashboard.php">Home &gt;</a><a class="text-bg-primary" href="#" style="border-radius: 10px;"> Add Business Information &gt;</a><a href="addproduct.php" style="border-radius: 10px;"> Add Product Information &gt;</a></div>
            </div>
        </div>
    </section>

    <section id="main-form" style="margin-top: 20px;">
        <div class="container">
            <div id="addbusiness-row" class="row">
                <div class="col">
                    <div class="card" style="border-radius: 12px;">
                        <div id="addbusiness_form" class="card-body">
                            <h3>Add Business Profile</h3>
                            <form id="addbusiness" action="addbusiness.php" method="post" name="addbusiness" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 align-self-center">
                                        <div class="select-control mb-3">
                                            <select class="form-select" style="border-radius: 10px;" name="businesstype" autofocus required>
                                                <option disabled selected>Select Business Type</option>
                                                <option value="Retail">Retail</option>
                                                <option value="Food and Bevergae">Food and Beverage</option>
                                                <option value="Agriculture and Farming">Agriculture and Farming</option>
                                                <option value="Manufactiring">Manufactiring</option>
                                                <option value="Services">Services</option>
                                                <option value="Tourism">Tourism</option>
                                                <option value="Construction">Construction</option>
                                                <option value="Logistics">Logistics</option>
                                                <option value="Technology">Technology</option>
                                                <option value="Arts and Crafts">Arts and Crafts</option>
                                                <option value="Energy and Utilities">Energy and Utilities</option>
                                                <option value="Natural Resources">Natural Resources</option>
                                                <option value="Healthcare">Healthcare</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xxl-6 align-self-center">
                                        <div class="w-100"></div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 offset-xxl-0 align-self-center">
                                        <div class="form-floating mb-3"><input class="form-control" type="text" placeholder="Enter Business Name" required style="border-radius: 10px;" name="businessname" /><label class="form-label">Business Name</label></div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 align-self-center">
                                        <div class="form-floating mb-3"><input class="form-control" type="text" placeholder="Enter Business Name" required style="border-radius: 10px;" name="businessaddress" /><label class="form-label">Business Address</label></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-12 align-self-center">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" style="border-radius: 10px;min-height: 100px;" name="businessdesc" placeholder="Business Description" spellcheck="true" required></textarea>
                                            <label class="form-label">Business Description</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 12px;">
                                    <div class="col-sm-11 col-md-10 col-lg-8 col-xl-8 col-xxl-12 align-self-center"><label class="form-label">Business Logo</label>
                                        <input class="form-control" type="file" style="border-radius: 10px;" name="image" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xxl-6 align-self-center">
                                        <div class="form-floating mb-3">
                                            <div class="btn-group btn-group-sm" role="group"><button class="btn btn-primary" type="submit" style="margin-right: 8px;border-radius: 10px;" name="submit" form="addbusiness">Save</button><button class="btn btn-outline-primary" type="reset" style="border-radius: 10px;">Clear Form</button></div>
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

    $upload_folder = "../assets/img/business_img/";

    if (isset($_POST['submit'])) {
        $business_type = $_POST['businesstype'];
        $business_name = $_POST['businessname'];
        $business_address = $_POST['businessaddress'];
        $business_desc = $_POST['businessdesc'];

        $business_id = rand(00000000, 99999999);
        $entrep_id = $_SESSION['entrep_id'];

        $image = basename($_FILES["image"]["name"]);
        $targetFileFolder = $upload_folder . $image;
        $fileType = pathinfo($targetFileFolder, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG');

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFileFolder)) {
                $add_business = mysqli_query($cxn, "INSERT INTO business_list(business_id,entrep_id,business_name,business_type,business_address,business_desc,business_image) VALUES('$business_id','$entrep_id','$business_name','$business_type','$business_address','$business_desc','$image')") or die("Error in query: $add_business." . mysqli_error($cxn));

                echo "<script type='text/javascript'> alert('Business Registered!'); location.href = 'addbusiness.php'; </script>";
            } else {
                echo "<script type='text/javascript'> alert('File upload failed!'); location.href = 'addbusiness.php'; </script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Invalid file type!'); location.href = 'addbusiness.php'; </script>";
        }
    }
    ?>

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