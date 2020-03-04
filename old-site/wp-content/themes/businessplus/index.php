<?php get_header(); ?>

	<?php // BEGIN OF FEATURED SLIDER
		if(get_option('businessplus_slider_enable') == 'on') {  
	?> 
		<?php
		    query_posts( array(
				'post_type' => 'slide',
				'posts_per_page' => get_option('businessplus_slides_num')
				)
			);
		?>
		<div id="container" class="clear">
			<div class="flexslider">
				<ul class="slides">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php
				    $has_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( '9999','9999' ), false, '' );		
				    $has_img = get_post_meta(get_the_ID(), 'tj_slide_image', TRUE);
				    $has_video = get_post_meta(get_the_ID(), 'tj_slide_video', TRUE);
				    $has_url = get_post_meta(get_the_ID(), 'tj_slide_url', TRUE);
				?>
				    <li>
				        <?php
				            if (is_array($has_thumb)) {
				            	the_post_thumbnail('slide-thumb'); //Featured Image
				            } elseif ($has_img) {
				            	echo '<img src="'.$has_img.'" alt="';the_title();echo '"/>'; //Specified Image
				            } elseif ($has_video) { 
				            	echo stripcslashes(htmlspecialchars_decode($has_video)); //Video
				            }
				        ?>
						<?php
							if ( !empty( $post->post_content ) ) : 
								echo '<p class="flex-caption">';the_excerpt();echo '</p>';
							endif;            		
						?>
					</li>
				<?php endwhile; endif; ?>
				</ul><!-- .sldes -->
			</div><!-- .flexslider -->
			<?php wp_reset_postdata();?>
		</div><!-- #container -->
	<?php } // END OF FEATURED SLIDER ?>

	<?php // BEGINE OF SLOGAN 
		if(get_option('businessplus_slogan_enable') == 'on') { 
	?>
		<div id="slogan">
	        <div class="slogan-content">
	            <?php echo get_option('businessplus_slogan');?>
	        </div><!-- .slogan-content -->
			<a class="button2 slogan-button" href="<?php echo get_option('businessplus_slogan_button_link');?>"><?php echo get_option('businessplus_slogan_button_text');?></a>
	    </div><!-- #slogan -->
    <?php } // END OF SLOGAN ?>
    
	<?php //BEGIN OF MINI FEATURES 
		if(get_option('businessplus_home_features_enable') == 'on') { 
	?>
		<?php
		    query_posts( array(
			'post_type' => 'feature',
			'posts_per_page' => get_option('businessplus_home_features_num')
			)
		);
		?>
		<div id="mini-features" class="clear">
			<?php $feature_count = 1; if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php
			    $has_icon = get_post_meta(get_the_ID(), 'tj_feature_icon', TRUE);
			?>	
			<div class="mini-feature <?php if($feature_count%3==0) { echo "last-feature"; } ?> <?php if($feature_count>3) { echo "has-shadow"; } ?>">
				<h3><?php if($has_icon != null) { echo '<img src="'.$has_icon.'" alt="';the_title();echo '"/>'; } ?><?php the_title(); ?></h3>
				<p><?php the_content(); ?></p>
			</div><!-- .mini-feature -->
			<?php if($feature_count%3==0) { echo "<div class='clear'></div>"; } ?>
			<?php $feature_count++; endwhile; endif; ?>
			<?php wp_reset_postdata();?>
		</div><!-- #mini-features -->	
	
	<?php } // END OF MINI FEATURES ?>

	<?php //BEGIN OF TESTIMONIALS 
		if(get_option('businessplus_home_testimonials_enable') == 'on') { 
	?>	
		<div id="testimonials">
			<?php
				setup_postdata($post);
				$random_posts = get_posts('numberposts=1&orderby=rand&post_type=testimonial'); // Get results from custom-post-type: testimonial
				foreach( $random_posts as $post ) : setup_postdata($post);
	            $author_name = get_post_meta(get_the_ID(), 'tj_testimonial_author_name', TRUE);
	            $author_avatar = get_post_meta(get_the_ID(), 'tj_testimonial_author_avatar', TRUE);
	            $site_name = get_post_meta(get_the_ID(), 'tj_testimonial_site_name', TRUE);
	            $site_url = get_post_meta(get_the_ID(), 'tj_testimonial_site_url', TRUE);	            			
			?>
				<div class="testimonial-content">
					<?php the_content(); ?>
				</div><!-- .testimonial-content -->
				<div class="testimonial-author">
					<img src="<?php echo $author_avatar; ?>" alt="<?php echo $author_name; ?>" class="author-avatar" />
					<p class="author-name"><?php echo $author_name; ?></p>
					<p class="site-url"><a href="<?php echo $site_url; ?>"><?php echo $site_name; ?></a></p>
				</div><!-- .user-profile -->
			<?php endforeach; ?>
			<div class="clear"></div>
		</div><!-- #testimonials -->
	<?php } //END OF TESTIMONIALS ?>
	
	<div class="clear"></div>
	
	<?php // BEGIN OF WIDGET: BLOG
		if(get_option('businessplus_home_blog_enable') == 'on') { 
	?>	
		<div class="home-widget">
			<h3 class="widget-title-blog"><?php _e('From The Blog','themejunkie'); ?></h3>
		  	<?php
		  		query_posts( array(
		  			'posts_per_page' => get_option('businessplus_home_blog_posts_num')
		  			)
		  		);
		  	?>			
		    <?php  if (have_posts()) : while ( have_posts() ) : the_post() ?>
		    	<div class="home-recent-posts">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="entry-meta">
						<?php _e('by','themejunkie'); ?> <?php the_author_posts_link(); ?> <?php _e('on','themejunkie'); ?> <?php the_time('M jS, Y') ?>
					</div><!-- .entry-meta -->
					<div class="entry-excerpt">
						<?php tj_content_limit('95'); ?>
					</div><!-- .entry-excerpt -->
				</div><!-- .home-recent-posts -->
			<?php endwhile; endif; ?>
		    <?php wp_reset_query();?>
		</div><!-- .home-widget -->
	<?php } //END OF WIDGET: BLOG ?>
	
	<?php  //BEGIN OF WIDGET: TWITTER
		if(get_option('businessplus_home_twitter_enable') == 'on') { 
	?>
		<div class="home-widget">
			<div class="home-widget-twitter">
				<h3 class="widget-title-twitter"><a href="http://twitter.com/<?php echo get_option('businessplus_twitter_id'); ?>" rel="nofollow" ?><?php _e('Latest Tweets','themejunkie'); ?></a></h3>
		        <ul id="twitter_update_list_home_tweets"><li></li></ul>
		        <div class="clear"></div>				
				<?php tj_twitter_script('home_tweets',get_option('businessplus_twitter_id'),get_option('businessplus_home_tweets_num')); ?>
			</div><!-- .home-widget-twitter -->
		</div><!-- .home-widget -->
	<?php } //END OF WIDGET: TWITTER ?>
	
	<div class="home-widget home-last-widget">
	
		<?php //BEGIN OF WIDGET: RECDENT WORK 
			if(get_option('businessplus_home_work_enable') == 'on') { 
		?>
			<div class="home-widget-work">
				<h3 class="widget-title-work"><?php _e('Recent Work','themejunkie'); ?></h3>
				<ul>
					<?php
						$count = 1;
						query_posts( array(
							'post_type' => 'portfolio',
							'posts_per_page' => get_option('businessplus_home_portfolio_posts_num')
							)
						);
					?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li id="post-<?php the_ID(); ?>" class="<?php if($count%2==0) { echo "last"; }?>">
							<a title="<?php the_title();?>" href="<?php the_permalink(); ?>" rel="<?php the_title();?>"><?php the_post_thumbnail('home-portfolio-thumb', array('class' => 'entry-thumb')); ?></a>
						</li>
					<?php $count++; endwhile; else: ?>
					<?php endif; ?>
					<?php wp_reset_postdata();?>		
				</ul>
				<div class="clear"></div>
			</div><!-- .home-widget-work .has-shadow -->
		<?php } //END OF WIDGET: RECENT WORK ?>
		
		<div class="clear"></div>

		<?php //BEGIN OF WIDGET: NEWSLETTER 
			if(get_option('businessplus_home_newsletter_enable') == 'on') {
		?>								
			<div class="home-widget-newsletter has-shadow">
				<h3 class="widget-title-newsletter"><?php _e('E-mail Newsletter','themejunkie'); ?></h3>
				<p><?php _e('Get our latest news & updates into your mailbox.','themejunkie'); ?></p>
				<p style="margin-top:10px;">
					<form id="subscribe" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open( 'http://feedburner.google.com/fb/a/mailverify?uri=<?php echo get_option('businessplus_feedburner_id'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
						<input type="text" style="width:190px;" id="subbox" name="email" placeholder="Enter your e-mail…">
						<input type="hidden" name="uri" value="<?php echo get_option('businessplus_feedburner_id'); ?>">
						<input type="hidden" name="loc" value="en_US">
						<input type="submit" class="newsletter-submit" value="Subscribe">
					</form>
				</p>
			</div><!-- .home-widget-newsletter -->
		<?php } //END OF WIDGET: NEWSLETTER ?>
		
	</div><!-- .home-widget .home-last-widget -->
	
	<div class="clear"></div>			
    
<?php get_footer(); ?>