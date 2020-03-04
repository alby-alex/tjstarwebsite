<?php
function matisse_custom_register($wp_customize){
    //  =============================
    //  = Color Link              =
    //  =============================
    $wp_customize->add_setting('link_color', array(
        'default'           => '#dd3333',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'matisse'),
        'section' => 'colors',
        'settings' => 'link_color'
    )));
    //  =============================
    //  = Logo            =
    //  =============================
    $wp_customize->add_setting('link_logo', array(
        'capability'        => 'edit_theme_options',
    ));
    
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'link_logo', array(
        'label' => __('Logo', 'matisse'),
        'section' => 'header_image',
        'settings' => 'link_logo'
    )));
}
add_action('customize_register', 'matisse_custom_register');
/**************************************************************************************************/
function matisse_fonts_register($wp_customize){ 
    $wp_customize->add_section('matisse_scheme', array(
        'title'    => __('Fonts', 'matisse'),
        'priority' => 125,
    ));

    //  =============================
    //  = text font               =
    //  =============================
     $wp_customize->add_setting('text_font', array(
        'default'        => 'Georgia',
        'capability'     => 'edit_theme_options'
    ));
    $wp_customize->add_control( 'txt_font', array(
        'settings' => 'text_font',
        'label'   =>  __('Select Text Font:', 'matisse'),
        'section' => 'matisse_scheme',
        'type'    => 'select',
        'choices' => array(
        'Times New Roman' => 'Times New Roman', 
        "Cambria" => "Cambria", 
        "Palatino Linotype" => "Palatino Linotype", 
        "Georgia" => "Georgia", 
        "Helvetica Arial" => "Helvetica Arial", 
        "Verdana" => "Verdana" 
        )   
    ));
    //  =============================
    //  = header font                =
    //  =============================
     $wp_customize->add_setting('header_font', array(
        'default'        => 'Georgia',
        'capability'     => 'edit_theme_options'
    ));
    $wp_customize->add_control( 'header_font', array(
        'settings' => 'header_font',
        'label'   =>  __('Select Header Font:', 'matisse'),
        'section' => 'matisse_scheme',
        'type'    => 'select',
        'choices'    =>  array(
    'Times New Roman' => 'Times New Roman',
    'Cambria' => 'Cambria',
    'Palatino Linotype' => 'Palatino Linotype',
    'Georgia' => 'Georgia',
    'Helvetica Arial' => 'Helvetica Arial',
    'Verdana' => 'Verdana',
    'Open Sans' => 'Open Sans (Latin Extended, Cyrillic, Greek, Vietnamese)',
    'Droid Sans' => 'Droid Sans',
    'Droid Serif' => 'Droid Serif',
    'Oswald' => 'Oswald (Latin Extended)',
    'Ubuntu' => 'Ubuntu (Latin Extended, Cyrillic, Greek)',
    'PT Sans' => 'PT Sans (Latin Extended, Cyrillic)',
    'PT Serif' => 'PT Serif (Cyrillic)',
    'Arvo' => 'Arvo',
    'Lato' => 'Lato',
    'Source Sans Pro' => 'Source Sans Pro (Latin Extended)',
    'Signika' => 'Signika (Latin Extended)',
    'Vollkorn' => 'Vollkorn',
    'Old Standard TT' => 'Old Standard TT',
    'Cutive' => 'Cutive (Latin Extended)',
    'Amaranth' => 'Amaranth',
    'Merriweather' => 'Merriweather',
    'Abril Fatface' => 'Abril Fatface (Latin Extended)',
    'Sansita One' => 'Sansita One'
    )
    ));
    //  =============================
    //  = Select a language                =
    //  =============================
     $wp_customize->add_setting('header_ext', array(
        'default'        => 'Latin',
        'capability'     => 'edit_theme_options'
    ));
    $wp_customize->add_control( 'header_ext', array(
        'settings' => 'header_ext',
        'label'   =>  __('Add language:', 'matisse'),
        'section' => 'matisse_scheme',
        'type'    => 'radio',
        'choices'    =>  array(
    'Latin' => 'Latin',
    'Cyrillic' => 'Cyrillic',
    'Greek' => 'Greek',
    'Vietnamese' => 'Vietnamese'
    )
    ));
}
add_action('customize_register', 'matisse_fonts_register');
/**************************************************************************************************/
function matisse_layout_register($wp_customize){
    
    $wp_customize->add_section('matisse_layout', array(
        'title'    => __('Gallery', 'matisse'),
        'priority' => 123,
    ));
    //  =============================
    //  = lightbox            =
    //  =============================
     $wp_customize->add_setting('matisse_options[layout_lightbox]', array(
        'default'        => 'example1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'layout_lightbox', array(
        'settings' => 'matisse_options[layout_lightbox]',
        'label'   =>  __('Select Lightbox Theme:', 'matisse'),
        'section' => 'matisse_layout',
        'type'    => 'radio',
        'choices' => array( 
        "disabled" => "Disabled", 
        "example1" => "Example 1", 
        "example2" => "Example 2", 
        "example3" => "Example 3", 
        "example4" => "Example 4", 
        "example5" => "Example 5" 
        )       
    ));

}
add_action('customize_register', 'matisse_layout_register');
/**************************************************************************************************/
function matisse_g_fonts() {
       $header_font = get_theme_mod('header_font');
       $header_lang = get_theme_mod('header_ext');
                
        if ( 'Latin' == $header_lang )
        $subsets = 'latin,latin-ext';
        elseif ( 'Cyrillic' == $header_lang )
            $subsets = 'latin,cyrillic,cyrillic-ext';
        elseif ( 'Greek' == $header_lang )
            $subsets = 'latin,greek,greek-ext';
        elseif ( 'Vietnamese' == $header_lang )
            $subsets = 'latin,vietnamese';

        $protocol = is_ssl() ? 'https' : 'http';

switch ($header_font) {
case 'Open Sans':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Open+Sans:400,400italic,700', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Droid Sans':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Droid+Sans:400,700', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Droid Serif':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Droid+Serif:400,700', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Oswald':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Oswald:400,700', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Ubuntu':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Ubuntu:400,700', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'PT Sans':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'PT+Sans', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'PT Serif':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'PT+Serif', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Arvo':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Arvo', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Lato':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Lato:400,700', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Source Sans Pro':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Source+Sans+Pro:400,700', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Signika':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Signika', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Vollkorn':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Volkhov:400,400italic', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Old Standard TT':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Old+Standard+TT:400,400italic', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Cutive':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Cutive', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Amaranth':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Amaranth', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Merriweather':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Merriweather', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Abril Fatface':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Abril+Fatface', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
case 'Sansita One':
wp_enqueue_style( 'typo-fonts', add_query_arg( array('family' => 'Sansita+One', 'subset' => $subsets), "$protocol://fonts.googleapis.com/css" ), array(), null );
break;
    }
}
add_action( 'wp_enqueue_scripts', 'matisse_g_fonts' );
/**************************************************************************************************/
function matisse_header(){
	$logo_link = get_theme_mod('link_logo');
	$matisse_heading_tag = (is_home() || is_front_page()) ?'h1' : 'h2';
	
if ($logo_link ) :
?>
<<?php	echo $matisse_heading_tag;?>
 class="six columns"> <a id="logo" href="<?php	echo site_url();?>"> <img src="<?php echo esc_url($logo_link);?>" alt="<?php	bloginfo('name');?>" title="<?php	bloginfo('name');?>" /></a></<?php	echo $matisse_heading_tag;?>>

<?php	else :?>

<<?php	echo $matisse_heading_tag;?>
 class="six columns"> <a href="<?php echo site_url();?>" title="<?php bloginfo('name');?>" ><?php bloginfo('name');?></a></<?php echo $matisse_heading_tag;?>>
<?php endif;
	}
