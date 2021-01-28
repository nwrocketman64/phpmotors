<?php
// The Accounts Controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

$clientFirst = filter_input(INPUT_POST, 'clientFirst');
if ($clientFirst != NULL) {
    echo $clientFirst.'<br>';
}

$clientLast = filter_input(INPUT_POST, 'clientLast');
if ($clientLast != NULL) {
    echo $clientLast.'<br>';
}

$clientEmail = filter_input(INPUT_POST, 'clientEmail');
if ($clientEmail != NULL) {
    echo $clientEmail.'<br>';
}

$clientPassword = filter_input(INPUT_POST, 'clientPassword');
if ($clientPassword != NULL) {
    echo $clientPassword;
}

switch ($action){

    case 'login':
        include '../view/login.php';
        break;
    
    case 'registration':
        include '../view/registration.php';
        break;
    
    default:
        break;
}
?>