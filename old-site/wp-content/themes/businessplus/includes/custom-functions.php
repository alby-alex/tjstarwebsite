<?php

add_theme_support( 'automatic-feed-links' );
add_editor_style();
//add_custom_image_header();

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 610;

/*-----------------------------------------------------------------------------------*/
/*	Custom Menus
/*-----------------------------------------------------------------------------------*/
function register_main_menus() {
	register_nav_menus(
		array(
			'primary-nav' => __( 'Primary Nav','themejunkie' ),
		)
	);
}

if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

/*-----------------------------------------------------------------------------------*/
/*	Register and deregister Scripts files	
/*-----------------------------------------------------------------------------------*/
if(!is_admin()) {
	add_action( 'wp_print_scripts', 'my_deregister_scripts', 100 );
}

function my_deregister_scripts() {
		wp_deregister_script( 'jquery' );
		wp_enqueue_script('jquery', get_template_directory_uri().'/includes/js/jquery.min.js', false, '1.6.4');
		wp_enqueue_script('jquery-superfish', get_template_directory_uri().'/includes/js/superfish.js', false, '1.4.2');
		wp_enqueue_script('jquery-custom', get_template_directory_uri().'/includes/js/custom.js', false, '1.4.2');
        wp_enqueue_script('jquery-quicksand', get_template_directory_uri().'/includes/js/jquery.quicksand.js', false, '1.2.2');
        wp_enqueue_script('jquery-ui', get_template_directory_uri().'/includes/js/jquery-ui-1.8.5.custom.min.js', false, '1.8.5');
        wp_enqueue_script('jquery-flexislider', get_template_directory_uri().'/includes/js/jquery.flexslider-min.js', false, '1.0');
        
        //wp_enqueue_script('jquery-lazyload');

		if ( is_singular() && get_option('thread_comments') ) wp_enqueue_script( 'comment-reply' );
}

/*-----------------------------------------------------------------------------------*/
/*	Remove 'P' tag from post excerpt
/*-----------------------------------------------------------------------------------*/
remove_filter('the_excerpt', 'wpautop');


if (is_home() || is_archive() || is_search() ) {
	add_filter('img_caption_shortcode', create_function('$a, $b, $c','return $c;'), 10, 3);
} 


/*-----------------------------------------------------------------------------------*/
/*	Exclude Pages from Search Results
/*-----------------------------------------------------------------------------------*/
function tj_exclude_pages($query) {
        if ($query->is_search) {
        $query->set('post_type', 'post');
                                }
        return $query;
}
add_filter('pre_get_posts','tj_exclude_pages');

/*-----------------------------------------------------------------------------------*/
/*	Get related posts by taxonomy
/*-----------------------------------------------------------------------------------*/
function get_posts_related_by_taxonomy($post_id, $taxonomy, $notin, $args=array()) {
  $query = new WP_Query();
  $terms = wp_get_object_terms($post_id, $taxonomy);
  if (count($terms)) {
    // Assumes only one term for per post in this taxonomy
    $post_ids = get_objects_in_term($terms[0]->term_id,$taxonomy);
    $post = get_post($post_id);
    $args = wp_parse_args($args,array(
      'post_type' => $post->post_type, // The assumes the post types match
      //'post__in' => $post_ids,
	  'post__not_in' => array($notin),
      'taxonomy' => $taxonomy,
      'term' => $terms[0]->slug,
	  'posts_per_page' => get_option('businessplus_related_portfolio_num')
    ));
    $query = new WP_Query($args);
  }
  return $query;
}

function is_multiple($number, $multiple) 
{ 
    return ($number % $multiple) == 0; 
} 


/*-----------------------------------------------------------------------------------*/
/*	Get limit excerpt	
/*-----------------------------------------------------------------------------------*/
function tj_content_limit($max_char, $more_link_text = '', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "";
      echo $content;
      echo " ...";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "";
        echo $content;
        echo " ...";
   }
   else {
      echo "";
      echo $content;
   }
}


