<?php
/**
 * Custom Social Widget
 */

class VW_Event_Planner_Social_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'VW_Event_Planner_Social_Widget', 
			__('VW Social Icon', 'vw-event-planner'),
			array( 'description' => __( 'Widget for Social icons section', 'vw-event-planner' ), ) 
		);
	}
	
	public function widget( $args, $instance ) {
		?>
		<div class="widget">
		<?php
		
		$title = $instance['title'];
		$title = apply_filters('widget_title', esc_html($instance['title']));
		$facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $linkedin = $instance['linkedin'];
        $pinterest = $instance['pinterest'];
        $tumblr = $instance['tumblr'];
        $instagram = $instance['instagram'];
        $youtube = $instance['youtube'];

        echo '<div class="custom-social-icons">';
        if(!empty($title) ){ ?><h3 class="custom_title"><?php echo esc_html($instance['title']); ?></h3><?php } ?>
        <?php if(!empty($facebook) ){ ?><a class="custom_facebook fff" href="<?php echo esc_url($instance['facebook']); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php esc_attr_e( 'Facebook','vw-event-planner' );?></span></a><?php } ?>
        <?php if(!empty($twitter) ){ ?><a class="custom_twitter" href="<?php echo esc_url($instance['twitter']); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php esc_attr_e( 'Twitter','vw-event-planner' );?></span></a><?php } ?>
        <?php if(!empty($google) ){ ?><a class="custom_google" href="<?php echo esc_url($instance['google']); ?>"><i class="fab fa-google-plus-g"></i><span class="screen-reader-text"><?php esc_attr_e( 'Google','vw-event-planner' );?></span></a><?php } ?>
        <?php if(!empty($linkedin) ){ ?><a class="custom_linkedin" href="<?php echo esc_url($instance['linkedin']); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin','vw-event-planner' );?></span></a><?php } ?>
        <?php if(!empty($pinterest) ){ ?><a class="custom_pinterest" href="<?php echo esc_url($instance['pinterest']); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest','vw-event-planner' );?></span></a><?php } ?>
        <?php if(!empty($tumblr) ){ ?><a class="custom_tumblr" href="<?php echo esc_url($instance['tumblr']); ?>"><i class="fab fa-tumblr"></i><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr','vw-event-planner' );?></span></a><?php } ?>
        <?php if(!empty($instagram) ){ ?><a class="custom_instagram" href="<?php echo esc_url($instance['instagram']); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_attr_e( 'Instagram','vw-event-planner' );?></span></a><?php } ?>
        <?php if(!empty($youtube) ){ ?><a class="custom_youtube" href="<?php echo esc_url($instance['youtube']); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php esc_attr_e( 'Youtube','vw-event-planner' );?></span></a><?php } ?>
        <?php echo '</div>';
		?>
		</div>
		<?php
	}
	
	public function form( $instance ) {

		$title= ''; $facebook = ''; $twitter = '';$google = ''; $linkedin = '';  $pinterest = '';$tumblr = ''; $instagram = ''; $youtube = '';
		
		isset($instance['title']) ? $title = $instance['title'] : null;
		isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
		isset($instance['instagram']) ? $instagram = $instance['instagram'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['google']) ? $google = $instance['google'] : null;
        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        isset($instance['pinterest']) ? $pinterest = $instance['pinterest'] : null;
        isset($instance['tumblr']) ? $tumblr = $instance['tumblr'] : null;
        isset($instance['youtube']) ? $youtube = $instance['youtube'] : null;
		?>	

		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','vw-event-planner'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    	</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('google')); ?>"><?php esc_html_e('Google+:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('google')); ?>" name="<?php echo esc_attr($this->get_field_name('google')); ?>" type="text" value="<?php echo esc_attr($google); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php esc_html_e('Linkedin:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e('Instagram:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php esc_html_e('Pinterest:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="text" value="<?php echo esc_attr($pinterest); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('tumblr')); ?>"><?php esc_html_e('Tumblr:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="text" value="<?php echo esc_attr($tumblr); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php esc_html_e('Youtube:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="text" value="<?php echo esc_attr($youtube); ?>">
		</p>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();	
		$instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';	
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
        $instance['instagram'] = (!empty($new_instance['instagram']) ) ? strip_tags($new_instance['instagram']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : '';
        $instance['pinterest'] = (!empty($new_instance['pinterest']) ) ? strip_tags($new_instance['pinterest']) : '';
        $instance['tumblr'] = (!empty($new_instance['tumblr']) ) ? strip_tags($new_instance['tumblr']) : '';
         $instance['youtube'] = (!empty($new_instance['youtube']) ) ? strip_tags($new_instance['youtube']) : '';
		 return $instance;
	}
}

function vw_event_planner_custom_load_widget() {
	register_widget( 'VW_Event_Planner_Social_Widget' );
}
add_action( 'widgets_init', 'vw_event_planner_custom_load_widget' );