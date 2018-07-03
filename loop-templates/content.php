<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */


?>


    <?php

    foreach (get_the_category() as $category) {
        if ('Team' !==  $category->cat_name) {
            ?>
                    <div class="betpost">
                        <header>
                          <?php   
			
        if ('Pronostic combiné'== $category->cat_name) :
		
			?>
			Pari Combiné
            <?php endif;
			  if ('Pronostic'== $category->cat_name) :
		
			?>
			Pari Simple
            <?php endif;
							?>
                            <br>
                            <span class="post_date"><?php understrap_posted_on(); ?> </span>
                        </header>
                        <div class="body">
                            <div class="flex_row">
                                <div class="bloc_mise">
                                    <div class="flex_col">
                                        MISE
                                        <span><?php the_field('mise'); ?>€</span>
                                    </div>
                                </div>
                                <div class="bloc_cote ">
                                    <div class="flex_col">
                                        COTE
											 <?php
        if ('Pronostic'  == $category->cat_name) :
            ?>
                  <span><?php the_field('côte'); ?></span>
          <?php endif;
			
        if ('Pronostic combiné'== $category->cat_name) :
		
			?>
			  <span><?php the_field('côte_total'); ?></span>
            <?php endif;
			?>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="gain flex_col">
								<?php 
									if(getResultBet() == "En attente"){
										echo " <span>GAINS POTENTIELS</span>";
									}
									if(getResultBet() == "Gagné"){
										echo " <span>GAINS</span>";
									}
									if(getResultBet() == "Perdu"){
										echo " <span>PERTE</span>";
									}
									if(getResultBet() == "Renbourser"){
										echo " <span>RENBOURSER</span>";
									}
								?>
                               					
			 <?php
        if ('Pronostic'  == $category->cat_name) :
            ?>
                 <span class="<?php getClassGainBet();?> gain_value"> <?php $gain = getGainBet(); echo $gain;?>€</span>
          <?php endif;
			
        if ('Pronostic combiné'== $category->cat_name) :
		
			?>
			 <span class="<?php getClassGainBet();?> gain_value"> <?php $gain = getGainBetCombi(); echo $gain;?>€</span>
            <?php endif;
			?>
								
								
                            </div>
                        </div>
                        <footer class="flex_col">
                            <span style="font-family: OpenSans-Bold;"><?php the_title(); ?></span>
							
			 <?php
        if ('Pronostic'  == $category->cat_name) :
            ?>
                 <span><?php the_field('date_du_match'); ?> <?php the_field('heure_du_match'); ?></span>
          <?php endif;
			
        if ('Pronostic combiné'== $category->cat_name) :
		
			?>
			 <span><?php the_field('date_match_1'); ?> <?php the_field('heure_match_1'); ?></span>
            <?php endif;
			?>
		
						
                           
                            
<a  href="<?php the_permalink();?>"class="btn btn-info">Voir le pronostic</a>
                        </footer>

                    </div>
            <?php
        }

    }

    ?>

