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
    protected static $tableName = "customer";
    
    public function getDisplay(){
        $customer = "<ul>";
        $customer .= "<li>Name: {$this->name}</li>";
        $customer .= "<li>Address: {$this->address}</li>";
        $customer .= "<li>Phone: {$this->phone}</li>";
        $customer .= "<li>Email: {$this->email}</li>";
        $customer .= "<li>Type: {$this->type}</li>";
        $customer .= "</ul>";
        return $customer;
    }
    
    public static function getAllCustomers(){
        $customers = [];
        $results = (new Customer())->getAllRecords();
        //var_dump($results);
        foreach ($results as $row){
            $customer = new Customer();
            foreach ($row as $index => $value){                
                $customer->$index = $value;
            }
            $customers[] = $customer; //add to array
        }
        return $customers;
    }
    
}
