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
        <h1><?php the_field('titre_jumbotron'); ?></h1>
        <p><?php the_field('soustitre_jumbotron'); ?></p>
		 
    </div>
</div>
<!-- // Fin jumbotron -->

<!-- Début Whychoose -->
<section id="whychoose">
    <div class="container">
        <h3 class="section-title"><?php the_field('whychoose_titre'); ?></h3>
        <div class="row">
            <div class="col-md-4">
                <div class="bloc">
                    <img class="img-fluid" src="<?php the_field('raison_1_img'); ?>">
                    <p><?php the_field('raison_1'); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bloc">
                    <img class="img-fluid" src="<?php the_field('raison_2_img'); ?>">
                    <p><?php the_field('raison_2'); ?></p>
                </div>

            </div>
            <div class="col-md-4">
                <div class="bloc">
                    <img class="img-fluid" src="<?php the_field('raison_3_img'); ?>">
                    <p><?php the_field('raison_3'); ?></p>
                </div>
            </div>
            <!-- <a href="inscription" class="btn btn-success my-2 my-sm-0">INSCRIPTION</a>-->
        </div>


    </div>
</section>
<!-- // Fin Whychoose -->

<!-- Début Team -->
<section id="team">

    <div class="container">
        <h3 class="section-title">Notre team</h3>
        <div class="row">
			<?php 
			  $the_query = new WP_Query('category_name=Team&orderby=ASC');
    while ($the_query->have_posts()) :
        $the_query->the_post();
        ?>
        <div class="col-md-4">
            <div class="wow slideInRight animated card text-center" style="width: 18rem;">
                <img class="card-img center" src="<?php the_field('image_de_profil'); ?>"/>
                <div class="card-body">
                    <h5 class="card-title"># <?php the_title(); ?></h5>
                    <h6>Specialité(s)</h6>
                    <p class="card-text"><?php the_field('specialites_'); ?></p>
                    <a href="<?php the_field('page_de_profil'); ?>" class="btn btn-yellow my-2 my-sm-0">VOIR PROFIL</a>
                </div>
            </div>

            <!-- // Fin column -->
        </div>
    <?php endwhile;?>
           
        </div>
        <!-- // container-->
    </div>
</section>
<!-- // Fin team-->


<!-- Début Lastbets -->
<section id="home_lastbets">

    <div class="container">
        <h3 class="section-title">Nos derniers résultats</h3>
        <div class="row">
            <div class="table-responsive wow bounceInUp">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">TIPSTER</th>
                        <th scope="col"></th>
                        <th scope="col">ÉVÉNEMENT</th>
                        <th scope="col">DATE</th>
                        <th scope="col">SÉLECTION</th>
                        <th scope="col">COTE</th>
						<th scope="col">MISE</th>
						<th scope="col">GAINS</th>
                        <th scope="col">RÉSULTAT</th>
						
                    </tr>
                    </thead>
                    <tbody>
						<?php 
                      $the_query = new WP_Query('category_name=Pronostic,Pronostic combiné &posts_per_page=15&orderby=ASC');
    while ($the_query->have_posts()) :
    $the_query->the_post();
    if (getFinishBet()) : ?>
    <tr>
        <td>
			<a href="https://www.teambet.fr/author/<?php the_author(); ?>">
			<?php the_author(); ?>
			</a>
            
        </td>
        <td><img class="sport_logo" src="<?php getIconSportBet ();?>"></td>
        <td>
			<?php 
			foreach (get_the_category() as $category) {
        if ('Pronostic' == $category->cat_name) :
			?>
			<a href="<?php the_permalink(); ?>"> 
				
				 <?php  the_field('adversaire_1'); ?> VS  <?php the_field('adversaire_2'); ?>
			
			</a>
			
			<?php endif;
				if ('Pronostic combiné' == $category->cat_name) :
			?>
			<a href="<?php the_permalink(); ?>"> 
				
				 <?php  the_title(); ?>
			
			</a>
			
			<?php endif;
		}
			
			
			
            ?>
			
			
           
        </td>
 		 <?php
        if ('Pronostic'  == $category->cat_name) :
            ?>
                <td><?php the_field('date_du_match'); ?></td>
          <?php endif;
			
        if ('Pronostic combiné'== $category->cat_name) :
		
			?>
		 <td><?php the_field('date_match_1'); ?></td>
            <?php endif;
			?>
       
        <td>
			<?php
				foreach (get_the_category() as $category) {
        if ('Pronostic' == $category->cat_name) :
			?>
			
			 <?php the_field('choix_de_pari'); ?> <br>
			
			<?php endif;
				if ('Pronostic combiné' == $category->cat_name) :
			?>
			   <?php the_field('pronostic_match_1'); ?> +  <?php the_field('pronostic_match_2'); ?> ....
			<?php endif;
		}
            ?>
           
            <?php the_field('pronostic'); ?>
			
 
        </td>
				 <?php
        if ('Pronostic'  == $category->cat_name) :
            ?>
                <td><?php the_field('côte'); ?></td>
          <?php endif;
			
        if ('Pronostic combiné'== $category->cat_name) :
		
			?>
		<td><?php the_field('côte_total'); ?></td>
            <?php endif;
			?>
        
        <td><?php the_field('mise'); ?>€</td>
			 <?php
        if ('Pronostic'  == $category->cat_name) :
            ?>
                 <td class= "<?php getClassGainBet();?>"><b><?php $gain = getGainBet(); echo $gain; ?>€ </b></td>
          <?php endif;
			
        if ('Pronostic combiné'== $category->cat_name) :
		
			?>
			 <td class= "<?php getClassGainBet();?>"><b><?php $gain = getGainBetCombi(); echo $gain; ?>€ </b></td>
            <?php endif;
			?>
		
        <td>
        <img class="img-result" src="<?php getIconResultBet(); ?>"  alt="">
        </td>
 
 
        <?php endif; endwhile; ?>
                    </tbody>
                </table>
            </div>
            <!-- // row -->
            <div style="margin-top:3em; margin-bottom:3em;" class="center">
                <a href="pronostics" class="btn btn-success my-2 my-sm-0">PRONOSTICS EN COURS</a>
            </div>
        </div>
        <!-- // container-->
    </div>
</section>
<!-- // Fin Lastbets -->

<!-- Début ads subscription -->
<section id="ads_subscription">
    <div class="container">

        <div class="row">
            <div class="col-md-6 center">

                <div class="bloc center wow fadeInUp ">
                    <p>Abonnez-vous et recevez gratuitement nos pronostics par mail </p>
                   
                    <div class="center">
						<?php es_subbox($namefield = "YES", $desc = "", $group = "Public"); ?>
                        <!--<a href="inscription" class="btn btn-yellow">S'ABONNER</a> -->

                    </div>
                    <!-- // bloc -->
                </div>


                <!-- // col -->
            </div>
            <!-- // row -->
        </div>
        <!-- // container -->
    </div>


</section>
<!-- // Fin ads subscription -->
<?php
get_footer();
?>
