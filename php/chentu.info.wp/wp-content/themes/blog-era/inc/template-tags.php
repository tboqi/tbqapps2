<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blog_Era
 */

if ( ! function_exists( 'blog_era_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
function blog_era_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
		);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( ' %s', 'post date', 'blog-era' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fa fa-calendar"></i>' . $time_string . '</a>'
		);

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( ' %s', 'post author', 'blog-era' ),
		'<span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

	$enable_posted_date = blog_era_get_option('enable_posted_date');
	$enable_author = blog_era_get_option('enable_author');

	if ( true == $enable_posted_date):

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	endif;

	if ( true == $enable_author):
		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	endif;

		

	}
	endif;

if ( ! function_exists( 'blog_era_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function blog_era_entry_footer() {
			// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

		$enable_categories = blog_era_get_option('enable_categories');
		$enable_tags = blog_era_get_option('enable_tags');

		if ( true == $enable_categories) :


			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ' ', 'blog-era' ) );
			if ( $categories_list ) {
					printf( '<span class="cat-links"><i class="fa fa-folder-open"></i>%1$s</span>', $categories_list ); // WPCS: XSS OK.
				}

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'blog-era' ) );
				if ( $tags_list ) {
					printf( '<span class="tags-links"><i class="fa fa-tag"></i>%1$s</span>', $tags_list ); // WPCS: XSS OK.
				}
			
			endif;

			if ( true == $enable_tags) :

				if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo '<span class="comments-link"><i class="fa fa-comments-o"></i>';
					comments_popup_link( esc_html__( 'Leave a comment', 'blog-era' ), esc_html__( '1 Comment', 'blog-era' ), esc_html__( '% Comments', 'blog-era' ) );
					echo '</span>';
				}

			endif;

		}

		edit_post_link( esc_html__( 'Edit', 'blog-era' ), '<span class="edit-link">', '</span>' );
	}
endif;
