<?php get_header(); 
$ads_category = "";
?>

<section class="row">
    <div class="col-12 col-md-8">
		<div class="row">
			<?php k24_the_breadcrumb(); ?>
		</div>
		
		<div class="row">
			<div class="col-12 mb-3">
				<div class="media p-4 bg-d-white">
				  <div class=" mr-4">
						<?php echo get_avatar(get_the_author_meta('user_email'),200,NULL,NULL, array('class' => 'rounded-circle')); ?>
				  </div>			  
				  <div class="media-body">
					<h1 class="font-16 mt-0 text-capitalize"><?=get_the_author();?></h1>
					<?php if ( get_the_author_meta('description'))
							{
								echo wpautop( get_the_author_meta('description') );
							}	
					?>
					<div class="d-inline clearfix mb-2">
						<?php
						if(get_the_author_meta('email')) {
							?>
							<a class="text-link-mail text-link mx-2" target="_blank" href="mailto:<?=get_the_author_meta('email')?>">
								<i class="fas fa-envelope"></i>
							</a>
							<?php
						}
						
						if(get_the_author_meta('facebook')) {
							?>
							<a class="text-link-facebook text-link mx-2" target="_blank" href="https://www.facebook.com/<?=get_the_author_meta('facebook');?>">
								<i class="fab fa-facebook-f"></i>
							</a>
							<?php
						}
						
						if(get_the_author_meta('twitter')) {
							?>
							<a class="text-link-twitter text-link mx-2" target="_blank" href="https://twitter.com/<?=get_the_author_meta('twitter');?>">
								<i class="fab fa-twitter"></i>
							</a>
							<?php
						}
						
						if(get_the_author_meta('linkedin')) {
							?>
							<a class="text-link-linkedin text-link mx-2" target="_blank" href="<?=get_the_author_meta('linkedin');?>">
								<i class="fab fa-linkedin-in"></i>
							</a>
							<?php
						}
						
						if(get_the_author_meta('instagram')) {
							?>
							<a class="text-link-instagram text-link mx-2" target="_blank" href="<?=get_the_author_meta('instagram');?>">
								<i class="fab fa-instagram"></i>
							</a>
							<?php
						}
						
						if(get_the_author_meta('youtube')) {
							?>
							<a class="text-link-youtube text-link mx-2" target="_blank" href="<?=get_the_author_meta('youtube');?>">
							<i class="fab fa-youtube"></i>
						</a>
							<?php
						}
						?>			
					</div>
					<div class="mt-1">
						<span class="tag font-11">
							<?php echo count_user_posts(get_the_author_meta('ID'));?> Articles
						</span>						
					</div>	
				  </div>
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="d-flex justify-content-center my-3 py-2 ad w-100">
					<?=stripslashes(get_option("k24_".$ads_category."_leaderboard_2"));?>
				</div>
            </div>
		</div>
		<?php if (have_posts()): ?>
			
			<div class="row">
				<div id="load-more-content" class="col-md-12">
					<?php
					while (have_posts()) : the_post();
						?>
						<div class="media py-2 row">
							<a href="<?=get_the_permalink();?>" class="col-4 pr-1">
								<?php
								if ( has_post_thumbnail()) :
									the_post_thumbnail('small', array("class" => "w-100 img-fluid"));
								else : echo '<img class="w-100 img-fluid" src="'.get_template_directory_uri().'/assets/images/blank/normal.jpg" alt="" />';
								endif;
								?>
							</a>
							<div class="media-body col-8 pl-3">
								<h5 class="fw-400 fw-lg-600 font-15 font-md-18">
									<a href="<?=get_the_permalink();?>" title="<?=get_the_title();?>">
										<?=get_the_title();?>
									</a> 
								</h5>
								<p class="pb-0 mt-0 my-1">
									<small class="font-13">
										By <b><?=get_the_author_posts_link();?></b> | <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
									</small>
								</p>
								<p class="d-none d-md-block font-15"><?=k24_limit_characters(get_the_excerpt(), 150)."...";?></p>
							</div>
						</div>
					<?php
				endwhile;
				?>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="d-flex justify-content-center my-3 py-2 ad w-100">
						<?=stripslashes(get_option("k24_".$ads_category."_leaderboard_3"));?>
					</div>
				</div>
			</div>
			<div class="row" id="load-more">
				<div class="col-md-12">
					<a href="" id="category-load-more" class="btn btn-primary  load-more">Load More</a>
					<span class="load-more-animation"><i class="fas fa-spinner fa-spin fa-2x"></i>&nbsp;&nbsp;&nbsp;&nbsp;please wait....</span>
				</div>
			</div>
            
				
		<?php else : ?>
			<div class="row">
				No posts found
			</div>
		<?php endif;?>
        
		
    </div>
    <div class="col-12 col-md-4">
		<h3 class="cattitle font-18 px-0 mb-3 font-md-20">Follow us on</h3>
		<aside class="d-flex mb-4 social p-0">
			<?php k24_embed_social_media_icons(); ?>
		</aside>
        <div class="d-flex justify-content-center order-md-1 order-2 ad py-2 mb-4">
            <?=stripslashes(get_option("k24_".$ads_category."_rightpanel_1"));?>
        </div>
        <aside class="mt-2 order-md-2 order-1 mb-4">
            <?php k24_sidebar_template("", 5, 0);?>
        </aside>
		<div class="col-md-6 col-lg-12  order-md-2 order-lg-1 mb-4 p-0">
            <div class="d-flex justify-content-center mb-2 mt-3 ad py-md-2">
                <?=stripslashes(get_option("k24_".$ads_category."_rightpanel_2"));?>
            </div>
        </div>
        <div class="col-md-6 col-lg-12 order-md-1 order-lg-2 mb-4 p-0">
            <div class="opinion">
                <?php k24_sidebar_template("opinion", 5, 0);?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
