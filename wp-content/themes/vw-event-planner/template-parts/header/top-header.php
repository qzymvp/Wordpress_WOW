<?php
/**
 * The template part for top header
 *
 * @package VW Event Planner 
 * @subpackage vw_event_planner
 * @since VW Event Planner 1.0
 */
?>
<?php if( get_theme_mod('vw_event_planner_topbar_hide_show') != ''){ ?>
  <div id="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-3">
          <?php if( get_theme_mod( 'vw_event_planner_call_text') != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('vw_event_planner_phone_no_icon','fas fa-phone')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_event_planner_call_text',''));?></span>
          <?php }?>
        </div>      
        <div class="col-lg-3 col-md-3">
          <?php if( get_theme_mod( 'vw_event_planner_email_text') != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('vw_event_planner_email_icon','far fa-envelope')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_event_planner_email_text',''));?></span>
          <?php }?>
        </div>
        <div class="col-lg-4 col-md-3">
          <?php if( get_theme_mod( 'vw_event_planner_timming_text') != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('vw_event_planner_time_icon','far fa-clock')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_event_planner_timming_text',''));?></span>
          <?php }?>
        </div>
        <div class="col-lg-3 col-md-3">
          <?php dynamic_sidebar('social-links'); ?>
        </div>
      </div>
    </div>
  </div>
<?php }?>