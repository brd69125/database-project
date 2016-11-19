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
class employee extends Database{
    //put your code here
    protected $fields = ["id","name","email","address","phone","type"];
    protected $tableName = "employee";
}



