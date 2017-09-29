<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'airbnb');

/** MySQL database username */
define('DB_USER', 'dev');

/** MySQL database password */
define('DB_PASSWORD', 'narola21');

/** MySQL hostname */
define('DB_HOST', '192.168.1.48');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '#Y/k}w{M)b8c/!]H}#PCs7iBL>gPXSrRu6)L&<[S@T9]vd !/9E4jxylrhk ;8M7');
define('SECURE_AUTH_KEY',  ']/Y[@1!=xV;,PN=WkAf1?@?;p{xhC/2N(AXulQmH !Z%Ic<:e24kWZUNdt7@XG X');
define('LOGGED_IN_KEY',    '2es_WF[HhcX;Lxx08tk_,DOsu|9o*BySrN*vTad[fAPyL;B*VCJb,}}$J$AHu?)t');
define('NONCE_KEY',        '$zr/P>8cX8X:oQD;>7:gAm^]oGiS&dQ)@lioBZPnkB^fbL]NBYmu5hh}_5hEkM0z');
define('AUTH_SALT',        '|!.^NNK.^Wh31DFq< ^Lw<-<d!40}$t6=KgCSm1=UB}10AIR1IozVj12oBYfJ_!F');
define('SECURE_AUTH_SALT', 'td4z8:miJd,{8GDu~SrI{am;6p)#m`TJ7PAbbhPv4FhBe?u[(t4xKp(,+a>Dl*;f');
define('LOGGED_IN_SALT',   'qY?GgR)dB5rtV@U~ FbB[Xei~RW-* `~nqd3pUbFK<3@Pi4>~GoO0idLH8}1zmpk');
define('NONCE_SALT',       '9Hd<nZ.BALgj<*Q<=AY/si}krW:5{l7{*Bx9?HbK]4:U4,]>8` f0x.2yo)O#[+y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', FALSE);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
