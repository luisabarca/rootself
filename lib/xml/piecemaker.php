<?php
header("Content-type: text/css");

require_once( '../../../../../wp-load.php' );

$slider_name = $_REQUEST['slider'];
$sliders = of_get_option('slider_generator');
$slider = $sliders[$slider_name];

echo '<?xml version="1.0" encoding="utf-8"?>
<Piecemaker>
	
	<Contents>';
		
		foreach( $slider['slides'] as $slide ){
			if( $slide['slider3d_file-url'] != '' ){
				switch( $slide['slider3d_file_type'] ){
					case 'image':
						$image = vt_resize( '', $slide['slider3d_file-url'], $slider["settings"]["slider3d_width"], $slider['settings']['slider3d_height'], true );
						echo '<Image Source="' . $image['url'] . '" Title="' . $slide['slider3d_title'] . '">';
							if( $slide['slider3d_description'] ) echo '<Text><p>' . $slide['slider3d_description'] . '</p></Text>';
							if( $slide['slider3d_link'] ) echo '<Hyperlink URL="' . $slide['slider3d_link'] . '" Target="_self"/>';
						echo '</Image>';
					break;
					case 'swf':
						$image = vt_resize( '', $slide['slider3d_preview-file-url'], $slider["settings"]["slider3d_width"], $slider['settings']["slider3d_height"], true );
						echo '<Flash Source="' . $slide['slider3d_file-url'] . '" Title="' . $slide['slider3d_title'] . '">';
						echo '<Image Source="' . $image['url'] . '"/>';
						echo '</Flash>';
					break;
				}
			}
		}
		
	echo '</Contents>
	
	<Settings ImageWidth="' . $slider["settings"]["slider3d_width"] . '" ImageHeight="' . $slider["settings"]["slider3d_height"] . '" LoaderColor="0x999999" InnerSideColor="0x999999" SideShadowAlpha="0.1" DropShadowAlpha="0.2" DropShadowDistance="20" DropShadowScale="0.95" DropShadowBlurX="40" DropShadowBlurY="4" MenuDistanceX="25" MenuDistanceY="40" MenuColor1="0xaaaaaa" MenuColor2="0x666666" MenuColor3="0xFFFFFF" ControlSize="50" ControlDistance="20" ControlColor1="0x222222" ControlColor2="0xFFFFFF" ControlAlpha="0.8" ControlAlphaOver="0.95" ControlsX="' . round( $slider["settings"]["slider3d_width"] / 2 ) . '" ControlsY="60&#xD;&#xA;" ControlsAlign="center" TooltipHeight="30" TooltipColor="0x222222" TooltipTextY="5" TooltipTextStyle="P-Italic" TooltipTextColor="0xFFFFFF" TooltipMarginLeft="5" TooltipMarginRight="7" TooltipTextSharpness="50" TooltipTextThickness="-100" InfoWidth="400" InfoBackground="0xFFFFFF" InfoBackgroundAlpha="0.95" InfoMargin="15" InfoSharpness="0" InfoThickness="0" Autoplay="10" FieldOfView="45">
	</Settings>
	
	<Transitions>
		<Transition Pieces="' . $slider['settings']['slider3d_piezes'] .'" Time="' . $slider['settings']['slider3d_pause_time'] . '" Transition="easeInOutCubic" Delay="0.1" DepthOffset="300" CubeDistance="50"></Transition>
	</Transitions>	
			
</Piecemaker>';
?>