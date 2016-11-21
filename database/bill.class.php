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
class Bill extends Database{
    //put your code here
    protected $fields = ["id","date","amount","payment"];
    protected static $tableName = "bill";
    
    public function getDisplay(){
        $bill = "<ul>";
        $bill .= "<li>Date: {$this->date}</li>"
        . "<li>Amount: {$this->amount}</li>"
        . "<li>Payment Method: {$this->payment}</li>";
        $bill .= "</ul>";
        return $bill;
    }
    
}
