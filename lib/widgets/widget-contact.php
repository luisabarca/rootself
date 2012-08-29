<?php
/******************************************/
//			CONTACT WIDGET
/******************************************/
class Pi_Contact_Form_Widget extends WP_Widget {
	
	/**************************************/
	//			Recent Posts
	/**************************************/
	function Pi_Contact_Form_Widget() {

		$widget_ops = array( 'classname' => 'pi_contact_form_widget' ,'description' => __('A widget to provide users contact form.', 'theme_textdomain') );
		$this->WP_Widget( 'pi_contact_form_widget', __('Yourself: Contact Form', 'theme_textdomain'), $widget_ops );
	}
	
	/**************************************/
	//			Widget
	/**************************************/
	function widget( $args, $instance ) {
		
		global $nameError, $emailError, $commentError, $emailSent;
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title'] );
		
		echo $before_widget;
	
		if ( $title ) echo $before_title . $title . $after_title; ?>
		
			<form action="<?php the_permalink(); ?>" id="widgetContactForm" method="post">
				<fieldset>
					<p>
						<input type="text" name="cName" value="<?php if(isset($_POST['cName'])) echo $_POST['cName'];?>" id="cwName" class="required<?php if(isset($nameError) && $nameError == true ) echo " form-error"; ?>" tabindex="1" />
						<label for="cwName"><?php pi_translate_text('Name', '_contact_name', 'directly'); ?></label>
					</p>
					<p>
						<input type="text" name="cEmail" value="<?php if(isset($_POST['cEmail'])) echo $_POST['cEmail'];?>" id="cwEmail" class="required email<?php if(isset($emailError) && $emailError == true ) echo " form-error"; ?>" tabindex="2" />
						<label for="cwEmail"><?php pi_translate_text('Email', '_contact_email', 'directly'); ?></label>
					</p>
					<p>
						<textarea name="cComment" id="cwComment" class="required <?php if(isset($commentError) && $commentError == true ) echo " form-error"; ?>" cols="" rows="3" tabindex="3"><?php if(isset($_POST['cComment'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['cComment']); } else { echo $_POST['cComment']; } } ?></textarea>				
					</p>
					<p>
						<input type="hidden" name="pi_contact_form" value="true"/>
						<input type="hidden" name="submitted" id="swSubmitted" value="true" />
						<button class="btn" type="submit" name="submit">
						    <span class="left"><span class="right"><?php pi_translate_text('Submit Email', '_contact_submit_email', 'directly'); ?></span></span>
						</button>
					</p>
					<?php if(isset($emailSent) && $emailSent == true) : ?>
						<p class="success"><?php pi_translate_text('Thanks, your email was sent successfully.', '_contact_email_sent', 'directly'); ?></p>
					<?php endif; ?>
				</fieldset>
			<!-- END #contact-form -->
			</form> 
				
		<?php echo $after_widget;		
				
	}
	
    /**************************************/
    //			Update
    /**************************************/
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);		
		return $instance;
		
	}
	
    /**************************************/
    //			Form
    /**************************************/
	function form( $instance ) {

		$defaults = array( 'title' => 'Contact Form');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'theme_textdomain'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p><?php _e('The emails will been send to ', 'theme_textdomain'); ?><strong><?php echo of_get_option('contact_email') ?></strong><?php _e('You can change this email in:', 'theme_textdomain'); ?><a href="<?php echo admin_url( 'themes.php?page=options-framework' ); ?>">Options Panel</a></p>
		<?php
	
	}
}


/**************************************/
//			Register Widget
/**************************************/

function register_pi_contact_form_widget() {
	register_widget('Pi_Contact_Form_Widget');
}
add_action('widgets_init', 'register_pi_contact_form_widget', 1);

?>