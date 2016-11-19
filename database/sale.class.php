<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sale
 *
 * @author owner
 */
class sale extends Database{
    //put your code here
    protected $fields = ["id","date","custom_work","customer","vehicle"];
    protected $tableName = "sale";
}
