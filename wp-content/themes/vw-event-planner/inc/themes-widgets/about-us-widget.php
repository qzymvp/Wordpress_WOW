<?php
/**
 * Custom About us Widget
 */

class VW_Event_Planner_About_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'VW_Event_Planner_About_Widget',
			__('VW About us', 'vw-event-planner'),
			array( 'description' => __( 'Widget for about us section in sidebar', 'vw-event-planner' ), ) 
		);
	}
	
	public function widget( $args, $instance ) {
		?>
				
		<div class="widget">
			<?php
			$title = apply_filters('widget_title', esc_html($instance['title']));
			$author = $instance['author'];
			$designation = $instance['designation'];
			$description = apply_filters('widget_description', esc_html($instance['description']));
			$read_more_url = $instance['read_more_url'];
			$read_more_text = $instance['read_more_text'];
			$upload_image = $instance['upload_image'];			

	        echo '<div class="custom-about-us">';
	        if(!empty($title) ){ ?><h3 class="custom_title"><?php echo esc_html($instance['title']); ?></h3><?php } ?>
	        <?php if($upload_image): ?>
      			<img src="<?php echo esc_url($upload_image); ?>" alt="">
			<?php endif; ?>
			<?php if(!empty($author) ){ ?><p class="custom_author"><?php echo esc_html($instance['author']); ?></p><?php } ?>
			<?php if(!empty($designation) ){ ?><p class="custom_designation"><?php echo esc_html($instance['designation']); ?></p><?php } ?>
	        <?php if(!empty($description) ){ ?><p class="custom_desc"><?php echo esc_html($instance['description']); ?></p><?php } ?>
	        <?php if(!empty($read_more_url) ){ ?><div class="more-button"><a class="custom_read_more" href="<?php echo esc_url($instance['read_more_url']); ?>"><?php if(!empty($read_more_text) ){ ?><?php echo esc_html($instance['read_more_text']); ?><?php } ?><i class="fa fa-angle-right"></i></a></div><?php } ?>	        
	        <?php echo '</div>';
			?>
		</div>
		<?php
	}
	
	// Widget Backend 
	public function form( $instance ) {

		$title= ''; $author = ''; $designation = ''; $description= ''; $read_more_text = ''; $read_more_url = ''; $upload_image = ''; 
		
		isset($instance['title']) ? $title = $instance['title'] : null;
		isset($instance['author']) ? $author = $instance['author'] : null;
		isset($instance['designation']) ? $designation = $instance['designation'] : null;
		isset($instance['description']) ? $description = $instance['description'] : null;
		isset($instance['read_more_url']) ? $read_more_url = $instance['read_more_url'] : null;
		isset($instance['read_more_text']) ? $read_more_text = $instance['read_more_text'] : null;
		isset($instance['upload_image']) ? $upload_image = $instance['upload_image'] : null;		
		?>

		<p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','vw-event-planner'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('author')); ?>"><?php esc_html_e('Author Name:','vw-event-planner'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('author')); ?>" name="<?php echo esc_attr($this->get_field_name('author')); ?>" type="text" value="<?php echo esc_attr($author); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('designation')); ?>"><?php esc_html_e('Designation:','vw-event-planner'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('designation')); ?>" name="<?php echo esc_attr($this->get_field_name('designation')); ?>" type="text" value="<?php echo esc_attr($designation); ?>">
    	</p>
    	<p>
        <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Description:','vw-event-planner'); ?></label>
        <input class="widefat" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" type="text" value="<?php echo esc_attr($description); ?>">
    	</p>
    	<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>"><?php esc_html_e('Button Text:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_text')); ?>" type="text" value="<?php echo esc_attr($read_more_text); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>"><?php esc_html_e('Button Url:','vw-event-planner'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_url')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_url')); ?>" type="text" value="<?php echo esc_attr($read_more_url); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'upload_image' )); ?>"><?php esc_html_e( 'Image Url:','vw-event-planner'); ?></label>
		<?php
			if ( $instance['upload_image'] != '' ) :
			echo '<img class="custom_media_image" src="' . esc_url($instance['upload_image']) . '" style="margin:10px 0;padding:0;max-width:100%;float:left;display:inline-block" /><br />';
			endif;
		?>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'upload_image' ) ); ?>" name="<?php echo esc_attr($this->get_field_name( 'upload_image' )); ?>" type="text" value="<?php echo esc_url( $upload_image ); ?>" />
	   	</p>
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();	
		$instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
		$instance['author'] = ( ! empty( $new_instance['author'] ) ) ? $new_instance['author'] : '';
		$instance['designation'] = ( ! empty( $new_instance['designation'] ) ) ? $new_instance['designation'] : '';
		$instance['description'] = (!empty($new_instance['description']) ) ? strip_tags($new_instance['description']) : '';
        $instance['read_more_text'] = (!empty($new_instance['read_more_text']) ) ? strip_tags($new_instance['read_more_text']) : '';
        $instance['read_more_url'] = (!empty($new_instance['read_more_url']) ) ? strip_tags($new_instance['read_more_url']) : '';
        $instance['upload_image'] = ( ! empty( $new_instance['upload_image'] ) ) ? $new_instance['upload_image'] : '';

		return $instance;
	}
}
// Register and load the widget
function vw_event_planner_about_custom_load_widget() {
	register_widget( 'VW_Event_Planner_About_Widget' );
}
add_action( 'widgets_init', 'vw_event_planner_about_custom_load_widget' );