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
define('DB_NAME', 'vhost31443s0');

/** MySQL database username */
define('DB_USER', 'vhost31443s0');

/** MySQL database password */
define('DB_PASSWORD', 'xiGYzotIel');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ori&#4$k<LbR1ej?9jRv0DIS.Gp{yq};QIq%C+xVdM:nYG!Jwr+Hd-W< _:50Z=K');
define('SECURE_AUTH_KEY',  '*X^0O9~/QPp2Q)lcNjwGXCpkXi<]`rIFZ#Q.b+MI:Q+fC]#I+]Rwf<3h`5fog4+|');
define('LOGGED_IN_KEY',    '5Ix{77pbZlT!fC=9R|,Go]{,V+Ok+|9%b}+Z:9#U+G6EB:[iXE-%5N-p_24n]<8E');
define('NONCE_KEY',        'B{os[TPD?u@s<9d|V_-pd0YPn4 ugvXI|SS)DJTBZ?+,T^Xny>dgMqT_!$u!6:nk');
define('AUTH_SALT',        'a&;EpuRn;bkC)K,p#:XURbP6M>7N7S-cqe4q@BR`LAsE7/ZsLe]bkf4ENU0-F{7L');
define('SECURE_AUTH_SALT', 'njKP2`06YZ,$Kn#,dq`Eg67[=Gv84ha&m$B03_fxfv!%5~ycB5GPVw?|nIM*C!9N');
define('LOGGED_IN_SALT',   '!~UjLGgT~V{SxqyD-J{x?bt6[ez;g}eF^-bJqK-pSTj][}_e2^w-}PMa$v;NE=PF');
define('NONCE_SALT',       '8;;Zl=k.k:o0Lf+XT9+o/)ij2gMf+bX4V1+D(>j;.xM>@bFjKSaF!c|iGdUse~} ');

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
/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'eida.st');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
