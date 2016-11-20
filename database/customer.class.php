<?php

/*
 *  description
 * 
 *  @category database files
 *  @author Brody Bruns <brody.bruns@hotmail.com>
 *  @copyright (c) 2016, Brody Bruns
 *  @version 1.0
 * 
 */

/**
 * Description of customer
 *
 * @author Brody
 */
class Customer extends Database{
    protected $fields = ["id","name","address","phone","type","email"];
    protected $tableName = "customer";
    
    public function getDisplay(){
        $customer = "<div>";
        $customer .= "Name: {$this->name}<br>";
        $customer .= "Address: {$this->address}<br>";
        $customer .= "Phone: {$this->phone}<br>";
        $customer .= "Email: {$this->email}<br>";
        $customer .= "Type: {$this->type}<br>";
        $customer .= "</div>";
        return $customer;
    }
    
}
