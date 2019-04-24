<?php get_header(); ?>

<article class="col-md-9">
    <h2>Il s'agit du template destiné à afficher un seul article</h2>
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

            <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
            <h4><?php the_date();?></h4>

            <?php the_content();?>
            

            Par <?php the_author();?>

            <?php
            // Si les commentaires sont ouverts ou si nous avons au moins un commentaire, chargez le modèle de commentaire.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>

            <?php endwhile; ?>
        <?php endif; ?>


        </article>

<?php get_footer(); ?>