<?php

/*******************************************************************/
//						SHORTCODES
/*******************************************************************/

/* columns */
function pi_column_one_half($atts, $content=null){
	return '<div class="column one_half">'.do_shortcode($content).'</div>';
}
add_shortcode('one_half', 'pi_column_one_half');

function pi_column_one_half_last($atts, $content=null){
	return '<div class="column one_half last">'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('one_half_last', 'pi_column_one_half_last');


function pi_column_one_third($atts, $content=null){
	return '<div class="column one_third">'.do_shortcode($content).'</div>';
}
add_shortcode('one_third', 'pi_column_one_third');

function pi_column_one_third_last($atts, $content=null){
	return '<div class="column one_third last">'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('one_third_last', 'pi_column_one_third_last');

function pi_column_two_third($atts, $content=null){
	return '<div class="column two_third">'.do_shortcode($content).'</div>';
}
add_shortcode('two_third', 'pi_column_two_third');

function pi_column_two_third_last($atts, $content=null){
	return '<div class="column two_third last">'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('two_third_last', 'pi_column_two_third_last');


function pi_column_one_fourth($atts, $content=null){
	return '<div class="column one_fourth">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fourth', 'pi_column_one_fourth');

function pi_column_one_fourth_last($atts, $content=null){
	return '<div class="column one_fourth last">'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('one_fourth_last', 'pi_column_one_fourth_last');

function pi_column_three_fourth($atts, $content=null){
	return '<div class="column three_fourth">'.do_shortcode($content).'</div>';
}
add_shortcode('three_fourth', 'pi_column_three_fourth');

function pi_column_three_fourth_last($atts, $content=null){
	return '<div class="column three_fourth last">'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('three_fourth_last', 'pi_column_three_fourth_last');


function pi_column_one_fifth($atts, $content=null){
	return '<div class="column one_fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('one_fifth', 'pi_column_one_fifth');

function pi_column_one_fifth_last($atts, $content=null){
	return '<div class="column one_fifth last">'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('one_fifth_last', 'pi_column_one_fifth_last');

function pi_column_two_fifth($atts, $content=null){
	return '<div class="column two_fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('two_fifth', 'pi_column_two_fifth');

function pi_column_two_fifth_last($atts, $content=null){
	return '<div class="column two_fifth last">'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('two_fifth_last', 'pi_column_two_fifth_last');

function pi_column_three_fifth($atts, $content=null){
	return '<div class="column three_fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('three_fifth', 'pi_column_three_fifth');

function pi_column_three_fifth_last($atts, $content=null){
	return '<div class="column three_fifth last">'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('three_fifth_last', 'pi_column_three_fifth_last');

function pi_column_four_fifth($atts, $content=null){
	return '<div class="column four_fifth">'.do_shortcode($content).'</div>';
}
add_shortcode('four_fifth', 'pi_column_four_fifth');

function pi_column_four_fifth_last($atts, $content=null){
	return '<div class="column four_fifth last">'.do_shortcode($content).'</div><div class="clear"></div>';
}
add_shortcode('four_fifth_last', 'pi_column_four_fifth_last');

/* blockquote */

function pi_typo_blockquote($atts, $content=null){
	return '<blockquote><p>'.do_shortcode($content).'</p></blockquote>';
}
add_shortcode('blockquote', 'pi_typo_blockquote');

function pi_typo_pull_right($atts, $content=null){
	return '<span class="pull right">'.do_shortcode($content).'</span>';
}
add_shortcode('pull_quote_right', 'pi_typo_pull_right');

function pi_typo_pull_left($atts, $content=null){
	return '<span class="pull left">'.do_shortcode($content).'</span>';
}
add_shortcode('pull_quote_left', 'pi_typo_pull_left');

/* note */
function pi_typo_note( $atts, $content = null ) {
	return '<div class="note"><p>'.do_shortcode($content).'</p></div>';
}
add_shortcode('note', 'pi_typo_note');

/* highlight */
function pi_typo_highlight($atts, $content=null){
	return '<span class="highlight">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight', 'pi_typo_highlight');

/* dropcap */
function pi_typo_dropcap($atts, $content=null){
	return '<span class="dropcap">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap', 'pi_typo_dropcap');

/* color */
function pi_typo_color($atts, $content = null){
	extract( shortcode_atts( array(
	      'hex' => '#ff0000'
	      ), $atts ) );
	return '<span style="color:' . $hex . '">'.do_shortcode($content).'</span>';
}
add_shortcode('color', 'pi_typo_color');

/* heading */
function pi_typo_heading_h1($atts, $content=null){
	return '<h1>'.do_shortcode($content).'</h1>';
}
add_shortcode('h1', 'pi_typo_heading_h1');

function pi_typo_heading_h2($atts, $content=null){
	return '<h2>'.do_shortcode($content).'</h2>';
}
add_shortcode('h2', 'pi_typo_heading_h2');

function pi_typo_heading_h3($atts, $content=null){
	return '<h3>'.do_shortcode($content).'</h3>';
}
add_shortcode('h3', 'pi_typo_heading_h3');

function pi_typo_heading_h4($atts, $content=null){
	return '<h4>'.do_shortcode($content).'</h4>';
}
add_shortcode('h4', 'pi_typo_heading_h4');

function pi_typo_heading_h5($atts, $content=null){
	return '<h5>'.do_shortcode($content).'</h5>';
}
add_shortcode('h5', 'pi_typo_heading_h5');

function pi_typo_heading_h6($atts, $content=null){
	return '<h6>'.do_shortcode($content).'</h6>';
}
add_shortcode('h6', 'pi_typo_heading_h6');

/* lists */
function pi_list_item($atts, $content=null){
	extract( shortcode_atts( array(
	      'type' => 'circle',
	      ), $atts ) );
	return '<li class="'.$type.'">'.do_shortcode($content).'</li>';
}
add_shortcode('li', 'pi_list_item');

function pi_typo_list_ordered( $atts, $content = null ) {
	return '<ol>'.do_shortcode($content).'</ol>';	
}
add_shortcode('list_ordered', 'pi_typo_list_ordered');

function pi_typo_list_square( $atts, $content = null ) {
	return '<ul class="list clasic square">'.do_shortcode($content).'</ul>';	
}
add_shortcode('list_square', 'pi_typo_list_square');

function pi_typo_list_circle( $atts, $content = null ) {
	return '<ul class="list clasic circle">'.do_shortcode($content).'</ul>';	
}
add_shortcode('list_circle', 'pi_typo_list_circle');

function pi_typo_list_check( $atts, $content = null ) {
	return '<ul class="list check">'.do_shortcode($content).'</ul>';	
}
add_shortcode('list_check', 'pi_typo_list_check');

function pi_typo_list_delete( $atts, $content = null ) {
	return '<ul class="list delete">'.do_shortcode($content).'</ul>';	
}
add_shortcode('list_delete', 'pi_typo_list_delete');

function pi_typo_list_warning( $atts, $content = null ) {
	return '<ul class="list warning">'.do_shortcode($content).'</ul>';	
}
add_shortcode('list_warning', 'pi_typo_list_warning');

/* buttons */
function pi_button_default($atts, $content = null){
	extract( shortcode_atts( array(
	      'url' => '#',
	      'target' => '_self',
	      'position' => 'left',
	      ), $atts ) );
	return '<a href="'.$url.'" target="'.$target.'" class="btn grey '.$position.'"><span>'.do_shortcode($content).'</span></a>';
}
add_shortcode('button', 'pi_button_default');

function pi_button_brown($atts, $content = null){
	extract( shortcode_atts( array(
	      'url' => '#',
	      'target' => '_self',
	      'position' => 'left',
	      ), $atts ) );
	return '<a href="'.$url.'" target="'.$target.'" class="btn brown '.$position.'"><span>'.do_shortcode($content).'</span></a>';
}
add_shortcode('button_brown', 'pi_button_brown');

function pi_button_orange($atts, $content = null){
	extract( shortcode_atts( array(
	      'url' => '#',
	      'target' => '_self',
	      'position' => 'left',
	      ), $atts ) );
	return '<a href="'.$url.'" target="'.$target.'" class="btn orange '.$position.'"><span>'.do_shortcode($content).'</span></a>';
}
add_shortcode('button_orange', 'pi_button_orange');

function pi_button_blue($atts, $content = null){
	extract( shortcode_atts( array(
	      'url' => '#',
	      'target' => '_self',
	      'position' => 'left',
	      ), $atts ) );
	return '<a href="'.$url.'" target="'.$target.'" class="btn blue '.$position.'"><span>'.do_shortcode($content).'</span></a>';
}
add_shortcode('button_blue', 'pi_button_blue');

function pi_button_green($atts, $content = null){
	extract( shortcode_atts( array(
	      'url' => '#',
	      'target' => '_self',
	      'position' => 'left',
	      ), $atts ) );
	return '<a href="'.$url.'" target="'.$target.'" class="btn green '.$position.'"><span>'.do_shortcode($content).'</span></a>';
}
add_shortcode('button_green', 'pi_button_green');

function pi_button_dark($atts, $content = null){
	extract( shortcode_atts( array(
	      'url' => '#',
	      'target' => '_self',
	      'position' => 'left',
	      ), $atts ) );
	return '<a href="'.$url.'" target="'.$target.'" class="btn dark '.$position.'"><span>'.do_shortcode($content).'</span></a>';
}
add_shortcode('button_dark', 'pi_button_dark');

function pi_button_yellow($atts, $content = null){
	extract( shortcode_atts( array(
	      'url' => '#',
	      'target' => '_self',
	      'position' => 'left',
	      ), $atts ) );
	return '<a href="'.$url.'" target="'.$target.'" class="btn yellow '.$position.'"><span>'.do_shortcode($content).'</span></a>';
}
add_shortcode('button_yellow', 'pi_button_yellow');

/* Icons */
function pi_icon($atts, $content = null) {
	extract(shortcode_atts(array(
		"color" => 'dark',
		"bgcolor" => '#6e99b9',
		"type" => ''
	), $atts));
	$type =  preg_replace('/\W/', '-', strtolower( $type ) );
	return '<div class="icons"><span class="icon ' . $color . ' '.$type.'" style="background-color: ' . $bgcolor . ';"></span><div class="icon-content">'.do_shortcode($content).'</div></div>';
}
add_shortcode('icon', 'pi_icon');  

/* Sliders */
function pi_slider($atts, $content = null) {
	extract(shortcode_atts(array(
		"name" => "",
		"width" => 600
	), $atts));
	$sliders = of_get_option('slider_generator');
	$slider = $sliders[$name];
	if( empty( $slider ) ){
		return '<p>Sorry but this slider no exist!</p>';
	}else{
		do_action('pi_shortcode_slider', $name);
		return pi_get_slider( $name, $width ) ;
	}
}
add_shortcode('slider', 'pi_slider'); 

/* Image */
function pi_media_image($atts, $content = null){
	extract( shortcode_atts( array(
	      'src' => '',
	      'align' => 'center',
	      'alt' => 'image',
	      'width' => 590,
	      'height' => 350,
	      'caption' => '',
	      ), $atts ) );
	if( $width == "" && $height == "" ){
		$return = '<div class="align' . $align . '"><img src="'.$src.'" class="wp-caption" alt="' . $alt . '">';
		if( $caption != "" )
			$return .= '<p class="wp-caption-text">' . $caption . '</p>';
		return $return .= '</div>';
	}else{
		$image = vt_resize( '', $src , $width, $height, true );
		$return = '<div class="align' . $align . '"><img src="' . $image['url'] . '" class="wp-caption" width="' . $image['width'] . '" height="' .$image['height'] . '" alt="' . $alt . '" />';
		if( $caption != "" )
			$return .= '<p class="wp-caption-text">' . $caption . '</p>';
		return $return .= '</div>';
	}
}
add_shortcode('image', 'pi_media_image');

/* Image Lightbox */
function pi_media_image_lightbox($atts, $content = null){
	extract( shortcode_atts( array(
	      'url' => '',
	      'width' => 590,
	      'height' => 350,
	      'align' => 'center',
	      'caption' => '',
	      ), $atts ) );	      	
	$image = vt_resize( '', $url , $width, $height, true );
	$return = '<div class="align' . $align . '"><a href="' . $url . '" rel="prettyPhoto[gallery]"><img src="' . $image['url'] . '" class="hover-opacity wp-caption" width="' . $image['width'] . '" height="' .$image['height'] . '" alt="photo lightbox" /></a>';
	if( $caption != "" )
		$return .= '<p class="wp-caption-text">' . $caption . '</p>';
	return $return .= '</div>';
}
add_shortcode('image_lightbox', 'pi_media_image_lightbox');

/* Vimeo */
function pi_media_vimeo($atts, $content = null){
	extract( shortcode_atts( array(
	      'id' => '',
	      'width' => 590,
	      'height' => 350,
	      'align' => 'center',
	      'caption' => '',
	      ), $atts ) );
	$return = '<div class="media-video align' . $align . '"><iframe width="'.$width.'" height="'.$height.'" src="http://player.vimeo.com/video/'.$id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0"></iframe>';
	if( $caption != '' )
		$return .= '<p class="wp-caption-text">' . $caption . '</p>';
	return $return .= '</div>';
}
add_shortcode('vimeo', 'pi_media_vimeo');

/* YouTube */
function pi_media_youtube($atts, $content = null){
	extract( shortcode_atts( array(
	      'id' => '',
	      'width' => 590,
	      'height' => 350,
	      'align' => 'center',
	      'caption' => '',
	      ), $atts ) );
	$return = '<div class="media-video align' . $align . '"><iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'" frameborder="0"></iframe>';
	if( $caption != '' )
		$return .= '<p class="wp-caption-text">' . $caption . '</p>';
	return $return .= '</div>';
}
add_shortcode('youtube', 'pi_media_youtube');

/* Tabs */
$GLOBALS['tabs_enable'] = false;
function pi_mix_tabs( $atts, $content ){
	$GLOBALS['tabs_enable'] = true; 
	$GLOBALS['tab_count'] = 0;
	$i = 0;
	do_shortcode( $content );
	if( is_array( $GLOBALS['tabs'] ) ){
		foreach( $GLOBALS['tabs'] as $tab ){
			$count = $i++;
			$pre = str_replace (" ", "", $tab['title']);
			$tabs[] = '<li><a href="#'.$pre.'tab'.$count.'">'.$tab['title'].'</a></li>';
			$panes[] = '<div id="'.$pre.'tab'.$count.'" class="tabdiv"><p>'.$tab['content'].'</p></div>';
		}
		$return = "\n".'<!-- tabs --><div class="tabs start-tabs"><ul class="tabnav">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab content -->'.implode( "\n", $panes ).'</div>'."\n";
		unset($GLOBALS['tabs']);
	}
	return $return;
}
add_shortcode( 'tabs', 'pi_mix_tabs' );

function pi_tab( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Tab %d'
	), $atts));
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );
	$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'pi_tab' );

function pi_load_tabs_ui(){
	if( $GLOBALS['tabs_enable'] ){ ?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery(".tabs").tabs();
				jQuery(".start-tabs").show();
			});	
		</script>
	<?php wp_enqueue_script('jquery-ui');
	}
}
add_action('wp_footer', 'pi_load_tabs_ui');

/* Toggle */
function pi_mix_toggle($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => ''
	), $atts));
	return '<div class="toggle-container"><span class="toggle-icon toggle"></span><h4>' . $title . '</h4><div class="toggle-content"><p>'.do_shortcode($content).'</p></div></div>';
}
add_shortcode('toggle', 'pi_mix_toggle'); 

/* Testimonials */
function pi_mix_testimonials($atts, $content = null){
	return '<ul class="testimonials">' . do_shortcode($content) . '</ul>';
}
add_shortcode('testimonials', 'pi_mix_testimonials');

function pi_mix_testimonials_with_slider($atts, $content = null){
	extract( shortcode_atts( array(
		  'id' => 'testimonials slider',
	      'pause_time' => 3000,
	      ), $atts ) );
	global $shortcode_sliders;
	$slider_id = preg_replace('/\W/', '_', strtolower( $id ) );
	$opts = array( 'id' => $slider_id, 'pause_time' => $pause_time );
	$shortcode_sliders['cycle-testimonials'] = true;
	do_action('pi_testimonials_slider', $opts);
	return '<ul id="' . $slider_id . '" class="testimonials cycle-slider clearfix">' . do_shortcode($content) . '</ul>';
}
add_shortcode('testimonials_slider', 'pi_mix_testimonials_with_slider');

function pi_testimonial($atts, $content = null){
	extract( shortcode_atts( array(
	      'author' => '',
	      ), $atts ) );
	if( $author != '' ){
		return '<li class="clearfix tbload">' . do_shortcode($content) . '<span class="testimonial_author">' . $author . '</span></li>';
	}else{
		return '<li class="clearfix tbload">' . do_shortcode($content) . '</li>';	
	}
}
add_shortcode('testimonial', 'pi_testimonial');

function pi_testimonials_load_slider($cycle_opts){ ?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
		    jQuery('#<?php echo $cycle_opts["id"]; ?>')
		     .after('<div id="<?php echo $cycle_opts["id"]; ?>-cycle-nav" class="cycle-nav testi-nav clearfix"><div class="paged"></div></div>')
		     .cycle({
				fx: 'scrollLeft',
				after: onAfter,
				<?php if( $cycle_opts["pause_time"] != 0 ) echo "timeout:" . $cycle_opts["pause_time"] . ","; 
				else echo "timeout:0,"; ?> 
				pause: true,
				pager: '#<?php echo $cycle_opts["id"]; ?>-cycle-nav .paged',
				containerResize: 0 
			});
			function onAfter(curr, next, opts, fwd) {
				var $ht = jQuery(this).height() + 20;
			 	//set the container's height to that of the current slide
			 	jQuery(this).parent().animate({height: $ht});
			}
		});	
	</script>
<?php 
}
add_action('pi_testimonials_slider', 'pi_testimonials_load_slider');

