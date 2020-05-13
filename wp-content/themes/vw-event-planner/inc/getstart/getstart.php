<?php
//about theme info
add_action( 'admin_menu', 'vw_event_planner_gettingstarted' );
function vw_event_planner_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Event Planner', 'vw-event-planner'), esc_html__('About VW Event Planner', 'vw-event-planner'), 'edit_theme_options', 'vw_event_planner_guide', 'vw_event_planner_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_event_planner_admin_theme_style() {
   wp_enqueue_style( 'vw-event-planner-font', vw_event_planner_admin_font_url(), array() );
   wp_enqueue_style('vw-event-planner-custom-admin-style', get_template_directory_uri() . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-event-planner-tabs', get_template_directory_uri() . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_event_planner_admin_theme_style');

// Theme Font URL
function vw_event_planner_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Muli:300,400,600,700,800,900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function vw_event_planner_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-event-planner' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Event Planner Theme', 'vw-event-planner' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-event-planner'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Event Planner at 20% Discount','vw-event-planner'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-event-planner'); ?> ( <span><?php esc_html_e('vwpro20','vw-event-planner'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_EVENT_PLANNER_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-event-planner' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  <button class="tablinks" onclick="vw_event_planner_open_tab(event, 'theme_lite')"><?php esc_html_e( 'Getting Started', 'vw-event-planner' ); ?></button>
		  <button class="tablinks" onclick="vw_event_planner_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-event-planner' ); ?></button>
		  <button class="tablinks" onclick="vw_event_planner_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-event-planner' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="theme_lite" class="tabcontent open">
			<h3><?php esc_html_e( 'Lite Theme Information', 'vw-event-planner' ); ?></h3>
			<hr class="h3hr">
		  	<p><?php esc_html_e('VW Event Planner is a gorgeous, feature-rich and technically advanced WordPress theme for event planners. It has fresh and youthful feel to perfectly match this active profession. It is an ideal theme for event planners whether they deal at small level to organize birthday parties, anniversaries, house warming, corporate meetings and conferences or handling big events like weddings, concerts, award functions, opening ceremonies of games and events. It also suits party decorators, music bands, catering services and party wear and dress designers to showcase your best work on the online space to generate potential leads. VW Event Planner is a fully responsive, cross-browser compatible, translation ready and SEO friendly theme to make a super-efficient website that will work everywhere. It is retina ready to show sharp images; offers unlimited colours and Google web fonts to colour website with any vibrant colour that suits your brand. Social media icons are unforgettably included in the theme to help promote your services at a larger platform. As the theme offers all the features and functionality of an online store through WooCommerce integration, this event planner theme can also be used by florists and bouquet stores and gift shops; it is based on the latest WordPress version and fully customizable.','vw-event-planner'); ?></p>
		  	<div class="col-left-inner">
		  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-event-planner' ); ?></h4>
				<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-event-planner' ); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-event-planner' ); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Theme Customizer', 'vw-event-planner'); ?></h4>
				<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-event-planner'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-event-planner'); ?></a>
				</div>
				<hr>				
				<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-event-planner'); ?></h4>
				<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-event-planner'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-event-planner'); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Reviews & Testimonials', 'vw-event-planner'); ?></h4>
				<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-event-planner'); ?>  </p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-event-planner'); ?></a>
				</div>
		  		<div class="link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-event-planner' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-image"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-event-planner'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_event_planner_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-event-planner'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_event_planner_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','vw-event-planner'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_event_planner_best_services_section') ); ?>" target="_blank"><?php esc_html_e('Best Event Services','vw-event-planner'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_event_planner_content_section') ); ?>" target="_blank"><?php esc_html_e('Customize Home Page','vw-event-planner'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-event-planner'); ?></a>
							</div>
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_event_planner_left_right') ); ?>" target="_blank"><?php esc_html_e('Blog Layout','vw-event-planner'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_event_planner_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-event-planner'); ?></a>
							</div>
						</div>
					</div>
				</div>
		  	</div>
			<div class="col-right-inner">
				<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-event-planner'); ?></h3>
			  	<hr class="h3hr">
				<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-event-planner'); ?></p>
                <ul>
                	<li><?php esc_html_e('1. Create a Page to set template:  Go to ','vw-event-planner'); ?>
                  	<b><?php esc_html_e('Dashboard &gt;&gt; Pages &gt;&gt; Add New Page','vw-event-planner'); ?></b>.
                  	<p><?php esc_html_e('Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.','vw-event-planner'); ?></p></li>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p></p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-event-planner'); ?></span><?php esc_html_e(' Go to ','vw-event-planner'); ?>
				  	<b><?php esc_html_e(' Settings -&gt; Reading --&gt; Set the front page display static page to home page ','vw-event-planner'); ?></b></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with this, you can see all the demo content on front page. ','vw-event-planner'); ?></p>
                </ul>
		  	</div>
		</div>	

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-event-planner' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Event management is such an enthusiastic, colourful and active profession that you need an equally powerful and bold website that justifies your passion for your work and what better option than this event planner WordPress theme to showcase your management skills to the world. This theme has clean layout and stunning design with vibrant colours to give the feel of party and celebration to visitors and compel them to book you right away for their next event without any second thought. This event planner WordPress theme is judiciously designed with all the necessary sections so you would not need anything outside of this theme. Even if you want to add any specific functionality, you can easily do so as it gels up well with third party plugins. It is integrated with WooCommerce plugin that offers beautiful layouts to sophisticatedly display products and provide all the features and functionality necessary for an online store.','vw-event-planner'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_EVENT_PLANNER_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-event-planner'); ?></a>
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vw-event-planner'); ?></a>
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-event-planner'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-event-planner' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-event-planner'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-event-planner'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-event-planner'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-event-planner'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-event-planner'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-event-planner'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-event-planner'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-event-planner'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-event-planner'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-event-planner'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-event-planner'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'vw-event-planner'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-event-planner'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-event-planner'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-event-planner'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'vw-event-planner'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-event-planner'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'vw-event-planner'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_EVENT_PLANNER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-event-planner'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-event-planner'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-event-planner'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-event-planner'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-event-planner'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-event-planner'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-event-planner'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-event-planner'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-event-planner'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-event-planner'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-event-planner'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-event-planner'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-event-planner'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-event-planner'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-event-planner'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_EVENT_PLANNER_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-event-planner'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>