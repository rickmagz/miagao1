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
    <title>Edit Business Info - Entrepreneurs' Dashboard - Miagao One Negosyo Center</title>
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
                <div class="col"><a href="dashboard.php">Home &gt;</a><a class="border rounded-pill border-0" href="editbusiness.php"> Choose Business Profile &gt;</a><a class="text-bg-primary border rounded-pill border-0" href="#"> Change Business Information &emsp13;</a></div>
            </div>
        </div>
    </section>

    <section id="main-section" style="margin-top: 20px;">
        <div class="container">
            <div id="editproduct-row" class="row">
                <div class="col">
                    <div class="card" style="border-radius: 12px;">
                        <?php
                        $business_info = mysqli_query($cxn, "SELECT * FROM business_list WHERE business_id = '$id'");
                        if (mysqli_num_rows($business_info) > 0) {
                            $b = mysqli_fetch_array($business_info);
                            $busi_id = $b['business_id'];
                            $busi_type = $b['business_type'];
                            $busi_name = $b['business_name'];
                            $busi_addr = $b['business_address'];
                            $busi_desc = $b['business_desc'];

                        ?>
                            <div id="editproduct_cardbody" class="card-body">
                                <h3>Change business information for <strong><?php echo $busi_name; ?></strong></h3>
                                <div class="row row-cols-5">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
                                        <form id="modbusiness" action="savebusinessinfo.php" method="post" name="modbusiness">
                                            <div class="row">
                                                <input type="hidden" name="business_id" value="<?php echo $busi_id;?>">
                                                <div class="col-md-6 col-lg-6 col-xl-5 col-xxl-6 text-start align-self-center">
                                                    <div class="select-control mb-3"><label class="form-label">Current business type: <?php echo $busi_type; ?></label><select class="form-select" style="border-radius: 10px;" name="businesstype" autofocus required>
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
                                                        </select></div>
                                                </div>
                                                <div class="col-xxl-6 align-self-center">
                                                    <div class="w-100"></div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 offset-xxl-0 align-self-center">
                                                    <div class="form-floating mb-3"><input class="form-control" type="text" placeholder="Enter Business Name" required style="border-radius: 10px;" name="businessname" required value="<?php echo $busi_name; ?>" /><label class="form-label">Business Name</label></div>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 align-self-center">
                                                    <div class="form-floating mb-3"><input class="form-control" type="text" placeholder="Enter Business Name" required style="border-radius: 10px;" name="businessaddress" value="<?php echo $busi_addr; ?>" /><label class="form-label">Business Address</label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-12 align-self-center">
                                                    <div class="form-floating mb-3"><input class="form-control" type="text" placeholder="Description" required style="border-radius: 10px;" name="businessdesc" value="<?php echo $busi_desc; ?>" /><label class="form-label">Business Description</label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xxl-6 align-self-center">
                                                    <div class="text-start form-floating mb-3">
                                                        <div class="btn-group btn-group-sm" role="group"><button class="btn btn-primary" type="submit" style="margin-right: 8px;border-radius: 10px;" name="submit" form="modbusiness">Save</button><a class="btn btn-outline-primary" href="editbusiness.php" style="border-radius: 10px;">Cancel</a></div>
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