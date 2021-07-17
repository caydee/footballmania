<footer class=" text-white pt-5 m-t-3 main-footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-3 col-12">
                <?php
                $logo = get_theme_mod( 'FootballMania_light_logo' );
                //$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                ?>
                <img src="<?php echo $logo; ?>" alt="Football Mania" height="50">
                <?php if( is_active_sidebar( 'footer1' ) ) : ?>
                   <?php dynamic_sidebar( 'footer1' ); ?>
                <?php endif; ?>
            </div>

            <?php if( is_active_sidebar( 'footer2' ) ) : ?>
                <?php dynamic_sidebar( 'footer2' ); ?>
            <?php endif; ?>

            <?php if( is_active_sidebar( 'footer3' ) ) : ?>
                <?php dynamic_sidebar( 'footer3' ); ?>
            <?php endif; ?>
            <?php if( is_active_sidebar( 'footer4' ) ) : ?>
               <?php dynamic_sidebar( 'footer4' ); ?>
            <?php endif; ?>


        </div>

    </div>
    <hr>
    <div class="bg-dark">
        <div class="container">
            <nav class="nav">
                    <span class="navbar-text">
                        © 2021 Football Mania
                    </span>
                <a class="nav-link text-muted" href="<?=site_url('terms-of-service'); ?>">Terms &amp;
                    Conditions
                </a>
                <a class="nav-link text-muted" href="<?=site_url('privacy-policy'); ?>">Privacy</a>
                <a class="nav-link text-muted" href="<?=site_url('contact-us'); ?>">Contact Us</a>
            </nav>
        </div>
    </div>
</footer>


<?php

wp_footer();
?>
</body>
</html>