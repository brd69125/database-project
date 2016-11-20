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
    protected $tableName = "service_ticket";
}
