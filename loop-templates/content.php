<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>
<div class="flex-container">


    <?php
    foreach (get_the_category() as $category) {
        if ('Pronostic' == $category->cat_name) {
            ?>
            <div class="bet_post">
                <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

                    <header class="entry-header">

                        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                            '</a></h2>'); ?>

                        <?php $getsport = get_field('sport');
                        $football = "http://www.teambet.fr/wp-content/uploads/2018/05/football.png";
                        $tennis = "http://www.teambet.fr/wp-content/uploads/2018/05/tennis.png";
                        $basket = "http://www.teambet.fr/wp-content/uploads/2018/05/basketball.png";
                        $rugby = "http://www.teambet.fr/wp-content/uploads/2018/05/rugby.png";
                        $sport = "";
                        if ($getsport == "Football") {
                            $sport = $football;
                        }
                        if ($getsport == "Tennis") {
                            $sport = $tennis;
                        }
                        if ($getsport == "Basket-ball") {
                            $sport = $basket;
                        }
                        if ($getsport == "Rugby") {
                            $sport = $rugby;
                        }
                        ?>


                        <img class="sport_logo" src="<?php echo $sport; ?>" alt="">
                        <span>Compétition: <?php the_field('competition'); ?></span>

                        <?php if ('post' == get_post_type()) : ?>

                            <div class="entry-meta">
                                <?php understrap_posted_on(); ?>
                            </div><!-- .entry-meta -->

                        <?php endif; ?>

                    </header><!-- .entry-header -->

                    <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>

                    <div class="entry-content">


                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
                            'after' => '</div>',
                        ));
                        ?>

                    </div><!-- .entry-content -->


                </article><!-- #post-## -->
                <!-- #betpost-## -->
            </div>
            <?php
        }

    }
    ?>

</div>