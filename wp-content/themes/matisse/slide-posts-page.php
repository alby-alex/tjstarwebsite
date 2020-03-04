<?php /**
 * Template Name: Slideshow with posts
 *  */

?>
<?php get_header();?>
<div id="slideshome">
	<div class="container f">
		<div id="container">
<div class="flexslider">
	<ul class="slides">
						<?php  
					global $post;
                        $post_options = get_post_options_api( '1.0.1' );

						$sticky = get_option('sticky_posts');
						$args = array(
						'meta_key' => 'slide-page',
						'post_type' => array( 'post', 'page' ),
						'p=' . $sticky, 'ignore_sticky_posts' => 0);
						$args_not = array('posts_per_page' => 4);
						if($sticky || empty($slide)) :
							query_posts($args);
						else :
							query_posts($args_not);
						endif;
						?>
<?php   if (have_posts()) : while (have_posts()) : the_post();
						?>
					<li>	
<?php 
if  ( has_post_thumbnail()): ?>
<span class="nine columns">
<?php the_post_thumbnail('matisse_slide');?>
</span>
						<div class="seven columns">
								<h2><a href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0')));?>" rel="bookmark"><?php	the_title();?></a></h2>
								<?php the_excerpt();?>		
						</div>
							<?php else :?>
						<div class="flex-caption_no_img sixteen columns">
							<h2><a  href="<?php	the_permalink();?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'sketchbook'), the_title_attribute('echo=0')));?>" > 
								<?php the_title();?></a></h2>
							    <?php the_excerpt(); ?>
						</div>
							<?php endif;?>
					</li>
<?php endwhile; endif;  wp_reset_query();?>
					</ul>
	
			</div>
		</div>
	</div>
</div>
<div class="container" id="wrapper">
	<section id="content" class="eleven columns">
		<?php
global $more;
$more = 0;		
$sticky = get_option( 'sticky_posts' );
$args=array(
'paged' =>   get_query_var( 'page' ),
'post__not_in' => $sticky
);
query_posts($args);
if ( have_posts() ) : while (have_posts()) : the_post();
		?>
		<?php get_template_part('loop', get_post_format());?>
		<?php endwhile; endif;?>
	</section>
	<?php get_sidebar();?>
	<?php
	if(function_exists('wp_pagenavi')) { wp_pagenavi();
	} else {  matisse_pagination();
	}
	?>
</div>
<?php get_footer();?>
