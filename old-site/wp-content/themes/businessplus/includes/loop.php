<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry">
		<a title="<?php the_title();?>" href="<?php the_permalink(); ?>" rel="<?php the_title();?>"><?php the_post_thumbnail('blog-thumb', array('class' => 'entry-thumb')); ?></a>
		<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-meta">
			<?php _e('by','themejunkie'); ?> <?php the_author_posts_link(); ?> <?php _e('on','themejunkie'); ?> <?php the_time('M jS, Y') ?> &middot; <?php comments_popup_link(); ?>
		</div><!-- .entry-meta -->
		<div class="entry-content">
			<?php tj_content_limit( '350' ); ?>
			<div class="clear"></div>
			<div class="read-more"><a href="<?php the_permalink() ?>"><?php _e('Read more &rarr;','themejunkie'); ?></a></div>
			<div class="clear"></div>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themejunkie' ), 'after' => '</div>' ) ); ?>	    	
			<div class="clear"></div>
		</div><!-- .entry-content -->
	</div><!-- .entry -->
	
	<div class="clear"></div>
	
</div><!-- #post-<?php the_ID(); ?> -->	