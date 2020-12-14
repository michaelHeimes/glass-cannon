<?php
/**
 * Template Name: Friends
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
<!-- 				<h2 id="cast-title" class="wow slideInLeft" data-wow-offset="50">Friends of The Glass Cannon</h2> -->
		
			<?php 
								
				// check for rows (parent repeater)
				if( have_rows('friend_of_gcp_card') ): ?>
					<div id="friend_of_gcp_card-wrap">
					<?php 
					// loop through rows (parent repeater)
					while( have_rows('friend_of_gcp_card') ): the_row(); ?>
						<div class="single_friend_of_gcp_card wow slideInUp" data-wow-offset="50">
							<div class="cast_member_pic_wrap">
								<img class="friends_photo_logo" src="<?php the_sub_field('friends_photo_logo'); ?>" />
							</div>
							
							<div class="single_cast_member_text_wrap">
								<h3><?php the_sub_field('friends_name'); ?></h3>
																								
								<p class="friends_roll"><?php the_sub_field('friends_roll'); ?></p>
								
									<?php if(get_sub_field('cast_member_website')):?>
									<a class="cast_member_website" href="<?php the_sub_field('cast_member_website') ;?>" target="_blank">Website</a>
									<?php endif;?>
									
									<nav class="member-social">
										<?php if(get_sub_field('cast_member_twitter_link')):?>
										<a href="<?php the_sub_field('cast_member_twitter_link') ;?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_twitter_link_2')):?>
										<a href="<?php the_sub_field('cast_member_twitter_link') ;?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
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
										<a class="fa fa-twitch" aria-hidden="true" href="<?php the_sub_field('cast_member_twitch_link') ;?>" target="_blank"></a>
										<?php endif;?>
										
										<?php if(get_sub_field('ast_member_email')):?>
										<a href="<?php the_sub_field('cast_member_email') ;?>" target="_blank"><i class="fab fa-envelope" aria-hidden="true"></i></a>
										<?php endif;?>	
										
										<?php if(get_sub_field('cast_member_reddit_link')):?>
										<a href="<?php the_sub_field('cast_member_reddit_link') ;?>" target="_blank"><i class="fab fa-reddit-alien" aria-hidden="true"></i></a>
										<?php endif;?>
										
										<?php if(get_sub_field('cast_member_instragram_link')):?>
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
