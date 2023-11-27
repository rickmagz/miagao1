<?php

session_start();
include 'db.php';


if (isset($_POST['submit'])) {
    $admin_id = $_SESSION['admin_id'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $rpass = $_POST['rpass'];

    //get current password
    $current_pass = mysqli_query($cxn, "SELECT password FROM admin WHERE admin_id='$admin_id'");
    if (mysqli_num_rows($current_pass) >= 1) {
        $p = mysqli_fetch_assoc($current_pass);
        $cpass = $p['password'];

        if ($cpass != $oldpass) {
            echo "<script type='text/javascript'>alert('Password do not match in our records! Try again.'); location.href='editadmincredentials.php?id=" . $admin_id . "';</script>";
        } else {
            if ($newpass == $rpass) {
                $update_pass = mysqli_query($cxn, "UPDATE admin SET password='$newpass' WHERE admin_id='$admin_id'") or die("Error in query: $update_pass" . mysqli_error($cxn));

                echo "<script type='text/javascript'>alert('Password Updated! Log in again.'); location.href='../admin/index.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Password don't match! Try again.'); location.href='editadmincredentials.php?id=" . $admin_id . "';</script>";
            }
        }
    }
}
