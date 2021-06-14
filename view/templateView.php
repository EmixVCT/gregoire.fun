<?php $title = 'Titre'; 
$currentPage = 'page';
?>


<?php 
//Main content
ob_start(); ?>


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