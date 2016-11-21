<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of vehicle
 *
 * @author owner
 */
class Vehicle extends Database{
    //put your code here
    protected $fields = ["id","make","model","year","price"];
    protected static $tableName = "vehicle";
    
    public function getDisplay(){
        $vehicle = "<ul>";
        $vehicle .= "<li>Make: {$this->make}</li>";
        $vehicle .= "<li>Model: {$this->model}</li>";
        $vehicle .= "<li>Year: {$this->year}</li>";
        $vehicle .= "<li>Price: {$this->price}</li>";
        $vehicle .= "</ul>";
        return $vehicle;
    }
    
    public static function getAllVehicles(){
        $vehicles = [];
        $results = (new Vehicle())->getAllRecords();
        //var_dump($results);
        foreach ($results as $row){
            $vehicle = new Vehicle();
            foreach ($row as $index => $value){                
                $vehicle->$index = $value;
            }
            $vehicles[] = $vehicle; //add to array
        }
        return $vehicles;
    }
}
