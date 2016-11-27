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
 * Description of vehicle_page
 *
 * @author Brody
 */
class Vehicle_Page {
    public static function getDisplay(){
        $page = "<h1>Vehicles</h1>";
        $page .= self::getVehiclesList() . "<hr>";
        $page .= self::getVehicleForm();
        return $page;
    }
    
    public static function getVehiclesList(){
        $section = "<div><h2>Vehicles</h2>";
        //get all sales
        $vehicles = Vehicle::getAllVehicles();
        $section .= "<ul>";
        foreach($vehicles as $vehicle){
            $section .= "<li>{$vehicle->getDisplay()}</li>";
        }
        $section .= "</ul></div>";
        return $section;
    }
    
    public static function getVehicleForm(){
        $section = "<div><h2>Add New Vehicle</h2>";
        $section .= Vehicle::getInsertForm();
        $section .= "</div>";
        return $section;
    }
}
