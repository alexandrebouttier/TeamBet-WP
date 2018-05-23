<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

                
             <?php
             foreach( get_the_category() as $category ) {
                 // Si la catégorie de l'article est = à 'Pronostic' ont affiche la page dédié
                if( 'Pronostic' == $category->cat_name ) {
                 get_template_part( 'loop-templates/content', 'bet_single' ) ;
                }
                //  sinon ont affiche la page de base
                else{
                    get_template_part( 'loop-templates/content', 'single' ) ;
                }
             }
                ?>

             <?php understrap_post_nav(); ?>

<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
?>

<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
