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
    protected $tableName = "sale";
    public $bill_obj; //for storing bill
    
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
            $sales[] = $sale; //add to array
        }
        return $sales;
    }
    
    public function getDisplay(){
        $sale = "<div>";
        $sale .= "<b>Date</b>: {$this->date}<br>";
        $sale .= "<b>Custom Work</b>: {$this->custom_work}<br>";
        if(isset($this->bill_obj)){
            $sale .= "<b>Bill</b>: <br>" . $this->bill_obj->getDisplay();//should put this in containing div
        }
        $sale .= "</div>";
        return $sale;
    }
}
