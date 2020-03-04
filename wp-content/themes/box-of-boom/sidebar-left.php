<?php
/**
 * The Left Sidebar
 */
?>
		<div id="sidebar-left" class="widget-area col220" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>


				<aside id="recent-posts" class="widget">
					<h2 class="widget-title"><?php _e( 'Recent Posts', 'box-of-boom' ); ?></h2>
                    <?php $my_query = new WP_Query('posts_per_page=5'); ?>
					<ul>
						<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <li><p><a href='<?php the_permalink() ?>'><?php the_title(); ?></a></p>
                        <?php the_excerpt(); ?>
                        </li>
                        <?php endwhile; ?>
                        <?php // Reset Post Data
                          wp_reset_postdata();
                         ?>
                    </ul>
				</aside>


			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
