<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<?php
	        $image = array();
	        $video_embed = get_post_meta(get_the_ID(), 'tj_video_embed_portfolio', TRUE);
	        $m4v_url = get_post_meta(get_the_ID(), 'tj_video_m4v', TRUE);
	        $ogv_url = get_post_meta(get_the_ID(), 'tj_video_ogv', TRUE);
            $have_embed = FALSE;
	        $have_img = FALSE;

            if($video_embed != ''){
                $have_embed = TRUE;
            }
			$image[0] = get_post_meta(get_the_ID(), 'tj_portfolio_image1', TRUE);
			$image[1] = get_post_meta(get_the_ID(), 'tj_portfolio_image2', TRUE);
			$image[2] = get_post_meta(get_the_ID(), 'tj_portfolio_image3', TRUE);
			$image[3] = get_post_meta(get_the_ID(), 'tj_portfolio_image4', TRUE);
			$image[4] = get_post_meta(get_the_ID(), 'tj_portfolio_image5', TRUE);
	        $src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( '9999','9999' ), false, '' );
	        for($i=0;$i<5;$i++){
	                if($image[$i]!=''){
	                    $have_img = TRUE;
	                }
	        }
	
		?>

        <div id="content">
		    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<?php if($have_img):?>
					<div id="gallery">
						<div id="portfolio-slider" class="flexslider">
								<ul class="slides">
									<?php   for($i=0;$i<5;$i++):?>
									<?php       if($image[$i]):     ?>
										<li><img src="<?php echo $image[$i];?>" alt=""/></li>
									<?php endif; endfor;?>
								</ul><!-- .sldes -->
							</div><!-- .flexslider -->
					</div><!-- .gallery -->
				<?php endif;?>
				
				<?php if($video_embed!=''):?>
					<div class="clear"></div>
					<div class="video-portfolio">
						<?php echo stripslashes(htmlspecialchars_decode($video_embed)); ?>
					</div>
				<?php endif; ?>
	        
		    </div><!-- #post-<?php the_ID(); ?> -->

            <?php if(get_option('businessplus_show_portfolio_author') == 'on') { ?>
			    <div class="clear"></div>
			    <div class="entry-author">
				    <div class="author-avatar"><?php echo get_avatar( get_the_author_meta('email'), '50' ); ?></div>
				    <strong><?php the_author_posts_link(); ?></strong><br />
				    <p><?php the_author_meta( 'description' ); ?></p>
				    <div class="clear"></div>
			    </div><!-- .entry-author -->
		    <?php } ?>

    	    <?php if(get_option('businessplus_show_portfolio_comments') == 'on') { ?>
	  		    <?php comments_template(); ?>
	  	    <?php } ?>
		</div><!-- #content -->
		<?php endwhile; else: ?>
	
		<div id="post-0" <?php post_class() ?>>
			<h1 class="entry-title"><?php _e('Error 404 - Not Found', 'themejunkie') ?></h1>
			<div class="entry-content">
				<p><?php _e("Sorry, but you are looking for something that isn't here.", "themejunkie") ?></p>
			</div><!-- .entry-content -->
		</div><!-- #post-0 -->
	
	<?php endif; ?>

	<div id="sidebar">
	    
        <?php
			$extended_desc = get_post_meta(get_the_ID(), 'tj_portfolio_extended_desc', TRUE);
			$link = get_post_meta(get_the_ID(), 'tj_portfolio_link', TRUE);
		?>
	        <div class="widget portfolio-meta">
    			<h1 class="widget-title"><?php the_title(); ?></h1>										
				<div class="entry-content">
					<?php the_content(''); ?>
					<?php if($link != '') : ?>
						<p class="portfolio-link"><a target="_blank" href="<?php echo $link; ?>"><?php _e('View Project &rarr;', 'themejunkie'); ?></a></p>
					<?php endif; ?>							
					<?php edit_post_link( __('[Edit]', 'themejunkie'), '<span class="edit-post">', '</span>' ); ?>						
				</div><!-- .entry-content -->
			</div><!-- .widget -->
			<?php $terms = get_the_terms( get_the_ID(), 'portfolio-type' ); ?>
			<?php if(is_array($terms)){ ?>
				<div class="widget portfolio-meta">
					<h3 class="widget-title"><?php _e('Portfolio Types', 'themejunkie'); ?></h3>			
					<ul>
						<?php foreach ($terms as $term) :  ?>
							<li><?php echo $term->name; ?></li>
						<?php endforeach; ?>
					</ul>
					<div class="clear"></div>
				</div>
			<?php } else { ?>
			<?php }?>
			<div class="clear"></div>		

	    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('portfolio-sidebar') ) ?>
	</div><!-- #sidebar -->
	
	<div class="clear"></div>
	
	<div id="portfolio">
		<div id="portfolio-content">
			<h3 class="widget-title"><?php _e('Related Work', 'themejunkie'); ?></h3>
                <ul class="ourHolder">
					<?php 
					
					//Set the starter count
					$start = 4;
					//Set the finish count
					$finish = 1;
					
					$postId = get_the_ID();						
					
                    $related = get_posts_related_by_taxonomy($postId, 'portfolio-type', get_the_ID());
					
					//Get the total amount of posts
					$post_count = $related->post_count;
					
                    while ($related->have_posts()) : $related->the_post(); 
					
                    ?>
                    
						<?php if(is_multiple($start, 3)) : /* if the start count is a multiple of 3 */ ?>

                        <?php endif; ?>
                        
                        <?php
                       		$video_embed = get_post_meta(get_the_ID(), 'tj_video_embed_portfolio', TRUE);
                       		$brief_desc = get_post_meta(get_the_ID(), 'tj_portfolio_brief_desc', TRUE);
                        ?>
                        
                            <li class="item" id="related-post-<?php the_ID(); ?>">
                                <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
                                        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
                                           <?php the_post_thumbnail('portfolio-thumb', array('class' => 'entry-thumb')); /* post thumbnail settings configured in functions.php */ ?>
	                                    	<div class="overlay">
		                                        <span class="<?php if($video_embed){ echo 'icon-video'; } else { echo 'icon'; }?> "></span>
		                                    </div>                                                
                                        </a>
                                <?php endif; ?>
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'themejunkie'), get_the_title()); ?>"> <?php the_title(); ?></a></h2>
			            		<div class="entry-excerpt"><?php echo stripslashes(htmlspecialchars_decode($brief_desc)); ?></div>                                
                            </li>
                        
                        <?php if(is_multiple($finish, 4) || $post_count == $finish) : /* if the finish count is a multiple of 4 or equals the total posts */  ?>
                        <?php endif; ?>
                    
                    <?php
					$start++;
					$finish++;
					?>
                    <?php endwhile; wp_reset_query(); ?>
                </ul>
           </div>
       </div>
                	
<?php get_footer(); ?>