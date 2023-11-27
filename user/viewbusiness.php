<?php
session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
$business_id = $_GET['id'];

$add_view = mysqli_query($cxn, "UPDATE user_business_visits SET businessID = '$business_id', userID='$user_id', action='VISIT'");

header("Location: business_view.php?id=" . $business_id);
