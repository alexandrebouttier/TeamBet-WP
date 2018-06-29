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
 * FONCTIONS DU THEME TEAMBET
 */

// Fonction qui récupere le résultat du pronostic "Gagné,Perdu,Renbourser"
function getResultBet(){
	$result = get_field('statut'); 
    return $result;
}
// Fonction qui retourne true si le pronostic est terminer
function getFinishBet(){
	  if (getResultBet() != "En attente"){
		  $result = true;
	  }
	
	return $result;
	
}
function getIconResultBet(){
   $url=get_site_url();
   $pathFolderImg ="$url/wp-content/themes/teambet/img";
   $wait="$pathFolderImg/time.png";
   $win ="$pathFolderImg/win.png";
   $lose ="$pathFolderImg/lose.png";
   $cancel ="$pathFolderImg/cancel.png";
   $statut ="";
    if (getResultBet() == "Gagné") {
       $statut = $win;
    } 
    elseif (getResultBet() == "Perdu") {
        $statut = $lose;
    }
	else {
        $statut = $cancel;
    }
    echo $statut;
}
// Fonction qui récupere le sport du pronostic "Football,Tennis,Basket,Rugby"
function getSportBet(){
	$sport = get_field('sport');
	return $sport;
}		
// Fonction qui affiche l'icone du sport du pronostic
function getIconSportBet(){
    $url=get_site_url();
    $pathFolderImg ="$url/wp-content/themes/teambet/img";
    $getsport = get_field('sport');
    $football = "$pathFolderImg/football.png";
    $tennis = "$pathFolderImg/tennis.png";
    $basket = "$pathFolderImg/basketball.png";
    $rugby = "$pathFolderImg/rugby.png";
    $sport = "";
     if(getSportBet() == "Football") {
         $sport=$football;
     }
     if(getSportBet() == "Tennis"){
        $sport=$tennis;
    }
    if(getSportBet() == "Basket-ball"){
        $sport=$basket;
    }
    if(getSportBet() == "Rugby"){
        $sport=$rugby;
    }
    echo $sport;
}
// Fonction qui affiche le gain ou la perte du pronostic
function getGainBet(){
	$mise = get_field('mise'); 
	$cote = get_field('côte');
		if( getResultBet() == "Gagné"){
			$gain = $mise*$cote-$mise;
		}
		elseif(getResultBet() == "Perdu"){
			$gain = - $mise;
		}
		else{
			$gain = $mise;
		}
	return $gain;
}

function getGainBetCombi(){
	$mise = get_field('mise'); 
	$cote = get_field('côte_total');
		if( getResultBet() == "Gagné"){
			$gain = $mise*$cote-$mise;
		}
		elseif(getResultBet() == "Perdu"){
			$gain = - $mise;
		}
		else{
			$gain = $mise;
		}
	return $gain;
}
// Fonction qui retourne une class CSS en fonction du résultat du pronostic
function getClassGainBet(){
    if(getResultBet()=="Gagné") {
        $class="green";
    }
    if(getResultBet()=="Perdu") {
        $class="red";
    }
    if(getResultBet()=="En attente") {
        $class="yellow";
    }
    if(getResultBet()=="Rembourser") {
        $class="blue";
    }
	echo $class;
}

function isCombi(){
	
	if ('Pronostic combiné' == $category->cat_name){
		$resultat = true;
	}
	else{
		$resultat = false;
	}
	return $resultat;
}
function isSimple(){
	
	if ('Pronostic' == $category->cat_name){
		$resultat = true;
	}
	else{
		$resultat = false;
	}
	return $resultat;
}
// Ajouter des champs personnalisés dans le profil utilisateur de WordPress
add_filter('user_contactmethods','wpm_user_fields',10,1);

function wpm_user_fields( $contactmethods ) {
	// On ajoute Betbankroll
	$contactmethods['betbankroll'] = 'Bet Bankroll';
	return $contactmethods;
}

 

