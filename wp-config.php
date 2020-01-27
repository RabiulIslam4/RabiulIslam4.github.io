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
define( 'DB_NAME', 'jisan' );

/** MySQL database username */
define( 'DB_USER', 'jisan' );

/** MySQL database password */
define( 'DB_PASSWORD', 'SRg6orj7lDnReaB1' );

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
define( 'AUTH_KEY',         ':P@Jz:5aDJ8]~2l7.!V?#OzDoi]/H5eW/^gAMxj~<3Ma0%0A+Y#+}Wnl7QlI;W>!' );
define( 'SECURE_AUTH_KEY',  'b }0L7uypn`v!meDA|Q>+==@?pugE-r7pCC_IxWP=5@8|wbEV,8[MN)Z[+j?Kbz3' );
define( 'LOGGED_IN_KEY',    'p)UVYhW?i[>qlSN;nHYf|L[qHc.zYLVI/o*pZ{oQi a`u&lsH1b/h(G3ryl~qX!-' );
define( 'NONCE_KEY',        '-+Pb-%,9^e)TPG4pBzfo~ACD=MY&|;t1W]G+se#cl=etu[9[dQzgWS_NPo.4Fkvj' );
define( 'AUTH_SALT',        '&MQABb>t|beYbfEBZ`$n:eMb_a+Nx$F<*h&K,]oXP,rBKX?9`.sL5hMp~Qj-Y7rY' );
define( 'SECURE_AUTH_SALT', '8r7+Fln *:0w<v.[Ck*M<5ix2e) Y+stJPky72?u?:3OBIq5Je~a-Ef8Tr9#>>x+' );
define( 'LOGGED_IN_SALT',   '>x;K>ER#+hyLsBRw4NAm(H+&_l_Ke(Rw<~U3GQ>3vX/r9BwbsR*1b!rxa$GDYsV>' );
define( 'NONCE_SALT',       'JFet/n/&~fZxBN>=[!~[z%/p#6&RGugO{@q9mz9oi?{.Z6R(XPJk*Z$QJ!prdp~ ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'js_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
