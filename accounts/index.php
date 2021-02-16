<?php
// The Accounts Controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
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

    case 'login':
        include '../view/login.php';
        break;
    
    case 'registration':
        include '../view/registration.php';
        break;
    
    case 'register':
        $clientFirstname = filter_input(INPUT_POST, 'clientFirst', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLast', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail',  FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

        // Validate the email
        $clientEmail = checkEmail($clientEmail);

        // Validate the password
        $checkPassword = checkPassword($clientPassword);

        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit; 
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        // Check and report the result
        if($regOutcome === 1){
            $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            include '../view/login.php';
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }
        break;
    
    case 'Login':
        // Filter the incoming data.
        $clientEmail = filter_input(INPUT_POST, 'clientEmail',  FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);

        // Validate the email
        $clientEmail = checkEmail($clientEmail);

        // Validate the password
        $checkPassword = checkPassword($clientPassword);

        // Check for missing data
        if(empty($clientEmail) || empty($checkPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit;
        }
        break;
    
    default:
        break;
}
?>