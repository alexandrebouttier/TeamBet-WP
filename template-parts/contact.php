
<?php
/**
 * Template Name: Contact
 */

get_header();
?>
<!-- Début contact-->
<section id="contact">
    <div class="container">
        <h3 class="section-title"><?php the_title();?></h3>
        <div class="row">
          <div class="col-md-6 center">
  
       
          <form>
          
           <?php the_post(); the_content();?>
          </form>
      </div>
        

        </div>
    </div>


</section>
<!-- // Fin contact -->

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
