<?php 
/*******************************************************************/
//					SLIDERS LAYOUT
/*******************************************************************/

function pi_get_slider($slider_name, $slider_width = false){
	global $shortcode_sliders;
	$return = '';
	$sliders = of_get_option('slider_generator');
	$slider = $sliders[$slider_name];
	$slider_id = preg_replace('/\W/', '_', strtolower( $slider_name ) );
	if( isset( $slider['slides'] ) && !empty( $slider['slides'] ) ){
		switch($slider['type']){
			/* Nivo Sldier */
			case 'nivo' :
				$shortcode_sliders['nivo'] = true; 
				if( $slider_width ){ $width = $slider_width; }else{ $width = 940; } 
				$return .= '<div id="' . $slider_id . '" class="nivo-slider" style="width:' . $width . 'px">';
					foreach($slider['slides'] as $slide):
						if( $slide['nivo_file-url'] != '' ):
							$image = vt_resize( '', $slide['nivo_file-url'], $width, $slider['settings']['nivo_height'], true ); 
							if( $slide['nivo_link'] ):
								$return .= '<a href="' . $slide['nivo_link'] . '" title="' . $slide['nivo_title'] . '"><img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' .$image['height'] . '" title="' . $slide['nivo_title'] . '" alt="slider image" /></a>';
							else:
								$return .= '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" title="' . $slide['nivo_title'] . '" alt="slider image" />';
							endif;
						endif;
					endforeach;
				$return .= '</div>';
			break;
			/* Cycle Sldier */
			case 'cycle':
				$shortcode_sliders['cycle'] = true;
				if( $slider_width ){ $width = $slider_width; }else{ $width = 940; }
				$parcial_width = round($width*0.6);
				$description_width = $width - $parcial_width - 40;
				$return .= '<div id="' . $slider_id . '" class="cycle" style="height:' . $slider['settings']['cycle_height'] . 'px; width:' . $width . 'px;">';
					foreach($slider['slides'] as $slide):
						if( !isset( $slide['cycle_layout'] ) )
							$slide['cycle_layout'] = 'layout-1col-fixed';
						if( $slide['cycle_file-url'] != '' ):
							if( $slide['cycle_layout'] == 'layout-1col-fixed' ) :
								$return .= '<div class="one-col-slide clearfix beforeload">';
								if( pi_is_video_supported( $slide['cycle_file-url'] ) ) :
									$return .= pi_embed_video('',$slide['cycle_file-url'], $width, $slider['settings']['cycle_height'], '', false);
								else:
									$image = vt_resize( '', $slide['cycle_file-url'], $width, $slider['settings']['cycle_height'], true );
									if( $slide['cycle_link'] != '' ) :
										$return .= '<a href="' . $slide['cycle_link'] . '" title="' . $slide['cycle_title'] . '"><img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" title="' . $slide['cycle_title'] . '" alt="slider image" /></a>';
									else:
										$return .= '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" title="' . $slide['cycle_title'] . '" alt="slider image" />';
									endif;
								endif;
								$return .= '</div>';
							else :
								$return .= '<div class="two-col-slide clearfix beforeload ' . $slide['cycle_layout'] . '" style="width:' . $width . 'px; height:' . $slider['settings']['cycle_height'] . 'px;">';
									$return .= '<div class="slide-media" style="width:' . $parcial_width . 'px;">';
										if( pi_is_video_supported( $slide['cycle_file-url'] ) ) :
											$return .= pi_embed_video('',$slide['cycle_file-url'], $parcial_width, $slider['settings']['cycle_height'], '', false); 
										else :	
											$image = vt_resize( '', $slide['cycle_file-url'], $parcial_width, $slider['settings']['cycle_height'], true );
											$return .= '<img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" title="' . $slide['cycle_title'] . '" alt="slider image" />';
										endif;
									$return .= '</div>';
									$return .= '<div class="slide-description" style="width:' . $description_width . 'px;">';
										if( $slide['cycle_title'] != '' && $slide['cycle_link'] != '' ) :
										    $return .= '<h2 class="slide-title"><a href="' . $slide['cycle_link'] . '" title="' . $slide['cycle_title'] . '">' . $slide['cycle_title'] . '</a></h2>';
										elseif( $slide['cycle_title'] != '' ) :
											$return .= '<h2 class="slide-title">' . $slide['cycle_title'] . '</h2>';
										endif;
									    $return .= '<p>' . $slide['cycle_description'] . '</p>';
										if( $slide['cycle_anchor'] != '' &&  $slide['cycle_link'] != '' ):
									    	$return .= '<p><a class="btn grey left" href="' . $slide['cycle_link'] . '" title="' . $slide['cycle_anchor'] . '"><span>' . $slide['cycle_anchor'] . '</span></a></p>';
										endif;
									$return .= '</div>';
								$return .= '</div>';
							endif;
						endif;
					endforeach;
				$return .= '</div>';
			break;
			/* 3D Slider */
			case 'slider3d':
				$shortcode_sliders['slider3d'] = true;
				$return .= '<div id="' . $slider_id . '" class="slider3d">';
					$return .= '<p>Put your alternative Non Flash content here.</p>';
				$return .= '</div>';
			break;			
		}
		if( is_page_template('template-home.php') ){
			if( $slider['type'] == 'slider3d' )
				$return .= '<div class="slider-divider type-3d"></div>';
			else
				$return .= '<div class="slider-divider"></div>';
		}
		return $return;
	}
	return '<p>Slider empty. Go to: Theme Options - Slider, and add slides to this slider.</p>';
}

