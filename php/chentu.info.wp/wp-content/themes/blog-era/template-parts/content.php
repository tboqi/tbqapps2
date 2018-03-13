
<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Blog_Era
 */

?> 
<div class="blog-content-detail">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if( is_sticky() ){ ?>
	    	<div class="favourite"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
		<?php } ?>
		
		<?php if( has_post_thumbnail() ) : ?>

			<figure>

				<?php the_post_thumbnail();?>

			</figure>

		<?php endif;?>
		<div class="blog-content-caption">
			<header class="entry-header">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php blog_era_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				the_excerpt();
				?>
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog-era' ),
					'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->
				<?php $button_layout = blog_era_get_option( 'button_layout' );?>
				<a href="<?php the_permalink();?>" class="<?php echo esc_attr( $button_layout);?>"><?php echo esc_html_e( 'Read More', 'blog-era' );?></a>

				<footer class="entry-footer">
					<?php blog_era_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>
