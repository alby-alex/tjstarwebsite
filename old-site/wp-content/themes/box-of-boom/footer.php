
	<footer id="colophon" role="contentinfo">
		<div id="site-generator">
			<?php echo __('&copy; ', 'box-of-boom') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_front_page() && ! is_paged() ) : ?>
            <?php _e('- Powered by ', 'box-of-boom'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'box-of-boom' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'box-of-boom' ); ?>"><?php _e('Wordpress' ,'box-of-boom'); ?></a>
			<?php _e(' and ', 'box-of-boom'); ?><a href="<?php echo esc_url( __( 'http://wpthemes.co.nz/', 'box-of-boom' ) ); ?>"><?php _e('WPThemes.co.nz', 'box-of-boom'); ?></a>
            <?php endif; ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>