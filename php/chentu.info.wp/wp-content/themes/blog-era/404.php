<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blog_Era
 */

get_header();?>
	<?php
$layout_class = 'blog-col-8';
$sidebar_layout = blog_era_get_option('layout_options');
if (is_active_sidebar('sidebar-1') && 'no-sidebar' !== $sidebar_layout) {
    $layout_class = 'blog-col-8';
} else {
    $layout_class = 'blog-col-12';
}
?>
	<div id="primary" class="content-area <?php echo esc_attr($layout_class); ?>">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'blog-era');?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e('It looks like nothing was found at this location.', 'blog-era');?></p>

					<?php
get_search_form();

?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
