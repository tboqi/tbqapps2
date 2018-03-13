<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Era
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php $sidebar_layout = blog_era_get_option('layout_options'); 

if ( 'no-sidebar' !== $sidebar_layout ) : ?>
	<aside id="secondary" class="widget-area blog-col-4">
	
		<div class="theiaStickySidebar">

			<?php dynamic_sidebar( 'sidebar-1' ); ?>

		</div>

	</aside><!-- #secondary -->

<?php endif; ?>
