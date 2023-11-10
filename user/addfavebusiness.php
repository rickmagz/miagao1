<?php
session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
$business_id = $_GET['id'];

$add_busfave = mysqli_query($cxn, "INSERT INTO user_business_reactions(userID,businessID,action) VALUES('$user_id','$business_id','LIKED')") or die("Error in query: $add_busfave." . mysqli_error($cxn));

header("Location: business_view.php?id=" . $business_id);
