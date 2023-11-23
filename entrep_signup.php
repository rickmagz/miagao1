<?php
include 'db.php';

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign up - Miagao Negosyo Center</title>
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
                    <a class="btn btn-primary border rounded-pill shadow" role="button" href="login.php">LOG IN</a>
                </ul>
            </div>
        </div>
    </nav>
    <section>
        <div class="container py-md-5">
            <div class="row">
                <div class="col-md-6 col-xl-5 text-center" id="sign-illustration"><img class="img-fluid w-100" src="assets/img/illustrations/register.svg"></div>
                <div class="col-md-5 col-xl-7 text-center text-md-start">
                    <h2 class="display-6 fw-bold mb-4"><span class="underline pb-1"><strong>Entrepreneur<br />REGISTRATION</strong></span></h2>

                    <form action="entrep_signup.php" method="post" id="entrep_signup" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-12">
                                <label class="form-label">Profile Image</label>
                                <div class="mb-3"><input class="border rounded-pill form-control" type="file" name="image" required=""></div>

                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3"><input class="border rounded-pill form-control" type="text" name="firstname" placeholder="First Name" required=""></div>
                                <div class="mb-3"><input class="border rounded-pill form-control" type="text" name="lastname" placeholder="Last Name" required=""></div>
                                <div class="mb-3"></div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3"><input class="border rounded-pill form-control" type="email" name="email" placeholder="Email" required></div>
                                <div class="mb-3"><input class="border rounded-pill shadow-sm form-control" type="password" name="password" placeholder="Password" required></div>
                            </div>
                        </div>
                        <div class="mb-5" style="margin: 0px;">
                            <div class="row">
                                <div class="col-xl-5">
                                    <button class="btn btn-primary border rounded-pill shadow" type="submit" style="margin-bottom: 10px; margin-right: 20px;" name="entrep_signup" form="entrep_signup">Create account</button>

                                </div>

                            </div>
                        </div>
                        <p class="text-muted">Have an account? <a href="/entrep/index.php">Log in&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <line x1="15" y1="16" x2="19" y2="12"></line>
                                    <line x1="15" y1="8" x2="19" y2="12"></line>
                                </svg></a>&nbsp;</p>
                        <p class="text-muted">Sign up as <a href="signup.php">User&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-arrow-narrow-right">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <line x1="15" y1="16" x2="19" y2="12"></line>
                                    <line x1="15" y1="8" x2="19" y2="12"></line>
                                </svg></a>&nbsp;</p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php



    if (isset($_POST['entrep_signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $upload_folder = "./assets/img/entrep_img/";

        $check_email = mysqli_query($cxn, "SELECT * FROM entrep WHERE email_add='$email'");

        if ($check_email->num_rows > 0) {
            echo "<script type='text/javascript'> alert('Email already registered!'); location.href='signup.php'; </script>";
        } else {
            $image = basename($_FILES["image"]["name"]);
            $targetFileFolder = $upload_folder . $image;
            $fileType = pathinfo($targetFileFolder, PATHINFO_EXTENSION);
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'JPG', 'JPEG', 'PNG');

            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFileFolder)) {
                    $entrep_signup = mysqli_query($cxn, "INSERT INTO entrep(first_name,last_name,email_add,password,status,image) VALUES('$firstname','$lastname','$email','$password','PENDING','$image')") or die("Error in query: $entrep_signup " . mysqli_error($cxn));

                    echo "<script type='text/javascript'> alert('Registration Successful! Click to log in.'); location.href = 'entrep/index.php'; </script>";
                } else {
                    echo "<script type='text/javascript'> alert('File upload failed!'); location.href = 'entrep_signup.php'; </script>";
                }
            } else {
                echo "<script type='text/javascript'> alert('Invalid file type!'); location.href = 'entrep_signup.php'; </script>";
            }
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