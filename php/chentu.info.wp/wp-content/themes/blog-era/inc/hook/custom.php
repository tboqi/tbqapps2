<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Blog_Era
 */
if ( ! function_exists( 'blog_era_top_header' ) ) :
	/**
	 * Top Header
	 * @since 1.0.0
	 */
function blog_era_top_header() {
	?>
	<?php $enable_top_header = blog_era_get_option( 'enable_top_header' ); 
	if ( true == $enable_top_header ) : ?>	
	<div class="top-menu">	
		<div class="blog-container">
			<div class="blog-row">
				<div class="blog-col-6">

					<?php $top_left_header = blog_era_get_option( 'top_left_header' ); 
					$header_address = blog_era_get_option('header_address');
					$header_number = blog_era_get_option('header_number');
					$header_email = blog_era_get_option('header_email');

					if ( 'top-menu' == $top_left_header) { ?>

					<?php if ( has_nav_menu( 'top-menu' ) ) : ?>

						<div class="top-menu-holder">
							<?php
							wp_nav_menu( array(
								'theme_location'  => 'top-menu',
								'container'       => false,								
								'depth'           => 1,
								'fallback_cb'     => 'wp_page_menu',
								) );
							?>
							</div>

						<?php endif;?>

						<?php } elseif ('social-icon' == $top_left_header) { ?>

						<?php if ( has_nav_menu( 'social-menu' ) ) : ?>

							<div class="social-menu-part social-left">
								<?php
								wp_nav_menu( array(
									'theme_location'  => 'social-menu',
									'container'       => false,								
									'depth'           => 1,
									'fallback_cb'     => 'wp_page_menu',
									) );
									?>
								</div>

							<?php endif;?>

							<?php } else { ?>

							<div class="top-address-part">
								<ul>
									<?php if(!empty($header_number)):?>
										<li>
											<a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $header_number ) ); ?>"><i class="fa fa-phone"></i><?php echo esc_attr($header_number);?></a>
										</li>
									<?php endif;?>

									<?php if(!empty($header_address)):?>
										<li><i class="fa fa-map-marker"></i><?php echo wp_kses_post( $header_address );?></li>
									<?php endif;?>

									<?php if(!empty($header_email)):?>
										<li>
											<a href="mailto:<?php echo esc_attr($header_email);?>"><i class="fa fa-envelope"></i><?php echo esc_attr( antispambot( $header_email ) ); ?></a>
										</li>
									<?php endif;?>
									
								</ul>
							</div>

							<?php } ?>

						</div>

						<div class="blog-col-6">

							<?php $top_right_header = blog_era_get_option( 'top_right_header' ); 

							if ( 'top-menu' == $top_right_header) { ?>

							<?php if ( has_nav_menu( 'top-menu' ) ) : ?>

								<div class="top-menu-holder">
									<?php
									wp_nav_menu( array(
										'theme_location'  => 'top-menu',
										'container'       => false,								
										'depth'           => 1,
										'fallback_cb'     => 'wp_page_menu',
										) );
										?>
									</div>

								<?php endif;?>

								<?php } elseif ('social-icon' == $top_right_header) { ?>

								<div class="social-menu-part">

									<?php if ( has_nav_menu( 'social-menu' ) ) : ?>

										<div class="social-menu-part">
											<?php
											wp_nav_menu( array(
												'theme_location'  => 'social-menu',
												'container'       => false,								
												'depth'           => 1,
												'fallback_cb'     => 'wp_page_menu',
												) );
												?>
											</div>

										<?php endif;?>

									</div>

									<?php } else { ?>

									<div class="top-address-part">
										<ul>
											<?php if(!empty($header_number)):?>
												<li>
													<a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $header_number ) ); ?>"><i class="fa fa-phone"></i><?php echo esc_attr($header_number);?></a>
												</li>
											<?php endif;?>

											<?php if(!empty($header_address)):?>
												<li><i class="fa fa-map-marker"></i><?php echo esc_html( $header_address );?></li>
											<?php endif;?>

											<?php if(!empty($header_email)):?>
												<li>
													<a href="mailto:<?php echo esc_attr($header_email);?>"><i class="fa fa-envelope"></i><?php echo esc_attr( antispambot( $header_email ) ); ?></a>
												</li>
											<?php endif;?>

										</ul>
									</div>

									<?php } ?>

								</div>
							</div>
						</div>			
					</div>
				<?php endif;
			}
			endif;
			add_action( 'blog_era_action_header', 'blog_era_top_header', 10 );


			if ( ! function_exists( 'blog_era_site_branding' ) ) :
	/**
	 * Site Branding
	 * @since 1.0.0
	 */
