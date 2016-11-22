<!DOCTYPE html>
<!--
 description

 @category resource files
 @author Brody Bruns <brody.bruns@hotmail.com>
 @copyright (c) 2016, Brody Bruns
 @version 1.0

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dealership</title>
    </head>
    <body>
        <?php
            include_once("shell.php");

            //handle form submissions if needed
            if(isset($_POST['insert'])){
                $handler = filter_input(INPUT_POST, "insert", FILTER_SANITIZE_STRING);
                switch($handler){
                    case "vehicle" :
                        Vehicle::processForm();
                        break;
                    case "sale" :
                        Sale::processForm();
                        break;
                    case "customer" :
                        Customer::processForm();
                        break;
                    default :
                        ;//do nothing, no handler exists
                }
            }   
            
            //create nav bar and body
            $nav = new Nav_Bar();
            echo $nav->getDisplay();
            echo $nav->displayCurrentPage();
        ?>
    </body>
</html>
