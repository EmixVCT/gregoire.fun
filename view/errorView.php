<?php $title = 'Erreur'; 
$currentPage = 'home';
?>


<?php 
//Main content
ob_start(); ?>

<div class="container-fluid px-5 max-vh-100">
    <div class="row justify-content-md-center min-vh-100">
        
		
		<div class="d-sm-flex bd-highlight align-self-center">
		  <div class="p-2 flex-grow-1 bd-highlight ">
			<h1 class="display-1"><strong>WTF Bro !</strong></h1>
			<p class="lead"><?= $errorMessage ?></p>
			<button class="btn btn-outline-danger" onclick="window.history.go(-1);"><i class="fas fa-backward"></i> Retour </button>
		  </div>
		  <div class="p-2 bd-highlight">
			<figure class="text-center">
				<img class="img-fluid" style="max-height:350px;" src="/public/images/icon.PNG"></img>
				<figcaption class="blockquote-footer mt-1">
					Erreur <cite title="Robot triste">biere 404</cite>
				 </figcaption>
			</figure>
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