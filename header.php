<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glass_Cannon
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php if(is_woocommerce()):?>
<script>
  FontAwesomeConfig = { searchPseudoElements: true };
</script>
<?php endif;?>
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>

<?php wp_head(); ?> <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/0dc0918b0de900d1d5c43e860/e6196875c6e0db543b939a268.js");</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'glass-cannon' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<div id="header-bg">
				<div id="header-logo"><a href="<?php echo get_site_url();?>"><img src="<?php the_field('header_logo', 'option'); ?>" /></a></div>
				<div id="nav-right-wrap">
					<ul id="main-nav-social">
	                  <li><a href="https://twitter.com/glasscannonpod" target="_blank" class="main-nav-social-link">
							<i class="fab fa-twitter" aria-hidden="true"></i>
	                  </a></li>
	                  <li><a href="http://www.facebook.com/glasscannonpodcast" target="_blank" class="main-nav-social-link">
							<i class="fab fa-facebook-f" aria-hidden="true"></i>
	                  </a></li>
	                  <li><a href="http://glasscannonpodcast.tumblr.com" target="_blank" class="main-nav-social-link">
							<i class="fab fa-tumblr" aria-hidden="true"></i>
	                  </a></li>
	                  <li><a href="https://www.youtube.com/channel/UC83CJFLyDe72XgkKBd5a9IA" target="_blank" class="main-nav-social-link">
							<i class="fab fa-youtube-square" aria-hidden="true"></i>
	                  </a></li>
	                  <li><a href="http://www.twitch.tv/theglasscannon" target="_blank" class="main-nav-social-link">
							<i class="fab fa-twitch" aria-hidden="true"></i>
	                  </a></li>
	                  <li><a href="https://itunes.apple.com/us/podcast/the-glass-cannon-podcast/id1007021910?mt=2" target="_blank" class="main-nav-social-link">
							<i class="fab fa-apple" aria-hidden="true"></i>
	                  </a></li>
	                  <li><a href="mailto:glasscannonpodcast@gmail.com" target="_blank" class="main-nav-social-link">
							<i class="fas fa-envelope" aria-hidden="true"></i>
	                  </a></li>
	                  <li><a href="http://www.reddit.com/r/theglasscannonpodcast" target="_blank" class="main-nav-social-link">
							<i class="fab fa-reddit-alien" aria-hidden="true"></i>
	                  </a></li>
	                  <li><a href="http://instagram.com/theglasscannon" target="_blank" class="main-nav-social-link">
							<i class="fab fa-instagram" aria-hidden="true"></i>
	                  </a></li>
	              </ul>
	              <div id="login"><a href="<?php get_site_url(); ?>/forum">Login</a></div>
	              	<div id="search-button" class="mobile" type="button"><i class="fas fa-search" aria-hidden="true"></i></div>
	              	 <div id="search-button" class="desktop" type="button"><i class="fas fa-search" aria-hidden="true"></i></div>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						  <span></span>
						  <span></span>
						  <span></span>
						  <span></span>
					</button>
				</div>
			</div>
			
			<div id="nav-tables-wrap">
				<div id="nav-tables-wrap-inner">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
					?>
<!--
					<div id="recent-pods">
						<label>Latest Podcasts:</label>
					</div>
					<div id="recent-blogs">
						<label>Latest Blog Posts:</label>
					</div>
-->
				</div>

			</div>
			
			<div id="primary-menu-block"></div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<?php if(is_front_page()):?>
	<div id="home-hero" class="hero mobile">
		<img src="<?php the_field('home_hero_image_sm'); ?>" />
			<div id="home-quote-wrap" class="wow fadeInUp" data-wow-delay="1s">
			<?php	
				$args = array(
					'post_type' => 'quote',
					'showposts'=>1,
					'orderby' => 'rand',
					'order'    => 'ASC'
					);						
			    $my_query = new WP_Query($args);
			    if( $my_query->have_posts() ) {
			    while ($my_query->have_posts()) : $my_query->the_post(); 
			?>	
				<?php echo the_content(); ?>
				<?php endwhile;} wp_reset_query(); ?>						
			</div>
			<div id="home-hero-wedge-left"></div>
			<div id="home-hero-wedge-right"></div>
	</div>
	<div id="home-hero" class="hero desktop">
		<div id="home-quote-wrap" class="wow fadeInUp" data-wow-delay="1s">
		<?php	
			$args = array(
				'post_type' => 'quote',
				'showposts'=>1,
				'orderby' => 'rand',
				'order'    => 'ASC'
				);						
		    $my_query = new WP_Query($args);
		    if( $my_query->have_posts() ) {
		    while ($my_query->have_posts()) : $my_query->the_post(); 
		?>	
			<?php echo the_content(); ?>
			<?php endwhile;} wp_reset_query(); ?>						
		</div>

		<img src="<?php the_field('home_hero_image'); ?>" />
				<p id="header-tagline" class="wow zoomIn" data-wow-offset="200"></p>
		<div id="home-hero-wedge-left"></div>
		<div id="home-hero-wedge-right"></div>
	</div>		
	<?php endif; ?>
	
	<?php if(is_page_template('page-podcasts-template.php')):?>
	 <h1 class="big-title">Podcasts</h1>
		<nav id="podcast-home-nav">
			<ul>
				
				
			<?php if( have_rows('podcasts', '42') ):?>
				<?php while ( have_rows('podcasts', '42') ) : the_row();?>
				
				<?php

				$post_object = get_sub_field('single_podcast', '42');
				
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
			   				    
			    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

				<?php endwhile;?>
			<?php endif;?>

			</ul>
		</nav>
	<?php endif; ?>	
	
		<?php if(is_page_template('page-blog-template.php')):?>
	 		 <h1 class="big-title"><?php the_title();?></h1>
	 	<?php endif; ?>
	 	

	 	
		<?php if(is_archive() && !is_shop()):?>
				<?php
					the_archive_title( '<h1 class="big-title archive-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
	 	<?php endif; ?>
	


	<div id="content" class="site-content">
		
	<?php if(is_shop() && !is_archive() ):?>
	<div id="back-to-store-link-wrap">
		<a id="back-to-store-link" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ));?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i><span>Back To Store</span></a>
	</div>
	<?php endif;?>
			
	
	
	
	
