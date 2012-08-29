<?php
/******************************************/
//		POSTS SLIDER WIDGET
/******************************************/
class Pi_Posts_Slider_Widget extends WP_Widget {
	
	/**************************************/
	//			Posts Slider
	/**************************************/
	function Pi_Posts_Slider_Widget() {

		$widget_ops = array( 'classname' => 'pi_posts_slider_widget' ,'description' => __('A widget that displays recent posts in slider format.', 'theme_textdomain') );

		$this->WP_Widget( 'pi_posts_slider_widget', __('Yourself: Recent Posts Slider', 'theme_textdomain'), $widget_ops );
	}
	
	/**************************************/
	//			Widget
	/**************************************/
	function widget( $args, $instance ) {
	
		extract($args);
		
		$slider_id = $widget_id . "_wrap";
		$title = apply_filters('widget_title', $instance['title'] );
		$post_type = $instance['post_type'];
		$show_number = $instance['show_number'];
		$pause_time = $instance['pause_time'];
		$transition_effect = $instance['transition_effect']; 
		$height = $instance['height']; ?>
				
		<?php echo $before_widget;
	
		if ( $title ) echo $before_title . $title . $after_title; ?>
				
			<!-- BEGIN .nivo-slider -->
			<div id="<?php echo $slider_id; ?>" class="nivo-slider">
				
				<?php $the_query = new WP_Query("showposts=$show_number&post_type=$post_type");				
				while ($the_query->have_posts()) : $the_query->the_post();
				
					if(has_post_thumbnail()){
						$image = vt_resize( get_post_thumbnail_id(),'' , pi_get_widget_thumbs_width($name), $height, true ); ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $image[url]; ?>" width="<?php echo $image[width]; ?>" height="<?php echo $image[height]; ?>" title="<?php the_title(); ?>" alt="slider image" /></a>
					<?php } ?>		
								
				<?php endwhile; wp_reset_query(); ?>
			
			<!-- END nivo-slider -->
			</div>
	
		<?php echo $after_widget; ?>
		<?php $nivo_opts = array('slider_id' => $slider_id, 'pause_time' => $pause_time, 'transition_effect' => $transition_effect); ?>
		<?php do_action('pi_posts_slider_widget', $nivo_opts); ?>			
				
	<?php }
	
    /**************************************/
    //			Update
    /**************************************/
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['post_type'] = $new_instance['post_type'];
		$instance['show_number'] = $new_instance['show_number'];
		$instance['pause_time'] = $new_instance['pause_time'];
		$instance['transition_effect'] = $new_instance['transition_effect'];
		$instance['height'] = $new_instance['height'];
		
		return $instance;
	}
	
    /**************************************/
    //			Form
    /**************************************/
	function form( $instance ) {

		$defaults = array( 'title' => 'Recent Posts', 'post_type' => 'post', 'show_number' => 4, 'pause_time' => 3000, 'transition_effect' => 'sliceDown', 'height' => 200 );
		$instance = wp_parse_args( (array) $instance, $defaults );
		$post_type = array('post' => 'Post', 'page' => 'Page', 'portfolio' => 'Portfolio');
		$nivo_transition_effect = array("sliceDown" => "Down", "sliceDownLeft" => "Down Left", "sliceUp" => "Up", "sliceUpLeft" => "Up Left", "sliceUpDown" => "Up Down", "sliceUpDownLeft" => "Up Down Left", "fold" => "Fold", "fade" => "Fade");
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'theme_textdomain'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e('Type', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'post_type' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'post_type' ); ?>">
		        <?php foreach ( $post_type as $k => $v ) { ?>
		        <option value="<?php echo $k; ?>" <?php if($instance['post_type'] == $k){ echo "selected='selected'";} ?>><?php echo $v; ?></option>
		        <?php } ?>
		    </select>
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'show_number' ); ?>"><?php _e('No. Posts', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'show_number' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'show_number' ); ?>">
		        <?php for ( $i = 1; $i <= 10; $i += 1) { ?>
		        <option value="<?php echo $i; ?>" <?php if($instance['show_number'] == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
		        <?php } ?>
		    </select>
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'pause_time' ); ?>"><?php _e('Pause Time', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'pause_time' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'pause_time' ); ?>">
		        <?php for ( $i = 0; $i <= 9000; $i += 1000) { ?>
		        <option value="<?php echo $i; ?>" <?php if($instance['pause_time'] == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
		        <?php } ?>
		    </select>
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'transition_effect' ); ?>"><?php _e('Transition Effect', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'transition_effect' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'transition_effect' ); ?>">
		        <?php foreach ( $nivo_transition_effect as $k => $v ) { ?>
		        <option value="<?php echo $k; ?>" <?php if($instance['transition_effect'] == $k){ echo "selected='selected'";} ?>><?php echo $v; ?></option>
		        <?php } ?>
		    </select>
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Images Height', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'height' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>">
		        <?php for ( $i = 50; $i <= 900; $i += 50) { ?>
		        <option value="<?php echo $i; ?>" <?php if($instance['height'] == $i){ echo "selected='selected'";} ?>><?php echo $i . " px"; ?></option>
		        <?php } ?>
		    </select>
		</p>
		<?php
	
	}
}


/**************************************/
//			Register Widget
/**************************************/

function register_pi_posts_slider_widget() {
	register_widget('Pi_Posts_Slider_Widget');
}
add_action('widgets_init', 'register_pi_posts_slider_widget', 1);

/* Load Nivo Slider */
function pi_load_nivo_posts_widget(){
	if( is_active_widget(false, false, 'pi_posts_slider_widget') ) {
		wp_enqueue_script('nivo-slider');
	}
}
add_action('wp_print_scripts', 'pi_load_nivo_posts_widget');

/* Nivo options */
function pi_load_posts_nivo_slider($nivo_opts){ ?>
	<script type="text/javascript">
	jQuery(window).load(function() {
	    jQuery('#<?php echo $nivo_opts["slider_id"]; ?>').nivoSlider({
	        effect:'<?php echo $nivo_opts["transition_effect"]; ?>', // Specify sets like: 'fold,fade,sliceDown...'
	        <?php if( $nivo_opts["pause_time"] != 0 ) echo "pauseTime:".$nivo_opts["pause_time"];
	       	else echo "manualAdvance:true"; ?>
	    });
	});
	</script>
<?php 
}
add_action('pi_posts_slider_widget', 'pi_load_posts_nivo_slider');
?>