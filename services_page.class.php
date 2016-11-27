<?php

/*
 *  description
 * 
 *  @category resource files
 *  @author Brody Bruns <brody.bruns@hotmail.com>
 *  @copyright (c) 2016, Brody Bruns
 *  @version 1.0
 * 
 */

/**
 * Description of services_page
 *
 * @author Brody
 */
class Services_Page {
    public static function getDisplay(){
        $page = "<h1>Services</h1>";
        $page .= self::getMechanicList() . "<hr>";
        $page .= self::getServiceTicketList() . "<hr>";
        $page .= self::getServiceTicketInsertForm();
        return $page;
    }
    
    public static function getMechanicList(){
        $section = "<div><h2>Current Mechanics</h2>";
        //get all mechanics
        $mechanics = Employee::getAllMechanics();
        $section .= "<ul>";
        foreach($mechanics as $mechanic){
            $section .= "<li>{$mechanic->getDisplay()}</li>";
        }
        $section .= "</ul></div>";
        return $section;
    }
    
    public static function getServiceTicketList() {
        $section = "<div><h2>Current Service Tickets</h2>";
        //get all service Tickets
        $service_tickets = Service_Tickets::getAllServiceTickets();
        $section .= "<ul>";
        foreach($service_tickets as $service_ticket){
            $section .= "<li>{$service_ticket->getDisplay()}</li>";
        }
        $section .= "</ul></div>";
        return $section;
    }
    
    public static function getServiceTicketInsertForm(){
        $section = "<div><h2>Create New Service Ticket</h2>";
        $section .= Service_Tickets::getInsertForm();
        return $section;
    }
}
