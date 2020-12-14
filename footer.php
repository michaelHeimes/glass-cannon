<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glass_Cannon
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div id ="copyright"><span>&copy;<?php echo date("Y") ?> The Glass Cannon Network, LLC, All Rights Reserved.</span>Site built by <a href="https://cairndigitalmedia.com/">Cairn.</a></div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<div id="header-search-wrap"><div id="header-search-wrap-inner"><?php get_search_form(); ?><div id="search-close"><i class="fa fa-times" aria-hidden="true"></i></div></div>
</div>

</body>
</html>
