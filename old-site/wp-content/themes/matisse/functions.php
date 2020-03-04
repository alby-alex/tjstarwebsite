<?php
/*********************/
require_once ( get_template_directory() . '/inc/matisse-widgets.php' );
require_once ( get_template_directory() . '/inc/matisse-post-options.php' );
/*********************/
add_action( 'after_setup_theme', 'matisse_setup' );

if ( ! function_exists( 'matisse_setup' ) ):
	function matisse_setup() {
/*********************/
if ( ! isset( $content_width ) ) $content_width = 640;
/*********************/
function matisse_content_width() {
if ( is_attachment() ) {
global $content_width;
$content_width = 940;
}
}
add_action( 'template_redirect', 'matisse_content_width' );		
/*********************/
		load_theme_textdomain( 'matisse', get_template_directory() . '/languages' );
/*********************/	
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 520, 340, true );
		add_image_size('matisse_slide', 520, 340, true);
		add_theme_support( 'post-formats', array( 'aside', 'gallery','image','link','quote') );
		add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-background', array('default-color' => 'fff') );
		/*********************/
		add_editor_style('css/editor-style.css');
		/*********************/
		if (function_exists('wp_nav_menu')) {
		register_nav_menus(array('primary' =>__( 'Primary Navigation', 'matisse' )));
		}
/*********************/
    register_default_headers( array(
            'matisse' => array(
            'url' => '%s/images/headers/matisse.jpg',
            'thumbnail_url' => '%s/images/headers/matisse-thumbnail.jpg',
            'description' => __( 'Matisse', 'matisse' ),
        ),
            'matisse-2' => array(
            'url' => '%s/images/headers/matisse-2.jpg',
            'thumbnail_url' => '%s/images/headers/matisse-thumbnail-2.jpg',
            'description' => __( 'Matisse 2', 'matisse' ),
        ),
            'matisse-3' => array(
            'url' => '%s/images/headers/matisse-3.jpg',
            'thumbnail_url' => '%s/images/headers/matisse-thumbnail-3.jpg',
            'description' => __( 'Matisse 3', 'matisse' ),
        ),
            'matisse-4' => array(
            'url' => '%s/images/headers/header.jpg',
            'thumbnail_url' => '%s/images/headers/header-thumbnail.jpg',
            'description' => __( 'Matisse 4', 'matisse' ),
        )   
    ) );
/*********************/      
    $custom_header_support = array(
        'default-image' => '%s/images/headers/matisse-4.jpg',
        'default-text-color' => 'BF2323',
        'width' => apply_filters( 'matisse_header_image_width', 960 ),
        'height' => apply_filters( 'matisse_header_image_height', 100 ),
        'max-width' => 2000,
        'flex-height' => true,
        'flex-width' => true,
        'random-default' => true,
        'wp-head-callback' => 'matisse_header_style',
        'admin-head-callback' => 'matisse_admin_header_style',
        'admin-preview-callback' => 'matisse_header_img',
    );
add_theme_support( 'custom-header', $custom_header_support );
/*********************/        
/*********************/     
}
endif;        
		/*********************/
		function matisse_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
		}
		add_filter( 'wp_page_menu_args', 'matisse_menu_args' );
		/********************Default gallery style*/
		add_filter('use_default_gallery_style', '__return_false');
		/********************Widgets*/
function matisse_widgets_init() {
		register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'matisse'),
		'id' => 'sidebar-widget-area-full',
		'description' => __( 'The sidebar widget area, full width', 'matisse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'matisse'),
		'id' => 'sidebar-widget-area-left',
		'description' => __( 'The sidebar widget area, left side', 'matisse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );
		
		register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'matisse'),
		'id' => 'sidebar-widget-area-right',
		'description' => __( 'The sidebar widget area, right side', 'matisse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

		register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'matisse' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'matisse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

		register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'matisse' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'matisse' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		) );

		}
add_action( 'widgets_init', 'matisse_widgets_init' );
/*********************/	
function matisse_fancybox_js() {
		$options = get_option('matisse_options');
		$lightbox = $options['layout_lightbox'];
				if ( ! is_admin() ){
		wp_enqueue_script('jquery');
		
	    if ( comments_open() && get_option( 'thread_comments' ) ) 
		wp_enqueue_script( 'comment-reply' );	
		
		wp_register_script('flex-slide', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array('jquery'));
		wp_enqueue_script('flex-slide');

		wp_enqueue_style( 'matisse-style', get_stylesheet_uri() );
		
		wp_register_style('layout', trailingslashit(get_template_directory_uri()) . 'css/skeleton.css', '', '13012013', 'all');
		wp_enqueue_style('layout');
		
        if ($lightbox !='disabled') {
             wp_register_style('cssbox', get_template_directory_uri(). '/gallery/'.$lightbox.'/colorbox.css', '', '30122012', 'all');
             wp_enqueue_style('cssbox');
                
             wp_register_script('colorbox', get_template_directory_uri() .'/js/jquery.colorbox-min.js', array('jquery'));
             wp_enqueue_script('colorbox'); 
    } 
		
		global $is_IE;
		if ($is_IE){
		wp_register_script('ie-html5', get_template_directory_uri() .'/js/html5.js', array('jquery'));
		wp_enqueue_script('ie-html5');		
		}

		}
		}
