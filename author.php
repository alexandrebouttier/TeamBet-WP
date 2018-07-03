<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>


<div class="wrapper" id="author-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<header class="page-header author-header">

					<?php
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
						$author_name ) : get_userdata( intval( $author ) );
					?>

					<h2><?php esc_html_e( 'Profil de', 'understrap' ); ?> <?php echo esc_html( $curauth->nickname ); ?></h2>

					<?php if ( ! empty( $curauth->ID ) ) : ?>
						<?php echo get_avatar( $curauth->ID ); ?>
					<?php endif; ?>

					<dl>
						<?php if ( ! empty( $curauth->user_url ) ) : ?>
							<dt><?php esc_html_e( 'Website', 'understrap' ); ?></dt>
							<dd>
								<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
							</dd>
						<?php endif; ?>

						<?php if ( ! empty( $curauth->user_description ) ) : ?>
							<dt><?php esc_html_e( 'Profile', 'understrap' ); ?></dt>
							<dd><?php echo esc_html( $curauth->user_description ); ?></dd>
						<?php endif; ?>
						
						<?php if ( ! empty( $curauth->betbankroll ) ) : ?>
						<div style="margin-top:1em;">
							<h5>
								Voir mes stats:
							</h5>
							<a href="<?php echo $curauth->betbankroll; ?>">
								<img style="background-color:black;"src="https://www.bet-bankroll.com/images/bet-bankroll-v4.png" height="200" width="200">
							</a>
						</div>
						<?php endif; ?>
						
					</dl>

					<h4><?php esc_html_e( 'Historique de', 'understrap' ); ?> <?php echo esc_html( $curauth->nickname ); ?>
						:</h4>

				</header><!-- .page-header -->

		<div class="flex_row">
			
				
		
						<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
				 
				  <?php if (getResultBet()!= "En attente") : ?>
				    <?php

    foreach (get_the_category() as $category) {
        if ('Pronostic combiné' OR 'Pronostic' == $category->cat_name) {
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
   
						<?php endif; endwhile; ?>

						<?php else : ?>
						<p>Aucun historique de disponible pour le moment !</p>
							
				

					<?php endif; ?>

</div>


					

			

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
