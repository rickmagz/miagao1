<?php
session_start();
include '../db.php';

$user_id = $_SESSION['user_id'];
$comment_id = $_GET['id'];
$feedback = $_POST['comment'];

$post_comment = mysqli_query($cxn, "INSERT INTO user_product_feedback(userID,productID,feedback) VALUES('$user_id','$comment_id','$feedback')") or die("Error in query: $post_comment." . mysqli_error($cxn));

header("Location: productview.php?id=" . $comment_id);
