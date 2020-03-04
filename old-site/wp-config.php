<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'srs');

/** MySQL database username */
define('DB_USER', '2010jlee');

/** MySQL database password */
define('DB_PASSWORD', 'BsKVsnWS9ZZqDAzA');

/** MySQL hostname */
define('DB_HOST', 'mysql.tjhsst.edu');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Defining this as direct forces wordpress to use direct downloads for all updates/installations
This is necessary because wordpress cannot properly detect that it has write access on AFS. */
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'SI!A:)2`r_fE/fU%N5Y|OQ|!]bJn->)B@f0uNQnE[+S*0G5GfOD+Af8gJ9!*p{X?');
define('SECURE_AUTH_KEY',  'J]h^>^Rk5fiF5`{*ovrXnH9Mh?{nfw?eEYWf-m4h MAc<yjG`W~G*/5~H?+EX0d?');
define('LOGGED_IN_KEY',    'EIA4Q:W$Zr!zYgXW24I:A~U(^pj+qZC+Y +k$?+oW4|/oiKF$tj9:~2-M)=O)VMB');
define('NONCE_KEY',        'l:<Th<he*vUYbP5Da|#I+QNhq`;MH Am:pL>>;S<cOP3ao9h&rcZW-!$<}MG]_v%');
define('AUTH_SALT',        'WqL;{:/-vt`=$c2( P4p>K+)))Zu{V5 |`[w?VM8@`~j82RFI%IQ-!t5m0ed<,UM');
define('SECURE_AUTH_SALT', 'lMOQs~|%WqXv(3}i`Ar?%]FV%5fQPbqvZE4k.*;z[}+-zCuZ`*y-n`(#E*9[d62V');
define('LOGGED_IN_SALT',   '-{1K;GcSp4{Np_jRd2uE`dCRbADXSRVtoZV-IF]G-.nmSQLy;2)q`Lt5M75}*^NR');
define('NONCE_SALT',       '5-u?rn!*o=-*g~n:U8&aJc*{3Ty8AYy>Zc+I> )^5trI,tK}JPsBCE,4!QG05,(@');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

$_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
define('WP_HOME', 'https://academics.tjhsst.edu/srs');
define('WP_SITEURL', 'https://academics.tjhsst.edu/srs');

$_SERVER['REQUEST_URI'] = str_replace("wordpress", "home",
        $_SERVER['REQUEST_URI']);
