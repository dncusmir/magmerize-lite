<?php
/**
 * Recent Posts widget
 *
 * @package Magmerize_Lite
 **/

add_action( 'widgets_init', 'mgmr_recent_load_widget' );

function mgmr_recent_load_widget() {
	register_widget( 'mgmr_recent_widget' );
}

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @see WP_Widget
 */
class mgmr_recent_widget extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 */
	function __construct() {
		$widget_ops = array(
            'classname' => 'mgmr_recent_widget',
            'description' => __( 'Your site&#8217;s most recent Posts.' ),
			'customize_selective_refresh' => true
        );
		parent::__construct( 'mgmr_recent_widget', __( 'Mgmr Recent Posts' ), $widget_ops );
        $this->alt_option_name = 'widget_recent_entries';
	}

    /**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
		if ( ! $number ) {
			$number = 3;
		}

        /**
         * Filters the arguments for the Recent Posts widget.
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args     An array of arguments used to retrieve the recent posts.
         * @param array $instance Array of settings for the current widget.
         */
        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        ), $instance ) );

        if ( ! $r->have_posts() ) {
            return;
        }
        ?>
        <?php echo $args['before_widget']; ?>
		<div class="mgmr_widget_1">
        <?php
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title']; ?>
            <div class="mgmr_widget_1_separator">
            </div><!-- mgmr_widget_1_separator -->
        <?php }
        foreach ( $r->posts as $recent_post ) : ?>
            <?php
            $post_title = get_the_title( $recent_post->ID );
            $title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
            ?>
            <div class="mgmr_widget_1_box mt-3">
                <div class="row">
                    <div class="col-4">
                        <a href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo get_the_post_thumbnail( $recent_post->ID, 'thumbnail' ); ?></a>
                    </div><!-- col-4 -->
                    <div class="col-8">
                        <h3><a href="<?php the_permalink( $recent_post->ID ); ?>" title='<?php echo $title ; ?>'><?php echo $title ; ?></a></h3>
                        <p class="mgmr_article_snippet">
                            <?php
							$desc = apply_filters( 'the_content', get_post_field( 'post_content', $recent_post->ID ) );
							echo wp_trim_words( $desc, 12, '...');
							?>
                        </p>
                    </div><!-- col-9 -->
                </div><!-- row -->
            </div><!-- mgmr_widget_1_box -->
        <?php endforeach; ?>
		</div><!-- mgmr_widget_1 -->
        <?php
        echo $args['after_widget'];

	}

    /**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
        return $instance;
	}


	function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Recent Posts';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
        <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

        <?php
	}
}

?>
