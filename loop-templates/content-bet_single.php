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
                                        <th scope="col">Cote</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      
                                        <td>
                                           <b>  <?php the_title(); ?></b>
                                            <br> <?php the_field('date_du_match'); ?> à <?php the_field('heure_du_match'); ?>
                                        </td>
                                        <td><?php the_field('choix_de_pari'); ?>
                                            <br>
                                            <b><?php the_field('pronostic'); ?></b>

                                        </td>

                                        <td><?php the_field('côte'); ?></td>
                                       
                                    </tr>




                                </tbody>
                            </table>
						
							<?php getPourcentBkBet();?>
							<span>Mise totale :  <?php the_field('mise'); ?>€ </span> <br>
							<span> Gains potentiels : <?php getGainPotentialSimple();?> €</span>
                        </div>
						

                    </div>

	
                </div>
	
  
</article><!-- #post-## -->
