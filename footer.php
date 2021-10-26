<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hero Theme
 */

?>
        <footer>
            <section class="footer-widgets">
                <div class="container">
                    <div class="row">Widget do rodapé</div>
                </div>            
            </section>
            <section class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="copyright-text col-12 col-md-6">copyright</div>
                        <div class="footer-menu col-12 col-md-6 text-left text-md-right">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'hero_theme_footer_menu'
                                    )
                                );
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
    </div>
<?php wp_footer(); ?>
</body>
</html>