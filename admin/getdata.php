<?php
session_start();
include './db.php';

//get total of pending entrep
$stmt = $cxn->prepare("SELECT * FROM entrep WHERE status='PENDING'");
$stmt->execute();
$pending_entrep = $stmt->get_result();
$total_pending_entrep = $pending_entrep->num_rows;

date_default_timezone_set("Asia/Manila");
$date = date('m/d/Y h:i:s A');

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Dashboard - Miagao One Negosyo Center</title>
    <link rel="icon" type="image/png" sizes="310x310" href="../assets/img/Miagao-logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<style>
    @media print {
        #printbtn {
            display: none;
        }

    }
</style>

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow navbar-shrink navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../assets/img/miagao_one.png" width="85" height="70" /><span style="margin-left: 5px;">One Miagao<br />Negosyo</span>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="./dashboard.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link " href="./business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link" href="./products.php">Products</a></li>
                    <li class="nav-item">
                        <a class="nav-link active bg-light" href="./notifications.php" style="border-radius: 10px; margin-right: 10px;">
                            Notifications&emsp13;<span class="badge rounded-pill text-bg-danger">
                                <?php echo $total_pending_entrep; ?></span>
                        </a>
                    </li>
                    <li class="nav-item fw-bold d-flex align-items-center">
                        <div class="nav-item dropdown bg-primary border rounded-pill border-primary shadow d-flex align-items-center" style="padding-left: 14px;padding-right: 14px;"><a class="dropdown-toggle link-light" aria-expanded="false" data-bs-toggle="dropdown" href="#">Menu</a>
                            <div class="dropdown-menu text-break border rounded" style="margin-bottom: 0px;padding-left: 0px;padding-right: 0px;margin-right: 0px;margin-top: 0px;padding-top: 8px;padding-bottom: 8px;">
                                <a class="dropdown-item" href="#" style="display: flex;overflow: hidden;">
                                    <img width="30" height="30" src="../assets/img/Screenshot_2021-01-28-04-41-56-92.jpg">
                                    &nbsp;<strong><?php echo $_SESSION['firstname']; ?></strong>
                                </a>
                                <a class="dropdown-item" href="./accountsettings.php">Account Settings</a>
                                <a class="dropdown-item" href="./getdata.php">Download system data</a>
                                <a class="dropdown-item" href="../logout.php">Log out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-3 py-xl-5" id="print">
        <div class="row">
            <div class="col-xl-12">
                <h2>System Data</h2>
            </div>
            <div class="text-left mb-2">
                <span>Data Update: <?php echo $date; ?></span><br />
                <button class="btn btn-dark btn-sm" onclick="printDiv()" id="printbtn">Print Data</button>
            </div>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4">Registered Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>User ID</th>
                            <th>Full Name</th>
                            <th>E-mail Address</th>
                            <th>Registration Date</th>
                        </tr>
                        <tr>
                            <?php
                            $user = 0;
                            $users_data = mysqli_query($cxn, "SELECT * FROM user");
                            if (mysqli_num_rows($users_data) > 0) {
                                while ($u = mysqli_fetch_assoc($users_data)) {


                            ?>
                                    <td>
                                        <?php echo $u['user_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $u['first_name']; ?> <?php echo $u['last_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $u['email']; ?>
                                    </td>
                                    <td>
                                        <?php echo $u['added']; ?>
                                    </td>
                        </tr>

                <?php
                                    $user++;
                                }
                            }
                ?>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4">Registered Entrepreneurs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Entrepreneur ID</th>
                            <th>Full Name</th>
                            <th>E-mail Address</th>
                            <th>Registration Date</th>
                        </tr>
                        <tr>
                            <?php
                            $entrep = 0;
                            $entrep_data = mysqli_query($cxn, "SELECT * FROM entrep");
                            if (mysqli_num_rows($entrep_data) > 0) {
                                while ($e = mysqli_fetch_assoc($entrep_data)) {


                            ?>
                                    <td>
                                        <?php echo $e['entrep_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $e['first_name']; ?> <?php echo $e['last_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $e['email_add']; ?>
                                    </td>
                                    <td>
                                        <?php echo $e['added']; ?>
                                    </td>
                        </tr>

                <?php
                                    $entrep++;
                                }
                            }
                ?>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="5">Registered Business</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Business ID</th>
                            <th>Business Name</th>
                            <th>Business Type</th>
                            <th>Address</th>
                            <th>Registration Date</th>
                        </tr>
                        <tr>
                            <?php
                            $busi = 0;
                            $busi_data = mysqli_query($cxn, "SELECT * FROM business_list");
                            if (mysqli_num_rows($busi_data) > 0) {
                                while ($b = mysqli_fetch_assoc($busi_data)) {


                            ?>
                                    <td>
                                        <?php echo $b['business_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $b['business_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $b['business_type']; ?>
                                    </td>
                                    <td>
                                        <?php echo $b['business_address']; ?>
                                    </td>
                                    <td>
                                        <?php echo $b['added']; ?>
                                    </td>
                        </tr>

                <?php
                                    $busi++;
                                }
                            }
                ?>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="4">Registered Products</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>Registration Date</th>
                        </tr>
                        <tr>
                            <?php
                            $prod = 0;
                            $prod_data = mysqli_query($cxn, "SELECT * FROM product_list");
                            if (mysqli_num_rows($prod_data) > 0) {
                                while ($p = mysqli_fetch_assoc($prod_data)) {


                            ?>
                                    <td>
                                        <?php echo $p['product_id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $p['product_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $p['product_type']; ?>
                                    </td>
                                    <td>
                                        <?php echo $p['added']; ?>
                                    </td>
                        </tr>

                <?php
                                    $prod++;
                                }
                            }
                ?>
                    </tbody>
                </table>
            </div>




        </div>
    </div>

    <footer>
        <div class="container py-4 py-lg-5">
            <hr>
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
    <script>
        function printDiv() {
            var div = document.getElementsByTagName("print");
            window.print(div.innerHTML);
        }
    </script>
</body>

</html>