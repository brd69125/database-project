<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employee
 *
 * @author owner
 */
class Employee extends Database{
    //put your code here
    protected $fields = ["id","name","email","address","phone","type"];
    protected static $tableName = "employee";
    
    public function getDisplay() {
        $employee = "<ul>";
        $employee .= "<li>Name: $this->name</li>";
        $employee .= "<li>Email: $this->email</li>";
        $employee .= "<li>Name: $this->address</li>";
        $employee .= "<li>Email: $this->phone</li>";
        $employee .= "</ul>";
        return $employee;
    }
    
    public static function getMechanicsResult() {
        $rows = array();
        $select = "SELECT * from ".static::$tableName;
        $where = " WHERE type = 'mechanic'; ";
        $result = mysqli_query(Database::getConnect(), $select . $where);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }
    
    public static function getAllMechanics(){
        $mechanics = [];
        $results = self::getMechanicsResult(); 
//        $mechanics = Employee::getMechanics();
        foreach ($results as $row) {
            $mechanic = new Employee();
            foreach ($row as $index => $value) {
                $mechanic->$index = $value;
            }
            $mechanics[] = $mechanic;
        }
        return $mechanics;
    }
    
    public static function getMechanicSelect(){
        $select = "Mechanic: <select name='mechanic'>";
        $results = self::getMechanicsResult();
        foreach ($results as $row) {
            $select .= "<option value='".$row['id']."'>{$row['name']} : {$row['email']}</option>";
        }
        $select .= "</select><br>";
        return $select;
    }
    
}



