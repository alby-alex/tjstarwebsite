<article <?php post_class() ?>>
	<header><?php edit_post_link(__('Edit This', 'matisse')); ?>
		<h2 class="title"><a href="<?php echo matisse_link_format(); ?>"  rel="bookmark">
			<?php the_title(); ?></a></h2>
	</header>
	<footer>
		<?php the_excerpt(__('<span class="link_more">Continue reading &rarr;</span>', 'matisse')); ?>
		<?php
        if (comments_open() && !post_password_required()) :
            comments_popup_link(__('0', 'matisse'), __('1', 'matisse'), __('%', 'matisse'), 'comments-link', __('Comments are off for this post', 'matisse'));
        endif;
		?>	
		<?php echo matisse_posted_on(); ?>
	</footer>
</article>