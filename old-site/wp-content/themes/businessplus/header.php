<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes( 'xhtml' ); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php tj_custom_titles(); ?></title>
<?php tj_custom_description(); ?>
<?php tj_custom_keywords(); ?>
<?php tj_custom_canonical(); ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/colors/<?php echo get_option('businessplus_theme_stylesheet');?>" />	
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/custom.css" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	<div class="inner-wrap">
		<div id="header">
			<div class="header-social">
									<div class="clear"></div>
				<p>
					<?php _e('Thomas Jeffereson HS for Science and Technology') ?>	
					<div> </div>
					<?php _e('6560 Braddock Road, Alexandria, VA 22312') ?>	
					<div> </div>			
					<?php _e('(703) 750-8300') ?>		
				</p>
			</div><!-- .header-social -->
			
			<?php if (get_option('businessplus_text_logo_enable') == 'on') { ?>
				<div id="text-logo">
					<h1 id="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
					<p id="site-desc"><?php bloginfo('description'); ?></p>
				</div><!-- #text-logo -->
			<?php } else { ?>
				<a href="<?php echo home_url(); ?>"><?php $logo = (get_option('businessplus_logo') <> '') ? get_option('businessplus_logo') : get_template_directory_uri().'/images/logo.png'; ?><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" id="logo"/></a>
			<?php }?>

			<div class="clear"></div>
		</div><!--end #header-->

        <div id="primary-nav">
			<?php $menuClass = 'nav';
			$menuID = 'primary-navigation';
			$primaryNav = '';
			if (function_exists('wp_nav_menu')) {
				$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-nav', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) );
			};
			if ($primaryNav == '') { ?>
				<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
					<?php if (get_option('businessplus_home_link') == 'on') { ?>
						<li class="first"><a href="<?php bloginfo('url'); ?>"><?php _e('Home', 'themejunkie') ?></a></li>
					<?php } ?>				
					<?php show_page_menu($menuClass,false,false); ?>
				</ul>
			<?php }	else echo($primaryNav); ?>
			<div id="header-search">
				<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
					<input type="text" class="field" name="s" id="s" placeholder="Search..."/>
					<input id="searchsubmit" type="image" src="<?php bloginfo('template_directory'); ?>/images/ico-search.gif" value="Go" />
				</form>
			</div><!-- #header-search -->
		</div><!-- #primary-nav -->
			
		<div class="clear"></div>

		<div class="container">