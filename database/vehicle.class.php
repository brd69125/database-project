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
    protected $fields = ["id","make","model","year","price","vin"];
    protected static $tableName = "vehicle";
    
    public function getDisplay(){
        $vehicle = "<ul>";
        $vehicle .= "<li>Make: {$this->make}</li>";
        $vehicle .= "<li>Model: {$this->model}</li>";
        $vehicle .= "<li>Year: {$this->year}</li>";
        $vehicle .= "<li>Price: {$this->price}</li>";
        $vehicle .= "<li>Vin: {$this->vin}</li>";
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
    
    public function getAllUnsoldRecords(){
        $rows = array();
        $select = "SELECT ".static::$tableName.".* from " . static::$tableName
            . " WHERE id NOT IN (SELECT vehicle FROM sale);";
        $result = mysqli_query($this->connect, $select);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }
    
    public static function getAllUnsoldVehicles(){
        $vehicles = [];
        $results = (new Vehicle())->getAllUnsoldRecords();
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
    
    public static function getInsertForm(){
        $form = "<form action='' method='post' class='insert_form'>";
        $form .= "Make:<input type='text' name='make'><br>"
            . "Model:<input type='text' name='model'><br>"
            . "Year:<input type='number' name='year'><br>"
            . "Price:<input type='number' name='price'><br>"
            . "Vin:<input type='text' name='vin'><br>";
        $form .= "<button type='submit' name='insert' value='".static::$tableName."'>Submit</button>";
        $form .= "</form>";
        return $form;
    }
    
    public static function processForm(){
        if(isset($_POST['insert'])&&$_POST['insert']===static::$tableName){
            $vehicle = new self();
            $vehicle->make = filter_input(INPUT_POST, "make", FILTER_SANITIZE_STRING);
            $vehicle->model = filter_input(INPUT_POST, "model", FILTER_SANITIZE_STRING);
            $vehicle->year = filter_input(INPUT_POST, "year", FILTER_SANITIZE_NUMBER_INT);
            $vehicle->price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT);
            $vehicle->vin = filter_input(INPUT_POST, "vin", FILTER_SANITIZE_STRING);
            $vehicle->save();
        }
    }
    
    public static function getVehicleSelect($default = '0'){
        $select = "Vehicle: <select name='vehicle'>";
        $results = (new self())->getAllRecords();
        foreach ($results as $row) {
            $select .= "<option value='".$row['id']."'"
                .($row['id'] == intval($default) ? "selected" : "") //selected or not?
                .">{$row['make']} {$row['model']} {$row['year']} \${$row['price']} {$row['vin']}</option>";
        }
        $select .= "</select><br>";
        return $select;
    }
    
    public static function getUnsoldVehicleSelect($default = '0'){
        $select = "Vehicle: <select name='vehicle'>";
        $results = (new self())->getAllUnsoldRecords();
        foreach ($results as $row) {
            $select .= "<option value='".$row['id']."'"
                .($row['id'] == intval($default) ? "selected" : "") //selected or not?
                .">{$row['make']} {$row['model']} {$row['year']} \${$row['price']} {$row['vin']}</option>";
        }
        $select .= "</select><br>";
        return $select;
    }
}
