<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <div class="bet">
        <div class="header">
            <a href="http://www.teambet.fr/pronostics" class="btn btn-success">RETOUR</a>
        </div>

        <div class="body">
            <?php understrap_posted_on(); ?>
            <div class="header">
                <span>Type de pari: <?php the_field('choix_de_pari'); ?></span>
            </div>

            <div class="tab">
                <div class="statut">
                    <?php $resultat = get_field('statut'); ?>
                    <?php
                    if ($resultat == "En attente") {
                        ?>
                        <span>Statut:</span>
                        <img class="img-result" src="http://www.teambet.fr/wp-content/uploads/2018/05/time.png" alt="">
                        </span>
                        <?php
                    } elseif ($resultat == "Gagné") {
                        ?>
                        <span>Statut:</span>
                        <img class="img-result" src="http://www.teambet.fr/wp-content/uploads/2018/05/win.png"
                             alt=""></span>
                        <?php
                    } elseif ($resultat == "Perdu") {
                        ?>
                        <span>Statut:</span>
                        <img class="img-result" src="http://www.teambet.fr/wp-content/uploads/2018/05/lose.png" alt="">

                        <?php
                    } elseif ($resultat == "Rembourser") {
                        ?>
                        <span>Statut:</span>
                        <img class="img-result" src="http://www.teambet.fr/wp-content/uploads/2018/05/cancel.png"
                             alt="">

                        <?php
                    }
                    ?>
                </div>


                <div class="match">
                    <img class="img-sport" src="assets/img/football.png" alt="">

                    <span><?php the_field('competition'); ?></span>
                    <span><b><?php the_field('adversaire_1'); ?> VS <?php the_field('adversaire_2'); ?></b></span>

                    <span class="date_match"><?php the_field('date_du_match'); ?>
                        à <?php the_field('heure_du_match'); ?></span>

                    <div class="select">
                        <span>Pronostic:</span>
                        <span>
                                            <b><?php the_field('pronostic'); ?></b>
                                        </span>
                    </div>
                </div>

                <div class="confiance">
                    <span>Confiance</span>
                    <span>
                                        <b><?php the_field('confiance'); ?>%</b>
                                    </span>
                </div>
                <div class="cote">
                    <span>Côte</span>
                    <span>
                                        <b><?php the_field('côte'); ?></b>
                                    </span>
                </div>
            </div>
            <!-- // tab-->
            <?php
            $analyse = get_field('analyse');
            if (!empty($analyse)) {
                ?>
                <div class="analyse">
								<span>
									<b>Mon analyse:</b>
								</span>
                    <p><?php the_field('analyse'); ?></p>
                </div>
                <?php
            }
            ?>

        </div>

</article><!-- #post-## -->
