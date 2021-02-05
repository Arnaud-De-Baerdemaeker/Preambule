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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'preambule' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Q CKl?^V4=>@du2(d,y;@isQC9oz0w^;tL@zTxTw>Pb(uBDaO%O8;5yP}*,9E0=-' );
define( 'SECURE_AUTH_KEY',  ']J$d[i]j#AS:)0XMPr%`7id;rKR0uD0XOSu@zcHM]8UpH.<qVR0l:CXE]Sr*n){4' );
define( 'LOGGED_IN_KEY',    '>Dw0S}r7~kJjsI f)ImZFi>0AU> i@(pylIVom5AUp!Q9>_PaIgDg=]0_], *DUa' );
define( 'NONCE_KEY',        '{N]C37ugs9a3Vg2Z._hr4bXH]~u=E8V6?}9hEZQT%r>lSz4o(BbmhP23*C|tE&$`' );
define( 'AUTH_SALT',        '$m|8VGQsh^p36ZQfb+j;W=9a/)xfm(;mas>K#j-A T(J/-jFviy`ja}w?iV,](Pu' );
define( 'SECURE_AUTH_SALT', 'edd%NXmC?NXw@>`fpH:lblLwq&&|[=krT9 !/ova  bnNyDY 3uXZN8XUtt5jhI+' );
define( 'LOGGED_IN_SALT',   'imD5t~zOeM~]UzkUR3aAI3Oyv;rql%I6tYY2-Bm J/Sa(n(O8ZWIW|Gd(Z$?*Iyl' );
define( 'NONCE_SALT',       '}3p15%pVg[pM%b~Ip<H3rTuSvH48BGO{ 2~w,1M`TGD]p@Z-bn`-V,:y)UR/C$E5' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
