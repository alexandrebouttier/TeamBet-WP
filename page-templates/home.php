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
                    <img class="card-img center" src="<?php the_field('image_de_profil'); ?>" />
                <div class="card-body">
                    <h5 class="card-title"># <?php the_title();?></h5>
                    <h6>Specialité(s)</h6>
                    <p class="card-text"><?php the_field('specialites_'); ?></p>
                    <a href="profil.html" class="btn btn-yellow my-2 my-sm-0">VOIR PROFIL</a>
                </div>
            </div>
   
            <!-- // Fin column -->
        </div>
        <?php endwhile;?>
        <!-- // row-->
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
                        <th scope="col">CÖTE</th>
                        <th scope="col">RÉSULTAT</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $the_query = new WP_Query('category_name=Pronostic&showposts=6&orderby=ASC');
           while ($the_query->have_posts()) :
           $the_query->the_post();

          
           $getsport = get_field('sport');
           $football = "http://www.teambet.fr/wp-content/uploads/2018/05/football.png";
           $tennis = "http://www.teambet.fr/wp-content/uploads/2018/05/tennis.png";
           $basket = "http://www.teambet.fr/wp-content/uploads/2018/05/basketball.png";
           $rugby = "http://www.teambet.fr/wp-content/uploads/2018/05/rugby.png";
           $sport = "";
            if($getsport == "Football"){
                $sport=$football;
            }
            if($getsport == "Tennis"){
               $sport=$tennis;
           }
           if($getsport == "Basket-ball"){
               $sport=$basket;
           }
           if($getsport == "Rugby"){
               $sport=$rugby;
           }
          

           $resultat = get_field('statut');
            if ($resultat != "En attente") : ?>
                         <tr>
                        <td>
                        <?php the_author(); ?>
                        </td>
                        <td><img class="sport_logo" src="<?php echo $sport;?>"> </td>
                        <td>
                        <?php the_field('adversaire_1');?> VS <?php the_field('adversaire_2');?>
                        </td>
                       
                        <td><?php the_field('date_du_match');?></td>
                        <td>
                        <?php the_field('choix_de_pari');?> <br>
                        <?php the_field('pronostic');?>
                        
                        </td>
                        <td><?php the_field('côte');?></td>
                        <td>
                        <?php $resultat = get_field('statut');?>
                            <?php
                            if($resultat == "Gagné"){
                                ?>
                               <img class="img-result"src="http://www.teambet.fr/wp-content/uploads/2018/05/win.png" alt="">
                                <?php
                            }
                            elseif($resultat == "Perdu"){
                                ?>
                               <img class="img-result"src="http://www.teambet.fr/wp-content/uploads/2018/05/lose.png" alt="">
                                <?php
                            }
                            elseif($resultat == "Rembourser"){
                                ?>
                               <img class="img-result"src="http://www.teambet.fr/wp-content/uploads/2018/05/cancel.png" alt="">
                                <?php
                            }
                            ?>
                        </td>
           
           
             <?php endif;?>
             <?php endwhile;?>
            
                </tbody>
            </table>
        </div>
        <!-- // row -->
          <div style="margin-top:3em; margin-bottom:3em;"class="center">
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
                 
                        <h4>N'attendez plus pour gagner...</h4>
                        <p>Choisissez le ou les tipsters de votre choix </p>
                        <span class="price"><?php the_field('prix_ads');?>20€/mois</span>
                        <div class="center">
                            <a href="inscription" class="btn btn-yellow">S'ABONNER</a>

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
