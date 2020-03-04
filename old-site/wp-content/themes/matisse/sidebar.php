<aside class="five columns sidebar">
    <?php	if ( is_active_sidebar( 'sidebar-widget-area-full' ) ) {
    ?>
    <ul class="widget">
        <?php dynamic_sidebar('sidebar-widget-area-full'); ?>
    </ul>
    <?php } else { ?>
    <div class="widget">
        <?php get_search_form(); ?>
    </div>
    <?php } ?>
    <div class="widget">
        <?php	if ( is_active_sidebar( 'sidebar-widget-area-left' ) ) {
        ?>
        <ul class="alpha three columns">
            <?php dynamic_sidebar('sidebar-widget-area-left'); ?>
        </ul>
        <?php } ?>

        <?php	if ( is_active_sidebar( 'sidebar-widget-area-right' ) ) {
        ?>
        <ul class="two columns omega">
            <?php dynamic_sidebar('sidebar-widget-area-right'); ?>
        </ul>
        <?php } ?>
    </div>
</aside>