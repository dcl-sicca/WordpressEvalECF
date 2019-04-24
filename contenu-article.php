<?php
// Récupération de l'ID de l'image à la une puis affection de la variable
$idImageAlaUne=get_post_thumbnail_id();
$imgSrc=wp_get_attachment_url( $idImageAlaUne );
?>
<!-- class responsive et width à 100 % -->
<img class="img-responsive" src="<?php  echo $imgSrc; ?>" alt="" style="width:100%">
<?php 
// autre méthode pour afficher thumbnail
// the_post_thumbnail('large') 
?>
<h1><?php the_title();?></h1>
<h4><?php the_date();?></h4>

<?php the_content();?>
Par <?php the_author();?>

<?php the_comment();?>