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
    
    public static function getFormInputs(){
        $inputs = "Amount: <input type='number' name='amount'><br>"
            . "Payment Method: <select name='payment'>"
            . "<option value='visa'>Visa</option>"
            . "<option value='mastercard'>MasterCard</option>"
            . "<option value='cash'>Cash</option>"
            . "</select><br>";
        return $inputs;
    }
    
    public static function processForm(){
        $bill = new self();
        $bill->amount = filter_input(INPUT_POST, "amount", FILTER_SANITIZE_NUMBER_FLOAT);
        $bill->payment = filter_input(INPUT_POST, "payment", FILTER_SANITIZE_STRING);
        //var_dump($bill);
        //then save and return bill id
        $bill->save();
        return $bill->getLastInsertedId();
    }
    
}
