<?php
/**
 * The template for displaying the Front Page
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

			endwhile; // End of the loop.
			?>
			
		<div id="home-podcasts" class="home-row">
			<div class="home-row-header home-row-header-left">
				<h2 class="home-row-title">Our Podcasts<span class="title-slash wow leanOver" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s"></span></h2>
			</div>
			<nav id="podcast-home-nav">
				<ul>
					
					
				<?php if( have_rows('podcasts') ):?>
						<?php while ( have_rows('podcasts') ) : the_row();?>
						
						<?php
	
						$post_object = get_sub_field('single_podcast');
						
						if( $post_object ): 
					
						// override $post
						$post = $post_object;
						setup_postdata( $post ); 
					
						?>
					    
						<li class="wow fadeIn" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s">
							<h3 class="home-pod-title"><?php the_title(); ?></h3>
							
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo get_the_post_thumbnail_url($gc_target_post_id, 'podcast_nav_bg' )?>"/>
								</a>
						</li>
					   				    
					    <?php wp_reset_postdata();?>
						<?php endif; ?>

					<?php endwhile;?>
				<?php endif;?>

				</ul>
			</nav>
		</div>

			
		<div id="home-podcasts" class="home-row">
			<div class="home-row-header home-row-header-left">
				<h2 class="home-row-title">Latest Episodes<span class="title-slash wow leanOver" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s"></span></h2>
			</div>
			<div id="home-podcasts-loop">
					<?php
				    // set up our archive arguments
				    $archive_args = array(
				      'post_type' => 'post',    // get only posts
				      'cat'=>('3'),
				      'posts_per_page'=> 3,   // this will display all posts on one page
				      'paged' => $paged,
				      
						'tax_query' => array(
					        'relation' => 'AND',
					        array(
					            'taxonomy' => 'category',
					            'field'    => 'term_id',
					            'terms'    => array( 560, 561 ),
					            'operator' => 'NOT IN',
					        ),
					    ),
				      
				    );
				
				    // new instance of WP_Quert
				    $archive_query = new WP_Query( $archive_args );
					    $archive_query = new WP_Query($archive_args);
					    if( $archive_query->have_posts() ) {
					    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
					    <?php
					$classes = array(
						'podcast-preview',
						'wow',
						'fadeIn',
					);
					?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s">
	
						<div class="home-podcast-preview-wrap">	
							
							<div class="podcast-preview-thumb-wrap-img-wrap">
								
								<?php if ( has_post_thumbnail()): ?>
								<?php the_post_thumbnail('podcast_preview');?>
								
								<?php else:?>
								
								<img src="/wp-content/uploads/2017/07/no-thumb.png">

								<?php endif;?>
								
							</div>
							
							<h3 class="podcast-preview-title"><?php echo get_the_title(); ?></h3>
							
							<div class="podcast-preview-content">
								
								<div class="podcast-preview-entry-meta">
								
									<p class="podcast-episode-number"><span>Episode <?php the_field('episode_number'); ?></span></p> • <p class="podcast-episode-date"><span><?php echo get_the_date('F j, Y'); ?></span></p>
								
								</div>
								
							</div>
							
							<a class="podcast-listen-button" href="<?php the_permalink()?>">Listen <i class="fa fa-play" aria-hidden="true"></i></a>	
							
						</div>

				</article>
		<?php
        endwhile;
	    } //if ($my_query)
		wp_reset_query();  // Restore global post data stomped by the_post().
		?>

			</div>
			<div class="more-link-wrap">
				<a class="all-link wow slideInRight" href="<?php get_site_url();?>/podcasts"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>All Episodes</span></a>
			</div>
		</div>
		
		
		
		<div id="home-blog" class="home-row">
			<div class="home-row-header home-row-header-left">
				<h2 class="home-row-title">Latest Blog Posts<span class="title-slash wow leanOver" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s"></span></h2>
			</div>
			<div id="home-podcasts-loop">
					<?php
				    // set up our archive arguments
				    $archive_args = array(
				      'post_type' => 'post',    // get only posts
				      'cat'=>('7'),
				      'posts_per_page'=> 3,   // this will display all posts on one page
				      'paged' => $paged,
				    );
				
				    // new instance of WP_Quert
				    $archive_query = new WP_Query( $archive_args );
					    $archive_query = new WP_Query($archive_args);
					    if( $archive_query->have_posts() ) {
					    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
					    <?php
					$classes = array(
						'podcast-preview',
						'wow',
						'fadeIn',
					);
					?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s">
	
						<div class="home-podcast-preview-wrap">	
							<div class="podcast-preview-thumb-wrap-img-wrap">
								<?php if ( has_post_thumbnail()): ?>
								<?php the_post_thumbnail('podcast_preview');?>
							</div>
							<h3 class="podcast-preview-title"><?php echo get_the_title(); ?></h3>
							<div class="podcast-preview-content">
								<div class="podcast-preview-entry-meta">
								<p class="podcast-episode-number"><span>By <?php the_author(); ?></span></p> • <p class="podcast-episode-date"><span><?php echo get_the_date('F j, Y'); ?></span></p>
								</div>
							</div>
							<a class="podcast-listen-button" href="<?php the_permalink()?>">Read</a>			

						<?php else :?>
							<div class="podcast-preview-thumb-wrap-img-wrap">
								<img src="/wp-content/uploads/2017/07/no-thumb.png">
							</div>
							<div class="home-podcast-preview-text">	
							<h3 class="podcast-preview-title"><?php echo get_the_title(); ?></h3>
							<div class="podcast-preview-content">
								<div class="podcast-preview-entry-meta">
								<p class="podcast-episode-number"><span>By <?php the_author(); ?></span></p> • <p class="podcast-episode-date"><span><?php echo get_the_date('F j, Y'); ?></span></p>
								</div>
<!-- 								<?php the_content(); ?> -->
							</div>
							<a class="podcast-listen-button" href="<?php the_permalink()?>">Read</a>			
						</div>

				<?php endif; ?>
							</div>
				</article>
		<?php
        endwhile;
	    } //if ($my_query)
		wp_reset_query();  // Restore global post data stomped by the_post().
		?>

			</div>
			<div class="more-link-wrap">
				<a class="all-link wow slideInRight" href="<?php get_site_url();?>/blog"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>All Blog Posts</span></a>
			</div>
		</div>
		
		
		
		
		<div id="home-store" class="home-row">
			<div class="home-row-header home-row-header-left">
				<h2 class="home-row-title normal">Featured Store Items<span class="title-slash wow leanOver" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s"></span></h2>
				<h2 class="home-row-title too-wide">Featured<br>Store Items<span class="title-slash wow leanOver" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s"></span></h2>
			</div>
			<?php echo do_shortcode('[featured_products per_page="3" columns="3"]'); ?>
			<div class="more-link-wrap">
				<a class="all-link wow slideInRight" href="<?php get_site_url();?>/store"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>All Store Items</span></a>
			</div>
		</div>
		
		<div id="home-events-wrap" class="home-row">
			<div class="home-row-header home-row-header-left">
				<h2 class="home-row-title">GCP Events<span class="title-slash wow leanOver" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s"></span></h2>
				<p class="wow fadeIn" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s">GCP events are popping up all over the world! Head over to the <a href="<?php echo get_site_url();?>/events">EVENTS</a> page to find an event near you and/or to contact us about an a GCP Event you'd like to host.</p>
			</div>

			<div id="home-events-right-wrap">
			    <table id="home-events-table">
				    <caption>Upcoming Events</caption>
					<tbody>
				<?php
			    $custom_args = array(
			      'post_type' => 'post',
			      'cat'=>('26'),
			      'posts_per_page'=> 5,
			      	'meta_query'=> array(
				            array(
				              'key' => 'event_date',
				              'compare' => '>=',
				              'value' => date("Y-m-d", strtotime("0 day")),
				              'type' => 'DATE'	))
			    );
				$custom_query = new WP_Query( $custom_args ); ?>
				<?php if ( $custom_query->have_posts() );?>
				<?php if ( $custom_query->have_posts() ) : ?>
				<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); $date = new DateTime(get_field('event_date')); ?>
				<tr>
						<td><?php echo $date->format('F j, Y'); ?></td>
						<td><?php the_field('event_location'); ?></td>
				</tr>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				<?php else: ?>
				<td>Sorry, but there are no upcoming events right now.<br>Check back soon!</td>
				<?php endif; ?>
					</tbody>
				</table>
			</div>
						<div class="more-link-wrap">
				<a class="all-link wow slideInRight" href="<?php get_site_url();?>/events"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>All GCP Events</span></a>
			</div>
		</div>
		
		
		
		<div id="home-patreon" class="home-row">
			<div class="home-row-header home-row-header-left">
				<h2 class="home-row-title">Patreon<span class="title-slash wow leanOver" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s"></span></h2>
				<p class="wow fadeIn" data-wow-offset="70" data-wow-delay=".2s" data-wow-duration=".7s"><?php the_field('patreon_message'); ?></p>
			</div>
			<div class="more-link-wrap">
				<a class="all-link wow slideInRight" href="<?php get_site_url();?>/patreon"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span>Our Patreon</span></a>
			</div>
		</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
