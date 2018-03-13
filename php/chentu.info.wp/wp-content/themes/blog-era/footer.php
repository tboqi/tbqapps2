<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog_Era
 */

?>
	<?php
	/**
	 * Hook - blog_era_action_after_content.
	 *
	 * @hooked blog_era_content_end -  10
	 */
	do_action( 'blog_era_action_after_content' );
	?>

	<?php
	/**
	 * Hook - blog_era_action_before_footer.
	 *
	 * @hooked blog_era_footer_start -  10
	 */
	do_action( 'blog_era_action_before_footer' );
	?>
	<?php
	/**
	 * Hook - blog_era_action_footer.
	 *
	 * @hooked blog_era_footer -  10
	 */
	do_action( 'blog_era_action_footer' );
	?>
	<?php
	/**
	 * Hook - blog_era_action_after_content.
	 *
	 * @hooked blog_era_footer_end -  10
	 */
	do_action( 'blog_era_action_after_content' );
	?>
	<?php
	/**
	 * Hook - blog_era_action_after.
	 *
	 * @hooked blog_era_page_end -  10
	 */
	do_action( 'blog_era_action_after' );
	?>

<?php wp_footer(); ?>

</body>
</html>
