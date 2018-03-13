<?php
/**
 * Display Widget
 *
 * @package Blog_Era
 */

/**
* A widget that display Latest Blog
*/
class Blog_Era_Latest_Blog extends WP_Widget
{

    function __construct() {

        global $control_ops;

        $widget_ops = array(
            'classname'   => 'blog-era-latest-blog',
            'description' => esc_html__( 'Add Widget to Display Latest Blog.', 'blog-era' )
        );

        parent::__construct( 'blog_era_latest_blog',esc_html__( 'Blog Era: Latest Blog', 'blog-era' ), $widget_ops, $control_ops );
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        ?>
        <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:', 'blog-era' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php echo esc_html__( 'Number of posts to show:', 'blog-era' );?></label>
        <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="4" /></p>

        <p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_date' )); ?>" />
        <label for="<?php echo esc_attr($this->get_field_id( 'show_date' )); ?>"><?php echo esc_html__( 'Display post date?', 'blog-era' ); ?></label></p>      


        <?php
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        return $instance;
    }

    function widget( $args, $instance ) {

    $title = ( ! empty( $instance['title'] ) ) ? esc_html($instance['title']) : esc_html__( 'Latest Blog','blog-era' );

    $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

    $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
    if ( ! $number )
    $number = 4;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => absint( $number ),
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true
        ) ) );

        if ($r->have_posts()) : ?>

            <section class="widget blog-section">

                <?php if ( $title ) : ?>

                    <h2 class="widget-title"><span><?php echo esc_html( $title );?></span></h2>

                <?php endif;?>



                <?php while ( $r->have_posts() ) : $r->the_post(); ?>

                <article class="post">

                    <?php if ( has_post_thumbnail() ) : ?>

                        <figure class="post-featured-image">

                        <?php the_post_thumbnail( 'medium' );?>

                        </figure>

                    <?php endif;?>

                    <div class="recent-post-wrapper">
                        <header class="entry-header">
                            <h3 class="entry-title">

                            <a href="<?php the_permalink();?>"><?php the_title();?></a>

                            </h3>
                        </header>

                        <?php if ( $show_date ) : ?>

                            <div class="post-details">
                                <span class="date">
                                    <span class="post-date"><?php echo get_the_date(); ?></span>
                                </span>
                            </div>

                        <?php endif;?> 

                        <div class="entry-content">
                            <?php
                                $excerpt = blog_era_the_excerpt(20);                                                                       
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div>
                        <a href="<?php the_permalink();?>" class="read-more"><?php echo esc_html__( 'Read More', 'blog-era' );?></a>
                    </div>

                </article>


                <?php endwhile;
                wp_reset_postdata();?>

            </section>

        <?php endif;

    } 

}

if ( ! class_exists( 'Blog_Era_Social_Widget' ) ) :

    /**
     * Social widget class.
     *
     * @since 1.0.0
     */
class Blog_Era_Social_Widget extends WP_Widget {
    /**
    * Constructor.
    *
    * @since 1.0.0
    */
    function __construct() {
        $opts = array(
        'classname'   => 'blog_era_widget_social',
        'description' => esc_html__( 'Social Link Widget', 'blog-era' ),
        );
        parent::__construct( 'blog-era-social', esc_html__( 'Blog Era: Social', 'blog-era' ), $opts );
    }

    /**
    * Echo the widget content.
    *
    * @since 1.0.0
    *
    * @param array $args     Display arguments including before_title, after_title,
    *                        before_widget, and after_widget.
    * @param array $instance The settings for the particular instance of the widget.
    */
    function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        if ( has_nav_menu( 'social-menu' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'social-menu',
                'depth'          => 1,
                'container'      => 'div',
                'container_class'=> 'social-menu-part',
            ) );
        }

        echo $args['after_widget'];

    }

    /**
    * Update widget instance.
    *
    * @since 1.0.0
    *
    * @param array $new_instance New settings for this instance as input by the user via
    *                            {@see WP_Widget::form()}.
    * @param array $old_instance Old settings for this instance.
    * @return array Settings to save or bool false to cancel saving.
    */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );

        return $instance;
        }

        /**
        * Output the settings update form.
        *
        * @since 1.0.0
        *
        * @param array $instance Current settings.
        * @return void
        */
    function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array(
            'title' => '',
        ) );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'blog-era' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>

        <?php if ( ! has_nav_menu( 'social-menu' ) ) : ?>
            <p>
            <?php esc_html_e( 'Social menu is not set. Please create menu and assign it to Social Theme Location.', 'blog-era' ); ?>
            </p>
        <?php endif; ?>
        <?php
    }
}

endif;


function Blog_Era__Action_Latest_Blog() {

  register_widget( 'Blog_Era_Latest_Blog' );
  register_widget( 'Blog_Era_Social_Widget' );


}
add_action( 'widgets_init', 'Blog_Era__Action_Latest_Blog' );