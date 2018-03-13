<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Era
 */

?><?php
	/**
	 * Hook - blog_era_action_doctype.
	 *
	 * @hooked blog_era_doctype -  10
	 */
	do_action( 'blog_era_action_doctype' );

?>
<head>
	<?php
	/**
	 * Hook - blog_era_action_head.
	 *
	 * @hooked blog_era_head -  10
	 */
	do_action( 'blog_era_action_head' );
	?>


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	/**
	 * Hook - blog_era_action_before.
	 *
	 * @hooked blog_era_page_start -  10
	 */
	do_action( 'blog_era_action_before' );
	?>
	<?php
	/**
	 * Hook - blog_era_action_before_header.
	 *
	 * @hooked blog_era_header_start -  10
	 */
	do_action( 'blog_era_action_before_header' );
	?>	
	<?php
	/**
	 * Hook - blog_era_action_header.
	 *
	 * @hooked blog_era_header -  10
	 */
	do_action( 'blog_era_action_header' );
	?>	
	<?php
	/**
	 * Hook - blog_era_action_after_header.
	 *
	 * @hooked blog_era_header_end -  10
	 */
	do_action( 'blog_era_action_after_header' );
	?>	
	<?php
	/**
	 * Hook - blog_era_action_before_content.
	 *
	 * @hooked blog_era_content_start -  10
	 */
	do_action( 'blog_era_action_before_content' );
	?>
