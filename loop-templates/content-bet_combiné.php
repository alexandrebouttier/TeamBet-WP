<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 <div class="bet">

                    <header>
                        <a href="pronostics" class="btn btn-yellow">RETOUR</a>

                        <br>
                        <span> <?php understrap_posted_on(); ?></span>
                    </header>
                    <div class="body">
                        <div class="table-responsive-md">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
																	    <?php   
			foreach (get_the_category() as $category) {
        if ('Pronostic combiné'== $category->cat_name) :
		
			?>
			Pari Combiné
            <?php endif;
			  if ('Pronostic'== $category->cat_name) :
		
			?>
			Pari Simple
            <?php endif; }
							?>
                                        <th scope="col">Match</th>
                                        <th scope="col">Sélection</th>
										<th scope="col">Côte</th>
                                      
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                           <b>  <?php the_field('match_1'); ?></b>
                                            <br> <?php the_field('date_match_1'); ?> à <?php the_field('heure_match_1'); ?>
                                        </td>
                                        <td>
                                            <b><?php the_field('pronostic_match_1'); ?></b>
                                        </td>
										 <td>
                                            <b><?php the_field('côte_match_1'); ?></b>
                                        </td>
                                    </tr>
									   <tr>
                                        <td>
                                           <b>  <?php the_field('match_2'); ?></b>
                                            <br> <?php the_field('date_match_2'); ?> à <?php the_field('heure_match_2'); ?>
                                        </td>
                                        <td>
                                            <b><?php the_field('pronostic_match_2'); ?></b>
                                        </td>
										 <td>
                                            <b><?php the_field('côte_match_2'); ?></b>
                                        </td>
                                    </tr>
									
									 
										  <?php
										  if (get_field('match_3') ):
											?>
									 <tr>
										      <td>
                                           <b>  <?php the_field('match_3'); ?></b>
                                            <br> <?php the_field('date_match_3'); ?> à <?php the_field('heure_match_3'); ?>
                                        </td>
                                        <td>
                                            <b><?php the_field('pronostic_match_3'); ?></b>
                                        </td>
										 <td>
                                            <b><?php the_field('côte_match_3'); ?></b>
                                        </td>
                                    </tr>
											<?php endif;
										  ?>
									
                                    		  <?php
										  if (get_field('match_4') ):
											?>
									 <tr>
										      <td>
                                           <b>  <?php the_field('match_3'); ?></b>
                                            <br> <?php the_field('date_match_3'); ?> à <?php the_field('heure_match_3'); ?>
                                        </td>
                                        <td>
                                            <b><?php the_field('pronostic_match_3'); ?></b>
                                        </td>
										 <td>
                                            <b><?php the_field('côte_match_3'); ?></b>
                                        </td>
                                    </tr>
											<?php endif;
										  ?>
                                    
								
                                </tbody>
                            </table>
						
							<?php getPourcentBkBet();?>
							<span> Cote totale : <?php the_field('côte_total'); ?></span> <br>
							<span>Mise totale :  <?php the_field('mise'); ?>€ </span> <br>
							<span> Gains potentiels : <?php getGainPotentialCombi();?> €</span>
                        </div>
						

                    </div>

	
                </div>
	
  
</article><!-- #post-## -->
