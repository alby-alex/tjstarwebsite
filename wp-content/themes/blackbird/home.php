<?php get_header(); ?>
<!--Start Page Content -->
<div class="page-content-container">
    <div class="page-content">
        <div class="grid_16 alpha">
            <div class="content-bar">
                <!--Start Post-->
                <?php get_template_part('loop', 'index'); ?>
                <!--End Post-->
                <div class="clear"></div>
                <nav id="nav-single"> <span class="nav-previous">
                        <?php next_posts_link(__('&larr; Older posts', 'black-bird')); ?>
                    </span> <span class="nav-next">
                        <?php previous_posts_link(__('Newer posts &rarr;', 'black-bird')); ?>
                    </span> </nav>
            </div>
        </div>
        <div class="grid_8 omega">
            <!--Start Sidebar-->
            <?php get_sidebar(); ?>
            <!--End Sidebar-->
        </div> 
    </div>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>