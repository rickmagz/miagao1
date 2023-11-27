<?php

include '../db.php';
session_start();
$user_id = $_SESSION['user_id'];

//all product visited by current user
$product_visitedItems = array();
$product_visitQuery = mysqli_query($cxn, "SELECT productID FROM user_product_visits WHERE userID = '$user_id'");
while ($product_visitedRow = mysqli_fetch_assoc($product_visitQuery)) {
    $product_visitedItems[] = $product_visitedRow['productID'];
}

//all faved product by the current user
$product_faveItems = array();
$product_faveQuery = mysqli_query($cxn, "SELECT productID FROM user_product_faves WHERE userID = '$user_id'");
while ($product_faveRow = mysqli_fetch_assoc($product_faveQuery)) {
    $product_faveItems[] = $product_faveRow['productID'];
}

//all products not visited or liked by the current user
$unseenProducts = array();
$unseenProducts_query = mysqli_query($cxn, "SELECT product_id FROM product_list WHERE product_id NOT IN(" . implode(',', $product_visitedItems) . ") AND product_id NOT IN (" . implode(',', $product_faveItems) . ")");
while ($unseenProduct_row = mysqli_fetch_assoc($unseenProducts_query)) {
    $unseenProductItems[] = $unseenProduct_row['product_id'];
}

//Calculation of similarity scores of products between the current user and other users
$product_similarityScore = array();
foreach ($unseenProductItems as $unseenProductID) {
    $product_similarityScore[$unseenProductID] = 0;

    //get all users who have visited or faved the unseen product
    $product_similarUsersQuery = mysqli_query($cxn, "SELECT userID FROM user_product_visits WHERE productID = $unseenProductID UNION SELECT userID FROM user_product_faves WHERE productID = $unseenProductID");
    while ($similarProduct_userRow = mysqli_fetch_assoc($product_similarUsersQuery)) {
        $similarProduct_userID = $similarProduct_userRow['userID'];

        //Check if current user has visited or liked the same products as the similar user, then increment the similarity score
        if ($user_id != $similarProduct_userID) {
            $similarProduct_query = mysqli_query($cxn, "SELECT productID FROM user_product_visits WHERE userID = $user_id AND productID IN (SELECT productID FROM user_product_visits WHERE userID = $similarProduct_userID) UNION SELECT productID from user_product_faves WHERE userID = $user_id AND productID IN(SELECT productID FROM user_product_faves WHERE userID = $similarProduct_userID)");
            $num_SimilarProductsItems = mysqli_num_rows($similarProduct_query);

            $product_similarityScore[$unseenProductID] += $num_SimilarProductsItems;
        }
    }
}

//Sort the similariity scores in descending order
arsort($product_similarityScore);

//Recommend the top 10 unseen products with the highest similarity scores
$recommendedProductItems = array_slice(array_keys($product_similarityScore), 0, 10);

echo "Recommended Products: ";
foreach ($recommendedProductItems as $recommendedProductID) {
    echo $recommendedProductID . ", ";
}