function blog_era_site_branding() {
	$bg_image_url = get_header_image(); 
	?>
	<div class="site-branding" style="background-image:url(<?php echo esc_url( $bg_image_url ); ?>);">	
		<?php $site_identity = blog_era_get_option( 'site_identity' );
		$title = get_bloginfo( 'name', 'display' );
		$description    = get_bloginfo( 'description', 'display' );

		if( 'logo-only' == $site_identity){

			if ( has_custom_logo() ) {

				the_custom_logo();

			}
		} elseif( 'logo-text' == $site_identity){

			if ( has_custom_logo() ) {

				the_custom_logo();

			}

			if ( $description ) {
				echo '<p class="site-description">'.esc_attr( $description ).'</p>';
			}

		} elseif( 'title-only' == $site_identity && $title ){ ?>

		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php 

	}elseif( 'title-text' == $site_identity){ 
		echo '<div class="site-branding">';

		if( $title ){ ?>

		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php 
	}

	if ( $description ) {

		echo '<p class="site-description">'.esc_attr( $description ).'</p>';

	}
	echo '</div>';
} ?> 
</div>	
<?php
}
endif;
add_action( 'blog_era_action_header', 'blog_era_site_branding', 15 );

if ( ! function_exists( 'blog_era_site_nav_menu' ) ) :
	/**
	 * Nav Menu
	 * @since 1.0.0
	 */
function blog_era_site_nav_menu() {
	?>
	<div class="main-menu">	
		<div class="blog-container">
			<nav id="site-navigation" class="main-navigation">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',				
						'items_wrap'	 =>  '<ul>%3$s</ul>',
						'fallback_cb'    => 'wp_page_menu',
						)
					);
					?>

				</nav>
			</div>
		</div>	
		<?php
	}
	endif;
	add_action( 'blog_era_action_header', 'blog_era_site_nav_menu', 20 );

	if ( ! function_exists( 'blog_era_featured_slider' ) ) :
	/**
	 * Nav Menu
	 * @since 1.0.0
	 */
function blog_era_featured_slider() {
	if ( !is_front_page() ){
		return;
	}

	?>

	<?php $enable_slider 		= blog_era_get_option( 'enable_slider' );				 
	$slider_category   			= blog_era_get_option( 'slider_category' ); 
	$slider_number   			= blog_era_get_option( 'slider_number' ); 
	if ( true == $enable_slider ) : ?>

	<div class="banner-slider">
		<div class="blog-container">
			<div class="blog-row">
				<div class="blog-col-4">
					<?php $featured_page_number = 2;
					$page_ids = array();
					$page_ids[] = blog_era_get_option( 'featured_page_1' );
					$page_ids[] = blog_era_get_option( 'featured_page_2' );

					$featured_args = array(
						'posts_per_page' => absint( $featured_page_number ),
						'orderby'        => 'post__in',
						'post_type'      => 'page',
						'post__in'       => $page_ids,			                
						);  
					$featured_query = new WP_Query( $featured_args );
					if ( $featured_query->have_posts() ) :  $cn = 0; ?>

					<div class="banner-new">
						<?php while ( $featured_query->have_posts() ) : $featured_query->the_post();  $cn++; ?>
							<?php $layout_class = 'top-part'; 
							$image_class = '';
							if( $cn == 2){
								$layout_class = 'bottom-part';
							}?>
							<?php if ( ! has_post_thumbnail() ) :

								$image_class= 'no-image';

							endif;?>

							<div class="banner-side <?php echo esc_attr( $layout_class);?> <?php echo esc_attr( $image_class);?>">
								

								<?php if ( has_post_thumbnail() ) : ?>

									<figure>

										<?php the_post_thumbnail( 'blog-era-custom' );?>

									</figure>

								<?php endif;?>

								<div class="banner-side-content v-center">
									<header class="entry-header">
										<a href="<?php the_permalink();?>"><h2 class="entry-title"><?php the_title();?></h2></a>
									</header>
								</div>

							</div>

						<?php endwhile;
						wp_reset_postdata();?>

					</div>

				<?php endif;?>

			</div>
			<?php 
				$page_ids = array();
				$page_ids[] = blog_era_get_option( 'featured_page_1' );
				$page_ids[] = blog_era_get_option( 'featured_page_2' );

				$page_ids = array_filter( $page_ids);

				$slider_class = 'blog-col-8';
				if( empty( $page_ids ) ){
					$slider_class = 'blog-col-12';
				}
			?>
			<div class="<?php echo esc_attr( $slider_class);?>">					
				<?php $slider_args = array(
					'posts_per_page' => absint( $slider_number),				
					'post_type' => 'post',
					'post_status' => 'publish',
					'paged' => 1,
					);

				if ( absint( $slider_category ) > 0 ) {
					$slider_args['cat'] = absint( $slider_category );
				}

							// Fetch posts.
				$slider_query = new WP_Query( $slider_args );

				?>

				<?php if ( $slider_query->have_posts() ) : ?>

					<div id="header-slider" class="owl-carousel owl-theme" >

						<?php while ( $slider_query->have_posts() ) : $slider_query->the_post(); ?>

							<?php if ( ! has_post_thumbnail() ) :

								$image_class= 'no-image';
								
							endif;?>							

							<div class="item <?php echo esc_attr( $image_class);?>">
								
								<?php if( has_post_thumbnail() ) : ?>

									<figure>

										<?php the_post_thumbnail( 'blog-era-slider' ); ?>

									</figure>

								<?php endif; ?>

								<div class="blog-slider-caption">
									<div class="blog-caption-wrapper">

										<header class="entry-header">

											<a href="<?php the_permalink();?>"><h2 class="entry-title"><?php the_title(); ?></h2></a>

										</header>

										<?php $excerpt = blog_era_the_excerpt( 20 );
										if ( !empty( $excerpt ) ) : ?>

										<div class="entry-content">
											<?php										
											echo wp_kses_post( wpautop( $excerpt ) );
											?>
										</div>

									<?php endif; ?>										
								</div>
							</div>
						</div>

					<?php endwhile;

					wp_reset_postdata();

					endif; ?>

				</div>
			</div>
		</div>

	</div>
</div>

<?php endif;
}
endif;
add_action( 'blog_era_action_header', 'blog_era_featured_slider', 25 );

