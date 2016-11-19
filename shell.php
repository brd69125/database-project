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
    //echoJavaScript();
    echoCSS();
    //displayHeader();
}

session_start();    //start $_SESSION

//php includes
function getIncludes(){
    include_once("database.class.php");
}

//echo JS files
function echoJavaScript(){
    //echo "<script src='js/ajax.js'></script>";
}

//echo css files
function echoCSS(){
    //echo "<link rel='stylesheet' href='css/index.css' type='text/css'>"; 
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