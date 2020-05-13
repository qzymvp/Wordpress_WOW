<?php
/**
 * The template part for header
 *
 * @package VW Event Planner 
 * @subpackage vw_event_planner
 * @since VW Event Planner 1.0
 */
?>

<div class="main-header <?php if( get_theme_mod( 'vw_event_planner_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
  <div class="container">
    <div class="row">      
      <div class="col-lg-3 col-md-4">
        <div class="logo">
         <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('vw_event_planner_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('vw_event_planner_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_event_planner_tagline_hide_show',true) != ''){ ?>
              <p class="site-description">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="<?php if( get_theme_mod( 'vw_event_planner_header_search',true) != '') { ?>col-lg-6 col-md-4 col-4"<?php } else { ?>col-lg-7 col-md-7"<?php } ?>">
        <?php get_template_part( 'template-parts/header/navigation' ); ?>
      </div>
      <?php if( get_theme_mod( 'vw_event_planner_header_search',true) != '') { ?>
      <div class="col-lg-1 col-md-1 col-2">
        <div class="search-box">
          <a href="#" onclick="vw_event_planner_search_open()"><span><i class="fas fa-search"></i></span></a>
        </div>
      </div>
      <?php }?>
      <div class="serach_outer">
        <div class="serach_inner">
          <?php get_search_form(); ?>
        </div>
        <a href="#main" onclick="vw_event_planner_search_close()" class="closepop"><i class="fa fa-window-close"></i></a>
      </div>
      <div class="col-lg-2 col-md-2 col-6 p-0">
        <div class="book-now">
          <?php if( get_theme_mod( 'vw_event_planner_buynow_url') != '' || (get_theme_mod( 'vw_event_planner_buynow_text') != '') ){ ?>
            <a href="<?php echo esc_url(get_theme_mod('vw_event_planner_buynow_url',''));?>"><?php echo esc_html(get_theme_mod('vw_event_planner_buynow_text',''));?><i class="<?php echo esc_attr(get_theme_mod('vw_event_planner_book_button_icon','fas fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'BOOK NOW','vw-event-planner' );?></span></a>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>