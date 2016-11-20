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
 * Description of sales_page
 *
 * @author Brody
 */
class Sales_Page {
    
    public static function getDisplay(){
        $page = "<h1>Sales</h1>";
        $page .= self::getSalesList();
        return $page;
    }
    
    public static function getSalesList(){
        $section = "<div><h2>Current Sales</h2>";
        //get all sales
        $sales = Sale::getAllSales();
        $section .= "<ul>";
        foreach($sales as $sale){
            $section .= "<li>{$sale->getDisplay()}</li>";
        }
        $section .= "</ul></div>";
        return $section;
    }
    
}
