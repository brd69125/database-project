    ____             __               __    _          ____        __        __                  
   / __ \___  ____ _/ /__  __________/ /_  (_)___     / __ \____ _/ /_____ _/ /_  ____ _________ 
  / / / / _ \/ __ `/ / _ \/ ___/ ___/ __ \/ / __ \   / / / / __ `/ __/ __ `/ __ \/ __ `/ ___/ _ \
 / /_/ /  __/ /_/ / /  __/ /  (__  ) / / / / /_/ /  / /_/ / /_/ / /_/ /_/ / /_/ / /_/ (__  )  __/
/_____/\___/\__,_/_/\___/_/  /____/_/ /_/_/ .___/  /_____/\__,_/\__/\__,_/_.___/\__,_/____/\___/ 
                                         /_/                                                     
-------------------------------------------------------------------------------------------------
This is the readme file for the Dealership Database project source code. It outlines  and describes 
the files contained within this project. It also outlines how to recreate our environment and run 
our source code. This file was compiled on 11/28/2016 and reflects the current state of this software 
at that time.

Created by Brody Bruns, Caleb Ogbonnaya, and David Owens

A. Environment
We used the xamp server distribution to build our web application and database, so you should be able 
to replicate it using a similar environment.

i. SQL Server
Our sql server is a MySql server. You will need to use a MySql server to deploy our database.

ii. Web Server
Our web server is an Apache web server. The server must have a PHP interpreter installed in order to 
run our PHP code.

iii. Database Setup
You will be able to recreate our database using the dealership.sql file that we have included in our 
source code. Just copy and paste the entire sql file into your MySql server’s sql command line. We used 
the PhpMyAdmin interface to make deployment easier. You will also need to put your database’s root user 
password on line 22 of database.class.php in the source code if your database’s root user has no password 
then you can leave line 22 as is.

iv. Source Code Setup
You will need to put the dealership source code directory in the document root directory of your Apache 
web server. By default on a PC this will be the htdocs directory. Then when your server is running you 
can navigate via web browser to localhost/dealership and it should display the contents of index.php automatically. 
  
B. FILES
These are the files that are included in our project, shown as the path from the root dealership directory.

i. index.php
The index page is the main php page for this application, this is where the website starts. It includes 
the shell and does some form handling for processing submitted forms.

ii. shell.php
The shell contains all of the include lines for all of our other php files to make sure that we include 
the necessary files. It also adds any css files and javascript files to the page. If we do any ajax calls, 
(we don’t in this project) the shell will make sure the php files get included.

iii. database.class.php
The database class contains all of our abstract methods for interacting with our dealership database tables. 
This class will be extended by other database classes in order to interact with their respective table.

iv. nav_bar.class.php
The nav bar class contains the logic to build our nav bar and process it when the user makes use of the nav 
buttons. It will display the necessary page based on the value in the tab GET request index.

v. sales_page.class.php
The sales page class contains all of the logic used to build the sales page for the sales personnel. The 
getDisplay method is called by the nav bar when displaying this page.

vi. services_page.class.php
The services page class contains all of the logic used to build the service page for the service employees. 
The getDisplay method is called by the nav bar when displaying this page.

vii. vehicle_page.class.php
The vehicle page class contains all of the logic used to build the vehicle page for the employees to view 
vehicle data. The getDisplay method is called by the nav bar when displaying this page.

viii. database/bill.class.php
The bill class is for interacting with the bill database table. It extends database.class.php which allows 
it to use all of the abstract database methods specifically for the bill table.

ix. database/customer.class.php
The customer class is for interacting with the customer database table. It extends database.class.php which 
allows it to use all of the abstract database methods specifically for the customer table.

x. database/employee.class.php
The employee class is for interacting with the employee database table. It extends database.class.php which 
allows it to use all of the abstract database methods specifically for the employee table.

xi. database/sale.class.php
The sale class is for interacting with the sale database table. It extends database.class.php which allows 
it to use all of the abstract database methods specifically for the sale table.

xii. database/service_tickets.class.php
The service_tickets class is for interacting with the service_ticket database table. It extends database.class.php 
which allows it to use all of the abstract database methods specifically for the service_ticket table.

xiii. database/vehicle.class.php
The vehicle class is for interacting with the vehicle database table. It extends database.class.php which 
allows it to use all of the abstract database methods specifically for the vehicle table.

xiv. js/forms.js
The forms javascript file contains handy javascript that we use to toggle certain forms when a button is 
pressed. We use the JQuery javascript library to make our javascript more compact and easier. 

xvi. css/site.css
The site css file contains styles to be used across our application.

xvii. dealership.sql
The dealership sql file contains all of the sql required to recreate our database. Simply copy and paste 
the entire file into your command line sql or run the sql file in your database.