/* Columns */
function pi_mix_price_table($atts, $content = null){
	extract( shortcode_atts( array(
		  'columns' => 3,
	      ), $atts ) );
	if( $columns == 2 || $columns == 3 || $columns == 4)	
		return '<ul class="price_table clearfix columns_' . $columns . '">' . do_shortcode($content) . '</ul>';
	else
		return '<p>Set column value between 2 and 4.</p>';
}
add_shortcode('price_table', 'pi_mix_price_table');

function pi_table_column($atts, $content = null){
	extract( shortcode_atts( array(
		  'title' => 'Title',
		  'price' => 49,
		  'featured' => 'no',
	      ), $atts ) );
	$featured_class = '';
	if($featured == 'yes')
		$featured_class = 'featured';	
	return '<li class="table_column ' . $featured_class . '"><p class="table_price">' . $price . '</p><h3>' . $title . '</h3>' . do_shortcode($content) . '</li>';
}
add_shortcode('table_column', 'pi_table_column');
	
/* Call To Action */
function pi_mix_call_to_action($atts, $content = null){
	extract( shortcode_atts( array(
		  'title' => '',
	      'url' => '#',
	      'alt' => '',
	      ), $atts ) );
	return '<div class="call_to_action clearfix"><div class="call_content" ><h4>' . $title . '</h4><p>' . do_shortcode($content) . '</p></div><a href="'.$url.'" class="btn grey right"><span>' . $alt . '</span></a></div>';
}
add_shortcode('call_to_action', 'pi_mix_call_to_action');

