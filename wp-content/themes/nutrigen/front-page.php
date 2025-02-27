<?php
/**
 *
 * @package Nutrigen
 */

get_header(); 

            
if (!is_home() && is_front_page()) {
	$hideslide = get_theme_mod('hide_slider', '1');
	 if($hideslide == ''){   
$pages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $pages[] = $mod;
    }	
} 
if( !empty($pages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $pages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $nutrigen_slideno[] = $i;
          $nutrigen_slidetitle[] = get_the_title();
		  $nutrigen_slidedesc[] = get_the_excerpt();
          $nutrigen_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $nutrigen_slideno as $nutrigen_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $nutrigen_sln ); ?>" class="nivo-html-caption">
      <div class="top-bar">
        <h2><a href="<?php echo esc_url($nutrigen_slidelink[$k] ); ?>"><?php echo esc_html($nutrigen_slidetitle[$k] ); ?></a></h2>
        <p><?php echo esc_html($nutrigen_slidedesc[$k] ); ?></p>
        <div class="clear"></div>
        <a class="button" href="<?php echo esc_url($nutrigen_slidelink[$k] ); ?>">
          <?php echo esc_html(get_theme_mod('slide_text',__('Read More','nutrigen')));?>
          </a>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 
?>

  <div class="main-container">
                       <?php $hidebox = get_theme_mod('hide_section', '1'); ?>  
             <?php if($hidebox  == '') { ?>
              <?php if(get_theme_mod('page-setting1',true) != '') { ?>  
             <section>
<div class="container">
		<div class="home-section">
         <?php if(get_theme_mod('page-setting1') != '') { ?>
         	<?php $page_query = new WP_Query(array('page_id' => get_theme_mod('page-setting1'))); ?>
         		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                          <div class="section-box">
                          		<div class="sec-left">
                                	<h2 class="section_title"><?php the_title(); ?></h2>
										<?php the_excerpt(); ?>
                                        <a class="read" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','nutrigen'); ?></a>
                                </div><!-- sec-left -->
                                <div class="sec-right">
                                		<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                                </div><!-- sec-right --><div class="clear"></div>
                </div><!-- sec-box -->
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php } ?>
					<div class="clear"></div>
                    </div><!-- home-section -->
    </div><!-- container-->
</section>
            <?php } } ?>
                                     
       <div class="content-area">
        <div class="middle-align content_sidebar">
            <div class="site-main" id="sitemain">
				<?php
                if ( have_posts() ) :
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        /*
                         * Include the post format-specific template for the content. If you want to
                         * use this in a child theme, then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                        get_template_part( 'content-page', get_post_format() );
						
                    endwhile;
                    // Previous/next post navigation.
                    the_posts_pagination();
					wp_reset_postdata();
                
                else :
                    // If no content, include the "No posts found" template.
                     get_template_part( 'no-results' );
                
                endif;
                ?>
            </div>
            <?php get_sidebar();?>
            <div class="clear"></div>
        </div>
    </div>
<?php get_footer(); ?>