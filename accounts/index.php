<?php
// The Accounts Controller

// Create or access a Session
session_start();

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

        // Check that the email does not exist in the database.
        $existingEmail = checkExistingEmail($clientEmail);

        // Check for existing email address in the table
        if($existingEmail){
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }

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
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
            header('Location: /accounts/?action=login');
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

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;
        break;

    case 'Logout':
        session_destroy();
        header('Location: /accounts/?action=login');
        break;

    case 'updateInfo':
        include '../view/client-update.php';
        break;

    case 'updatePersonal':
        // Get the data from the view.
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
        $newEmail = filter_input(INPUT_POST, 'newEmail', FILTER_SANITIZE_EMAIL);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        // Validate the new email.
        $newEmail = checkEmail($newEmail);

        // If email already exist, return client to update page.
        if (checkExistingEmail($newEmail)){
            $message = "Email already exist, please try a different one.";
            include '../view/client-update.php';
            exit;
        }

        // Check that all the information is present.
        if(empty($firstName) || empty($lastName) || empty($newEmail) || empty($invId)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit;
        }

        // Update the information in the database.
        $resultPersonal = updatePersonal($firstName, $lastName, $newEmail, $invId);

        // Query the client data based on the email address
        $clientData = getClientId($invId);
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        
        // Check and report the result
        if($resultPersonal === 1){
            $message = "<p>Information update was a success.</p>";
            $_SESSION['message'] = $message;
            header('location: /accounts/');
            exit;
        } else {
            $message = "<p>Sorry, but information update failed. Please try again.</p>";
            $_SESSION['message'] = $message;
	        header('location: /accounts/');
	        exit;
        }
        break;

    case 'updatePassword':
        // Get the new password.
        $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        // Validate the password
        $checkPassword = checkPassword($newPassword);

        // Check for missing data
        if(empty($checkPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/client-update.php';
            exit; 
        }

        // Hash the checked password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password.
        $resultPassword = updateNewPassword($hashedPassword, $invId);

        // Check and report the result
        if($resultPassword === 1){
            $message = "<p>Password update was a success.</p>";
            $_SESSION['message'] = $message;
            header('location: /accounts/');
            exit;
        } else {
            $message = "<p>Sorry, but password update failed. Please try again.</p>";
            $_SESSION['message'] = $message;
	        header('location: /accounts/');
	        exit;
        }
        break;
    
    default:
        include '../view/admin.php';
        break;
}
?>