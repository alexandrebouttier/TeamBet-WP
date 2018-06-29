<?php
/*
Template Name: Home
*/
get_header();
?>

<section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
  <!-- Début jumbotron -->
  <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1><?php the_field('titre');?></h1>
            <p><?php the_field('slogan');?></p>
        </div>
    </div>
    <!-- // Fin jumbotron -->

  <!-- Début Whychoose -->
  <section id="whychoose">
        <div class="container">
            <h3 class="section-title">Pourquoi choisir Team-Bet ?</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="bloc">
                        <img class="img-fluid" src="<?php the_field('whychoose_1_img');?>" alt="">
                        <p><?php the_field('whychoose_1');?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bloc">
                        <img class="img-fluid" src="<?php the_field('whychoose_2_img');?>" alt="">
                        <p><?php the_field('whychoose_2');?></p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="bloc">
                        <img class="img-fluid" src="<?php the_field('whychoose_3_img');?>" alt="">
                        <p><?php the_field('whychoose_3');?></p>
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
            <div class="card text-center" style="width: 18rem;">
                <img class="card-img center"<?php the_post_thumbnail();?>
                <div class="card-body">
                    <h5 class="card-title"># <?php the_title();?></h5>
                    <p class="card-text"><?php the_content(); ?></p>
                    <a href="<?php the_field('lien_du_profil');?>" class="btn btn-yellow my-2 my-sm-0">Voir profil</a>
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

               $resultat = get_field('resultat');

                if ($resultat != "En attente") : ?>
               
       
               <tr>
                            <td>
                            <?php the_author(); ?>
                            </td>
                            <td>
                            <?php the_title();?>
                            </td>
                            <?php 
                            $date = get_field('date_du_match', false, false);
                            $date = new DateTime($date);
                            ?>
                            <td><?php echo $date->format('j M Y'); ?></td>
                            <td><?php the_field('selection');?></td>
                            <td><?php the_field('côte');?></td>
                            <td>
                            <?php $resultat = get_field('resultat');?>
                                <?php
                                if($resultat == "Gagné"){
                                    ?>
                                   <img class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/win.png" alt="">
                                    <?php
                                }
                                elseif($resultat == "Perdu"){
                                    ?>
                                   <img class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/lose.png" alt="">
                                    <?php
                                }
                                elseif($resultat == "Rembourser"){
                                    ?>
                                   <img class="img-result"src="https://www.teambet.fr/wp-content/uploads/2018/05/cancel.png" alt="">
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

  <!-- Début subscription -->
    <section id="subscription">
        <div class="container">

            <div class="row">
                <div class="col-md-6 center">

                    <div class="bloc center">

                        <h4>N'attendez plus pour gagner...</h4>
                        <p>Devenez membre pour seulement: </p>
                        <span class="price">20€/mois</span>
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
    <!-- // Fin subscription -->

</main><!-- #main -->
</section><!-- #primary -->

<?php get_footer(); ?>
