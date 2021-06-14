<?php

include('private/scripts/config.php');


/***  ------- MAIN MODEL -------
 *
 * Fonction systeme
 *
 ***/
 
 function debug($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

// Connection to application-specific database
function dbConnect(){
        global $sql_details;

        $db_user = $sql_details['user'];
        $db_host = $sql_details['host'];
        $db_name = $sql_details['db'];
        $db_pass = $sql_details['pass'];
        $db = new PDO("mysql:host=".$db_host.";dbname=".$db_name, $db_user, $db_pass);
        return $db;
}
 


/***  ------- MAIN MODEL -------
 *
 * Fonction getter
 *
 ***/
 
 
 /* Si l'utilisateur existe renvoie son nom et sa clée privée  */
function login($nom,$mdp){
	
	$hashmdp = hash("sha512",$mdp);
	
	$db = dbConnect();
	$query = "SELECT id 
				FROM `user` 
				WHERE nom=".$db->quote($nom)." AND mdp=".$db->quote($hashmdp)."";
	$statement = $db->prepare($query);
	$req = $statement->execute();
	$loginfo = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	if ($statement->rowCount() > 0){
		return $loginfo;
	}
	return false;
}


function getMenu(){
	
	$db = dbConnect();
	$query = "SELECT 
					produit.id as produitID,
					produit_menu.id as produitMenuID,
					produit_menu.stock,
					produit_menu.proprietaire,
					produit_menu.favorite,
					produit.nom,
					produit.image,
					produit.description
				FROM `produit_menu` LEFT JOIN produit ON produit.id=produit_menu.fk_produit";
	$statement = $db->prepare($query);
	$req = $statement->execute();
	$data = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	if ($statement->rowCount() > 0){
		return $data;
	}
	return Array();

} 


function getProduit(){
	
	$db = dbConnect();
	$query = "SELECT 
					produit.id ,
					produit.nom,
					produit.image,
					produit.description
				FROM produit";
	$statement = $db->prepare($query);
	$req = $statement->execute();
	$data = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	if ($statement->rowCount() > 0){
		return $data;
	}
	return Array();

} 
 
/***  ------- MAIN MODEL -------
 *
 * Fonction setter
 *
 ***/
 
 function addProduit($id,$stock,$proprietaire){
	$db = dbConnect();
	$query = "INSERT INTO produit_menu (fk_produit,stock,proprietaire) VALUES (".$db->quote($id).",".$db->quote($stock).",".$db->quote($proprietaire).")";
	$statement = $db->prepare($query);
	$req = $statement->execute();
 }
 
 
 function delProduitMenu($id){
	$db = dbConnect();
	$query = "DELETE FROM produit_menu WHERE id=$id";
	$statement = $db->prepare($query);
	$req = $statement->execute(); 
 }
 
 function produitFavorite($id){
	$db = dbConnect();
	$query = "UPDATE produit_menu SET favorite = IF(favorite=1, 0, 1) WHERE id=$id";
	$statement = $db->prepare($query);
	$req = $statement->execute(); 
 }
 
 /***  ------- MAIN MODEL -------
 *
 * Fonction delete
 *
 ***/
 
 
 
/***  ------- MAIN MODEL -------
 *
 * Fonction boolenne
 *
 ***/

