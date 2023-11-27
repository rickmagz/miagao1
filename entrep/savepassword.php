<?php

session_start();
include '../db.php';


if (isset($_POST['submit'])) {
    $entrep_id = $_SESSION['entrep_id'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $rpass = $_POST['rpass'];

    //get current password
    $current_pass = mysqli_query($cxn, "SELECT password FROM entrep WHERE entrep_id='$entrep_id'");
    if (mysqli_num_rows($current_pass) >= 1) {
        $p = mysqli_fetch_assoc($current_pass);
        $cpass = $p['password'];

        if ($cpass != $oldpass) {
            echo "<script type='text/javascript'>alert('Password do not match in our records! Try again.'); location.href='editentrepcredentials.php?id=" . $entrep_id . "';</script>";
        } else {
            if ($newpass == $rpass) {
                $update_pass = mysqli_query($cxn, "UPDATE entrep SET password='$newpass' WHERE entrep_id='$entrep_id'") or die("Error in query: $update_pass" . mysqli_error($cxn));

                echo "<script type='text/javascript'>alert('Password Updated! Log in again.'); location.href='../entrep/index.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Password don't match! Try again.'); location.href='editentrepcredentials.php?id=" . $entrep_id . "';</script>";
            }
        }
    }
}
