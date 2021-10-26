<?php
/* 
Template Name: Home Page
*/
get_header();
?>
        <div class="content-area">
            <main>
                <section class="slider">
                    
                </section>
                <section class="popular-products">
                    <div class="container">
                        <div class="row">Produtos Populares</div>
                    </div>
                </section>
                <section class="new-arrivals">
                    <div class="container">
                        <div class="row">Lançamentos</div>
                    </div>
                </section>
                <section class="deal-of-the-week">
                    <div class="container">
                        <div class="row">Promoção da semana</div>
                    </div>
                </section>
                <section class="lab-blog">
                    <div class="container">
                        <div class="row">
                            <?php
                                if( have_posts() ):
                                    while( have_posts() ): the_post();
                                    ?>
                                        <artivle>
                                            <h2><?php the_title(); ?></h2>
                                            <div><?php the_content(); ?></div>
                                        </article>
                                    <?php
                                    endwhile;
                                else:
                                    ?>
                                    <p>Nothing to display.</p>
                                    <?php
                                endif;
                            ?>
                        </div>
                    </div>
                </section>
            </main>
        </div>
<?php get_footer(); ?>