<?php
/*
 *  Template Name: Homepage
 *
 *  @Package Football Mania
 *
 */
get_header();
?>
<main role="main" class=" pt-3 px-2">
    <div class="row m-0">
        <div class="col-md-6">
            <div class="card-header bg-dark text-light mb-3 border-0">
                <strong>TOP NEWS</strong>
            </div>
            <?php
				$data = home_top(6);
				$x    = 1;
				if($data->have_posts())
					{
						while ( $data->have_posts() ) : $data->the_post();
						if($x == 1)
						    {

						        echo '<div class="card flex-xl-row align-items-center mb-3 box-shadow">
                                        <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID).'" class="w-100">
                                            ' . get_the_post_thumbnail($post->ID,'large', ['class'=>'w-100 img-fluid']
                                    ) .'
                                        </a>
                        
                                        <div class="card-body">
                                            <h1 class="h2">
                                                <a class="text-dark card-link" href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'">	'.get_the_title( $post ).'</a>
                                            </h1>
                                            <p class="card-text mb-auto">'.substr(get_the_excerpt($post->ID),0,200).'...</p>
                                            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> '.time_ago(get_the_date()).'</div>
                                        </div>
                        
                                    </div>
                                    <div class="card-deck">';
						    }
						else if(($x >1) && ($x<5))
						    {
						        echo '<div class="card box-shadow mb-3">
                                        <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'">' .
                                    get_the_post_thumbnail($post->ID,'second', ['class'=>'w-100 img-fluid'] ) .'</a>    
                                        
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID )
                                    .'" class="text text-dark">
                                                	'.get_the_title( $post->ID ).'
                                                </a>
                                            </h6>
                                            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> '.time_ago(get_the_date()).'</div>
                                        </div>
                                    </div>';
						    }
						else
						    {
						        echo '<div class="card box-shadow mb-3">
                                        <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'">
                                            ' . get_the_post_thumbnail($post->ID,'popular', ['class'=>'w-100 img-fluid'] ) .'
                                        </a>                                        
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID )
                                    .'" class="text text-dark">	'.get_the_title( $post->ID ).'</a>
                                            </h6>
                                            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> '.time_ago(get_the_date()).'</div>
                                        </div>
                                    </div>';
						    }
                        if($x == 4)
                            {
                            echo '</div>
                                <div class="card-deck">';
                            }
                            $x++;
							endwhile;
						wp_reset_postdata();
					}
					?>






            </div>
            <div class="card-header bg-dark text-light mb-3 border-0">
                <strong>LATEST NEWS</strong>
            </div>
        <?php
        $data = get_home_latest(12);
        $x    = 1;
        if($data->have_posts())
            {
            while ( $data->have_posts() ) : $data->the_post();
            if($x == 1)
                {

                echo '<div class="card flex-xl-row mb-3 box-shadow">
                                        <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID).'" class="w-100">
                                            ' . get_the_post_thumbnail($post->ID,'first', ['class'=>'w-100 img-fluid'] ) .'
                                        </a>
                        
                                        <div class="card-body">
                                            <h1 class="h2">
                                                <a class="text-dark card-link" href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'">	'.get_the_title( $post ).'</a>
                                            </h1>
                                            <p class="card-text mb-auto">'.get_the_excerpt($post->ID).'</p>
                                            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> '.time_ago(get_the_date()).'</div>
                                        </div>
                        
                                    </div>
                                    <div class="card-deck">';
                }
            else if(($x >1) && ($x<5))
                {
                echo '<div class="card box-shadow mb-3">
                                        <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'">' .
                    get_the_post_thumbnail($post->ID,'second', ['class'=>'w-100 img-fluid'] ) .'</a>    
                                        
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID )
                    .'" class="text text-dark">
                                                	'.get_the_title( $post->ID ).'
                                                </a>
                                            </h6>
                                            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong>'.time_ago(get_the_date()).'</div>
                                        </div>
                                    </div>';
                }
            else
                {
                echo '<div class="card box-shadow mb-3">
                                        <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID ).'">
                                            ' . get_the_post_thumbnail($post->ID,'popular', ['class'=>'w-100 img-fluid'] ) .'
                                        </a>                                        
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="'.get_the_permalink().'" title="'.get_the_title( $post->ID )
                    .'" class="text text-dark">	'.get_the_title( $post->ID ).'</a>
                                            </h6>
                                            <div class="mb-1 text-muted small"><strong class="text-primary">Football</strong> '.time_ago(get_the_date()).'</div>
                                        </div>
                                    </div>';
                }
            if($x == 4)
                {
                echo '</div>
                                <div class="card-deck">';
                }
            $x++;
            if($x == 7 )
                {
                    $x = 1;
                    echo '</div>';
                }
            endwhile;
            wp_reset_postdata();
            }
        ?>

            <nav aria-label="page navigation" class="mx-auto">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-md-3 ">
            <div class="card-header bg-dark text-light mb-3 border-0">
                <strong>POPULAR HEADLINES</strong>
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
        <div class="col-md-3">
            <?php
                get_template_part('template_part/sidebar-tables');
            ?>
        </div>
    </div>
</main>
</div>
<?php
get_footer();
?>