/* Recent Posts */
function pi_mix_recent_posts($atts, $content = null){
	extract( shortcode_atts( array(
		  'num_posts' => 3,
		  'num_words' => 20,
	      'show_thumb' => 'no',
	      'thumb_width' => 150,
	      'thumb_height' => 120,
	      ), $atts ) );
	$show_thumb_option = null;
	if( $show_thumb == 'yes' )
		$show_thumb_option = true;
	else
		$show_thumb_option = false;
	$posts = '';
	query_posts('posts_per_page='.$num_posts);
	if(have_posts()):
		$posts .= '<div class="recent_posts clearfix">';
		while(have_posts()) : 
			the_post();
			$posts .= '<div class="post">';
				$posts .='<div class="post-content clearfix">';
					if( has_post_thumbnail() && $show_thumb_option ) :
						$image = vt_resize( get_post_thumbnail_id(),'' , $thumb_width, $thumb_height, true );
						$posts .= '<div class="post-thumb"><a href="' . get_permalink() . '" rel="bookmark" title="' . the_title('','', false) . '"><img src="' . $image['url'] .'" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="post image" /></a></div>';
					endif;
					$posts .= '<h3 class="entry-title"><a href="' . get_permalink() . '" rel="bookmark" title="' . the_title('','', false) . '">' . the_title('','', false) . '</a></h3>';
					$posts .= '<div class="entry-content">';
					$posts .= '<p>' . pi_length_by_words( get_the_excerpt(), $num_words ) . '</p>';
					$posts .= '</div>';
				$posts .= '</div>';
			$posts .= '</div>';		
		endwhile;
		$posts .= '</div>';
	endif; 
	wp_reset_query();
	return $posts;
}
add_shortcode('posts', 'pi_mix_recent_posts');

