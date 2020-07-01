<?php get_header(); ?>
<div class="container-fluid">
    <div class="row">
        <main class="col-md-9">
            <div class="row">
                <?php if ( have_posts() ) :
                    while (have_posts()): the_post();?>
                        <!--  de meta data van de bricht -->
                    <div class="col-md-3 p-4 text-right small bg-light">
                       <strong>Dit bericht is geplaatst door:</strong>
                        <?php the_author(); ?><br>
                        <strong>  Op:</strong>
                        <?php the_time('j F Y') ?><br>
                        <strong>In:</strong>
                        <?php the_category(); ?>
                        <hr>
                        <?php $vorige_bericht = get_previous_post();
                        if ( !empty($vorige_bericht)): ?>Vorig bericht: <br>
                        <a href="<?php echo the_permalink($vorige_bericht->ID ) ?>">
                            &#9204; <?php echo apply_filters('de_titel', $vorige_bericht->post_title) ?>   </a>
                            <?php endif; ?>

                        <hr>
                        <?php $volgend_bericht = get_next_post();
                        if ( !empty($volgend_bericht)): ?>Volgend bericht: <br>
                            <a href="<?php echo the_permalink($volgend_bericht->ID ) ?>">
                                <?php echo apply_filters('de_titel', $volgend_bericht->post_title) ?>  &#11208; </a>
                        <?php endif; ?>

                    </div>
                        <!-- de inhoud van de post -->
                    <div class="col-md-9">
                                <h3><?php the_title();?></h3>
                                <div><?php the_content();?></div>
                            <hr>
                            <div class="bg-light p-4">
                                <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                                ?>
                            </div>

                        <?php endwhile; else:?>
                            <p>geen berichten gewonden</p>
                        <?php endif; ?>
                    </div>
            </div>
        </main>
        <aside class="col-md-3 bg-light p-4">
            <?php dynamic_sidebar( 'aside' ); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>

