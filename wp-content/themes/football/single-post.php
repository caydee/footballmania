<?php

/*
 *  Template Name: Article
 *
 *  @Package Football Mania
 *
 */
get_header();

if(have_posts() & is_singular())
    {
    while(have_posts()):the_post();
    $id =  $post->ID;
    echo '<main class="container mt-3">
<div class="row">

			<div class="col-12 col-md-8">
				<article id="content" >
					<h1 class="nunito fw-900">
						'.get_the_title( $post->ID ).'
					</h1>
					
					<div class="d-flex justify-content-between">
						<small class="text-muted">By
						 '.get_the_author().' 
						<a href="" class="text-muted">
						</a> | '.time_ago(get_the_date()).'</small>
						<div class="share">
							Share
	                        <a href="" class="mx-2 text text-facebook social">
	                            <span class="fab fa-facebook fa-2x"></span>
	                        </a>
	                        <a href="" class="mx-2 text text-twitter social">
	                            <span class="fab fa-twitter fa-2x"></span>
	                        </a>
	                        <a href="" class="mx-2 text text-linkedin social">
	                            <span class="fab fa-linkedin fa-2x"></span>
	                        </a>
	                        <a href="" class="mx-2 text text-whatsapp social">
	                            <span class="fab fa-whatsapp fa-2x"></span>
	                        </a>
	                        <a href="" class="mx-2 text text-mail social">
	                            <span class="fas fa-envelope fa-2x"></span>
	                        </a>
	                        <a href="" class="mx-2 text text-telegram social">
	                            <span class="fab fa-telegram fa-2x"></span>
	                        </a>
						</div>
					</div>
					<figure class="position-relative">
						' . get_the_post_thumbnail($post,array(500,800), ['class'=>'w-100 img-fluid'] ) .'
						<figcaption class="d-flex justify-content-center font-12 position-absolute w-100 bottom-0">
							'.wp_get_attachment_caption(get_post_thumbnail_id()).'
						</figcaption>
					</figure>
					
						';
    $in_summary = get_post_meta( $post->ID, 'in_summary', true );
    if($in_summary)
        {

        echo'<div class="summary float-left border-right mr-3 mb-3">
		                    <strong class="text-danger text-center">
									Summary
							</strong>
		                    <div class="text-dark">
		                        <ul class="font-italic font-12 px-2">';

        $in_summary = str_replace("<p>", "<li>", $in_summary);
        $in_summary = str_replace("</p>", "</li>", $in_summary);
        echo $in_summary.'
		                           
		                        </ul>
		                    </div>
	                    </div>';

        }




    echo get_the_content();

    if(get_the_tag_list()) {
    echo get_the_tag_list('<ul class="related-topics list-unstyled d-flex justify-content-start flex-wrap"><li class="mr-2 mt-2">','</li><li class="mr-2 mt-2">','</li></ul>');
    }
    echo '
					<div class="d-flex justify-content-start">
						Share
                        <a href="" class="mx-2 text text-facebook social">
                            <span class="fab fa-facebook fa-2x"></span>
                        </a>
                        <a href="" class="mx-2 text text-twitter social">
                            <span class="fab fa-twitter fa-2x"></span>
                        </a>
                        <a href="" class="mx-2 text text-linkedin social">
                            <span class="fab fa-linkedin fa-2x"></span>
                        </a>
                        <a href="" class="mx-2 text text-whatsapp social">
                            <span class="fab fa-whatsapp fa-2x"></span>
                        </a>
                        <a href="" class="mx-2 text text-mail social">
                            <span class="fas fa-envelope fa-2x"></span>
                        </a>
                        <a href="" class="mx-2 text text-telegram social">
                            <span class="fab fa-telegram fa-2x"></span>
                        </a>
					</div>
					
					
				</article>
				
			';
    if ( comments_open() || get_comments_number() ) :
        comment_form();
    comment_reply_link();
    endif;
    endwhile;
    wp_reset_postdata();
    }

?>
<div class="row my-3">
    <div class="col-12">
        <div class="d-md-flex">
            <?php
            $previous_post = get_previous_post();
            if (!empty( $previous_post )):
                ?>
                    <a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>" class="text-dark pr-md-5 w-50">
                        <div class="media d-flex justify-content-start">
                            <span class="fas fa-angle-left mr-3 fa-3x align-self-center"></span>
                            <div class="media-body">
                                <small class="text-muted">Previous Article</small><br>
                                <h5 class="mt-2 font-15"><?php echo esc_attr( $previous_post->post_title ); ?></h5>
                            </div>
                        </div>
                    </a>
                <?php
            endif;
            $next_post = get_next_post();
            if (!empty( $next_post )):
                ?>
                    <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="text-dark text-right pl-md-5 w-50">
                        <div class="media d-flex justify-content-end">
                            <div class="media-body">
                                <small class="text-muted">Next Article</small>
                                <h5 class="mt-2 font-15"><?php echo esc_attr( $next_post->post_title ); ?></h5>
                            </div>
                            <span class="fas fa-angle-right ml-3 fa-3x align-self-center"></span>
                        </div>
                    </a>
                <?php
            endif;
            ?>


        </div>
    </div>

</div>
<?php
$data = related_posts($id);
if($data):
?>
<div class="card-header bg-dark text-light mb-3 border-0">
                    <strong>Related Posts</strong>
</div>
                    <div class="card-deck">
                        <?php


                        if($data->have_posts())
                        {
                        while ( $data->have_posts() ) : $data->the_post();
                        echo'
                        <div class="card box-shadow mb-3">
                            <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'">
                                ' . get_the_post_thumbnail($post->ID,'popular', ['class'=>'w-100 img-fluid'] ) .'
                            </a>    
                            <div class="card-body">
                                <h6 class="card-title">
                                    <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'" class="text text-dark">	'
                            .get_the_title( $post->ID ).'</a>
                                </h6>
                                <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> Nov 12 2008</div>
                            </div>
                        </div>';
                        endwhile;
                        wp_reset_postdata();
                        }
                        ?>

                    </div>
                 </div>
<?php
endif;
?>
            <div class="col-md-4 ">
    <div class="card-header bg-dark text-light mb-3 border-0">
        <strong>POPULAR HEADLINES</strong>
    </div>
<?php
$data = trending_posts(3);

if($data->have_posts())
    {
    while ( $data->have_posts() ) : $data->the_post();
    echo'
    <div class="card box-shadow mb-3">
        <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'">
        ' . get_the_post_thumbnail($post->ID,'popular', ['class'=>'w-100 img-fluid'] ) .'
        </a>    
        <div class="card-body">
            <h5>
                <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'" class="text text-dark">	'.get_the_title(
                        $post->ID ).'</a>  
            </h5>
            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> Nov 12 2008</div>
        </div>
    </div>
    ';
    endwhile;
    wp_reset_postdata();
    }
?>

    <div class="card box-shadow mb-3 ">
        <div class="card-header">
            <strong>LATEST POSTS</strong>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <a class="text-dark card-link h6" href="#">KPL preview: Ssimbwa, Pamzo meet for the first time since Narok bust up as Gor host Bandari</a>
                <span class="mb-1 text-muted small d-block">
                    <strong class=" mb-2 text-primary">Football</strong> Nov 12 2008
                </span>
            </li>

        </ul>
    </div>
    <div class="matangazo text-center mb-3">
        <img src="https://placehold.it/300x250" alt="">
    </div>

</div>
        </div>
    </main>


<?php
get_footer();
?>