/*-----------------------------------------------------------------------------------*/
/*	Twitter Stream
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'tj_twitter_script') ) {
	function tj_twitter_script($unique_id,$username,$limit) {
	?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	
	    function twitterCallback2(twitters) {
	    
	      var statusHTML = [];
	      for (var i=0; i<twitters.length; i++){
	        var username = twitters[i].user.screen_name;
	        var status = twitters[i].text.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
	          return '<a href="'+url+'">'+url+'</a>';
	        }).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
	          return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'">'+reply.substring(1)+'</a>';
	        });
	        statusHTML.push( '<li><span class="content">'+status+'</span> <a class="twitter-timestamp" href="http://twitter.com/'+username+'/statuses/'+twitters[i].id_str+'">'+relative_time(twitters[i].created_at)+'</a></li>' );
	      }
	      document.getElementById( 'twitter_update_list_<?php echo $unique_id; ?>').innerHTML = statusHTML.join( '' );
	    }
	    
	    function relative_time(time_value) {
	      var values = time_value.split( " " );
	      time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
	      var parsed_date = Date.parse(time_value);
	      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
	      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
	      delta = delta + (relative_to.getTimezoneOffset() * 60);
	    
	      if (delta < 60) {
	        return 'less than a minute ago';
	      } else if(delta < 120) {
	        return 'about a minute ago';
	      } else if(delta < (60*60)) {
	        return (parseInt(delta / 60)).toString() + ' minutes ago';
	      } else if(delta < (120*60)) {
	        return 'about an hour ago';
	      } else if(delta < (24*60*60)) {
	        return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
	      } else if(delta < (48*60*60)) {
	        return '1 day ago';
	      } else {
	        return (parseInt(delta / 86400)).toString() + ' days ago';
	      }
	    }
	//-->!]]>
	</script>
	<script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/<?php echo $username; ?>.json?callback=twitterCallback2&amp;count=<?php echo $limit; ?>&amp;include_rts=t"></script>
	<?php
	}
}

function tj_save_tweet_link($id) {
	$url = sprintf('%s?p=%s', home_url().'/', $id);

	add_post_meta($id, 'tweet_trim_url_2', $url);
	
	return $url;
}

function tj_the_tweet_link() {
	if (!$url = get_post_meta(get_the_ID(), 'tweet_trim_url_2', true)) {
	  $url = tj_save_tweet_link(get_the_ID());
	}
	
	if ($old_url = get_post_meta(get_the_ID(), 'tweet_trim_url', true)) {
	  delete_post_meta(get_the_ID(), 'tweet_trim_url');
	}
	
	$output_url = sprintf(
	  'http://twitter.com/home?status=%s%s%s',
	  urlencode(get_the_title()),
	  urlencode(' - '),
	  $url
	);
	$output_url = str_replace('+','%20',$output_url);
	return $output_url;
}

/*-----------------------------------------------------------------------------------*/
/*	Add custom type RSS
/*-----------------------------------------------------------------------------------*/
function myfeed_request($qv) {
	    if (isset($qv['feed']))
	        $qv['post_type'] = get_post_types();
	    return $qv;
	}
add_filter('request', 'myfeed_request');

/*-----------------------------------------------------------------------------------*/
/*	Get Author's info
/*-----------------------------------------------------------------------------------*/
function tj_get_users($users_per_page = 10, $paged = 1, $role = '', $orderby = 'login', $order = 'ASC', $usersearch = '' ) {

	global $blog_id;

	$args = array(
			'number' => $users_per_page,
			'offset' => ( $paged-1 ) * $users_per_page,
			'role' => $role,
			'search' => $usersearch,
			'fields' => 'all_with_meta',
			'blog_id' => $blog_id,
			'orderby' => $orderby,
			'order' => $order
		);


	//Query the user IDs for this page
	$wp_user_search = new WP_User_Query( $args );

	$user_results = $wp_user_search->get_results();
	// $wp_user_search->get_total()

	return $user_results;

}

?>