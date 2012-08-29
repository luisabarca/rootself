<?php
/******************************************/
// 					VIDEO WIDGET
/******************************************/
class Pi_Video_Widget extends WP_Widget {
	
	/**************************************/
	//			Screenshot
	/**************************************/
	function Pi_Video_Widget() {

		$widget_ops = array( 'classname' => 'pi_video_widget', 'description' => __('A widget that Display YouTube or Vimeo Videos.', 'theme_textdomain') );

		$this->WP_Widget( 'pi_video_widget', 'Yourself: Video', $widget_ops );
	}
	
	/**************************************/
	//			Widget
	/**************************************/
	function widget( $args, $instance ) {
		
		extract($args);
	
		$title = apply_filters('widget_title', $instance['title'] );
		$desc = $instance['desc'];
		$img = $instance['img'];
		$video = $instance['video'];
		$excerpt = $instance['excerpt']; 
		$height = $instance['height']; 
		$width = pi_get_widget_thumbs_width($name); ?>
		
			<?php echo $before_widget;
	
			if ( $title ) echo $before_title . $title . $after_title; ?>
			
			
			<?php if($img != '') { ?>	
				<div class="pi-screencast-widget">
					<?php if ( $desc != '' ) ?> 
						<p class="description"><?php echo $desc; ?></p>
					<?php $image = vt_resize( '', $img, $width, $height, true ); ?>
					<div class="post-thumb">
						<a class="screencast-play" href="<?php echo $video; ?>" rel="prettyPhoto"><img class="opaque" src="<?php echo get_template_directory_uri(); ?>/resources/img/screencast-play.png" alt="screencast play" /></a>
						<a href="<?php echo $video; ?>" rel="prettyPhoto[gallery]"><img src="<?php echo $image['url']; ?>" alt="" /></a>
					</div>
					<?php if ( $excerpt != '' ) ?>
						<p class="excerpt"><?php echo $excerpt ?></p>
				</div>
			<?php }else{
				
				if($video != ''){
					/* youtube */
					if(preg_match('/youtube/', $video)){
						if(preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video, $matches)){
							$video_result = '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowFullScreen></iframe>';
						}else{
							$video_result = __('Invalid YouTube URL, please check it again.', 'theme_textdomain');
						}
					}
					/* vimeo */
					elseif(preg_match('/vimeo/', $video)){
						if(preg_match('~^http://(?:www\.)?vimeo\.com/(?:clip:)?(\d+)~', $video, $matches)){
							$video_result = '<iframe src="http://player.vimeo.com/video/'.$matches[1].'" width="' . $width . '" height="' . $height . '" frameborder="0"></iframe>';
						}else{
							$video_result = __('Invalid Vimeo URL, please check it again.', 'theme_textdomain');
						}
					}
					else{
						$video_result = __('Invalid YouTube or Vimeo URL, please check it again.', 'theme_textdomain');
					} 
				} ?>
			
			<div class="pi-video-widget">
				<?php if ( $desc != '' ) ?>
					<p class="description"><?php echo $desc; ?></p>
						<div class="video">
							<?php echo $video_result; ?>
						</div>
				<?php if ( $excerpt != '' ) ?>
					<p class="excerpt"><?php echo $excerpt ?></p>
			</div>
							
			<?php }
			
		echo $after_widget;	?>
	
	<?php }
	
    /**************************************/
    //			Update
    /**************************************/
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['desc'] = strip_tags($new_instance['desc']);
		$instance['img'] = strip_tags($new_instance['img']);
		$instance['video'] = strip_tags($new_instance['video']);
		$instance['excerpt'] = strip_tags($new_instance['excerpt']);
		$instance['height'] = $new_instance['height'];
		
		return $instance;
		
	}
	
    /**************************************/
    //			Form
    /**************************************/
	function form( $instance ) {

		$defaults = array('title' => '', 'desc' => '', 'img' => '', 'video' => '', 'height' => 200, 'excerpt' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'theme_textdomain'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Description', 'theme_textdomain'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo $instance['desc']?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php _e('Image *optional', 'theme_textdomain'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" value="<?php echo $instance['img']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'video' ); ?>"><?php _e('Vimeo or Youtube URL', 'theme_textdomain'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'video' ); ?>" name="<?php echo $this->get_field_name( 'video' ); ?>" value="<?php echo $instance['video']; ?>" />
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Image/Video Height', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'height' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>">
		        <?php for ( $i = 50; $i <= 900; $i += 50) { ?>
		        <option value="<?php echo $i; ?>" <?php if($instance['height'] == $i){ echo "selected='selected'";} ?>><?php echo $i . " px"; ?></option>
		        <?php } ?>
		    </select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e('Excerpt', 'theme_textdomain'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'excerpt' ); ?>" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" value="<?php echo $instance['excerpt']; ?>" />
		</p>
		<p><small>*<?php _e('Display video using lightbox effect.', 'theme_textdomain'); ?></small></p>
		<?php
	}
}


/**************************************/
//			Register Widget
/**************************************/

function register_pi_video_widget() {
	register_widget('Pi_Video_Widget');
}
add_action('widgets_init', 'register_pi_video_widget', 1);

?>