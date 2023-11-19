<?php
session_start();
include 'db.php';

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Log in - Miagao Negosyo Center</title>
    <link rel="icon" type="image/png" sizes="310x310" href="assets/img/Miagao-logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top shadow navbar-shrink navbar-light" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.html"><img src="assets/img/miagao_one.png" width="85" height="70" /><span style="margin-left: 5px;">One Miagao<br />Negosyo</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                    <a class="btn btn-secondary border rounded-pill shadow" role="button" href="signup.php">SIGN UP</a>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="container py-md-5">
            <div class="row">
                <div class="col-12 col-sm-5 col-md-6 text-center" id="head-illustration"><img class="img-fluid w-100" src="assets/img/illustrations/register.svg"></div>
                <div class="col-sm-6 col-md-5 col-xl-4 col-xxl-4 text-center text-md-start">
                    <h2 class="display-6 fw-bold mb-5"><span class="underline pb-1"><strong>Log in</strong></span></h2>

                    <form action="login.php" method="post" id="login">
                        <div class="mb-3"><input class="shadow-sm form-control" type="email" name="email" placeholder="Email" require></div>
                        <div class="mb-3"><input class="shadow-sm form-control" type="password" name="password" placeholder="Password" require></div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-10 col-xl-9">
                                    <button class="btn btn-primary border rounded-pill shadow" type="submit" style="margin-bottom: 10px;margin-right: 20px;" name="login" form="login">Log in</button>
                                </div>

                            </div>
                        </div>
                    </form>

                    <p class="text-muted">Don't have an account? <a href="signup.php">Sign up here&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <line x1="15" y1="16" x2="19" y2="12"></line>
                                <line x1="15" y1="8" x2="19" y2="12"></line>
                            </svg></a>&nbsp;</p>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login = mysqli_query($cxn, "SELECT * FROM user WHERE email='$email' AND password='$password'");

        if (mysqli_num_rows($login) > 0) {
            $l = mysqli_fetch_assoc($login);
            $_SESSION['user_id'] = $l['user_id'];
            $_SESSION['firstname'] = $l['first_name'];
            $_SESSION['lastname'] = $l['last_name'];
            $_SESSION['email'] = $l['email'];
            echo '<script type="text/javascript">location.href = "user/browse.php"; </script>';
        } else {
            echo '<script type="text/javascript"> alert("Invalid Credentials!")</script>';
        }
    }
    ?>
    <footer>
        <div class="container py-4 py-lg-5">
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">Copyright © 2023 One Negosyo Miagao</p>
                <ul class="list-inline mb-0">
                <li class="list-inline-item"><img src="assets/img/miagao_one.png" width="85" height="70" /></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>