<?php

/**
 * Template Name: Contact
 */

get_header();

?>

<!-- Début contact-->
<section id="contact">

    <div class="container">

        <h3 class="section-title"><?php the_title(); ?></h3>

        <div class="row">

            <div class="col-md-6 center">

                <form>
                    <?php the_post();
                    the_content(); ?>
                </form>

            </div>

        </div>

    </div>

</section>
<!-- // Fin contact -->
<?php
get_footer();
?>

