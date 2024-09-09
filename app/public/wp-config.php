<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'WW2Fpy!o*1 -IaQ^0HZ/F*v%w;f,97g)K=G<6i;`[67FcUd]CXF3dT[8ul`2/:kx' );
define( 'SECURE_AUTH_KEY',   'g%:3;K_S(|@%W|?HiQ-& QFtj;mak{,|sUzpjbAD_b1!%aLuh<!G?H,_4%yPreCU' );
define( 'LOGGED_IN_KEY',     '?C)nRscZz<}*3asBodvI)L2vw6X%q`=p?aMC;/g<~G5%2G6,e0Vx]i}-r~M#AjG8' );
define( 'NONCE_KEY',         'v~K3AyiW.h[z.6G7qWnKHD>{J4]jg6|J2RkI7O4wM##[$UHn>kA~][RRR@vo,V!*' );
define( 'AUTH_SALT',         '9s_?Y@yA`WX37Zyo%{(w*`{2nv&,[8oZe&8Z/6oz8puENbTjAwxg~J6q!:iV~eAD' );
define( 'SECURE_AUTH_SALT',  ',]SF13N`<OLH- c6tf7^?{og|B3coBia65TSa>:y1uG3SuwJwF)fCIrB](R6}Z1x' );
define( 'LOGGED_IN_SALT',    '> A<`=,$.6T?Wm-/#jOx]Cg%soqbmSiUAiy<SCp`=H)7!qZp]auZ)M~7k*6Vjk}<' );
define( 'NONCE_SALT',        '8A$v6b/8.ItfjAA~zkkXwE/6~d*AF=f]#<CTA:$q]zVH0.G[{<@c:)SH>~~=}Ij8' );
define( 'WP_CACHE_KEY_SALT', '-~vU)~eZFj7DkUlav7r)G.O8WUbTVhkbc9le75EapZp~0r6FR!TuZm,(3Wj/?wmb' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
