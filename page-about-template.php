<?php
/**
 * Template Name: About Us
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Glass_Cannon
 */

get_header(); ?>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			
<h2 id="cast-title" class="wow slideInLeft" data-wow-offset="50">The Cast of Characters</h2>

			<?php 
								
				// check for rows (parent repeater)
				if( have_rows('cast_member_info') ): ?>
					<div id="cast_member_info" class="grid">
					<?php 
					// loop through rows (parent repeater)
					while( have_rows('cast_member_info') ): the_row(); ?>
						<div class="grid-item single_cast_member wow fadeInUp" data-wow-offset="50">
							<div class="cast_member_pic_wrap">

								<?php 
								$image = get_sub_field('cast_member_profile_image');
								$size = 'about-img';
								if( $image ) {
									echo wp_get_attachment_image( $image, $size );
								}
								?>
								
								<?php if(get_sub_field('cast_member_title')):?>
								<h4><span><?php the_sub_field('cast_member_title'); ?></span></h4>
								<?php endif;?>
								<?php if(get_sub_field('cast_member_dice')):?>
								<div class="cast_member_dice_wrap"><img class="cast_member_dice" src="<?php the_sub_field('cast_member_dice'); ?>" /></div>
								<?php endif;?>
							</div>
							
							<div class="single_cast_member_text_wrap">
								<h3><?php the_sub_field('cast_member_name'); ?></h3>
								<?php 
								// check for rows (sub repeater)
								if( have_rows('cast_member_podcasts') ): ?>
								
								<div class="cast_member_podcasts_wrap">
									<p class="single_cast_member_podcasts_title">Podcasts:</p>
										<ul class="cast_member_podcasts">
										<?php 
										// loop through rows (sub repeater)
										while( have_rows('cast_member_podcasts') ): the_row();
		
											// display each item as a list - with a class of completed ( if completed )
											?>
											<li><a href="<?php the_sub_field('cast_member_podcast_link'); ?>"><?php the_sub_field('cast_member_podcast_name'); ?></a></li>
										<?php endwhile; ?>
										</ul>
								</div>
								<?php endif; //if( get_sub_field('items') ): ?>
																
								<p class="cast_member_bio"><?php the_sub_field('cast_member_bio'); ?></p>
								
									<?php if(get_sub_field('cast_member_website')):?>
									<a class="cast_member_website" href="<?php the_sub_field('cast_member_website') ;?>" target="_blank">Website</a>
									<?php endif;?>
									
									<nav class="member-social">
										<?php if(get_sub_field('cast_member_twitter_link')):?>
										<a href="<?php the_sub_field('cast_member_twitter_link') ;?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_twitter_link_2')):?>
										<a href="<?php the_sub_field('cast_member_twitter_link_2') ;?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_facebook_link')):?>
										<a href="<?php the_sub_field('cast_member_facebook_link') ;?>" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_tumblr_link')):?>
										<a href="<?php the_sub_field('cast_member_tumblr_link') ;?>" target="_blank"><i class="fab fa-tumblr" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_youtube_link')):?>
										<a href="<?php the_sub_field('cast_member_youtube_link') ;?>" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_vimeo_link')):?>
										<a href="<?php the_sub_field('cast_member_vimeo_link') ;?>" target="_blank"><i class="fab fa-vimeo" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_twitch_link')):?>
										<a href="<?php the_sub_field('cast_member_twitch_link') ;?>" target="_blank"><i class="fab fa-twitch" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_email')):?>
										<a href="mailto:<?php the_sub_field('cast_member_email') ;?>" target="_blank"><i class="fas fa-envelope" aria-hidden="true"></i></a>
										<?php endif;?>	
										
										<?php if(get_sub_field('cast_member_reddit_link')):?>
										<a href="<?php the_sub_field('cast_member_reddit_link') ;?>" target="_blank"><i class="fab fa-reddit-alien" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_instagram_link')):?>
										<a href="<?php the_sub_field('cast_member_instagram_link') ;?>" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
										<?php endif;?>	
									</nav>
							</div>
						</div>	

					<?php endwhile; ?>
					</div>
				<?php endif; ?>







			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
