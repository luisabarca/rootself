<?php
 // header
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>

	<!-- BEGIN head -->
	<head>
		
		<!-- Meta Tags -->
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="generator" content="Wordpress <?php bloginfo('version'); ?>" />
		
		<!-- Title -->
		<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		
		<!-- RSS -->
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		
		<!-- Pingback -->
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<!-- Favicon -->
		<?php if( of_get_option('favicon') ) { ?>
			<link href="<?php echo strtolower(of_get_option('favicon')); ?>" rel="shortcut icon" type="image/gif" />
		<?php } ?>
	
		<?php wp_head(); ?>		
			
	<!-- END head -->
	</head>
	
	<body <?php body_class( pi_get_custom_layout(true) ); ?>>
		
		<!-- BEGIN #container -->
		<div id="container">
		
			<!-- BEGIN #header -->
			<div id="header" class="clearfix">
			
				<!-- BEGIN .center-wrap -->
				<div class="center-wrap clearfix">
					
					<!--BEGIN #logo-->
					<div id="logo">
					
						<?php if( of_get_option('logo_settings') == "logo" ){ ?>
							<?php if( ( !is_home() && is_front_page() ) || ( is_home() && is_front_page() ) || ( is_home() && !is_front_page() ) || ( of_get_option('enable_submenu') && ( is_archive() || is_search() ) ) ){ ?>
								<h1 class="custom-h1"><?php bloginfo( 'name' ); ?></h1>	
								<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
							<?php }else{ ?>
								<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><img src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
							<?php } ?>
						<?php }else{ ?>
							<?php if( ( !is_home() && is_front_page() ) || ( is_home() && is_front_page() ) || ( is_home() && !is_front_page() ) || ( of_get_option('enable_submenu') && ( is_archive() || is_search() ) ) ){ ?>
								<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							<?php }else{ ?>
								<a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
							<?php } ?>
						<?php } ?>
					
					<!-- END #logo -->
					</div>
					
					<!--BEGIN #primary-nav-->
					<div id="primary-nav" class="clearfix">
						
						<!-- WP 3.0+ Menu -->
						<?php if (has_nav_menu('primary-menu')){ ?>
							<?php wp_nav_menu(
								array(
								'theme_location'=>'primary-menu',
								'depth'=>4,
								'menu_class' => 'sf-menu',
								'walker' => new pi_custom_nav_walker() )
							); ?>
						<?php }else{ ?>
							<!-- Default menu -->
							<ul class="sf-menu">
								<?php wp_list_pages('sort_column=menu_order&title_li=&depth=4'); ?>
							</ul>
						<?php } ?>
						
					<!-- END #primary-nav -->
					</div>
					
				<!-- END .center-wrap -->	
				</div>
				
			<!-- END #header -->
			</div>