<?php get_header(); ?>

<article class="col-md-9" style="background-color : #999999">
    <h2>Ceci est une page d'archive qui permet de récupérer le blog d'une catégorie ici blog-2</h2>
        <!-- Contenu du site -->
        <?php  
        if (have_posts()) :
            while (have_posts()): the_post( );
        ?>
                <?php
                // Récupération de l'ID de l'image à la une puis affection de la variable
                $idImageAlaUne=get_post_thumbnail_id();
                $imgSrc=wp_get_attachment_url( $idImageAlaUne );
                ?>
                <!-- class responsive et width à 100 % -->
                <img class="img-responsive" src="<?php  echo $imgSrc; ?>" alt="" style="width:100%">
                <h1><a href="<?php the_permalink()?>"><?php the_title();?></a></h1>

                <h4><?php the_date();?></h4>

                <?php the_content();?>

                Par <?php the_author();?>

                <?php the_comment();?>

            <?php endwhile; ?>
        <?php endif; ?>


        </article>

<?php get_footer(); ?>