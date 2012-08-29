<?php
/******************************************/
//			TABS WIDGET 
/******************************************/
class Pi_Tabs_Widget extends WP_Widget {
	
	/**************************************/
	//			Tabs
	/**************************************/
	function Pi_Tabs_Widget() {

		$widget_ops = array( 'classname' => 'pi_tabs_widget' ,'description' => __('A widget that display popular posts, recent posts, comments and tags.', 'theme_textdomain') );

		$this->WP_Widget( 'pi_tabs_widget', 'Yourself: Tabs', $widget_ops );
	}
	
	/**************************************/
	//			Widget
	/**************************************/
	function widget( $args, $instance ) {
	
		extract($args);
		
		$show_popular = ( $instance['show_popular'] == 'yes' ) ? true : false;
		$show_popular_number = $instance['show_popular_number'];
		$show_recent = ( $instance['show_recent'] == 'yes' ) ? true : false;
		$show_recent_number = $instance['show_recent_number'];
		$show_comments = ( $instance['show_comments'] == 'yes' ) ? true : false;
		$show_comments_number = $instance['show_comments_number'];
		$show_tags = ( $instance['show_tags'] == 'yes' ) ? true : false;
		$show_tags_number = $instance['show_tags_number'];
		?>
				
			<?php echo $before_widget; ?>
		
			<ul class="tabs clearfix">
			    <?php if($show_popular){ ?>
			    	<li id="pi_tab1"><h4><a href="#tab1"><?php _e('Popular', 'theme_textdomain') ?></a></h4></li>
			    <?php } ?>
			    <?php if($show_recent){ ?>
			    	<li id="pi_tab2"><h4><a href="#tab2"><?php _e('Recent', 'theme_textdomain') ?></a></h4></li>
			    <?php } ?>
			    <?php if($show_comments){ ?>
			    	<li id="pi_tab3"><h4><a href="#tab3"><?php _e('Comments', 'theme_textdomain') ?></a></h4></li>
			    <?php } ?>
			    <?php if($show_tags){ ?>
			    	<li id="pi_tab4"><h4><a href="#tab4"><?php _e('Tags', 'theme_textdomain') ?></a></h4></li>
				<?php } ?>
			</ul>
			
			<div class="tab_container">
				
				<?php
				
				//Tab 1
				if($show_popular){
				    echo '<div id="tab1" class="tab_content">';
				    
				    	echo '<ul class="clearfix">';
				    
				    	$the_query = new WP_Query( "orderby=comment_count&order=DESC&showposts=$show_popular_number" );
				    
				    	while ($the_query->have_posts()) : $the_query->the_post(); ?>
				    		
				    		<li class="clearfix">
				    		
				    		<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
				    			<div class="post-thumb">
				    				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php pi_resize_img("width=55&height=55"); ?></a>
				    			</div>
				    		<?php endif; ?>
				    			<div class="detail">
				    				<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				    				<span class="entry-meta"><?php the_time(get_option('date_format')); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'theme_textdomain'), __('1 Comment' ,'theme_textdomain'), __('% Comments', 'theme_textdomain')); ?></a></span>
				    			</div>
				    			
				    		</li>	
				    						
				    	<?php endwhile; wp_reset_query(); ?>
				    	
				    	</ul>
				    
				    </div>
				    
