<?php
include '../db.php';
session_start();
$user_id = $_SESSION['user_id'];

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
    $business_similarityScore[$unseenBusinessID] = 0;

    //get all users who have visited or faved the unseen business
    $business_similarUsersQuery = mysqli_query($cxn, "SELECT userID FROM user_business_visits WHERE businessID = $unseenBusinessID UNION SELECT userID FROM user_business_faves WHERE businessID = $unseenBusinessID");
    while ($similarBusiness_userRow = mysqli_fetch_assoc($business_similarUsersQuery)) {
        $similarBusiness_userID = $similarBusiness_userRow['userID'];

        //Check if current user has visited or faved the same business as the similar user, then increment the similarity score
        if ($user_id != $similarBusiness_userID) {
            $similarBusiness_query = mysqli_query($cxn, "SELECT businessID FROM user_business_visits WHERE userID = $user_id AND businessID IN (SELECT businessID FROM user_business_visits WHERE userID = $similarBusiness_userID) UNION SELECT businessID from user_business_faves WHERE userID = $user_id AND productID IN (SELECT businessID FROM user_business_faves WHERE userID = $similarBusiness_userID)");
            $num_SimilarBusinessItems = mysqli_num_rows($similarBusiness_query);

            $business_similarityScore[$unseenBusinessID] += $num_SimilarBusinessItems;
        }
    }
}

//Sort the similarity scores in descending order
arsort($business_similarityScore);

//Recommend the top 5 unseen business with the highest similarity score
$recommendedBusinessItems = array_slice(array_keys($business_similarityScore), 0, 5);

echo "Recommended Business: ";
foreach ($recommendedBusinessItems as $recommendedBusinessID) {
    echo $recommendedBusinessID . ", ";
}
