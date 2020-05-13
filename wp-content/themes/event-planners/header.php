<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Event Planners
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--HEADER STARTS-->
<?php 
	$contact_no = get_theme_mod('contact_no'); 
	$contact_mail = get_theme_mod('contact_mail');
	$fb_link = get_theme_mod('fb_link'); 
	$twitt_link = get_theme_mod('twitt_link');
	$gplus_link = get_theme_mod('gplus_link');
	$linked_link = get_theme_mod('linked_link');
	$hidetopbar = get_theme_mod('hide_header_topbar', 1);
if( $hidetopbar == '') { ?>
<div class="head-info-area">
<div class="center">
<div class="left">
	        <?php if(!empty($contact_no)){?>
		 <span class="phntp">
          <span class="phoneno"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-phone.png" alt="" /> 
          <?php echo esc_html($contact_no); ?></span>
        </span>
        <?php } 
		if(!empty($contact_mail)){?>     
        <span class="emltp">
        <a href="mailto:<?php echo esc_attr( antispambot(sanitize_email( $contact_mail ) )); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/icon-email.png" alt="" /><?php echo esc_html( antispambot( $contact_mail ) ); ?></a></span>
        <?php } ?> 
</div> 
		<div class="right"><div class="social-icons">
		<?php 
		if (!empty($fb_link)) { ?>
        <a title="<?php echo esc_attr__('facebook','event-planners'); ?>" class="fb" target="_blank" href="<?php echo esc_url($fb_link); ?>"></a> 
        <?php } 		
		if (!empty($twitt_link)) { ?>
        <a title="<?php echo esc_attr__('twitter','event-planners'); ?>" class="tw" target="_blank" href="<?php echo esc_url($twitt_link); ?>"></a>
        <?php } 
		if (!empty($gplus_link)) { ?>
        <a title="<?php echo esc_attr__('google-plus','event-planners'); ?>" class="gp" target="_blank" href="<?php echo esc_url($gplus_link); ?>"></a>
        <?php } 
		 if (!empty($linked_link)) { ?> 
        <a title="<?php echo esc_attr__('linkedin','event-planners'); ?>" class="in" target="_blank" href="<?php echo esc_url($linked_link); ?>"></a>
        <?php } ?>                   
      </div>
</div>
<div class="clear"></div>                
</div>
</div>
<?php } ?>
<!--HEADER ENDS-->
<div class="header">
  <div class="container">
    <div class="logo">
		<?php event_planners_the_custom_logo(); ?>
        <div class="clear"></div>
		<?php	
        $description = get_bloginfo( 'description', 'display' );
        ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
        <?php if ( $description || is_customize_preview() ) :?>
        <p class="site-description"><?php echo esc_html($description); ?></p>                          
        <?php endif; ?>
        </a>
    </div>
         <div class="toggle"><a class="toggleMenu" href="#" style="display:none;"><?php esc_attr_e('Menu','event-planners'); ?></a></div> 
        <div class="sitenav">
          <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>         
        </div><!-- .sitenav--> 
        <div class="clear"></div> 
  </div> <!-- container -->
</div><!--.header -->