if ( ! function_exists( 'blog_era_footer_social' ) ) :
	/**
	 * Footer Social Menu
	 * @since 1.0.0
	 */
function blog_era_footer_social() {
	?>
	<?php $enable_footer_social_icon = blog_era_get_option( 'enable_footer_social_icon' );
	if ( true == $enable_footer_social_icon) : ?>
	<?php if ( has_nav_menu( 'social-menu' ) ) : ?>

		<div class="footer-social-icon">
			<div class="social-menu-part">
				<?php
				wp_nav_menu( array(
					'theme_location'  => 'social-menu',
					'container'       => false,								
					'depth'           => 1,
					'fallback_cb'     => 'wp_page_menu',
					) );
					?>
				</div>
			</div>
			
		<?php endif;?>

	<?php endif;?>

	<?php
}
endif;
add_action( 'blog_era_action_footer', 'blog_era_footer_social', 10 );

if ( ! function_exists( 'blog_era_footer_widget' ) ) :
	/**
	 * Footer Widget
	 * @since 1.0.0
	 */
function blog_era_footer_widget() {
	?>
	<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>

		<div class="widget-area"> <!-- widget area starting from here -->
			<div class="blog-container">
				<?php
				$column_count = 0;
				$class_coloumn =12;
				for ( $i = 1; $i <= 3; $i++ ) {
					if ( is_active_sidebar( 'footer-' . $i ) ) {
						$column_count++;
						$class_coloumn = 12/$column_count;
					}
				} ?>

				<?php $column_class = 'blog-col-' . absint( $class_coloumn );
				for ( $i = 1; $i <= 3 ; $i++ ) {
					if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
					<div class="<?php echo esc_attr( $column_class ); ?>">
						<?php dynamic_sidebar( 'footer-' . $i ); ?>
					</div>
					<?php }
				} ?>
			</div>

		</div> <!-- widget area starting from here -->

	<?php endif;?> 	  

	<?php
}
endif;
add_action( 'blog_era_action_footer', 'blog_era_footer_widget', 15 );

if ( ! function_exists( 'blog_era_copyright' ) ) :
	/**
	 * Footer Copyright Section
	 * @since 1.0.0
	 */
function blog_era_copyright() {
	?>  
	<?php 
	$copyright_footer = blog_era_get_option('copyright_text'); 
	if ( ! empty( $copyright_footer ) ) {
		$copyright_footer = wp_kses_data( $copyright_footer );
	}
		// Powered by content.
	$powered_by_text = sprintf( __( 'Theme of %s', 'blog-era' ), '<a target="_blank" rel="designer" href="https://96themes.com/">96 THEME.</a>' );
	?>
	<div class="footer-bottom">

		<span class="copy-right"><?php echo $powered_by_text;?><?php echo wp_kses_post( $copyright_footer );?></span>
		
	</div>
	<?php $enable_scroll_top = blog_era_get_option('enable_scroll_top'); ?>
	<?php if( true == $enable_scroll_top ): ?>
		<div class="back-to-top" style="display: block;">
	   		<a href="#masthead" title="Go to Top" class="fa-angle-up"></a>       
	 	</div>	
	<?php endif;
}
endif;
add_action( 'blog_era_action_footer', 'blog_era_copyright', 20 );

if ( ! function_exists( 'blog_era`_custom_posts_navigation' ) ) :

	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
function blog_era_custom_posts_navigation() {
	$pagination_option = blog_era_get_option('pagination_option');
	if( 'default' == $pagination_option){
		the_posts_navigation();	
	} else{
		the_posts_pagination( array(
			'mid_size' => 5,
			'prev_text' => esc_html__( 'PREV', 'blog-era' ),
			'next_text' => esc_html__( 'NEXT', 'blog-era' ),
			) );
	} 	

}
endif;

add_action( 'blog_era_action_posts_navigation', 'blog_era_custom_posts_navigation' );