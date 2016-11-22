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
        $customer .= "<li>Update: {$this->getUpdateForm()}</li>";
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
    
    public static function getCustomerSelect(){
        $select = "Customer: <select name='customer'>";
        $results = (new self())->getAllRecords();
        foreach ($results as $row) {
            $select .= "<option value='".$row['id']."'>{$row['name']} {$row['email']}</option>";
        }
        $select .= "</select><br>";
        return $select;
    }
    
    public static function getInsertForm(){
        $form = "<form action='' method='post'>";
        $form .= "Name:<input type='text' name='name'><br>"
            . "Address:<input type='text' name='address'><br>"
            . "Phone:<input type='number' name='phone'><br>"
            . "Email:<input type='email' name='email'><br>";
        $form .= "Customer Type:<select name='type'>"
            . "<option disabled selected value='none'></option>"
            . "<option value='sale'>Sale</option>"
            . "<option value='service'>Service</option>"
            . "<option value='sale and service'>Sale and Service</option>"
            . "</select><br>";
        $form .= "<button type='submit' name='insert' value='".static::$tableName."'>Submit</button>";
        $form .= "</form>";
        return $form;
    }
    
    public function getUpdateForm(){
        $form = "<form action='' method='post'>";
        $form .= "Name:<input type='text' name='name' value='{$this->name}'><br>"
            . "Address:<input type='text' name='address' value='{$this->address}'><br>"
            . "Phone:<input type='number' name='phone' value='{$this->phone}'><br>"
            . "Email:<input type='email' name='email' value='{$this->email}'><br>";
        $form .= "Customer Type:<select name='type'>"
            . "<option value='sale'".($this->type === 'sale' ? "selected" : "").">Sale</option>"
            . "<option value='service'".($this->type === 'service' ? "selected" : "").">Service</option>"
            . "<option value='sale and service'".($this->type === 'sale and service' ? "selected" : "").">Sale and Service</option>"
            . "</select><br>";
        $form .= "<button type='submit' name='insert' value='".static::$tableName."'>Submit</button>";
        $form .= "</form>";
        return $form;
    }
    
    public static function processForm(){
        if(isset($_POST['insert'])&&$_POST['insert']===static::$tableName){
            $customer = new self();
            $customer->name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            $customer->address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_STRING);
            $customer->phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
            $customer->email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
            $customer->type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
            $customer->save();
        }
    }
    
}
