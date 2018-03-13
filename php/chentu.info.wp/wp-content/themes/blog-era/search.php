<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blog_Era
 */

get_header(); ?>
<?php 
	$layout_class ='blog-col-8';
	$sidebar_layout = blog_era_get_option( 'layout_options' ); 
	if( is_active_sidebar('sidebar-1') && 'no-sidebar' !==  $sidebar_layout){
		$layout_class = 'blog-col-8';
	}
	else{
		$layout_class = 'blog-col-12';
	}		
?>

<section id="primary" class="content-area <?php echo esc_attr( $layout_class );?>">
	<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title"><?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'blog-era' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

				endwhile;

				the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
