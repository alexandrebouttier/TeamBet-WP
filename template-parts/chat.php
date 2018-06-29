<?php
/**
 * Template Name: Chat
 */

get_header();
?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <!-- Début register -->
            <section id="register">
                    <h3 class="section-title">Salon de discussion</h3>
                <div class="container">
                    <div class="row">
                    <div class="col-lg-6 center">

                            <?php the_post(); the_content();?>
                    </div>

                    </div>
                </div>

            </section>

            <!-- // Fin register-->
        </main>
        <!-- #main -->
    </section>
    <!-- #primary -->

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