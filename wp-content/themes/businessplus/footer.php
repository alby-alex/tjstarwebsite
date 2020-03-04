			</div><!-- #container -->
			<div id="footer-callout">
				<div id="callout-left">
					<?php echo get_option('businessplus_callout_left'); ?>
				</div><!-- #callout-left -->
				<div id="callout-right">
					<?php echo get_option('businessplus_callout_right'); ?>
				</div><!-- #callout-right -->
			</div><!-- #footer-callout -->
					
			<div class="clear"></div>
			<div class="copyright">	
				<div class="left">
					&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'description' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>. <?php _e('All rights reserved','themejunkie'); ?>.
				</div><!-- .left -->
				<div class="right">
					<?php echo get_option('businessplus_footer_credit'); ?>
				</div><!-- .right -->
				<div class="clear"></div>
			</div><!-- .copyright -->
		</div><!-- .inner-wrap -->
	</div> <!-- #wrapper -->
	<?php wp_footer(); ?>
</body>
</html>