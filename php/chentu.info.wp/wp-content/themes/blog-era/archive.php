<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
	<div id="primary" class="content-area <?php echo esc_attr( $layout_class );?>">
		<main id="main" class="site-main">

			<div class="theiaStickySidebar">

				<?php
				if ( have_posts() ) : ?>

					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					do_action( 'blog_era_action_posts_navigation' );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
