<!DOCTYPE html>
<html lang="fr">
    <head>
    	<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS and general Style -->
		<link rel="icon" type="image/png" href="public/images/icon.png" />

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	    <link rel="stylesheet" href="<?= $GLOBALS["protocol"].$GLOBALS["host"].$GLOBALS["base_URI"] ?>/public/lib/font-awesome/css/all.css">

		<link rel="stylesheet" href="<?= $GLOBALS["protocol"].$GLOBALS["host"].$GLOBALS["base_URI"] ?>/public/css/styles.css" rel="stylesheet">


        <?= $pageSpecificMeta ?> 

        <title><?= $title ?></title>

        
    </head>
        
    <body>

    	<?= require('view/header.php'); ?>
		
    	<div class="container-fluid vh-100">
        	<?= $content ?>
    	</div>
		
		<footer class="p-0 bg-dark w-100 fixed-bottom">
			<ul class="nav col-auto me-auto text-white mb-0 justify-content-center ">
				<?= ((!isset($_SESSION["nom"])) ? '<li class="pe-2"><a class="text-danger" href="/login"><i class="fas fa-sign-in-alt"></i></a></li>' : '') ?>
				<?= ((isset($_SESSION["nom"])) ? '<li class="pe-2"><a class="text-danger" href="/logout"><i class="fas fa-sign-out-alt"></i></a></li>' : '') ?>
				
				<?= ((isset($_SESSION["nom"])) ? '<li class="pe-2"><a class="text-danger" href data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-edit"></i></a></li>' : '') ?>
				<li>©BeerAdvisor v0.1.2 <i>Copyright 2021</i>, Made with 🍺 by <a class="text-danger" href="https://maximevincent.fr">Emix</a></li>
			</ul>
		</footer>
    </body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Bootstrap JS and popper -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script defer src="<?= $GLOBALS["protocol"].$GLOBALS["host"].$GLOBALS["base_URI"] ?>/public/lib/font-awesome/js/all.js"></script> <!--load all styles -->

	<script src="<?= $GLOBALS["protocol"].$GLOBALS["host"].$GLOBALS["base_URI"] ?>/public/js/main.js" ></script>



    <?= $pageSpecificScript ?>
</html>