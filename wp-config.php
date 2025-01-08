<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'greattrip.co' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '4[Z9 i ;$@W^h_ok!uu>!;qB;p22<hX.+}?4S+MW#MV+(z~se}D+#fbfq.T|fVmt' );
define( 'SECURE_AUTH_KEY',  '/0`#Zt*t%tM%*2Gu+!MmvXWQX;~6Oqqh{i;PZKsia3kmn!Um6bvm;(g=_aCWokV<' );
define( 'LOGGED_IN_KEY',    ')c!`o7Xp=5m,!?}gNk9$6x/Z,Szqum!7qkE}1:Fi3{>.DP.XHc`#6waWN}zL{hyZ' );
define( 'NONCE_KEY',        'OL1j>v}7NM2)?hAFPCyd+cv/~ rTu{l5SBuuB]s99k5Vyu(wI>nGxTV$e{7U~8>Q' );
define( 'AUTH_SALT',        'W*5CX^q:h^!24&esY&p {*<lxGL(B1~2MPf`JGq3c8MT27}=)wHR&8c/HGFg@[d*' );
define( 'SECURE_AUTH_SALT', '-HDb6DXslqp5,=etsO*6JaU%9_Kde%*`IkY,f0#^0#67l{nc[e CHf7ELlaR5J#E' );
define( 'LOGGED_IN_SALT',   'X.D,89QklfRt<v~]3`S  R2r]a_,vvUh}Q.{AHFN_D7eh[EEx{G#H,3)c=-~D7Eg' );
define( 'NONCE_SALT',       'jWL^nBOIWi`t)C3965Ec,i{NIBDqlohJ/>9{slI#!@jG.;3U+l8L,eCAfjRJ0MV<' );

/**#@-*/

// define('WP_DEBUG', true);
// define('WP_DEBUG_LOG', true);
// define('WP_DEBUG_DISPLAY', false);


/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
