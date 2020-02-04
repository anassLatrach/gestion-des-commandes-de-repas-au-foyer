<?php
// Start Session
session_start();

// Include Config
require('config.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php'); 
require('controllers/users.php');
require('controllers/tickets.php');
require('controllers/reports.php');
require('controllers/responses.php');
require('controllers/errors.php'); 
require('controllers/admins.php'); 

require('models/home.php');
require('models/user.php');
require('models/ticket.php');
require('models/report.php');
require('models/response.php');
require('models/error.php'); 
require('models/admin.php'); 

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}