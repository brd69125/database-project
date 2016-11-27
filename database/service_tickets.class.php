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
    protected $fields = ["id","pickup_date","arrival_date","completed_date","tasks","work_time_est","price_est","bill","vehicle","mechanic","arr_mile","dep_mile"];
    protected static $tableName = "service_ticket";
    public $bill_obj; //for storing bill
    public $vehicle_obj;
    public $mechanic_obj;
    
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
        $display .= "<li>Arrival milage: {$this->arr_mile}</li>";
        $display .= "<li>Departure milage: {$this->dep_mile}</li>";
        
        $display .= "</ul>";
        return $display;
    }
    
}
