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
        <div class="col-md-4">
            <div class="wow slideInRight animated card text-center" style="width: 18rem;">
                <img class="card-img center" src="assets/img/alexandre_bouttier.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"># Alex</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.</p>
                    <a href="profil.html" class="btn btn-yellow my-2 my-sm-0">VOIR PROFIL</a>
                </div>
            </div>
            <!-- // Fin column -->
        </div>
        <div class="col-md-4">
            <div class="wow slideInRight animated card text-center" style="width: 18rem;">
                <img class="card-img center" src="assets/img/kevin_durand.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"># Kevin</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.</p>
                    <a href="profil.html" class="btn btn-yellow my-2 my-sm-0">VOIR PROFIL</a>
                </div>
            </div>
            <!-- // Fin column -->
        </div>
        <div class="col-md-4">
            <div class="wow slideInRight animated card text-center" style="width: 18rem;">
                <img class="card-img center" src="assets/img/tony_lopez.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"># Tony</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris.</p>
                    <a href="profil.html" class="btn btn-yellow my-2 my-sm-0">VOIR PROFIL</a>
                </div>
            </div>
            <!-- // Fin column -->
        </div>
        <!-- // row-->
    </div>
    <!-- // container-->
</div>
</section>
<!-- // Fin team-->


<!-- Début Lastbets -->
<section id="lastbets">

<div class="container">
    <h3 class="section-title">Nos derniers résultats</h3>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tipster</th>
                        <th scope="col">Match</th>
                        <th scope="col">Date</th>
                        <th scope="col">Pronostic</th>
                        <th scope="col">Côte</th>
                        <th scope="col">Résultat</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $the_query = new WP_Query('category_name=Pronostic&showposts=6&orderby=ASC');
           while ($the_query->have_posts()) :
           $the_query->the_post();
           $resultat = get_field('statut');
            if ($resultat != "En attente") : ?>
                         <tr>
                        <td>
                        <?php the_author(); ?>
                        </td>
                        <td>
                        <?php the_title();?>
                        </td>
                       
                        <td><?php the_field('date_du_match');?></td>
                        <td>
                        <?php the_field('choix_de_pari');?>
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
<?php
get_footer();
?>
