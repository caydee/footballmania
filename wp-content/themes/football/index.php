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
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
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