/* Recent Portfolio Posts */
function pi_mix_portfolio_posts($atts, $content = null){
	extract( shortcode_atts( array(
		  'posts_id' => '',
	      'thumb_width' => 150,
	      'thumb_height' => 120,
	      ), $atts ) );
	$array_of_ids = explode(',', $posts_id);
	$posts = '';
	$ids = array();
	foreach( $array_of_ids as $id ){ $ids[] = $id; }
	$query = new WP_Query( array( 'post_type' => 'portfolio', 'post__in' => $ids ) );
	if( $query->have_posts() ) : 
		$posts .= '<ul class="filter-posts portfolio-shortcode clearfix">';
		while ($query->have_posts()) : 
			$query->the_post();
			$video = get_post_meta( get_the_ID(), 'portfolio_video', true );
			$terms = get_the_terms( get_the_ID(), 'portfolio-category' );
			$posts .= '<li class="clearfix" style="width:' . $thumb_width . 'px">';
				$posts .= '<div class="portfolio clearfix">';
					$posts .= '<div class="post-content clearfix">';
						$posts .= '<div class="post-thumb">';
							if( $video['vimeo-youtube'] != '' || $video['embedded-code'] != '' ){
								$posts .= '<a class="screencast-play" href="' . $video . '" rel="prettyPhoto"><img class="opaque" src="' . get_template_directory_uri() . '/resources/img/screencast-play.png" alt="screencast play" /></a>';
								$posts .= pi_video_lightbox(get_the_ID(), $thumb_width, $thumb_height, false);
							}elseif( has_post_thumbnail() ){
								$image = vt_resize( get_post_thumbnail_id(),'' , $thumb_width, $thumb_height, true );
								$posts .= '<a href="' . pi_get_thumbnail_url() . '" rel="prettyPhoto[gallery]"><img src="' . $image['url'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="post image" /></a>';
							}
						$posts .= '</div>';
						$posts .= '<h4 class="entry-title"><a href="' . get_permalink() . '" rel="bookmark" title="' . the_title('', '', false) . '">' . the_title('', '', false) . '</a></h4>';
					$posts .= '</div>';
				$posts .= '</div>';
			$posts .= '</li>';
		endwhile;
		$posts .= '</ul>';
	endif;
	wp_reset_query();
	return $posts;
}
add_shortcode('portfolio', 'pi_mix_portfolio_posts');


/* Divider */
function pi_mix_divider( $atts, $content = null ) {
	return '<div class="custom-divider"></div>';
}
add_shortcode('divider', 'pi_mix_divider');

/* Divider */
function pi_mix_space( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'height' => 20,
	), $atts ) );
	return '<div style="clear:both; height:' . $height . 'px;"></div>';
}
add_shortcode('space', 'pi_mix_space');

/* Alerts */
function pi_mix_alert_red( $atts, $content = null ) {
	return '<div class="alert red"><p>'.do_shortcode($content).'</p></div>';
}
add_shortcode('alert_red', 'pi_mix_alert_red');

function pi_mix_alert_green( $atts, $content = null ) {
	return '<div class="alert green"><p>'.do_shortcode($content).'</p></div>';
}
add_shortcode('alert_green', 'pi_mix_alert_green');

function pi_mix_alert_blue( $atts, $content = null ) {
	return '<div class="alert blue"><p>'.do_shortcode($content).'</p></div>';
}
add_shortcode('alert_blue', 'pi_mix_alert_blue');

function pi_mix_alert_yellow( $atts, $content = null ) {
	return '<div class="alert yellow"><p>'.do_shortcode($content).'</p></div>';
}
add_shortcode('alert_yellow', 'pi_mix_alert_yellow');

?>