<?php
/**
 * Template Name: Single_bet
 */

?>
                <div class="col-lg-12 center">
                    <div class="bet">
                        <div class="header">
                            <span class="title">Pronostic: <?php the_title();?></span>
                            <?php 
                            $date = get_field('date_du_match', false, false);
                            $date = new DateTime($date);
                            ?>
                            <span class="date_bet">(Le <?php the_field('date_du_match');?>)</span>
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
    