<?php
/* 
    Created on : 14-Sep-2015, 14:04:22
    Author     : Peter Gosling
*/

// connects to a database

$dsn = "mysql:host=localhost;dbname=my_guitar_shop1";
$username = "root";
$password = "";
 
try {
    $db = new PDO($dsn, $username, $password);
    //set up error reporting on server
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    error_reporting(E_ALL);
} catch (PDOException $ex) {
    //echo "Connection Failure Error is " . $ex->getMessage();
    // redirect to an error page passing the error message
    header("Location:error.php?msg=" . $ex->getMessage());

}








