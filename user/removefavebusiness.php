<?php
session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
$bus_id = $_GET['id'];

$rem_busfave = mysqli_query($cxn, "DELETE FROM user_business_reactions WHERE userID ='$user_id' AND businessID='$bus_id'") or die("Error in query: $rem_busfave." . mysqli_error($cxn));

header("Location: business_view.php?id=" . $bus_id);
