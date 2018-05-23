<?php
/**
 * Template Name: Home
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

get_header();
?>
<!-- Début jumbotron -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1><?php the_field('titre_jumbotron');?></h1>
        <p><?php the_field('soustitre_jumbotron');?></p>
    </div>
</div>
<!-- // Fin jumbotron -->

   <!-- Début Whychoose -->
   <section id="whychoose">
        <div class="container">
            <h3 class="section-title"><?php the_field('whychoose_titre');?></h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="bloc">
                    <img class="img-fluid" src="<?php the_field('raison_1_img');?>">
                        <p><?php the_field('raison_1');?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bloc">
                    <img class="img-fluid" src="<?php the_field('raison_2_img');?>">
                        <p><?php the_field('raison_2');?></p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="bloc">
                    <img class="img-fluid" src="<?php the_field('raison_3_img');?>">
                        <p><?php the_field('raison_3');?></p>
                    </div>
                </div>
                <a href="inscription" class="btn btn-success my-2 my-sm-0">INSCRIPTION</a>
            </div>


        </div>
    </section>
    <!-- // Fin Whychoose -->
<?php
get_footer();
?>
