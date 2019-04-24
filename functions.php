<?php 

// Enregistrer la class de navigation personnalisé pour l'argument de naviguation "walker"
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// set_post_thumbnail_size( 800, auto );


// Activation des images à la une
add_theme_support( 'post-thumbnails' );

// Activation tag des titres balise <title>
add_theme_support( 'title-tag' );

/**
* Enqueue scripts
*
* @param string $handle Script name
* @param string $src Script url
* @param array $deps (optional) Array of script names on which this script depends
* @param string|bool $ver (optional) Script version (used for cache busting), set to null to disable
* @param bool $in_footer (optional) Whether to enqueue the script before </head> or before </body>
*/

// Chargement des scripts
function sicca_theme_scripts() {
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js');
    // Pour Bootstrap qui dépend de JQuery
    wp_enqueue_script( 'bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'jquery' ), false, false );
    wp_enqueue_style( 'bootstrapcss', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style( 'css', get_theme_file_uri( '/css/style.css' ));

    // Possibilité de répondre à un commentaire
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'sicca_theme_scripts' );

// Déclarer ses menus
register_nav_menus( 
    
    array(
        'primaire' => __('menu primaire', 'test')
        )
 );

function widget_sicca() {
    /**
    * Création de Sidebar
    * @param string|array  Construit une barre latérale basée sur les valeurs'name' et'id'.
    */
    $args = array(
        'name'          => __( 'Sidebar de droite', 'theme_text_domain'),
        'id' 			=> 'sidebar_droite',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<span id="%1" class="widget %2">',
        'after_widget'  => '</span>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    );

    register_sidebar( $args );

    $args = array(
        'name'          => __( 'Sidebar pour le footerfooter', 'theme_text_domain'),
        'id' 			=> 'sidebar_footer',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<span id="%1" class="widget %2">',
        'after_widget'  => '</span>',
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
    );

    register_sidebar( $args );
}

// Initialisation des widgets
add_action( 'widgets_init', 'widget_sicca' );

/* Filtre pour template perso en fonction de l'id d'article, de l'auteur, de la catégorie ou du tag
qui scan les fichiers tel single-75.php, single-author-sicca.php, single-cat-portfolio.php...
*/
function my_single_template()
{
    global $wp_query, $post;
    if(file_exists(TEMPLATEPATH.'/single-' . $post->ID . '.php'))
        return TEMPLATEPATH.'/single-' . $post->ID . '.php';

    $curauth = get_userdata($wp_query->post->post_author);

    if(file_exists(TEMPLATEPATH . '/single-author-' . $curauth->user_nicename . '.php'))
        return TEMPLATEPATH . '/single-author-' . $curauth->user_nicename . '.php';

    elseif(file_exists(TEMPLATEPATH . '/single-author-' . $curauth->ID . '.php'))
        return TEMPLATEPATH . '/single-author-' . $curauth->ID . '.php';

    
    foreach((array)get_the_category() as $cat){

        if(file_exists(TEMPLATEPATH . '/single-cat-' . $cat->slug . '.php'))
            return TEMPLATEPATH . '/single-cat-' . $cat->slug . '.php';

        elseif(file_exists(TEMPLATEPATH . '/single-cat-' . $cat->term_id . '.php'))
            return TEMPLATEPATH . '/single-cat-' . $cat->term_id . '.php';
    }

    $wp_query->in_the_loop = true;
    // Retour : (bool) Vrai si l'appelant est dans la boucle, faux si la boucle n'a pas commencé ou terminé.

    foreach((array)get_the_tags() as $tag){

        if(file_exists(SINGLE_PATH . '/single-tag-' . $tag->slug . '.php'))
            return SINGLE_PATH . '/single-tag-' . $tag->slug . '.php';
    
        elseif(file_exists(SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php'))
            return SINGLE_PATH . '/single-tag-' . $tag->term_id . '.php';
    }
    $wp_query->in_the_loop = false;

    if(file_exists(TEMPLATEPATH . '/single.php'))
        return TEMPLATEPATH . '/single.php';
    
        return $single;

}
// initialisation des filtres
add_filter( "single_template", "my_single_template" );

// function add_search_box($items, $args) {

//     ob_start();
//     get_search_form();
//     $searchform = ob_get_contents();
//     ob_end_clean();

//     $items .= '<li>' . $searchform . '</li>'; 
//     return $items;
// }
// add_filter('wp_nav_menu_items','add_search_box', 10, 2);

?>