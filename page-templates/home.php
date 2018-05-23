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
<?php
get_footer();
?>