add_action('wp_enqueue_scripts', 'matisse_fancybox_js');
/*********************/
function matisse_slide() {
		echo '<script>jQuery(document).ready(function($) {
					$(\'.flexslider\').flexslider({
						controlsContainer : ".flex-container",
						animation : "fade",
						directionNav : true,
						slideshow : false,
						controlNav : true,
						pauseOnHover : true
					});
				});</script>';
		}
add_action('wp_head', 'matisse_slide');
/*********************/
function matisse_fancybox() {		
	if ( ! is_admin()){
		echo '<script>jQuery(document).ready(function($) {
		$(".gallery-icon a").attr("rel", \'gallery\');	
		$(" .post-content a[href$=\'.jpg\'], .post-content a[href$=\'.jpeg\'], .post-content a[href$=\'.gif\'], .post-content a[href$=\'.png\']").colorbox({current:"'.__('Image {current} of {total}', 'rembrandt').'" ,previous: \''.__('Previous', 'matisse').'\',next: \''.__('Next', 'matisse').'\', maxHeight:"99%", maxWidth:"95%"});		
});</script>';
		}
		}
add_action('wp_head', 'matisse_fancybox');
/*********************/
		function matisse_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
		}
		add_action( 'widgets_init', 'matisse_recent_comments_style' );
		/*********************/
		function matisse_excerpt_more( $more ) {
		return '&hellip;' . ' <a class="link_more" href="'. get_permalink() . '">' . __( 'Continue reading &rarr;', 'matisse' ) . '</a>';
		}
		add_filter( 'excerpt_more', 'matisse_excerpt_more' );
/*********************/
		if ( ! function_exists( 'matisse_posted_on' ) ) :
		function matisse_posted_on() {
		if(is_single()) {
			$format_text = __('<p> Posted on %4$s by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s </a></span> </p>', 'matisse' );
			} else {
			$format_text = __('<p> Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s </a></span> </p>', 'matisse' );
		}
		printf( $format_text,
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date('d-m-Y') ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'matisse' ), get_the_author() ),
		esc_html( get_the_author() )
		);
		}
		endif;
/*********************/
		if ( ! function_exists( 'matisse_posted_footer' ) ) :
		function matisse_posted_footer() {
		  $categories = get_the_category_list(__(', ', 'matisse'));
		  $tag = get_the_tag_list('', __(', ', 'matisse'));		
if ($tag) {
printf(__('<p>This entry was posted in %1$s and tagged %2$s.</p>', 'matisse'), $categories, $tag); 
} 
elseif($categories) {
printf(__('<p>This entry was posted in %1$s.</p>', 'matisse'), $categories);
}        
        }
		endif;
/*********************/		
if ( ! function_exists( 'matisse_header_style' ) ) :
function matisse_header_style() { ?>
<style><?php if (get_header_image()){
		$header_image_width  = get_custom_header()->width;
		$header_image_height = get_custom_header()->height;
 ?>
#header {	
	background:#FFA26F url(<?php header_image();?>) no-repeat bottom center;	
    min-height: <?php echo $header_image_height; ?>px;
	}
<?php  } ?>	
<?php if ( ! display_header_text() ) : ?>
#header hgroup h1, #header hgroup h2, #header hgroup h3{
	position: absolute !important;
	clip: rect(1px 1px 1px 1px); 
	clip: rect(1px, 1px, 1px, 1px);
}
	<?php else : ?>
#header .container h1 a, #header .container h2 a, #header .container h3 {
	color: #<?php echo get_header_textcolor(); ?>!important;
}
	<?php endif; ?>
</style>
<?php
}
endif;
/*********************/	
if ( ! function_exists( 'matisse_admin_header_style' ) ) :
function matisse_admin_header_style() {	
?>
<style type="text/css">
<?php if (get_header_image()) : 
		$header_image_width  = get_custom_header()->width;
		$header_image_height = get_custom_header()->height;
	?>	
#header {	
	background:#FFA26F url(<?php header_image();?>) no-repeat bottom center;	
    min-height: <?php echo $header_image_height; ?>px;
    width: <?php echo $header_image_width; ?>px;
	}	