/*******************************************************************/
//					HOME SLIDER SCRIPT
/*******************************************************************/

/* Homepage Sliders */
function pi_load_home_slider(){
	if( of_get_option('enable_homepage_slider') && of_get_option('homepage_slider') != '' && is_page_template('template-home.php') ){
		$slider_name = of_get_option('homepage_slider');
		$sliders = of_get_option('slider_generator');
		$slider = $sliders[$slider_name];
		switch($slider['type']){
			case 'nivo':
				wp_enqueue_script('nivo-slider');
			break;
			case 'cycle':
				wp_enqueue_script('cycle');
			break;
			case 'slider3d':
				wp_enqueue_script('swfobject');
			break;
		}
	}
}
add_action('wp_print_scripts', 'pi_load_home_slider');


/*******************************************************************/
//					SLIDERS LOADER
/*******************************************************************/

/* Homepage Sliders */
function pi_sliders_script($slider_name){
	$sliders = of_get_option('slider_generator');
	$slider = $sliders[$slider_name];
	$slider_id = preg_replace('/\W/', '_', strtolower( $slider_name ) );
	switch($slider['type']){
		/* Nivo Sldier */
		case 'nivo': ?>
			<script type="text/javascript">
				jQuery(window).load(function() {
					jQuery('#<?php echo $slider_id; ?>').nivoSlider({
						effect:'<?php echo $slider["settings"]["nivo_transition_effect"]; ?>', // Specify sets like: 'fold,fade,sliceDown...'
						<?php if( $slider["settings"]["nivo_pause_time"] != 0 ) echo "pauseTime:" . $slider["settings"]["nivo_pause_time"];
						else echo "manualAdvance:true"; ?>
					});
				});
			</script>
		<?php break;
		/* Cycle */
		case 'cycle': ?>
			<script type="text/javascript">
				jQuery(document).ready(function() {
				    jQuery('#<?php echo $slider_id; ?>')
				     .after('<div id="<?php echo $slider_id; ?>-cycle-nav" class="cycle-nav clearfix"><div class="paged"></div></div>')
				     .cycle({
						fx: '<?php echo $slider["settings"]["cycle_transition_effect"]; ?>',
						<?php if( $slider["settings"]["cycle_pause_time"] != 0 ) echo "timeout:" . $slider["settings"]["cycle_pause_time"] . ","; 
						else echo "timeout:0,"; ?> 
						pause: true,
						pager: '#<?php echo $slider_id; ?>-cycle-nav .paged',
						containerResize: 0 
					});
				});		
			</script>
		<?php break;
		/* 3D slider */
		case 'slider3d': 
			$slider_height = $slider["settings"]["slider3d_height"] + 60; ?>
			<script type="text/javascript">
				jQuery(document).ready(function(){
					var flashvars = {};
					flashvars.xmlSource = "<?php echo get_template_directory_uri() . '/lib/xml/piecemaker.php?slider=' . $slider_name; ?>";
					flashvars.cssSource = "<?php echo get_template_directory_uri() . '/resources/css/piecemaker.css'; ?>"
						
					var params = {};
					params.play = "true";
					params.menu = "false";
					params.wmode = "transparent";
					
					 swfobject.embedSWF('<?php echo get_template_directory_uri() . "/resources/swf/piecemaker.swf"; ?>', '<?php echo $slider_id; ?>', '<?php echo $slider["settings"]["slider3d_width"]; ?>', '<?php echo $slider_height; ?>', '10', '<?php echo get_template_directory_uri() . "/resources/swf/expressinstall.swf"; ?>', flashvars, params, null);
				});	
			</script>
		<?php break;
	}
		
} //end pi_slider_script

/*******************************************************************/
//					SLIDER HOOKS
/*******************************************************************/

global $shortcode_sliders;
$shortcode_sliders = array('nivo' => false, 'cycle' => false, 'slider3d' => false, 'cycle-testimonials' => false);

function pi_slider_script_if_active(){
	global $shortcode_sliders;
	if( $shortcode_sliders['nivo'] ){
		wp_print_scripts('nivo-slider');
	}
	if( $shortcode_sliders['cycle'] || $shortcode_sliders['cycle-testimonials'] ){
		wp_print_scripts('cycle');
	}
	if( $shortcode_sliders['slider3d'] ){
		wp_print_scripts('swfobject');
	}	
}
add_action('wp_footer', 'pi_slider_script_if_active');

function pi_load_home_slider_script(){
	if( of_get_option('enable_homepage_slider') && of_get_option('homepage_slider') != '' && is_page_template('template-home.php')  ){
		pi_sliders_script( of_get_option('homepage_slider') );
	}
}
add_action('wp_footer', 'pi_load_home_slider_script');
add_action('pi_shortcode_slider', 'pi_sliders_script');

?>