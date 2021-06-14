<?php
//ini_set('session.cookie_domain', '.monbtp.com' ); 
require('model/model.php');


//Preparation of non page-dependant content, for use with $GLOBALS["variable"]
session_start();
$host = $_SERVER['HTTP_HOST'];
$protocol=$_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';



/***  ------- MAIN CONTROLLER -------
 *
 * 		Fonction systeme
 *
 ***/
function verifLogin(){
	global $_SESSION, $base_URI;
	if (!isset($_SESSION['nom'])){
		header('location:'.$base_URI.'/login');
	}
}



/***  ------- MAIN CONTROLLER -------
 *
 * 		Fonction PAGE app
 *
 ***/
//Page erreur (404 ou autre erreur catch)
function pageError($message){
	global $_SESSION, $base_URI;

	$errorMessage = $message;
    require('view/errorView.php');
}
 

//Home page
function pageHome(){
	global $_SESSION, $base_URI;
	
	$menu = getMenu();
	$produits = getProduit();
	
	//debug($menu);
    require('view/homeView.php');
}


//Login Page
function pageLogin($values) {
	global $_SESSION, $base_URI;
	
	if(isset($_SESSION['nom'])){
        header('location:'.$base_URI.'/');
    }else{
		$accessGranted = false;
	
		if(isset($values["nom"],$values["password"])){
			$loginfo = login($values["nom"],$values["password"]);
			if($loginfo){
				$_SESSION['nom'] = $values["nom"];
				$accessGranted = true;
			}			
		}
		
		if ($accessGranted){
			header('location:'.$base_URI.'/');
		}else{
			require('view/loginView.php');
		}
	}
}

//Logout Page
function pageLogout() {
	global $_SESSION, $base_URI;
	session_start();
    session_destroy();

    header('location:'.$base_URI.'/');
}


/***  ------- MAIN CONTROLLER -------
 *
 * 		Fonction API (Ajax request)
 *
 ***/
 
 function getProduct($values){
	echo json_encode(getProduit()); 
 }
 
function addProduct($values){

	
	if (empty($values["stock"])){
		$values["stock"] = 0;
	}
	
	if (empty($values["proprietaire"])){
		$values["proprietaire"] = "Gregoire";
	}
	
	addProduit($values["id"],$values["stock"],$values["proprietaire"]);
}


function deleteProductMenu($values){
	delProduitMenu($values["id"]);

}
 
function toggleHeart($values){
	produitFavorite($values["id"]);
}