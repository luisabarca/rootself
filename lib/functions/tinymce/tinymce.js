function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function piShortcodesSubmit(type) {	
	var tagtext;	
	var shortcode_id = null;
	if( type == 'icons' ){
		shortcode_id = 'icons';
	}else{
		if( type == 'sliders' ){
			shortcode_id = 'sliders';
		}else{
			shortcode_id = jQuery('#shortcode_'+type).val();
		}
	}
	switch( shortcode_id ){
		case 'icons':
			tagtext=" [icon type=\"" + jQuery('#shortcode_icons').val() + "\" color=\"dark\" bgcolor=\"#6e99b9\"] [h4]SAMPLE TITLE[/h4] Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.[/icon] ";
			break;
		case 'sliders':
			tagtext = " [slider name=\"" + jQuery('#shortcode_sliders').val() + "\" width=\"600\"] ";
			break;
		case 'tabs':
			tagtext = " ["+ shortcode_id + "] [tab title=\"Tab 1 Title\"] Tab 1 Content [/tab] [tab title=\"Tab 2 Title\"] Tab 2 Content [/tab] [tab title=\"Tab 3 Title\"] Tab 3 Content [/tab] [/" + shortcode_id + "] ";
			break;
		case "toggle":
			tagtext = " ["+ shortcode_id + " title=\"Toggle Title\"]Toggle content here[/" + shortcode_id + "] ";
			break;
		case 'color':
			tagtext = " ["+ shortcode_id + " hex=\"#8d7825\"]Your content here[/" + shortcode_id + "] ";
			break;
		case 'divider':
			tagtext = " ["+ shortcode_id + "] ";
			break;
		case 'space':
			tagtext = " ["+ shortcode_id + " height=\"20\"] ";
			break;
		case 'testimonials':
			tagtext = " ["+ shortcode_id + "] [testimonial author=\"Author Name\"]Testimonial Content[/testimonial] [testimonial author=\"Author Name\"]Testimonial Content[/testimonial] [/" + shortcode_id + "] ";
		break;
		case 'testimonials_slider':
			tagtext = " ["+ shortcode_id + " id=\"unique slider name\" pause_time=\"3000\"] [testimonial author=\"Author Name\"]Testimonial Content[/testimonial] [testimonial author=\"Author Name\"]Testimonial Content[/testimonial] [/" + shortcode_id + "] ";
		break;
		case 'call_to_action':
			tagtext = " ["+ shortcode_id + " title=\"Call to action title\" url=\"http://sample.com\" alt=\"Button text\"]Call to action content here[/" + shortcode_id + "] ";
		break;
		case 'posts':
			tagtext = " ["+ shortcode_id + " num_posts=\"3\" num_words=\"20\" show_thumb=\"yes\" thumb_width=\"150\" thumb_height=\"120\" ] ";
		break;
		case 'portfolio':
			tagtext = " ["+ shortcode_id + " posts_id=\"1,5,9\" thumb_width=\"150\" thumb_height=\"120\" ] ";
		break;
		case 'image':
			tagtext = " ["+ shortcode_id + " src=\"\" align=\"center\" alt=\"image\" width=\"590\" height=\"250\" caption=\"Image caption\"] ";
			break;
		case 'vimeo':
			tagtext = " ["+ shortcode_id + " id=\"36979569\" width=\"590\" height=\"350\" align=\"center\" caption=\"Video caption\"] ";
			break;
		case 'youtube':
			tagtext = " ["+ shortcode_id + " id=\"VIXLRI95MHs\" width=\"590\" height=\"350\" align=\"center\" caption=\"Video caption\"] ";
			break;
		case 'image_lightbox':
			tagtext = " ["+ shortcode_id + " url=\"Image URL\" align=\"center\" width=\"590\" height=\"250\" caption=\"Image caption\"] ";
			break;
		case 'price_table_2':
				tagtext = " [price_table columns=\"2\"] [table_column title=\"Column Title\" price=\"$49\" featured=\"no\"] [list_check] [li type=\"check\"]List Item 1[/li] [li type=\"check\"]List Item 2[/li] [li type=\"check\"]List Item 3[/li] [/list_check] [button url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/button] [/table_column] [table_column title=\"Column Title\" price=\"$89\" featured=\"yes\"] [list_check] [li type=\"check\"]List Item 1[/li] [li type=\"check\"]List Item 2[/li] [li type=\"check\"]List Item 3[/li] [/list_check] [button url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/button] [/table_column] [/price_table] ";
			break;
		case 'price_table_3':
				tagtext = " [price_table columns=\"3\"] [table_column title=\"Column Title\" price=\"$49\" featured=\"no\"] [list_check] [li type=\"check\"]List Item 1[/li] [li type=\"check\"]List Item 2[/li] [li type=\"check\"]List Item 3[/li] [/list_check] [button url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/button] [/table_column] [table_column title=\"Column Title\" price=\"$89\" featured=\"yes\"] [list_check] [li type=\"check\"]List Item 1[/li] [li type=\"check\"]List Item 2[/li] [li type=\"check\"]List Item 3[/li] [/list_check] [button url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/button] [/table_column] [table_column title=\"Column Title\" price=\"$129\" featured=\"no\"] [list_check] [li type=\"check\"]List Item 1[/li] [li type=\"check\"]List Item 2[/li] [li type=\"check\"]List Item 3[/li] [/list_check] [button url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/button] [/table_column] [/price_table] ";
			break;
		case 'price_table_4':
				tagtext = " [price_table columns=\"4\"] [table_column title=\"Column Title\" price=\"$49\" featured=\"no\"] [list_check] [li type=\"check\"]List Item 1[/li] [li type=\"check\"]List Item 2[/li] [li type=\"check\"]List Item 3[/li] [/list_check] [button url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/button] [/table_column] [table_column title=\"Column Title\" price=\"$89\" featured=\"yes\"] [list_check] [li type=\"check\"]List Item 1[/li] [li type=\"check\"]List Item 2[/li] [li type=\"check\"]List Item 3[/li] [/list_check] [button url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/button] [/table_column] [table_column title=\"Column Title\" price=\"$129\" featured=\"no\"] [list_check] [li type=\"check\"]List Item 1[/li] [li type=\"check\"]List Item 2[/li] [li type=\"check\"]List Item 3[/li] [/list_check] [button url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/button] [/table_column] [table_column title=\"Column Title\" price=\"$149\" featured=\"no\"] [list_check] [li type=\"check\"]List Item 1[/li] [li type=\"check\"]List Item 2[/li] [li type=\"check\"]List Item 3[/li] [/list_check] [button url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/button] [/table_column] [/price_table] ";
			break;
		case 'list_ordered':
		case 'list_circle':
		case 'list_square':
		case 'list_check':
		case 'list_delete':
		case 'list_warning':
			var list_type = shortcode_id.split('_')[1];
			tagtext = " [" + shortcode_id + "] [li type=\"" + list_type + "\"]List Item 1[/li] [li type=\"" + list_type + "\"]List Item 2[/li] [li type=\"" + list_type + "\"]List Item 3[/li] [/" + shortcode_id + "] ";	
			break;
		case 'button':
		case 'button_brown':
		case 'button_orange':
		case 'button_blue':
		case 'button_green':
		case 'button_dark':
		case 'button_yellow':
			tagtext = " [" + shortcode_id + " url=\"http://www.sample.com\" target=\"_blank\" float=\"right\"]Button Content[/" + shortcode_id + "] ";
			break;
		default:
			tagtext=" [" + shortcode_id + "]Your content here[/" + shortcode_id + "] ";
			break;
	}
	if(window.tinyMCE) {
		//TODO: For QTranslate we should use here 'qtrans_textarea_content' instead 'content'
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		//Peforms a clean up of the current editor HTML. 
		//tinyMCEPopup.editor.execCommand('mceCleanup');
		//Repaints the editor. Sometimes the browser has graphic glitches. 
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}