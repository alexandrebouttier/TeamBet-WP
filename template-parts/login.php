<?php
/**
 * Template Name: Login
 */

get_header();
?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <!-- Début register -->
            <section id="register">
                    <h3 class="section-title"><?php the_title();?></h3>
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

    <?php get_footer(); ?>
