			<?php if( of_get_option('enable_social') ){ ?>
				
				<!-- BEGIN #footer-social-area -->
				<div id="footer-social-area">
					
					<!-- BEGIN .center-wrap -->
					<div class="center-wrap clearfix">
				
						<h3 class="social-foo-call"><?php echo of_get_option('social_footer_call_to_action'); ?></h3>
				
						<?php if( of_get_option('social_footer_style') == 'call' && pi_get_social_profiles() != null ) : ?>
							
							<ul id="footer-social-profiles" class="social-profiles <?php echo of_get_option('social_footer_color'); ?>">
									
								<?php $social_profiles = pi_get_social_profiles(); ?>
								<?php foreach( $social_profiles as $social ){ ?>
									<li>
										<a href="<?php echo of_get_option($social); ?>" class="social-icon <?php echo $social; ?>" title="<?php echo of_get_option($social . "_caption"); ?>"><?php echo of_get_option($social . "_caption"); ?></a>
										<h4><a title="<?php echo of_get_option($social . "_caption"); ?>" href="<?php echo of_get_option($social); ?>"><?php echo of_get_option($social . "_caption"); ?></a></h4>
									</li>
								<?php } ?>
										
							</ul>
														
						<?php elseif( pi_get_social_profiles() != null ) : ?>
														
							<ul id="footer-social-profiles-mini" class="social-profiles <?php echo of_get_option('social_footer_color'); ?>">
									
								<?php $social_profiles = pi_get_social_profiles(); ?>
								<?php foreach( $social_profiles as $social ){ ?>
									<li>
										<a href="<?php echo of_get_option($social); ?>" class="social-icon <?php echo $social; ?>" title="<?php echo of_get_option($social . "_caption"); ?>"><?php echo of_get_option($social . "_caption"); ?></a>
									</li>
								<?php } ?>
										
							</ul>
							
						<?php endif; ?>	
					
					<!-- END .center-wrap -->	
					</div>
				
				<!-- END #footer-social-area -->
				</div>
							
			<?php } ?>
			
			<!-- BEGIN #footer -->
			<div id="footer">
					
				<?php if( of_get_option('enable_footer_widgets') ) { ?>
						
					<!-- BEGIN .center-wrap -->
					<div id="widgets-wrap" class="center-wrap clearfix <?php echo of_get_option('footer_layout'); ?>">
						
						<?php for( $i = 1; $i <= pi_get_footer_columns_number(); $i++ ) : ?>
						
							<div class="widget-wrap <?php echo "column-$i"; ?> clearfix <?php if($i == 1) echo "margin-left-none"; elseif($i == pi_get_footer_columns_number()) echo "margin-right-none" ?>">
								<!-- Widget Area - Footer-->
								<?php switch($i){
									case 1:
								 		if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Widget Area: First') );
								 		break;
									case 2:
										if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Widget Area: Second') );
										break;
									case 3:
										if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Widget Area: Third') );
										break;
									case 4:
										if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Footer Widget Area: Fourth') ); 
										break;
								} ?> 		
							</div>
						
						<?php endfor; ?>	
							
					<!-- END #widgets-wrap .center-wrap -->	
					</div>
					
				<?php } ?>
			
				<!-- BEGIN .center-wrap -->
				<div id="credits-wrap" class="center-wrap clearfix">
				
					<?php if( of_get_option('copyright') ) : ?>
						
						<div id="copy" class="clearfix">
							<p><?php echo of_get_option('copyright'); ?></p>
						</div>
						
					<?php endif; ?>	
					
					<?php if( of_get_option('powered_wordpress') || of_get_option('developer_credits') ) : ?>
						
						<div id="credits" class="clearfix">
							<p>
								<?php if( of_get_option('powered_wordpress') ) : 
									_e('Proudly powered by', 'theme_textdomain'); ?> 
									<a href="http://wordpress.org/">WordPress</a>. 
								<?php endif; ?>
								<?php if( of_get_option('developer_credits') ) : ?>
									<a href="http://marcos.villauriz.com">Yourself Theme</a> by <a href="http://marcos.villauriz.com">Marcos Fdez Villauriz</a>.
								<?php endif; ?>
							</p>
						</div>
						
					<?php endif; ?>	
					
				<!-- END .center-wrap -->
				</div>
					
			<!-- END #footer -->
			</div>			
				
		<!-- END #container -->	
		</div>
		
		<!-- Theme Hook -->
		<?php wp_footer(); ?>
		
	<!-- END body -->
	</body>

<!--END html  -->	
</html>