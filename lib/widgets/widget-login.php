<?php
/******************************************/
//			LOGIN WIDGET
/******************************************/
class Pi_Login_Form_Widget extends WP_Widget {
	
	/**************************************/
	//			Login Form
	/**************************************/
	function Pi_Login_Form_Widget() {

		$widget_ops = array( 'classname' => 'pi_login_form_widget' ,'description' => __('A widget to provide users login form.', 'theme_textdomain') );
		$this->WP_Widget( 'pi_login_form_widget', __('Yourself: Login Form', 'theme_textdomain'), $widget_ops );
	}
	
	/**************************************/
	//			Widget
	/**************************************/
	function widget( $args, $instance ) {
	
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title'] );
		
		echo $before_widget;
	
		if ( $title ) echo $before_title . $title . $after_title; 
				
		global $user_identity, $user_level;
		$redirect = $_SERVER['REQUEST_URI'];
		
		if ( is_user_logged_in() ) : ?>
		
			<p><?php pi_translate_text('You are logged in as', '_log_as', 'directly'); ?> <strong><a href="<?php echo get_option('siteurl') . '/wp-admin/profile.php'; ?>"><?php echo $user_identity ?></a></strong>. <a href="<?php echo esc_url( wp_logout_url( $redirect ) ); ?>"><?php _e('Logout &raquo;', 'theme_textdomain'); ?></a></p>
			
		<?php else:	?>
		
			<form action="<?php echo home_url(); ?>/wp-login.php" method="post" class="clearfix">
				
				<p>
					<input id="log" type="text" name="log" value="<?php if( isset($user_login) ){ echo esc_html( stripslashes($user_login) ); } ?>" class="input-text" />
					<label for="log"><small><?php pi_translate_text('User', '_log_user', 'directly'); ?></small></label>
				</p>
				<p>
					<input id="pwd" type="password" name="pwd" class="input-text" />
					<label for="pwd"><small><?php pi_translate_text('Password', '_log_password', 'directly'); ?></small></label>
				</p>	
				<p>
					<input type="checkbox" name="rememberme" checked="checked" value="forever" /> <?php pi_translate_text('Remember me', 'log_remember', 'directly'); ?>
				</p>
				<p>
					<button class="btn" type="submit" name="submit">
						<span class="left"><span class="right"><?php pi_translate_text('Login', '_log_login', 'directly'); ?></span></span>
					</button>
					<span class="login-options"> - OR - <a class="user-focus" href="<?php echo home_url(); ?>/wp-login.php?action=lostpassword"><?php pi_translate_text('Recover password', '_log_recover', 'directly'); ?></a></span>
				</p>
				<p><input type="hidden" name="redirect_to" value="<?php echo esc_url( $redirect ); ?>"/></p>
			</form>
			
			<?php if( get_option('users_can_register') ) : ?>
				<p><a href="<?php echo home_url(); ?>/wp-register.php"><?php pi_translate_text('Register', '_log_register', 'directly'); ?></a></p>
			<?php endif; ?>
		
		<?php endif; ?>
	
		<?php echo $after_widget;		
				
	}
	
    /**************************************/
    //			Update
    /**************************************/
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		/* Strip tags to remove HTML */
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		return $instance;
		
	}
	
    /**************************************/
    //			Form
    /**************************************/
	function form( $instance ) {

		$defaults = array( 'title' => 'Login Form');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'theme_textdomain'); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<?php
	
	}
}


/**************************************/
//			Register Widget
/**************************************/

function register_pi_login_form_widget() {
	register_widget('Pi_Login_Form_Widget');
}
add_action('widgets_init', 'register_pi_login_form_widget', 1);

?>