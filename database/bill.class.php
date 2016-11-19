<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bill
 *
 * @author owner
 */
class bill extends Database{
    //put your code here
    protected $fields = ["id","date","amount","payment"];
    protected $tableName = "bill";
}
