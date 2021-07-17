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

    echo '<main class="container">
<div class="row">

			<div class="col-12 col-md-8">
				<article id="content" class="montserrat">
					<h1 class="nunito fw-900">
						'.get_the_title( $post->ID ).'
					</h1>
					
					<div class="d-flex justify-content-between">
						<small class="text-pdgreen">By
						 '.get_the_author().' 
						<a href="" class="text-pdgreen">
						</a> | June 11<sup>th</sup> 2019</small>
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
					<div class="promoted-posts clearfix">
						<strong>From the web</strong>
					</div>
					<div class="fb-comments" data-href="'.get_the_permalink().'" data-width="100%" data-numposts="30"></div>
				</article>
				
			</div>';
    endwhile;
    wp_reset_postdata();
    }
?>

                    <h6>MORE STORIES</h6>
                    <div class="card-deck">
                        <div class="card box-shadow mb-3">
                            <img class="card-img-top d-none d-lg-inline-flex" src="https://cdn.standardmedia.co.ke/images/monday/thumb_kenya_sevens_finishe5a9d200d003c0.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">Lionel Messi’s brother arrested in gun-drama</h6>
                                <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> Nov 12 2008</div>
                            </div>
                        </div>
                        <div class="card box-shadow mb-3">
                            <img class="card-img-top d-none d-lg-inline-flex" src="https://cdn.standardmedia.co.ke/images/monday/thumb_manchester_united_sq5a9cdb4360671.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">KPL preview: Ssimbwa, Pamzo meet for the first time since Narok bust up as Gor host Bandari</h6>
                                <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> Nov 12 2008</div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <img class="card-img-top d-none d-lg-inline-flex" src="https://cdn.standardmedia.co.ke/images/monday/thumb_im_a_warrior5a9cfa70a9df8.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h6 class="card-title">Players attacked by fans after Dutch league match</h6>
                                <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> Nov 12 2008</div>
                            </div>
                        </div>
                    </div>
                 </div>
            <div class="col-md-4 ">
    <div class="card-header bg-dark text-light mb-3 border-0">
        <strong>POPULAR HEADLINES</strong>
    </div>
    <div class="card box-shadow mb-3">
        <a href=""><img class="card-img-top" src="https://cdn.standardmedia.co.ke/images/monday/thumb_fa_reveals_why_pep_g5a9cf1b4392ef.jpg" alt="Card image cap"></a>
        <div class="card-body">
            <h5>
                <a class="text-dark card-link" href="#">Lionel Messi’s brother arrested in gun-drama</a>
            </h5>
            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> Nov 12 2008</div>
        </div>
    </div>
    <div class="card box-shadow mb-3">
        <a href=""><img class="card-img-top" src="https://cdn.standardmedia.co.ke/images/sunday/thumb_rugby_sevens_vlez5a9c5dc27fdda.jpg" alt="Card image cap"></a>
        <div class="card-body">
            <h5>
                <a class="text-dark card-link" href="#">KPL preview: Ssimbwa, Pamzo meet for the first time since Narok bust up as Gor host Bandari</a>
            </h5>
            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> Nov 12 2008</div>
        </div>
    </div>
    <div class="card box-shadow mb-3">
        <a href=""><img class="card-img-top" src="https://cdn.standardmedia.co.ke/images/sunday/thumb_rugby_sevens_vlez5a9c5dc27fdda.jpg" alt="Card image cap"></a>
        <div class="card-body">
            <h5>
                <a class="text-dark card-link" href="#">KPL preview: Ssimbwa, Pamzo meet for the first time since Narok bust up as Gor host Bandari</a>
            </h5>
            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> Nov 12 2008</div>
        </div>
    </div>
    <div class="card box-shadow mb-3 ">
        <div class="card-header">
            <strong>MORE POPULAR HEADLINES</strong>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a class="text-dark card-link h6" href="#">KPL preview: Ssimbwa, Pamzo meet for the first time since Narok bust up as Gor host Bandari</a><span class="mb-1 text-muted small d-block"><strong class=" mb-2 text-primary">Football</strong> Nov 12 2008</span></li>
            <li class="list-group-item"><a class="text-dark card-link h6" href="#">Players attacked by fans after Dutch league match</a><span class="mb-1 text-muted small d-block"><strong class=" mb-2 text-primary">Football</strong> Nov 12 2008</span></li>
            <li class="list-group-item"><a class="text-dark card-link h6" href="#">Players attacked by fans after Dutch league match</a><span class="mb-1 text-muted small d-block"><strong class=" mb-2 text-primary">Football</strong> Nov 12 2008</span></li>
            <li class="list-group-item"><a class="text-dark card-link h6" href="#">Players attacked by fans after Dutch league match</a><span class="mb-1 text-muted small d-block"><strong class=" mb-2 text-primary">Football</strong> Nov 12 2008</span></li>
            <li class="list-group-item"><a class="text-dark card-link h6" href="#">Players attacked by fans after Dutch league match</a><span class="mb-1 text-muted small d-block"><strong class=" mb-2 text-primary">Football</strong> Nov 12 2008</span></li>
            <li class="list-group-item"><a class="text-dark card-link h6" href="#">Players attacked by fans after Dutch league match</a><span class="mb-1 text-muted small d-block"><strong class=" mb-2 text-primary">Football</strong> Nov 12 2008</span></li>
            <li class="list-group-item"><a class="text-dark card-link h6" href="#">Players attacked by fans after Dutch league match</a><span class="mb-1 text-muted small d-block"><strong class=" mb-2 text-primary">Football</strong> Nov 12 2008</span></li>
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
