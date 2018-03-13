<?php
/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package Blog_Era
 */


if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;

/**
 * Class Blog_Era_Dropdown_Taxonomies_Control
 */
class Blog_Era_Dropdown_Taxonomies_Control extends WP_Customize_Control {

    /**
     * Render the control's content.
     *
     * @since 1.0.0
     */
    public function render_content() {
        $dropdown = wp_dropdown_categories(
            array(
                'name'              => 'blog-era-dropdown-categories-' . $this->id,
                'echo'              => 0,
                'show_option_none'  => __( '&mdash; Select &mdash;', 'blog-era' ),
                'option_none_value' => '0',
                'selected'          => $this->value(),
                'hide_empty'        => 0,                   

            )
        ); 
        
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

        printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s <span class="description customize-control-description"></span>%s </label>',
            esc_html($this->label),
            esc_html($this->description),
            $dropdown

        );
    }

}
/**
 * Class Blog_Era_Info
 */
class Blog_Era_Info extends WP_Customize_Control {
    /**
     * Render the control's content.
     *
     * @since 1.0.0
     */    
    public $type = 'info';
    public $label = '';
    public function render_content() {
    ?>
        <h2><?php echo esc_html( $this->label ); ?></h2>
    <?php
    }
}
//  Customizer Control
if (class_exists('WP_Customize_Control') && ! class_exists( 'Blog_Era_Image_Radio_Control' ) ) {
    /**
    * Customize sidebar layout control.
    */
    class Blog_Era_Image_Radio_Control extends WP_Customize_Control {

        public function render_content() {

            if (empty($this->choices))
                return;

            $name = '_customize-radio-' . $this->id;
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <ul class="controls" id='blog-era-img-container'>
                <?php
                foreach ($this->choices as $value => $label) :
                    $class = ($this->value() == $value) ? 'blog-era-radio-img-selected blog-era-radio-img-img' : 'blog-era-radio-img-img';
                    ?>
                    <li style="display: inline;">
                        <label>
                            <input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
                                                          $this->link();
                                                          checked($this->value(), $value);
                                                          ?> />
                            <img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
                        </label>
                    </li>
                    <?php
                endforeach;
                ?>
            </ul>
            <?php
        }

    }
}