<?php
/**
 * The template part for displaying grid post
 *
 * @package VW Event Planner
 * @subpackage vw-event-planner
 * @since VW Event Planner 1.0
 */
?>

<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="post-main-box">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail()) { 
		              the_post_thumbnail(); 
		            }
	          	?>
	        </div>
	        <h2 class="section-title"><?php the_title();?></h2>
	        <div class="new-text">
	        	<div class="entry-content">
	        		<p>
			          <?php $excerpt = get_the_excerpt(); echo esc_html( vw_event_planner_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_event_planner_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('vw_event_planner_excerpt_suffix','') ); ?>       
			        </p>
	        	</div>
	        </div>
	        <?php if( get_theme_mod('vw_event_planner_button_text','READ MORE') != ''){ ?>
		        <div class="content-bttn">
		          <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_event_planner_button_text',__('READ MORE','vw-event-planner')));?><i class="<?php echo esc_attr(get_theme_mod('vw_event_planner_blog_page_button_icon','fas fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_event_planner_button_text',__('READ MORE','vw-event-planner')));?></span></a>
		        </div>
			<?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>