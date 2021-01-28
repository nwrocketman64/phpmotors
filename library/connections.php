<?php
/*
 * Proxy connection to the database
 */
function phpmotorsConnect()
{
    $server = 'localhost';
    $dbname = 'phpmotor';
    $username = 'iClient';
    $password = '2ptJkdKmTCmCMHjo';
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try{
        $link = new PDO($dsn, $username, $password, $options);
        return $link;
    } catch(PDOException $e){
        header('Location: /view/500.php');
        exit;
    }
}
?>