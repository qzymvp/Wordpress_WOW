<?php
//about theme info
add_action( 'admin_menu', 'event_planners_abouttheme' );
function event_planners_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'event-planners'), esc_html__('About Theme', 'event-planners'), 'edit_theme_options', 'event_planners_guide', 'event_planners_mostrar_guide');   
} 
//guidline for about theme
function event_planners_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_attr_e('Theme Information', 'event-planners'); ?>
		   </div>
          <p><?php esc_attr_e('Event Planners is a celebration, marriage, conference, grand events, bookings, parties, happenings, outreach campaigns, competition, contest, tournament, game, fixture, meetings, encounter type of website template which is responsive and Gutenberg editor friendly. It is also compatible with Elementor, Visual composer, WP Bakery page builders. On any occasion, business, incident or similar such conferences or parties with speakers, guests are organized. Can be used by community centers, event managers, wedding, engagement, naming ceremony, motivational coach. Compatible with WooCommerce, multilingual plugins, contact form plugins for call to action. Can accept donations via donation plugins, compatible with events calendar plugins as well as table plugins.','event-planners'); ?></p>
		  <a href="<?php echo esc_url(EVENT_PLANNERS_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(EVENT_PLANNERS_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_attr_e('Live Demo', 'event-planners'); ?></a> | 
				<a href="<?php echo esc_url(EVENT_PLANNERS_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_attr_e('Buy Pro', 'event-planners'); ?></a> | 
				<a href="<?php echo esc_url(EVENT_PLANNERS_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_attr_e('Documentation', 'event-planners'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(EVENT_PLANNERS_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>