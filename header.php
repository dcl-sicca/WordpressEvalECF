<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset= "<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width">
    <!--   Appel du head de Wordpress   -->
    <?php wp_head();?>
</head>
<!-- Rajoute toutes les class contenu dans le body pour appliquer facilement des feuilles de style -->
<body <?php body_class($class); ?>>

<div class="container">
    <header class="row">
        <div class="col-sm-3">
            <!-- récupère l'url de l'accueil du blog -->
            <a href="<?php bloginfo('wpurl');?>">
                <!-- url du chemin du template -->
                <img src="<?php echo get_template_directory_uri(); ?>/logo.png" alt="" width="200" title="<?php bloginfo('name');?>">
            </a>
        </div>
        <div class="col-sm-9">
            <!-- Affiche la description du blog -->
            <?php bloginfo('description');?>
        </div>
    </header>
    <!-- Menu Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark rounded" style="background-color: #7f629b;">
    
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarsExample09" class="collapse navbar-collapse" >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <?php 
                    // Affichage des menus wordpress et class walker
                    $args = array(
                        'theme_location'  => 'primaire',
                        'menu_class'      => 'navbar-nav mr-auto',
                        'walker'          => new WP_Bootstrap_Navwalker(),
                    );
                    wp_nav_menu( $args )
                    ?>
                </li>
            </ul>

        <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
        </div>
    </nav>

    <section class="row">
        