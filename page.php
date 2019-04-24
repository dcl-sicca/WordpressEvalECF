<!-- Appel le header de wordpress -->
<?php get_header(); ?>

<article class="col-md-9">
    <h2>Ceci est une page destinée à mon thème wordpress</h2>
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
<!-- Appel le footer de wordpress -->
<?php get_footer(); ?>