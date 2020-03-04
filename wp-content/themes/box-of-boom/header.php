<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title('|', true, 'left'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
<?php do_action( 'before' ); ?>
	<header id="branding" role="banner">
      <div id="inner-header" class="clearfix">
		<hgroup id="site-heading">
			<h1 id="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="access" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'box-of-boom' ); ?></h1>
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'box-of-boom' ); ?>"><?php _e( 'Skip to content', 'box-of-boom' ); ?></a></div>

			<?php boxofboom_main_nav(); // Adjust using Menus in Wordpress Admin ?>
            <?php get_search_form(); ?>
		</nav><!-- #access -->
        
      </div>
      
        <?php
		$header_image = get_header_image();
		if ( ! empty( $header_image ) ) :
			$header_image_width  = get_custom_header()->width;
			$header_image_height = get_custom_header()->height;
		?>
		<div id="headerimg"><img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" /></div>
		<?php endif; ?>
      
      
	</header><!-- #branding -->
