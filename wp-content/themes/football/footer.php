<footer class=" text-white pt-5 m-t-3 main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php
                $logo = get_theme_mod( 'FootballMania_light_logo' );
                //$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                ?>
                <img src="<?php echo $logo; ?>" alt="Football Mania" height="50">
                <?php if( is_active_sidebar( 'footer1' ) ) : ?>
                    <div class="text">
                        <?php dynamic_sidebar( 'footer1' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-4">

                <?php if( is_active_sidebar( 'footer2' ) ) : ?>
                    <div class="text">
                        <?php dynamic_sidebar( 'footer2' ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-4">

                <?php if( is_active_sidebar( 'footer3' ) ) : ?>
                    <div class="text">
                        <?php dynamic_sidebar( 'footer3' ); ?>
                    </div>
                <?php endif; ?>
            </div>


        </div>

    </div>
    <hr>
    <div class="bg-dark">
        <div class="container">
            <nav class="nav">
                    <span class="navbar-text">
                        © 2021 Football Mania
                    </span>
                <a class="nav-link text-muted" href="<?=site_url('page/terms-of-service'); ?>">Terms &amp;
                    Conditions
                </a>
                <a class="nav-link text-muted" href="<?=site_url('page/privacy-policy'); ?>">Privacy</a>
                <a class="nav-link text-muted" href="<?=site_url('page/contact-us'); ?>">Contact Us</a>
            </nav>
        </div>
    </div>
</footer>


<?php

wp_footer();
?>
</body>
</html>