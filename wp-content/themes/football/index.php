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
<div class="container-fluid my-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb w-100">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=get_the_title(); ?></li>
        </ol>
    </nav>

</div>
<!-- End Page Title Area -->

<!-- Start Inner Privacy Policy Area -->
<section class="privacy-policy pt-100 pb-160">
    <div class="container">
        <div class="single-privacy">

            <?=get_the_content(); ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>
