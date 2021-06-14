<?php $title = 'Connexion'; 
$currentPage = 'login';
// $indicesFiche contains all indices existing for the Fiche, most recent one to oldest
// $indiceFiche is an array that contains the indice ID of the fiche to be displayed
// $editableFiche is an Array 0: boolean (is fiche editable or not) 1: Restriction or Reason ('ADMIN_ONLY, 'ALL', 'INDICE')

?>


<?php 
//Main content
ob_start(); ?>

<div class="container-fluid max-vh-100">
    <div class="row justify-content-md-center min-vh-100">
                    
        
        <div class="col-12  align-self-center" id="panel-login">
            <div class="container rounded shadow py-3 text-center">
                <h3>Connexion</h3>
                
				<form action="/login" method="POST">
					<input name="nom" type="text" id="inputNom" class="form-control" placeholder="Login" required="" autofocus="">
					<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required="">
					
					<div class="text-center my-2">
						<button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Connexion</button>
					</div>
				</form>
                <a href="" onclick="alert('sheeeeeesh')" id="forgot_pswd">Mot de passe oublié?</a> 
            </div>
        </div>
               
        
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php 
//Page Specific Scripts
ob_start(); ?>
<script type="text/javascript">
</script>
<?php $pageSpecificScript = ob_get_clean(); ?>

<?php 
//Page Specific MetaData
ob_start(); ?>

<?php $pageSpecificMeta = ob_get_clean(); ?>


<?php require('view/template.php'); ?>