<?php
/*
Template Name: Bets
*/
get_header();
?>

<section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">



   <!-- Début bets -->
   <section id="bets">
        <div class="container">
            <h3 class="section-title"><?php the_title();?> </h3>
            <div class="flex_container">
            <?php 
                $the_query = new WP_Query('category_name=Pronostic&showposts=15&orderby=ASC');
                while ($the_query->have_posts()) : 
                $the_query->the_post();
                ?>
             
                                   
         
                <!-- Début bet_post -->
                <div class="bet_post">

                    <div class="bloc-image bg_football">
                         <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?>
                    </div>
                    
                    <div class="body">
                        <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?>

                        <span>
                            <b>Date du match:</b> <?php the_field('date_du_match');?></span>
                        <span class="statut">
                            <b>Statut:</b>
                            <?php $resultat = get_field('resultat');?>
                            <?php
                            if($resultat == "En attente"){
                                ?>
                              
                                <img class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/time.png" alt="">
                          
                                <?php
                            }
                            elseif($resultat == "Gagné"){
                                ?>
                              
                                <img  class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/win.png" alt=""></span>
                                <?php
                            }
                            elseif($resultat == "Perdu"){
                                ?>
                             
                                <img  class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/lose.png" alt="">
                               
                                <?php
                            }
                            elseif($resultat == "Rembourser"){
                                ?>
                             
                                <img class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/cancel.png" alt="">
                              
                                <?php
                            }
                            ?>
                         
                        </span>
                      
                            <span class="post_info">Posté par
                                <b><?php the_author();?></b> le <?php echo get_the_date('', $post->ID); ?> </span>
                    </div>
                </div>
                <!-- // bet_post -->
                <?php endwhile;?>


                <!-- // flexcontainer -->
                </div>
                  <!-- // container -->
            </div>
          
    
    </section>
    <!-- // Fin bets -->



</main><!-- #main -->

</section><!-- #primary -->


<?php get_footer(); ?>

        
        