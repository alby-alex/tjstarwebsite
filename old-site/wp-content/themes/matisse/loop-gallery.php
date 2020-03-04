<article <?php post_class() ?>>
	<header>
		<?php
        if (comments_open() && !post_password_required()) :
            comments_popup_link(__('0', 'matisse'), __('1', 'matisse'), __('%', 'matisse'), 'comments-link', __('Comments are off for this post', 'matisse'));
        endif;
    ?>		
		<h2 class="title"><a href="<?php	the_permalink(); ?>" title="<?php	echo esc_attr(sprintf(__('Permanent Link to %s', 'matisse'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a></h2>	
 <?php	matisse_posted_on(); ?>
	</header>
<?php
$args = array('post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post -> ID);
$attachments = get_posts($args);
if ($attachments) :
    echo '<div class="flexslider"><ul class="slides">';
    foreach ($attachments as $attachment) :
        echo '<li>';
        echo wp_get_attachment_image($attachment -> ID, 'large');
        echo '</li>';
    endforeach;
    echo '</ul></div>';
endif;
?>
			<div class="post-content">
			<?php the_excerpt(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>
			</div>
	<footer>
		<?php	wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'matisse'), 'after' => '</div>')); ?>
		<?php
        matisse_posted_footer();
		?>
	</footer>
</article>