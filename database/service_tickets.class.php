<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of service_tickets
 *
 * @author owner
 */
class Service_Tickets extends Database{
    //put your code here
    protected $fields = ["id","pickup_date","arrival_date","completed_date","tasks","work_time_est","price_est","bill","vehicle","mechanic","customer","arr_mile","dep_mile"];
    protected static $tableName = "service_ticket";
    public $bill_obj; //for storing bill
    public $vehicle_obj;
    public $mechanic_obj;
    public $customer_obj;

    public static function getAllServiceTickets() {
        $service_tickets = [];
        $results = (new Service_Tickets())->getAllRecords();
        foreach ($results as $row) {
            $service_ticket = new Service_Tickets();
            foreach ($row as $key => $value) {
                $service_ticket->$key = $value;
            }
            
            $bill = new Bill();
            $bill->load_by_id($row["bill"]);
            $service_ticket->bill_obj = $bill;
            
            $vehicle = new Vehicle();
            $vehicle->load_by_id($row["vehicle"]);
            $service_ticket->vehicle_obj = $vehicle;
            
            $employee = new Employee();
            $employee->load_by_id($row["mechanic"]);
            $service_ticket->mechanic_obj = $employee;
            
            $customer = new Customer();
            $customer->load_by_id($row["customer"]);
            $service_ticket->customer_obj = $customer;
            
            $service_tickets[] = $service_ticket;
        }
        return $service_tickets;
    }
    
    public function getDisplay(){
        $display = "<ul>";
        $display .= "<li>Pick up date: {$this->pickup_date}</li>";
        $display .= "<li>Arrival date: {$this->arrival_date}</li>";
        $display .= "<li>completed date: {$this->completed_date}</li>";
        $display .= "<li>tasks: {$this->tasks}</li>";
        $display .= "<li>Work time Estimate: {$this->work_time_est}</li>";
        $display .= "<li>Price Estimate: {$this->price_est}</li>";
        if(isset($this->bill_obj)){
            $display .= "<li>Bill:" . $this->bill_obj->getDisplay() . "</li>";
        }
        if(isset($this->vehicle_obj)){
            $display .= "<li>Vehicle:" . $this->vehicle_obj->getDisplay()."</li>";//should put this in containing div
        }
        if(isset($this->mechanic_obj)){
            $display .= "<li>Mechanic:" . $this->mechanic_obj->getDisplay()."</li>";//should put this in containing div
        }
        if(isset($this->customer_obj)){
            $display .= "<li>Customer:" . $this->customer_obj->getDisplay()."</li>";//should put this in containing div
        }
        $display .= "<li>Arrival milage: {$this->arr_mile}</li>";
        $display .= "<li>Departure milage: {$this->dep_mile}</li>";
        
        $display .= "</ul>";
        return $display;
    }
    
    public static function getInsertForm(){
        $form = "<form action='' method='post'>";
        //get vehicle and customer selects
        //$form .= "Date:<input type='datetime' name='date'><br>";
        $form .= "Pick up date: <input type='text' name='pickup_date'><br>";
        $form .= "Arrival date: <input type='text' name='arrival_date'><br>";
        $form .= "Completed date: <input type='text' name='completed_date'><br>";
        $form .= "Tasks: <input type='text' name='tasks'><br>";
        $form .= "Work time Estimate: <input type='text' name='work_time_est'><br>";
        $form .= "Price Estimate: <input type='text' name='price_est'><br>";
        $form .= Bill::getFormInputs();
        $form .= Vehicle::getVehicleSelect();
        //add mechanic select
        $form .= Employee::getMechanicSelect();
        $form .= Customer::getCustomerSelect();
        $form .= "Arrival milage: <input type='text' name='arr_mile'><br>";
        $form .= "Departure milage: <input type='text' name='dep_mile'><br>";
        $form .= "<button type='submit' name='insert' value='".static::$tableName."'>Submit</button>";
        $form .= "</form>";
        return $form;
    }
    
    public static function processForm(){
        if(isset($_POST['insert'])&&$_POST['insert']===static::$tableName){
            $service_ticket = new self();
            //$sale->date = filter_input(INPUT_POST, "make", FILTER_SANITIZE_STRING); //get current time as default
            $service_ticket->pickup_date = filter_input(INPUT_POST, "pickup_date", FILTER_SANITIZE_STRING);
            $service_ticket->arrival_date = filter_input(INPUT_POST, "arrival_date", FILTER_SANITIZE_STRING);
            $service_ticket->completed_date = filter_input(INPUT_POST, "completed_date", FILTER_SANITIZE_STRING);
            $service_ticket->tasks = filter_input(INPUT_POST, "tasks", FILTER_SANITIZE_STRING);
            $service_ticket->work_time_est = filter_input(INPUT_POST, "work_time_est", FILTER_SANITIZE_NUMBER_INT);
            $service_ticket->price_est = filter_input(INPUT_POST, "price_est", FILTER_SANITIZE_NUMBER_INT);
            $service_ticket->arr_mile = filter_input(INPUT_POST, "arr_mile", FILTER_SANITIZE_NUMBER_INT);
            $service_ticket->dep_mile = filter_input(INPUT_POST, "dep_mile", FILTER_SANITIZE_NUMBER_INT);
            
            $service_ticket->mechanic = filter_input(INPUT_POST, "mechanic", FILTER_SANITIZE_NUMBER_INT);
            $service_ticket->vehicle = filter_input(INPUT_POST, "vehicle", FILTER_SANITIZE_NUMBER_INT);
            $service_ticket->customer = filter_input(INPUT_POST, "customer", FILTER_SANITIZE_NUMBER_INT);
            //create bill
            $bill = Bill::processForm();
            $service_ticket->bill = $bill;
            $service_ticket->save();
        }
    }
}
