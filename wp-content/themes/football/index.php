<?php

/*
 *  Template Name: Index
 *
 *  @Package Football Mania
 *
 */
get_header();
?>
<!-- Start Page Title Area -->
<div class="page-title-area item-bg-6">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Privacy Policy</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Inner Privacy Policy Area -->
<section class="privacy-policy pt-100 pb-160">
    <div class="container">
        <div class="single-privacy">
            <h3 class="mt-0"><?=get_the_title(); ?></h3>
            <?=get_the_content(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>
