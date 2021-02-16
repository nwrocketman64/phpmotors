<?php
// The Vehicles Controller

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicle model
require_once '../model/vehicles-model.php';
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

    case 'classifcation':
        include "../view/add-classification.php";
        break;
    
    case 'vehicle':
        include "../view/add-vehicle.php";
        break;

    case 'addVehicle':
        // Filter the input
        $classType = filter_input(INPUT_POST, 'carClassifications', FILTER_SANITIZE_STRING);
        $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
        $thumb = filter_input(INPUT_POST, 'thumb', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_NUMBER_INT);
        $color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);

        // Check for missing data
        if(empty($classType) || empty($make) || empty($model) || empty($description) || empty($image) || empty($thumb) || empty($price) || empty($stock) || empty($color)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit; 
        }

        // Add Data to database
        $AddVehicleReport = newVehicle($make, $model, $description, $image, $thumb, $price, $stock, $color, $classType);
        // Check and report the result
        if($AddVehicleReport === 1){
            $message = "<p>Vehical registration was a success.</p>";
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = "<p>Sorry, but the registration failed. Please try again.</p>";
            include '../view/add-vehicle.php';
            exit;
        }
        break;

    case 'addClass':
        // Filter the input
        $newClass = filter_input(INPUT_POST, 'newClassification', FILTER_SANITIZE_STRING);

        // Check for missing data
        if(empty($newClass)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-classification.php';
            exit; 
        }

        // Add Data to database
        $AddClassReport = newClassification($newClass);
        // Check and report the result
        if($AddClassReport === 1){
            $message = "<p>Car Classification registration was a success.</p>";
            include '../view/vehicle-management.php';
            exit;
        } else {
            $message = "<p>Sorry, but the registration failed. Please try again.</p>";
            include '../view/add-classification.php';
            exit;
        }
        break;
    
    default:
        include "../view/vehicle-management.php";
        break;
}
?>