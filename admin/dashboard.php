<?php
session_start();
include '../db.php';

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

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow navbar-shrink navbar-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="../assets/img/miagao_one.png" width="85" height="70" /><span style="margin-left: 5px;">One Miagao<br />Negosyo</span>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="./dashboard.php">Home</a></li>
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

    <section id="masthead">
        <div class="container">
            <div class="row">
                <div class="col align-self-center">
                    <h1 class="text-center">Welcome to<br /><strong>Administrators&#39;</strong><br /><strong>Dashboard</strong></h1>
                </div>
                <div class="col"><img src="../assets/img/illustrations/presentation.svg"></div>
            </div>
        </div>
    </section>

    <section class="m-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><strong>Overview</strong></h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Users</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 offset-xxl-0" style="text-align: center;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Registration</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1">10</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-0" style="text-align: center;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Visits</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1">20</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-0" style="text-align: center;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Favorites</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1">5</h1>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col">
                    <h3>Entrepreneurs</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-4 offset-xxl-0" style="text-align: center;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Registration</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1">5</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-0" style="text-align: center;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Profile Visits</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1">12</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-0" style="text-align: center;">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header">
                            <h5 class="mb-0"><strong>Product Favorites</strong></h5>
                        </div>
                        <div class="card-body">
                            <h1 class="display-1">5</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-4 py-xl-5">
            <div class="row">
                <div class="col-xl-12">
                    <h2>New Entrepreneur Request</h2>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-4 m-2" style="background: var(--bs-secondary-bg);border-radius: 10px;">
                    <div class="d-flex align-items-center align-items-md-start align-items-xl-center">
                        <div class="bs-icon-md bs-icon-circle bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center me-4 d-inline-block bs-icon xl"><svg class="bi bi-bell" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
                            </svg></div>
                        <div>
                            <h4>Brgy. Cagbang Pottery</h4>
                            <p>October 11, 2023 | 09: 40: 39  AM </p><button class="btn btn-primary btn-sm" type="submit" style="border-radius: 10px;">Accept</button><button class="btn btn-outline-danger btn-sm mx-2" type="submit" style="border-radius: 10px;">Decline</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <h1><strong>Insights</strong></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <h3>Registered Businesses</h3>
                    <div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="table-light">
                                    <th>Name of Business</th>
                                    <th>Name of Entrepreneur</th>
                                    <th>Registration Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Spinner&#39;s Herbal Products and Wellness Center</td>
                                    <td>Ligaya Spinner</td>
                                    <td>September 22, 2023</td>
                                </tr>
                                <tr>
                                    <td>Indag-an Primary Multipurpose Cooperative</td>
                                    <td>Anilene Tejing</td>
                                    <td>August 27, 2023</td>
                                </tr>
                                <tr>
                                    <td>Chemon&#39;s Ongyod Coffee Manufacturing</td>
                                    <td>Ramon Farofil</td>
                                    <td>July 20, 2023</td>
                                </tr>
                                <tr>
                                    <td>Cagbang Pottery</td>
                                    <td>Guia Ferrer</td>
                                    <td>July 19, 2023</td>
                                </tr>
                                <tr>
                                    <td>Rofelie&#39;s Delicacies</td>
                                    <td>Rofelie Acosta</td>
                                    <td>July 15, 2023</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center">See More</p>
                </div>
                <div class="col-xxl-12">
                    <h3>Registered Products</h3>
                    <div>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="table-light">
                                    <th>Name of Product</th>
                                    <th>Name of Business</th>
                                    <th>Date Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Herbal Products</td>
                                    <td>Spinner&#39;s Herbal Products and Wellness Center</td>
                                    <td>September 22, 2023</td>
                                </tr>
                                <tr>
                                    <td>Hablon</td>
                                    <td>Indag-an Primary Multipurpose Cooperative</td>
                                    <td>August 27, 2023</td>
                                </tr>
                                <tr>
                                    <td>Coffee</td>
                                    <td>Chemon&#39;s Ongyod Coffee Manufacturing</td>
                                    <td>July 20, 2023</td>
                                </tr>
                                <tr>
                                    <td>Pottery</td>
                                    <td>Cagbang Pottery</td>
                                    <td>July 19, 2023</td>
                                </tr>
                                <tr>
                                    <td>Peanut Candy</td>
                                    <td>Rofelie&#39;s Delicacies</td>
                                    <td>July 15, 2023</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="text-center">See More</p>
                </div>
            </div>
        </div>
    </section>


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
</body>

</html>