				<?php	
			    }
			    
			    //Tab 2
			    if($show_recent){
			        echo '<div id="tab2" class="tab_content hidden">';
			        
			        	echo '<ul class="clearfix">';
			        
			        	$the_query = new WP_Query("showposts=$show_recent_number");
			        				
			        	while ($the_query->have_posts()) : $the_query->the_post(); ?>
			        		
			        		<li class="clearfix">
			        		
			        		<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
			        			<div class="post-thumb">
			        				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php pi_resize_img("width=55&height=55"); ?></a>
			        			</div>
			        		<?php endif; ?>
			        			<div class="detail">
			        				<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			        				<span class="entry-meta"><?php the_time(get_option('date_format')); ?> // <a href="<?php comments_link(); ?>"><?php comments_number(__('No Comments', 'theme_textdomain'), __('1 Comment' ,'theme_textdomain'), __('% Comments', 'theme_textdomain')); ?></a></span>
			        			</div>
			        			
			        		</li>
			        						
			        	<?php endwhile; wp_reset_query(); ?>
			        	
			        	</ul>
			        
			        </div>
			    
			    <?php
			    }
			    
			    //Tab3
			    if($show_comments){
			        echo '<div id="tab3" class="tab_content hidden">';
			        	
			        	$comments = get_comments(array(
			        		'number' => $show_comments_number,
			        		'status' => 'approve',
			        		'type' => 'comment'
			        	));
			        	
			        	echo '<ul class="clearfix">';
			        		
			        		foreach($comments as $comment) :
			        			
			        			$comm_title = get_the_title($comment->comment_post_ID);
			        			$comm_link = get_comment_link($comment->comment_ID);
			        			
			        			?>
			        			
			        			<li class="clearfix">
			        				<div class="post-thumb">
			        					<a href="<?php echo $comm_link; ?>"><?php echo get_avatar($comment,55) ?></a>
			        				</div>
			        				<div class="detail">
			        					<span class="entry-meta"><a href="<?php echo $comm_link; ?>"><?php echo substr(get_comment_excerpt( $comment->comment_ID ), 0, 100); ?></a></span>
			        				</div>
			        			</li> 
			        	
			        		<?php endforeach; ?>
			        		
			        	</ul>
			        	
			        </div>
			       
			    <?php   
			    }
			    
			    //Tab 4
			    if($show_tags){ ?>
					
					<div id="tab4" class="tab_content hidden clearfix">
			     		<?php wp_tag_cloud('largest=12&smallest=12&unit=px&number='.$show_tags_number); ?>	
			     	</div>
			     			       
			    <?php } ?>
			    
			    
			</div>
			
		<?php echo $after_widget; ?>
					
		<?php
	}
	
    /**************************************/
    //			Update
    /**************************************/
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
	
    /**************************************/
    //			Form
    /**************************************/
	function form( $instance ) {

		$defaults = array( 'show_popular' => 'yes', 'show_popular_number' => 4, 'show_recent' => 'yes', 'show_recent_number' => 4, 'show_comments' => 'yes', 'show_comments_number' => 4,  'show_tags' => 'yes', 'show_tags_number' => 20 );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		
		<p>
		    <label for="<?php echo $this->get_field_id( 'show_popular' ); ?>"><?php _e('Popular', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'show_popular' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'show_popular' ); ?>">
		        <option value="yes" <?php if($instance['show_popular'] == "yes"){ echo "selected='selected'";} ?>><?php _e('Yes', 'theme_textdomain'); ?></option>
		        <option value="no" <?php if($instance['show_popular'] == "no"){ echo "selected='selected'";} ?>><?php _e('No', 'theme_textdomain'); ?></option>            
		    </select>
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'show_popular_number' ); ?>"><?php _e('No. Popular', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'show_popular_number' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'show_popular_number' ); ?>">
		        <?php for ( $i = 1; $i <= 10; $i += 1) { ?>
		        <option value="<?php echo $i; ?>" <?php if($instance['show_popular_number'] == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
		        <?php } ?>
		    </select>
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'show_recent' ); ?>"><?php _e('Recent', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'show_recent' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'show_recent' ); ?>">
		        <option value="yes" <?php if($instance['show_recent'] == "yes"){ echo "selected='selected'";} ?>><?php _e('Yes', 'theme_textdomain'); ?></option>
		        <option value="no" <?php if($instance['show_recent'] == "no"){ echo "selected='selected'";} ?>><?php _e('No', 'theme_textdomain'); ?></option>            
		    </select>
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'show_recent_number' ); ?>"><?php _e('No. Recent', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'show_recent_number' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'show_recent_number' ); ?>">
		        <?php for ( $i = 1; $i <= 10; $i += 1) { ?>
		        <option value="<?php echo $i; ?>" <?php if($instance['show_recent_number'] == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
		        <?php } ?>
		    </select>
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'show_comments' ); ?>"><?php _e('Comments', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'show_comments' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'show_comments' ); ?>">
		        <option value="yes" <?php if($instance['show_comments'] == "yes"){ echo "selected='selected'";} ?>><?php _e('Yes', 'theme_textdomain'); ?></option>
		        <option value="no" <?php if($instance['show_comments'] == "no"){ echo "selected='selected'";} ?>><?php _e('No', 'theme_textdomain'); ?></option>            
		    </select>
		</p>
		<p>
		    <label for="<?php echo $this->get_field_id( 'show_comments_number' ); ?>"><?php _e('No. Comments', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'show_comments_number' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'show_comments_number' ); ?>">
		        <?php for ( $i = 1; $i <= 10; $i += 1) { ?>
		        <option value="<?php echo $i; ?>" <?php if($instance['show_comments_number'] == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
		        <?php } ?>
		    </select>
		</p>				
		<p>
		    <label for="<?php echo $this->get_field_id( 'show_tags' ); ?>"><?php _e('Tags', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'show_tags' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'show_tags' ); ?>">
		        <option value="yes" <?php if($instance['show_tags'] == "yes"){ echo "selected='selected'";} ?>><?php _e('Yes', 'theme_textdomain'); ?></option>
		        <option value="no" <?php if($instance['show_tags'] == "no"){ echo "selected='selected'";} ?>><?php _e('No', 'theme_textdomain'); ?></option>            
		    </select>
		</p>		
		<p>
		    <label for="<?php echo $this->get_field_id( 'show_tags_number' ); ?>"><?php _e('No. Tags', 'theme_textdomain'); ?></label>
		    <select name="<?php echo $this->get_field_name( 'show_tags_number' ); ?>" class="widefat" id="<?php echo $this->get_field_id( 'show_tags_number' ); ?>">
		        <?php for ( $i = 5; $i <= 50; $i += 5) { ?>
		        <option value="<?php echo $i; ?>" <?php if($instance['show_tags_number'] == $i){ echo "selected='selected'";} ?>><?php echo $i; ?></option>
		        <?php } ?>
		    </select>
		</p>		
		<?php
	}
}


/**************************************/
//	Register Widget & equeue JS
/**************************************/

function register_pi_tabs_widget() {
	register_widget('Pi_Tabs_Widget');
}
add_action('widgets_init', 'register_pi_tabs_widget', 1);
?>