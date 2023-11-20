<?php
include '../db.php';
session_start();

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin - Miagao One Negosyo Center</title>
    <link rel="icon" type="image/png" sizes="310x310" href="../assets/img/Miagao-logo.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-12 offset-xl-8" style="text-align: center;margin: 0px;">
                <div class="card mb-5" style="background: var(--bs-card-cap-bg);border-style: none;">
                    <div class="card-body d-flex flex-column align-items-center" style="background: var(--bs-card-bg);border-radius: 24px;padding-bottom: 0px;padding-top: 36px;">
                        <div>
                            <img src="../assets/img/miagao_one.png" width="175" height="150" /><span style="font-size: 24px;color: var(--bs-blue);"><br><strong>ONe Miagao Negosyo</strong><br><strong>Administrators' Dashboard</strong></span>
                        </div>

                        <form class="text-center" method="post" action="../admin/index.php" id="login" style="margin: 5px;">
                            <div class="row" style="padding-top: 28px;padding-bottom: 28px;">
                                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 offset-sm-2 offset-md-2 offset-lg-2 offset-xl-2" style="padding-bottom: 12px;">
                                    <input class="form-control" type="email" name="email" placeholder="Email" autofocus="" required="" style="border-radius:10px;">
                                </div>
                                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 offset-sm-2 offset-md-2 offset-lg-2 offset-xl-2">
                                    <input class="form-control" type="password" name="password" placeholder="Password" style="border-radius:10px;">
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-sm-3 offset-md-3 offset-lg-3 offset-xl-3 align-self-center" style="padding-top: 15px;">
                                    <button class="btn btn-primary d-block w-100" type="submit" name="login" form="login" style="border-radius:10px;">Login</button>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-sm-3 offset-md-3 offset-lg-3 offset-xl-3 align-self-center">
                                <a class="btn btn-outline-primary" href="../index.php" style="border-radius:10px;">Back to home</a>

                            </div>

                            <?php
                            if (isset($_POST['login'])) {
                                $email = $_POST['email'];
                                $password = $_POST['password'];

                                $login = mysqli_query($cxn, "SELECT * FROM admin WHERE email_add='$email' AND password='$password'");

                                if (mysqli_num_rows($login) > 0) {
                                    $l = mysqli_fetch_assoc($login);
                                    $_SESSION['firstname'] = $l['first_name'];
                                    $_SESSION['lastname'] = $l['last_name'];
                                    $_SESSION['email'] = $l['email'];
                                    header("Location: ./dashboard.php?=");
                                } else {
                                    echo '<script type="text/javascript"> alert("Invalid Credentials!")</script>';
                                }
                            }
                            ?>


                            <p class="text-muted"><br><span style="color: rgb(0, 0, 0);">©&nbsp;One Miagao Negosyo 2023</span><br><br></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>