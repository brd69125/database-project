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
            $nav = new Nav_Bar();
            echo $nav->getDisplay();
            echo $nav->displayCurrentPage();
        ?>
    </body>
</html>