<?php else : ?>
#header{
	background:#FFA26F!important;
}
<?php endif; ?>	
<?php if ( ! display_header_text() ) : ?>
		#header hgroup h1, #header hgroup h2, #header hgroup h3{
			display: none;
		}
	<?php else :
	?>
#header{
    background-color: #FFA26F!important;
}
#header .container{
	position: relative;
    text-shadow: none;
    width: 940px;
    margin: 0 auto;
}
#header h2 {
    padding: 10px;
    letter-spacing: 0.076em;
    float: left;
    width: 35%;
    font-size: 36px;
	text-shadow: 1px 1px 1px rgba(0,0,0,.6)!important;
}
#header h3 {
        font-size: 20px;
		color: #fff;
		text-align: right;
		font-family: Cambria, Georgia, "Times New Roman", Times, serif;
		font-weight: normal;
		float: right;
		width: 60%;
}
#header h2 a, #header h3 {
	color: #<?php echo get_header_textcolor(); ?>!important;
	text-decoration: none!important;
	text-shadow: none;
}
	<?php endif; ?>
</style>
<?php
}

endif;
/*********************/	
if ( ! function_exists( 'matisse_header_img' ) ) :
function matisse_header_img() {
?>
<div id="header">
<hgroup class="container">
<?php  if (function_exists('matisse_header'))  matisse_header();
$site_description = get_bloginfo( 'description' ); if ( $site_description ) {?>
<h3><?php	echo $site_description;?></h3>
<?php } ?>
</hgroup>
</div>
<?php
}
endif;	
/*********************/
// end matisse_setup
/********************Paginations*/
		if ( ! function_exists('matisse_pagination') ) {
		function matisse_pagination() {
		global $wp_query, $wp_rewrite;
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		$pagination = array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => false,
		'mid_size' => 4,
		'end_size'     => 2,
		'type' => 'plain'
		);

		if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

		if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

		echo '<div class="wp-pagenavi">' .paginate_links($pagination).'</div>' ;
		}
		}
/*********************/
	function matisse_breadcrumb(){
		if(function_exists('bcn_display'))
    { echo '<p id="breadcrumbs" class="sixteen columns">';
        bcn_display();
		echo '</p>';
    }
	elseif (function_exists('yoast_breadcrumb')) {
	yoast_breadcrumb('<p id="breadcrumbs" class="sixteen columns">', '</p>');
	} 
	}
/**********
 * @note: credit goes to TwentyTwelve theme.***********/
function matisse_wp_title( $title, $sep ) {
global $paged, $page;

if ( is_feed() )
return $title;

// Add the site name.
$title .= get_bloginfo( 'name' );

// Add the site description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
$title = "$title $sep $site_description";

// Add a page number if necessary.
if ( $paged >= 2 || $page >= 2 )
$title = "$title $sep " . sprintf( __( 'Page %s', 'mt-white' ), max( $paged, $page ) );

return $title;
}
add_filter( 'wp_title', 'matisse_wp_title', 10, 2 );					
/*********************/
		if ( ! function_exists( 'matisse_footer_classes' ) ) :
		function matisse_footer_classes( $existing_classes ) {
		if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' ))
		$classes[] = 'footer-widget';
		else
		$classes[] = 'footer-no-widget';
		return array_merge( $existing_classes, $classes );
		}
		add_filter( 'body_class', 'matisse_footer_classes' );
		endif;
/*********************/
if ( ! function_exists( 'custom_comments' ) ) :
function custom_comments( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment;
switch ( $comment->comment_type ) :
case 'pingback' :
case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e('Pingback:', 'matisse'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('(Edit)', 'matisse'), '<span class="edit-link">', '</span>'); ?></p>
	<?php
	break;
	default :
	global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
				echo get_avatar($comment, 60);
				printf('<cite class="fn">%1$s %2$s</cite>', get_comment_author_link(), ($comment -> user_id === $post -> post_author) ? '<span> ' . __('Post author', 'matisse') . '</span>' : '');
				printf(' <a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>', esc_url(get_comment_link($comment -> comment_ID)), get_comment_time('c'),
				/* translators: 1: date, 2: time */
				sprintf(__('%1$s at %2$s', 'matisse'), get_comment_date(), get_comment_time()));
				?>
			<div class="reply">
				<?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply <span>&darr;</span>', 'matisse'), 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div>				
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'matisse'); ?></p>
			<?php endif; ?>

			<section class="comment post-content">
				<?php comment_text(); ?>
				<?php edit_comment_link(__('Edit', 'matisse'), '<p class="edit-link">', '</p>'); ?>
			</section>


		</article>
	<?php
	break;
	endswitch;
	}
	endif;
/*********************/
require_once ( get_template_directory() . '/inc/customizer_register.php' );
/*********************/
?>