<?php

session_start();
include '../db.php';

if (isset($_POST['updateimg'])) {
    $user_id = $_SESSION['user_id'];
   
    $image = $_POST['oldimage'];
    $oldImagePath = mysqli_query($cxn, "SELECT image FROM user WHERE user_id='$user_id'");
    if (mysqli_num_rows($oldImagePath) >= 1) {
        $row = mysqli_fetch_assoc($oldImagePath);
        $oldImage = $row['image'];
    }

    $newImage = $_FILES['image']['tmp_name'];
    $newImagePath = "../assets/img/user_img/" . basename($_FILES['image']['name']);

    if (move_uploaded_file($newImage, $newImagePath)) {
        // Update database record
        $updateQuery = "UPDATE user SET image='$newImage' WHERE user_id='$user_id'";
        mysqli_query($cxn, $updateQuery);

        // Delete old image (optional)
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        echo "<script type='text/javascript'> alert('Account image updated!'); location.href='./accountsettings.php?id" . $user_id . "'</script>";
    } else {
        echo "<script type='text/javascript'> alert('File upload failed!'); location.href = 'edituserpicture.php?id=" . $user_id . "'; </script>";
    }
}
