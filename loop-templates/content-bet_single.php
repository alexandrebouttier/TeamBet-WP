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
                        <span>Statut:</span>
                        <img class="img-result" src="<?php showIconStatut(); ?>" alt="">
                        </span>
                </div>


                <div class="match">
                

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
