<?php /* Template name: template pour la page de contact */ ?>


<?php get_header(); ?>

<article class="col-md-9">
    <h2>Ceci est une page destinée pour Contact</h2>
        <!-- Contenu du site -->
        <?php  
        if (have_posts()) :
            while (have_posts()): the_post( );
        ?>
            <!-- Affiche le contenu de contenu-article.php -->
            <?php  get_template_part( 'contenu', 'article' );?>

            <?php endwhile; ?>
        <?php endif; ?>


        </article>



<?php get_footer(); ?>