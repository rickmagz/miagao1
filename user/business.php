<?php
session_start();
include '../db.php';
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Featured Businesses - Miagao Negosyo Center</title>
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
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="browse.php">
                <img src="../assets/img/miagao_one.png" width="85" height="70" /><span style="margin-left: 5px;">One Miagao<br />Negosyo</span>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link " href="./browse.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="./business.php">Business</a></li>
                    <li class="nav-item"><a class="nav-link " href="./products.php">Products</a></li>
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
        <div class=" container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2><strong>Featured Businesses For You</strong></h2>
                    <p class="w-lg-50">Here the list of businesses based on your interests.</p>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" style="margin-top: -65px;">
                <?php
                $business_list = 0;
                $get_business = mysqli_query($cxn, "SELECT * FROM business_list ORDER BY rand() LIMIT 4");

                if ($get_business->num_rows > 0) {
                    while ($b = mysqli_fetch_assoc($get_business)) {
                        $busi_id = $b['business_id'];
                        $busi_name = $b['business_name'];
                        $busi_type = $b['business_type'];
                        $busi_add = $b['business_address'];
                        $busi_img = $b['business_image'];
                        $busi_like = $b['business_likes'];
                        $business_list++;
                ?>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div class="card">
                                <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="../assets/img/business_img/<?php echo $busi_img; ?>" />
                                <div class="card-body p-2 text-center">
                                    <p class="text-primary card-text mb-0"><?php echo $busi_type; ?></p>
                                    <h5 class="card-title"><?php echo $busi_name; ?></h5>
                                </div>
                                <div class="card-footer text-body-secondary text-center">
                                    <a class="btn btn-outline-primary btn-sm border-primary rounded-pill mt-1" href="./viewbusiness.php?id=<?php echo $busi_id; ?>" target="_self">More Info</a>
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
                    <h2><strong>Business Recommendations</strong></h2>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" style="margin-top: -65px;">
                <?php
                $user_id = $_SESSION['user_id'];

                // Check if there are any visited businesses for the current user
                $business_visitQuery = "SELECT COUNT(*) FROM user_business_visits WHERE userID = '$user_id'";
                $business_visitResult = mysqli_query($cxn, $business_visitQuery);
                $business_visitCount = mysqli_fetch_row($business_visitResult)[0];

                // Check if there are any favorited businesses for the current user
                $business_faveQuery = "SELECT COUNT(*) FROM user_business_faves WHERE userID = '$user_id'";
                $business_faveResult = mysqli_query($cxn, $business_faveQuery);
                $business_faveCount = mysqli_fetch_row($business_faveResult)[0];

                // Proceed with the recommendation logic if both visited and favorited businesses exist
                if ($business_visitCount > 0 && $business_faveCount > 0) {


                ?>
                    <!-- algorithm starts here -->
                    <?php

                    //all business visited by the current user
                    $business_visitedItems = array();
                    $business_visitQuery = "SELECT businessID FROM user_business_visits WHERE userID = '$user_id'";
                    $business_visitResult = mysqli_query($cxn, $business_visitQuery);
                    while ($business_visitedRow = mysqli_fetch_assoc($business_visitResult)) {
                        $business_visitedItems[] = $business_visitedRow['businessID'];
                    }

                    //all faved business by the current user
                    $business_faveItems = array();
                    $business_faveQuery = "SELECT businessID FROM user_business_faves WHERE userID = '$user_id'";
                    $business_faveResult = mysqli_query($cxn, $business_faveQuery);
                    while ($business_faveRow = mysqli_fetch_assoc($business_faveResult)) {
                        $business_faveItems[] = $business_faveRow['businessID'];
                    }


                    //Get all businesses that the current user has not visited or liked
                    $unseenBusiness = array();
                    $unseenBusiness_query = "SELECT business_id FROM business_list WHERE business_id NOT IN(" . implode(',', $business_visitedItems) . ") AND business_id NOT IN (" . implode(',', $business_faveItems) . ")";
                    $unseenBusiness_result = mysqli_query($cxn, $unseenBusiness_query);
                    while ($unseenBusiness_row = mysqli_fetch_assoc($unseenBusiness_result)) {
                        $unseenBusinessItems[] = $unseenBusiness_row['business_id'];
                    }

                    //Calculation of similarity score of businesses between the current user and other users
                    $business_similarityScore = array();
                    foreach ($unseenBusinessItems as $unseenBusinessID) {
                        $business_similarityScore[$unseenBusinessID] = 1;

                        //get all users who have visited or faved the unseen business
                        $business_similarUsersQuery = mysqli_query($cxn, "SELECT userID FROM user_business_visits WHERE businessID = $unseenBusinessID UNION SELECT userID FROM user_business_faves WHERE businessID = $unseenBusinessID");
                        while ($similarBusiness_userRow = mysqli_fetch_assoc($business_similarUsersQuery)) {
                            $similarBusiness_userID = $similarBusiness_userRow['userID'];

                            //Check if current user has visited or faved the same business as the similar user, then increment the similarity score
                            if ($user_id != $similarBusiness_userID) {
                                $similarBusiness_query = mysqli_query($cxn, "SELECT businessID FROM user_business_visits WHERE userID = $user_id AND businessID IN (SELECT businessID FROM user_business_visits WHERE userID = $similarBusiness_userID) UNION SELECT businessID from user_business_faves WHERE userID = $user_id AND businessID IN (SELECT businessID FROM user_business_faves WHERE userID = $similarBusiness_userID)");
                                $num_SimilarBusinessItems = mysqli_num_rows($similarBusiness_query);

                                $business_similarityScore[$unseenBusinessID] += $num_SimilarBusinessItems;
                            }
                        }
                    }

                    //Sort the similarity scores in descending order
                    arsort($business_similarityScore);

                    //Recommend the top unseen business with the highest similarity score
                    $recommendedBusinessItems = array_slice(array_keys($business_similarityScore), 1, 10);

                    //                echo "Recommended Business: ";
                    foreach ($recommendedBusinessItems as $recommendedBusinessID) {
                        //echo $recommendedBusinessID . ", ";
                        $business = 0;
                        $recommendBusiness = mysqli_query($cxn, "SELECT * FROM business_list WHERE business_id = '$recommendedBusinessID'");
                        if (mysqli_num_rows($recommendBusiness) > 0) {
                            while ($r = mysqli_fetch_assoc($recommendBusiness)) {
                    ?>
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                    <div class="card">
                                        <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="../assets/img/<?php echo $r['business_image']; ?>" />
                                        <div class="card-body p-2 text-center">
                                            <p class="text-primary card-text mb-0"><?php echo $r['business_type']; ?></p>
                                            <h5 class="card-title"><?php echo $r['business_name']; ?></h5>
                                        </div>
                                        <div class="card-footer text-body-secondary text-center">
                                            <a class="btn btn-outline-primary btn-sm border-primary rounded-pill mt-1" href="./viewbusiness.php?id=<?php echo $r['business_id']; ?>" target="_self">More Info</a>
                                        </div>
                                    </div>
                                </div>
                <?php

                            }
                            $business++;
                        }
                    }
                } else {
                    echo ' <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3"><p class="text-center">No recommendations for now.</p></div>';
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