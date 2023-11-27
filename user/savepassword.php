<?php

session_start();
include '../db.php';


if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $rpass = $_POST['rpass'];

    //get current password
    $current_pass = mysqli_query($cxn, "SELECT password FROM user WHERE user_id='$user_id'");
    if (mysqli_num_rows($current_pass) >= 1) {
        $p = mysqli_fetch_assoc($current_pass);
        $cpass = $p['password'];

        if ($cpass != $oldpass) {
            echo "<script type='text/javascript'>alert('Password do not match! Try again.'); location.href='editusercredentials.php?id=" . $user_id . "';</script>";
        } else {
            if ($newpass == $rpass) {
                $update_pass = mysqli_query($cxn, "UPDATE user SET password='$newpass' WHERE user_id='$user_id'") or die("Error in query: $update_pass" . mysqli_error($cxn));

                echo "<script type='text/javascript'>alert('Password Updated! Log in again.'); location.href='../login.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Password don't match! Try again.'); location.href='editusercredentials.php?id=" . $user_id . "';</script>";
            }
        }
    }
}
