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
class Sale extends Database{
    //put your code here
    protected $fields = ["id","date","custom_work","customer","vehicle","bill"];
    protected static $tableName = "sale";
    public $bill_obj; //for storing bill
    public $vehicle_obj;
    public $customer_obj;
    
    public static function getAllSales(){
        $sales = [];
        $results = (new Sale())->getAllRecords();
        //var_dump($results);
        foreach ($results as $row){
            $sale = new Sale();
            foreach ($row as $index => $value){                
                $sale->$index = $value;
            }
            $bill = new Bill();
            $bill->load_by_id($row["bill"]);
            $sale->bill_obj = $bill;
            
            $vehicle = new Vehicle();
            $vehicle->load_by_id($row["vehicle"]);
            $sale->vehicle_obj = $vehicle;
            
            $customer = new Customer();
            $customer->load_by_id($row["customer"]);
            $sale->customer_obj = $customer;
            
            $sales[] = $sale; //add to array
        }
        return $sales;
    }
    
    public function getDisplay(){
        $sale = "<ul>";
        $sale .= "<li>Date: {$this->date}</li>";
        $sale .= "<li>Custom Work: {$this->custom_work}</li>";
        if(isset($this->bill_obj)){
            $sale .= "<li>Bill:" . $this->bill_obj->getDisplay() . "</li>";//should put this in containing div
        }
        if(isset($this->vehicle_obj)){
            $sale .= "<li>Vehicle:" . $this->vehicle_obj->getDisplay()."</li>";//should put this in containing div
        }
        if(isset($this->customer_obj)){
            $sale .= "<li>Customer:" . $this->customer_obj->getDisplay()."</li>";//should put this in containing div
        }
        $sale .= "</ul>";
        return $sale;
    }
    
    public static function getInsertForm(){
        $form = "<form action='' method='post' class='insert_form'>";
        //get vehicle and customer selects
        $form .= Customer::getCustomerSelect();
        $form .= Vehicle::getUnsoldVehicleSelect();
        //$form .= "Date:<input type='datetime' name='date'><br>";
        $form .= "Custom Work:<input type='text' name='custom_work'><br>";
        $form .= Bill::getFormInputs();
        $form .= "<button type='submit' name='insert' value='".static::$tableName."'>Submit</button>";
        $form .= "</form>";
        return $form;
    }
    
    public static function processForm(){
        if(isset($_POST['insert'])&&$_POST['insert']===static::$tableName){
            $sale = new self();
            //$sale->date = filter_input(INPUT_POST, "make", FILTER_SANITIZE_STRING); //get current time as default
            $sale->custom_work = filter_input(INPUT_POST, "custom_work", FILTER_SANITIZE_STRING);
            $sale->customer = filter_input(INPUT_POST, "customer", FILTER_SANITIZE_NUMBER_INT);
            $sale->vehicle = filter_input(INPUT_POST, "vehicle", FILTER_SANITIZE_NUMBER_INT);
            //var_dump($sale);
            //create bill
            $bill = Bill::processForm();
            $sale->bill = $bill;
            $sale->save();
        }
    }
    
}
