
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'box-of-boom' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" class="entry-title"><?php the_title('<h1>','</h1>'); ?></a>

		<div class="entry-meta">
			<?php boxofboom_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for search pages ?>
	<div class="entry-summary post_content">
    	<?php if ( has_post_thumbnail()) : ?>                
          <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(100, 85) ); ?></a></div>               
        <?php endif; ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content post_content">
		<?php if ( post_password_required() ) : ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'box-of-boom' ) ); ?>

			<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC' ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>

				<figure class="gallery-thumb">
					<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</figure><!-- .gallery-thumb -->

				<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'box-of-boom' ),
						'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'box-of-boom' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						number_format_i18n( $total_images )
					); ?></em></p>
			<?php endif; ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'box-of-boom' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'box-of-boom' ) );
				if ( $categories_list && boxofboom_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'box-of-boom' ), $categories_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'box-of-boom' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links">
				<?php printf( __( 'Tagged %1$s', 'box-of-boom' ), $tags_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'box-of-boom' ), __( '1 Comment', 'box-of-boom' ), __( '% Comments', 'box-of-boom' ) ); ?></span>
		<span class="sep"> | </span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'box-of-boom' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