/**************************************************************************************************/
function matisse_wp_head() {
    $color_link = get_theme_mod('link_color','#dd3333');
    
if ( $color_link) {
   echo '<style type="text/css" media="screen">a { color: ' . $color_link . ' }</style>';
}
}
add_action('wp_head', 'matisse_wp_head');
 /**************************************************************************************************/
function matisse_font_css() {
        $options = get_option('matisse_options');
        $header_css = get_theme_mod('header_font','Georgia');
        $txt_css = get_theme_mod('txt_font','Georgia');
        
        if (($header_css !='Georgia') || ($txt_css !='Georgia')) {
        wp_register_style('font', trailingslashit(get_template_directory_uri()) . 'css/font.css', '', '03022013', 'all');
        wp_enqueue_style('font');           
        }
          
        }
add_action('wp_enqueue_scripts', 'matisse_font_css');
    /**************************************************************************************************/
    function matisse_header_classes($classes) {
        $header_logo = get_theme_mod('link_logo');
        $header_font = get_theme_mod('header_font','Georgia');        
        $txt_font = get_theme_mod('text_font','Georgia');
 
 if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
$classes[] = 'single-author';
if ( is_singular() && ! is_home())
$classes[] = 'singular';    
if (is_active_sidebar('first-footer-widget-area') || is_active_sidebar('second-footer-widget-area'))
$classes[] = 'footer-widget';
else
$classes[] = 'footer-no-widget';
           
    if ($header_logo ) :
        $classes[] = 'logo';
    endif;
   if ($txt_font ) {
       $stringtxt = mb_strtolower($txt_font, 'utf-8');
       $classes[] = str_replace( " ","-",$stringtxt ).'-txt';
   } 
   if ($header_font) {
       $stringheader = mb_strtolower($header_font, 'utf-8');
       $classes[] = str_replace( " ","-",$stringheader ).'-header';
   }    
        return $classes;
    }
    add_filter('body_class', 'matisse_header_classes');
/*********************/     
function matisse_customize() {
    // add the Customize link to the admin menu
    add_theme_page( 'Customize', __('Customize', 'matisse'), 'edit_theme_options', 'customize.php' );
}
add_action ('admin_menu', 'matisse_customize');
/*********************/    
?>