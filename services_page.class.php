<?php

/*
 *  description
 * 
 *  @category resource files
 *  @author Brody Bruns <brody.bruns@hotmail.com>
 *  @copyright (c) 2016, Brody Bruns
 *  @version 1.0
 * 
 */

/**
 * Description of services_page
 *
 * @author Brody
 */
class Services_Page {
    public static function getDisplay(){
        $page = "<h1>Services</h1>";
        $page .= self::getMechanicList();
        return $page;
    }
    
    public static function getMechanicList(){
        $section = "<div><h2>Current Mechanics</h2>";
        //get all mechanics
//        $mechanics = new Employee(); 
        $mechanics = Employee::getMechanics();
        $section .= "<ul>";
        foreach($mechanics as $mechanic){
            $section .= "<li>{$mechanic->getDisplay()}</li>";
        }
        $section .= "</ul></div>";
        return $section;
    }
}
