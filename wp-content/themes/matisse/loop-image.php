<article <?php post_class() ?>>
	<figure class="image-thumb">
	<?php
if( has_post_thumbnail()) {
	?>		
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
	<?php } else { ?>	
	<?php
$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
if ( $images ) :
$total_images = count( $images );
$image = array_shift( $images );
$image_img_tag = wp_get_attachment_image( $image->ID, 'large' );
	?>
		<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>	
<?php  endif; } ?>				
		<figcaption>
		<?php
        if (comments_open() && !post_password_required()) :
            comments_popup_link(__('0', 'matisse'), __('1', 'matisse'), __('%', 'matisse'), 'comments-link', __('Comments are off for this post', 'matisse'));
        endif;
			?>			
			<h2><a href="<?php	the_permalink(); ?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php	the_title(); ?></a></h2>
		<?php the_excerpt(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>
		</figcaption>		
	</figure>			
	<?php edit_post_link(__('Edit This', 'matisse')); ?>
</article>