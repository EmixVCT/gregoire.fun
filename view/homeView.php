<?php 
$title = 'BeerAdvisor'; 
$currentPage = 'home';
?>


<?php 
//Main content
ob_start(); ?>

<div class="container-fluid px-2 max-vh-100">

    <div class="row justify-content-md-center">
        
		
		<div class="col-12 mt-5 text-center d-none d-sm-block" id="panel-recherche">
            <img style="max-height: 100px;max-width: 100%;height: 75px;" class="img-fluid text-center mb-1" src="/public/images/logo.png" />            
        </div>
		
        <div class="col-12 mt-3">
				<div class="text-suggestion divider"><span></span><span>à la une</span><span></span></div>
				<?php foreach($menu as $produit){ 
					if($produit['favorite'] == 1){ ?>
					<div class="col px-2  product-container">
						<div class="wrapper w-100 ">
						  <div class="card w-100">
							<div class="front w-100">
							  <h1><?= htmlspecialchars($produit["nom"]) ?></h1>
							  <p>Offert par : <span><?= htmlspecialchars($produit["proprietaire"]) ?></span></p>
							  <p class="price">Stock : <?= htmlspecialchars($produit["stock"]) ?></p>
							</div>
							<div class="right w-100">
							  <h2><?= htmlspecialchars($produit["nom"]) ?></h2>
							  <p><?= htmlspecialchars($produit["description"]) ?></p>
							  <p>Offert par : <span><?= htmlspecialchars($produit["proprietaire"]) ?></span></p>
							  <p class="">Stock : <?= htmlspecialchars($produit["stock"]) ?></p>
							</div>
						  </div>
						  <div class="img-wrapper">
								<?php if(!empty($produit["image"])){ ?>
							   <img src='/public/images/<?= htmlspecialchars($produit["image"]) ?>' alt=''>    
								<?php } ?>
						  </div>
						</div>
					</div>
				<?php } } ?>
				
				<div class="text-suggestion divider"><span></span><span>Menu</span><span></span></div>
              <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-2 g-lg-3 justify-content-center mb-5">
					<?php foreach($menu as $produit){ ?>
						<div class="col px-2  product-container">
							<?php if (isset($_SESSION["nom"])){ ?>
								<div class="d-flex position-absolute" style="z-index:50;">
									<button data-id="<?= $produit["produitMenuID"] ?>" onclick="heartP(this)" class="btn m-0 p-0  text-danger"><i class="<?= (($produit['favorite'] == 1)? "fa" : "far") ?> fa-heart fa-2x"></i></button>
									<button data-id="<?= $produit["produitMenuID"] ?>" onclick="deleteP(this)" class="btn m-0 p-0 text-warning"><i class="fas fa-times fa-2x"></i></button>
								</div>
							<?php } ?>
							<div class="wrapper">
							  <div class="card">
								<div class="front">
								  <h1><?= htmlspecialchars($produit["nom"]) ?></h1>
								  <p>Offert par : <span><?= htmlspecialchars($produit["proprietaire"]) ?></span></p>
								  <p class="price">Stock : <?= htmlspecialchars($produit["stock"]) ?></p>
								</div>
								<div class="right">
								  <h2><?= htmlspecialchars($produit["nom"]) ?></h2>
								  <p><?= htmlspecialchars($produit["description"]) ?></p>
								  <p>Offert par : <span><?= htmlspecialchars($produit["proprietaire"]) ?></span></p>
								  <p class="">Stock : <?= htmlspecialchars($produit["stock"]) ?></p>
								</div>
							  </div>
							  <div class="img-wrapper">
									<?php if(!empty($produit["image"])){ ?>
								   <img src='/public/images/<?= htmlspecialchars($produit["image"]) ?>' alt=''>    
									<?php } ?>
							  </div>
							</div>
						</div>
					<?php } ?>

            </div>
        </div>
     
    </div>
	
	
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout Produit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<label for="select">Produit:</label>
        <select id="select" class="form-control">
			<?php foreach($produits as $p){ ?>
				<option value="<?= $p['id'] ?>"><?= $p['nom'] ?></option>
			<?php } ?>
		</select>
		<label for="stock">Stock:</label>
		<input id="stock" class="form-control" type="number" placeholder="12" value="1">
		<label for="offerby">offert par:</label>
		<input id="offerby" class="form-control" type="text" placeholder="Gregoire">
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="addP()">Ajouter</button>
      </div>
    </div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>


<?php 
//Page Specific Scripts
ob_start(); ?>
<script type="text/javascript">

function heartP(elt){
	d = {
		id:$(elt).attr("data-id")
	}
	
	$.ajax({
       url : '/toggleHeart', // La ressource ciblée
       type : 'POST', // Le type de la requête HTTP.
       data : d,
	   success : function(response){ 
           console.log(response);
		   window.location.reload(true);
       }
    });
}

function deleteP(elt){
	d = {
		id:$(elt).attr("data-id")
	}
	
	$.ajax({
       url : '/delete', // La ressource ciblée
       type : 'POST', // Le type de la requête HTTP.
       data : d,
	   success : function(response){ 
           console.log(response);
		   window.location.reload(true);
       }
    });

}

function addP(){
	
	d = {
		id:$("#select").val(),
		stock:$("#stock").val(),
		proprietaire:$("#offerby").val()
	}
	     
    $.ajax({
       url : '/addProduit', // La ressource ciblée
       type : 'POST', // Le type de la requête HTTP.
       data : d,
	   success : function(response){ 
           console.log(response);
		   window.location.reload(true);
       }
    });
	
	


	
}
</script>
<?php $pageSpecificScript = ob_get_clean(); ?>


<?php 
//Page Specific MetaData
ob_start(); ?>

<?php $pageSpecificMeta = ob_get_clean(); ?>

<?php require('view/template.php'); ?>