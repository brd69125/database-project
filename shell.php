<?php

/**
 * include php classes, css, js
 *
 * @author Brody
 */
error_reporting(E_ALL); 
ini_set('display_errors', '1');

//phpinfo();

getIncludes();

//dont echo if an ajax call
if(!isset($_POST['AJAX'])){
    echoJavaScript();
    echoCSS();
}

session_start();    //start $_SESSION

//php includes
function getIncludes(){
    include_once("database.class.php");
    include_once("nav_bar.class.php");
    include_once("sales_page.class.php");
    include_once("services_page.class.php");
    include_once("vehicle_page.class.php");
    include_once("database/customer.class.php");
    include_once("database/sale.class.php");
    include_once("database/vehicle.class.php");
    include_once("database/service_tickets.class.php");
    include_once("database/bill.class.php");
    include_once("database/employee.class.php");
}

//echo JS files
function echoJavaScript(){
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>'; //jquery
    echo "<script src='js/forms.js'></script>";
}

//echo css files
function echoCSS(){
    echo "<link rel='stylesheet' href='css/site.css' type='text/css'>"; 
}

/**
 * displays info for server
 */
function displayServerInfo(){
    
    echo $_SERVER['SERVER_NAME'];
    foreach($_SERVER as $key => $value){
        echo $key . " : " . $value . "<br>";
    }

}