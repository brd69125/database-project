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
    protected $tableName = "vehicle";
}
