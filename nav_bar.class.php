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
 * Description of nav_bar
 *
 * @author Brody
 */
class Nav_Bar {
    
    protected $selected_page = "home";
    protected static $tab_key = "tab";
    protected static $tab_list = ['home' => 'Home','sales'=>'Sales','services'=>'Services', 'vehicles'=>'Vehicles'];
    
    public function __construct() {
        if(isset($_GET[self::$tab_key])){
            $this->selected_page = $_GET[self::$tab_key];
        }
    }
    
    public function getDisplay(){
        $display = "<form id='nav' class='nav_bar' method='get' action=''>";
        foreach(self::$tab_list as $index=>$title){
            $display .= self::getNavButton($index, $title) . "<br>";
        }
        $display .= "</form>";
        return $display;
    }
    
    public function displayCurrentPage(){
        $page = "<div class='content'>";
        //choose tab
        switch ($this->selected_page){
            case "sales":
                $page .= Sales_Page::getDisplay();
                break;
            case "services":
                $page .= Services_Page::getDisplay();
                break;
            case "vehicles":
                $page .= Vehicle_Page::getDisplay();
                break;
            default :
                $page .= self::getHomePage();//home
                break;
        }
        $page .= "</div>";
        echo $page;
    }
    
    public static function getNavButton($tab_name, $title){
        $button = "<button type='submit' form='nav' name='".self::$tab_key."' value='$tab_name' class='nav_button'>$title</button>";
        return $button;
    }
    
    public static function getHomePage(){
        $page = "<h1>Welcome to the Data Dealership</h1>";
        return $page;
    }
}
