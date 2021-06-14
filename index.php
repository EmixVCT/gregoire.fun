<?php
/*
* Routeur principal
*/
require_once 'RegexRouter.php';
require_once 'controller/controller.php';

//Define root folder below $_SERVER['SERVER_NAME'] if the site is not located on default root
$base_URI = ''; 

//Create a new router
$router = new RegexRouter();

//Define Routes
	//Home
	$router->route('/^'.$base_URI.'\/?$/', function(){
      pageHome();
 	});
	
	//logout
	$router->route('/^'.$base_URI.'\/logout?$/', function(){
		pageLogout();
	});
	
	//logout
	$router->route('/^'.$base_URI.'\/login?$/', function(){
		$values = Array();
		if (isset($_POST)){
			$values = $_POST;
		}
		pageLogin($values);
	});
	
	

	$router->route('/^'.$base_URI.'\/produits?$/', function(){
		getProduct($_POST);
	});
	
	$router->route('/^'.$base_URI.'\/addProduit?$/', function(){
		addProduct($_POST);
	});
	
	$router->route('/^'.$base_URI.'\/toggleHeart?$/', function(){
		toggleHeart($_POST);
	});
	
	$router->route('/^'.$base_URI.'\/delete?$/', function(){
		deleteProductMenu($_POST);
	});
	


//Execute router, throw exception and display 404 if unknown route
try {
  $router->execute($_SERVER['REQUEST_URI']);
}
catch(Exception $e) { //S'il y a eu une erreur, alors...
  pageError($e->getMessage());
}
