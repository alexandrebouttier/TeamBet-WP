<?php
/**
 * Template Name: Bookmakers
 */

get_header();
?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
          
<!-- Début bookmakers -->
<section id="bookmakers">
    <div class="container">
        <h3 class="section-title">Bonus bookmakers</h3>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">BOOKMAKER</th>
                        <th scope="col">BONUS</th>
                        <th scope="col">EN SAVOIR PLUS</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                $the_query = new WP_Query('category_name=Bookmaker&orderby=ASC');
                while ($the_query->have_posts()) : 
                $the_query->the_post();
                ?>
                    <tr>
                        <td>
                        <img <?php the_post_thumbnail();?>
                        </td>
                        <td>
                        <?php the_field('bonus');?>€
                        </td>
                        <td>
                            <a href="<?php the_field('lien_de_parrainage_');?>" class="btn btn-outline-info my-2 my-sm-0">Voir l'offre</a>
                        </td>
                    </tr>
                    <?php endwhile;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</section>
<!-- // Fin bookmakers -->
        </main><!-- #main -->
    </section><!-- #primary -->

<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer fixed-bottom <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container-fluid p-3 p-md-5">
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://www.alexandrebouttier.fr" target="_blank" title="Wordpress Technical Support" alt="Alexandre Bouttier"><?php echo esc_html__('Alexandre Bouttier','wp-bootstrap-starter'); ?></a>

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
