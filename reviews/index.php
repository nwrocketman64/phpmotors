<?php
// The Review Controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the review model
require_once '../model/reviews-model.php';
// Get the functions library
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = navbar($classifications);

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action){

    case 'addReview':
        // Get the input
        $newReview = filter_input(INPUT_POST, 'newReview', FILTER_SANITIZE_STRING);
        $clientId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
        $vehicleId = filter_input(INPUT_POST, 'carId', FILTER_SANITIZE_NUMBER_INT);

        // Check for missing data
        if(empty($newReview) || empty($clientId) || empty($vehicleId)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        // Add the review to the database.
        $AddReviewReport = addReview($newReview, $vehicleId, $clientId);

        // Check and report the result
        if($AddClassReport === 1){
            $message = "<p>Review has been added.</p>";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $message = "<p>Sorry, there was an error. Please try again.</p>";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        break;

    case 'confirmEdit':
        // Get user input.
        $reviewId = filter_input(INPUT_GET, 'review', FILTER_SANITIZE_NUMBER_INT);

        // Get the review information
        $review = getReview($reviewId);

        // Deliver the view.
        include '../view/update-review.php';
        break;

    case 'editReview':
        // Get user input.
        $reviewId = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_POST, 'editReview', FILTER_SANITIZE_STRING);

        // Check for missing data
        if(empty($reviewId) || empty($reviewText)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/update-review.php';
            exit;
        }

        // Update the review
        $updateReport = updateReview($reviewText, $reviewId);

        // Generate the correct message.
        if ($updateReport == 1){
            $_SESSION['message'] = "The post was successfully updated.";
        } else {
            $_SESSION['message'] = "Sorry, there was an error. Please try again. ".$deleteReport;
        }
        // Take the user back to the admin view.
        header('location: /accounts/');
        exit;
        break;

    case 'confirmDelete':
        // Get user input.
        $reviewId = filter_input(INPUT_GET, 'review', FILTER_SANITIZE_NUMBER_INT);

        // Get the review information
        $review = getReview($reviewId);

        // Deliver the view.
        include '../view/confirm-delete.php';
        break;

    case 'deleteReview':
        // Get user input.
        $reviewId = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_NUMBER_INT);

        // Delete the review.
        $deleteReport = deleteReview($reviewId);

        // Generate the correct message.
        if ($deleteReport == 1){
            $_SESSION['message'] = "The post was successfully deleted.";
        } else {
            $_SESSION['message'] = "Sorry, there was an error. Please try again. ".$deleteReport;
        }

        // Take the user back to the admin view.
        header('location: /accounts/');
        exit;
        break;

    default:
        if ($_SESSION['loggedin']){
            include '../view/admin.php';
            exit;
        }
        header('Location: /index.php/');
        exit;
        break;
}
?>