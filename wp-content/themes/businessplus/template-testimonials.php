<?php
/*
Template Name: Testimonials
*/
?>

<?php get_header(); ?>

	    <div id="content" class="one-col">
	        <h1 class="page-title"><?php the_title(); ?></h1>

	        <?php
	            query_posts( array(
		            'post_type' => 'testimonial',
				    'posts_per_page' => 48
				    )
			    );
	        ?>
	
	        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	        <?php
	

	        ?>
	        	    <div class="entry-content">

			<?php
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
			<div class="clear"></div>
	        
	        
	        	    </div><!-- #portfolio-content -->

	
	
	
	        <?php endwhile; else: ?>
		    <?php endif; ?>
	    		    
	        <?php wp_reset_postdata();?>
	
	</div><!-- #content -->

<?php get_footer(); ?>