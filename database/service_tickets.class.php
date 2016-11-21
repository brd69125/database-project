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
    
    public static function getAllServiceTickets() {
        $service_tickets = [];
        $results = (new Service_Tickets())->getAllRecords();
        foreach ($results as $row) {
            $service_ticket = new Service_Tickets();
            foreach ($row as $key => $value) {
                $service_ticket->$key = $value;
            }
            $service_tickets[] = $service_ticket;
        }
        return $service_tickets;
    }
    
    public function getDisplay(){
        $vehicle = "<ul>";
        $vehicle .= "<li>Pick up date: {$this->pickup_date}</li>";
        $vehicle .= "<li>Arrival date: {$this->arrival_date}</li>";
        $vehicle .= "<li>completed date: {$this->completed_date}</li>";
        $vehicle .= "<li>tasks: {$this->tasks}</li>";
        $vehicle .= "<li>Work time Estimate: {$this->work_time_est}</li>";
        $vehicle .= "<li>Price Estimate: {$this->price_est}</li>";
        $vehicle .= "<li>Bill: {$this->bill}</li>";
        $vehicle .= "<li>Vehicle: {$this->vehicle}</li>";
        $vehicle .= "<li>Mechanic: {$this->mechanic}</li>";
        $vehicle .= "<li>Arrival milage: {$this->arr_mile}</li>";
        $vehicle .= "<li>Departure milage: {$this->dep_mile}</li>";
        
        $vehicle .= "</ul>";
        return $vehicle;
    }
    
}
