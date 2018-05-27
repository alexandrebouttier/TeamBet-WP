<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
    $the_theme = wp_get_theme();
    wp_enqueue_style('animateCSS', get_stylesheet_directory_uri() . '/css/animate.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'wow', get_stylesheet_directory_uri() . '/js/wow.min.js', array(), true);
    wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/js/app.js', array(), true);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
/**
 * Custom template tags for this theme.
 */


// Fonction qui affiche l'icone du sport du field ACF 'sport'
function showIconSport(){
    $url=get_site_url();
   $pathFolderImg ="$url/wp-content/themes/teambet/img";
    $getsport = get_field('sport');
    $football = "$pathFolderImg/football.png";
    $tennis = "$pathFolderImg/tennis.png";
    $basket = "$pathFolderImg/basketball.png";
    $rugby = "$pathFolderImg/rugby.png";
    $sport = "";
     if($getsport == "Football") {
         $sport=$football;
     }
     if($getsport == "Tennis"){
        $sport=$tennis;
    }
    if($getsport == "Basket-ball"){
        $sport=$basket;
    }
    if($getsport == "Rugby"){
        $sport=$rugby;
    }
    echo $sport;
}
// Fonction qui affiche l'icone du staut du pronostic du field ACF 'statut'
function showIconStatut(){
   $url=get_site_url();
   $pathFolderImg ="$url/wp-content/themes/teambet/img";
   $resultat = get_field('statut'); 
   $wait="$pathFolderImg/time.png";
   $win ="$pathFolderImg/win.png";
   $lose ="$pathFolderImg/lose.png";
   $cancel ="$pathFolderImg/cancel.png";
   $statut ="";
   
    if ($resultat == "Gagné") {
       $statut = $win;
    } 
    elseif ($resultat == "Perdu") {
        $statut = $lose;
    }elseif ($resultat == "Rembourser") {
        $statut = $cancel;
    }
    elseif ($resultat == "En attente") {
        $statut = $wait;
    }
    echo $statut;
}
function showTeamHome(){
    $the_query = new WP_Query('category_name=Team&orderby=ASC');
    while ($the_query->have_posts()) :
        $the_query->the_post();
        ?>
        <div class="col-md-4">
            <div class="wow slideInRight animated card text-center" style="width: 18rem;">
                <img class="card-img center" src="<?php the_field('image_de_profil'); ?>"/>
                <div class="card-body">
                    <h5 class="card-title"># <?php the_title(); ?></h5>
                    <h6>Specialité(s)</h6>
                    <p class="card-text"><?php the_field('specialites_'); ?></p>
                    <a href="profil.html" class="btn btn-yellow my-2 my-sm-0">VOIR PROFIL</a>
                </div>
            </div>

            <!-- // Fin column -->
        </div>
    <?php endwhile;
}
// Affiche les derniers prnostics sur la page d'accueil d'ou le statut est diférent de attente
function showLastBetsHome(){
   
    $the_query = new WP_Query('category_name=Pronostic&showposts=11&orderby=ASC');
    while ($the_query->have_posts()) :
    $the_query->the_post();
    $resultat = get_field('statut');
    if ($resultat != "En attente") : ?>
    <tr>
        <td>
            <?php the_author(); ?>
        </td>
        <td><img class="sport_logo" src="<?php showIconSport(); ?>"></td>
        <td>
            <?php the_field('adversaire_1'); ?> VS <?php the_field('adversaire_2'); ?>
        </td>

        <td><?php the_field('date_du_match'); ?></td>
        <td>
            <?php the_field('choix_de_pari'); ?> <br>
            <?php the_field('pronostic'); ?>

        </td>
        <td><?php the_field('côte'); ?></td>
        <td>
        <img class="img-result" src="<?php showIconStatut(); ?>"  alt="">
        </td>


        <?php endif; endwhile; 
}



