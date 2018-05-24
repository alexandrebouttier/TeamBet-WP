<?php
/**
 * Template Name: Bets
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

    <div class="wrapper" id="page-wrapper">

        <div class="<?php echo esc_attr( $container ); ?>" id="content">

            <div class="row">

                <div class="<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area"
                    id="primary">

                    <main class="site-main" id="main" role="main">
                        <?php 
                $the_query = new WP_Query('category_name=Pronostic&showposts=15&orderby=ASC');
                while ($the_query->have_posts()) : 
                $the_query->the_post();
                ?>
                        <div class="bet_post">
                            <article <?php post_class(); ?> id="post-
                                <?php the_ID(); ?>">

                                <header class="entry-header">

                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>
                                    <span> Type de pari:
                                        <?php the_field('type_de_pari_');?>
                                    </span>
                                    <br>
                                    <span> Compétition: #
                                        <?php the_field('competition');?> #</span>

                                    <?php if ( 'post' == get_post_type() ) : ?>

                                    <div class="entry-meta">
                                        <?php understrap_posted_on(); ?>
                                    </div>
                                    <!-- .entry-meta -->

                                    <?php endif; ?>

                                </header>
                                <!-- .entry-header -->

                                <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

                                <div class="entry-content">



                                    <?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

                                </div>
                                <!-- .entry-content -->



                            </article>
                            <!-- #post-## -->
                            <!-- #betpost-## -->
                        </div>
                        <?php endwhile;?>

                    </main>
                    <!-- #main -->

                </div>
                <!-- #primary -->

                <?php get_sidebar( 'right' ); ?>

            </div>
            <!-- .row -->

        </div>
        <!-- Container end -->

    </div>
    <!-- Wrapper end -->

    <?php get_footer(); ?>