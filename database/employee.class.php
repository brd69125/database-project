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
    protected $tableName = "employee";
    
    public static function getMechanics() {
        $rows = array();
        $select = "SELECT * from $this->tableName ";
        $where = "WHERE type = 'mechanic'; ";
        $result = mysqli_query($this->connect, $select . $where);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)) {
                array_push($rows, $row);
            }
        }
        return $rows;
    }
    
}



