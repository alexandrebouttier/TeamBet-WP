<?php
/**
 * Template Name: Profil
 */

get_header();
?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <!-- Début profil -->
    <section id="profil">
        <div class="container">
            <h3 class="section-title">Profil de <?php the_title();?></h3>
			<h4 class="section-subtitle">Historique de mes pronostics</h3>
            <div class="row">
                <div class="col-md-4">

                    <div class="profil-card center">
                    <img class="center" <?php the_post_thumbnail();?>
                        <p><?php the_content();?></p>
                        <div class="perf">
                            <div class="nbbets">
                                <span>Pronostics</span>
                                <span>20</span>

                            </div>
                            <div class="roi">
                                <span>ROI</span>
                                <span>20%</span>

                            </div>

                        </div>
                        <a href="#" class="btn btn-yellow my-2 my-sm-0">Voir profil Bet Bankroll</a>
                   
                    </div>
                </div>

                <div class="col-md-6">

                        <?php 
                         $tipster =$_GET['tipster'];
                         $author = "author_name=$tipster";
                        $the_query = new WP_Query('$author&category_name=Pronostic');
                        while ($the_query->have_posts()) : 
                           
                        $the_query->the_post();
                        
               $resultat = get_field('resultat');

               if ($resultat != "En attente") : ?>
                      
                        
                        <div class="col-lg-12">
                            <div class="bet">
                                <div class="header">
                                    <span class="title">Pronostic: <?php the_title();?></span>
                                    <?php 
                                    $date = get_field('date_du_match', false, false);
                                    $date = new DateTime($date);
                                    ?>
                                    <span class="date_bet">(<?php echo $date->format('j M Y'); ?> à 21h00)</span>
                                </div>
                                <div class="body">
                                    <span>
                                        <b>Sport:</b> <?php the_field('sport');?></span>
                                    <span>
                                        <b>Type de pari:</b> <?php the_field('type_de_pari');?></span>
                                    <span>
                                        <b>Sélection:</b> <?php the_field('selection');?></span>
                                    <span>
                                        <b>Côte:</b> <?php the_field('côte');?></span>
                                    <span>
                                        <b>Bookmaker:</b> <?php the_field('bookmaker');?></span>
                                        <?php $resultat = get_field('resultat');?>
                                        <?php
                                        if($resultat == "En attente"){
                                            ?>
                                            <span>
                                            <b>Résultat:</b><img class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/time.png" alt="">
                                        </span>
                                            <?php
                                        }
                                        elseif($resultat == "Gagné"){
                                            ?>
                                            <span>
                                            <b>Résultat:</b><img class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/win.png" alt=""></span>
                                            <?php
                                        }
                                        elseif($resultat == "Perdu"){
                                            ?>
                                            <span>
                                            <b>Résultat:</b><img class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/lose.png" alt="">
                                            </span>
                                            <?php
                                        }
                                        elseif($resultat == "Rembourser"){
                                            ?>
                                            <span>
                                            <b>Résultat:</b><img class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/cancel.png" alt="">
                                            </span>
                                            <?php
                                        }
                                        ?>
                                       
                                       <?php 
                                 if ( !empty( get_the_content() ) ){ 
							?>
                            <span>
                                <b>Analyse:</b>
                            </span>
                            <span class="analysis">
                                    <?php the_content();?>
                            </span>
                            <?php } ?>
						
                                    
                                </div>
                                <div class="footer">
                                
                                    <span class="post_info">Posté par
                                        <b><?php the_author(); ?></b> le <?php the_date(); ?> à <?php echo get_the_time('', $post->ID); ?></span>
                                </div>
        
        
                            </div>
                            <!-- // column -->
                        </div>
                        <?php endif;?>
                 <?php endwhile;?>


                
                </div>

                




                <!-- // row -->
            </div>
            <!-- // container -->
        </div>


    </section>
    <!-- // Fin profil -->
        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
