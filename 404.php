<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Glass_Cannon
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Looks like you've "fallen" on a page that can't be found.</h1>
				</header><!-- .page-header -->

				<div class="page-content">


<!--
					<?php
						get_search_form();?>
-->
						
					<img src="<?php the_field('image', 'option');?>"/>
					
					<h1>Too soon?</h1>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	get_sidebar();
get_footer();
