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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'projectintern' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

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
define( 'AUTH_KEY',         '26QOR.L86(;j$.s:*W[5w|&7YZi5Ao#a_L}`YgDsp? iIHSo:O!g]z$);3-!(%<A' );
define( 'SECURE_AUTH_KEY',  '#x=-=k~/ow`?^sW/>A3!$2Y8}F]UHFT@$N>`s.pTW!o*Bk|yxf2HQm>r_7C*kiY}' );
define( 'LOGGED_IN_KEY',    '/e%LfHt&8YqaZHLK3QcT^<8D<4$4%|<mo/L!jr$7Mr)V?q~$=[C88*bt$>R8.Gg0' );
define( 'NONCE_KEY',        'P%[]48jK(]sTpcymwaC:?*vbXF3KHo),+5{LSfEP]|1`,U,t6YD6^]0l^O:8U14n' );
define( 'AUTH_SALT',        '82_&TXxg8QcYg>LQn<LHG|E6i@HqgMMLdc/LWY079VnXN:Ew4rtrAx>c|=PXA< T' );
define( 'SECURE_AUTH_SALT', 'pL:`5F@{,TlM4409qNk>]9E~cPl{@_;y:8YWO}ASD$7mcdtfN[*<UpI7Az _lP5x' );
define( 'LOGGED_IN_SALT',   'is6D)@^h !U-6luuvhVYDzAfu!n-wi(0#L;FLJ2vb6h6wx!MHN-}2u$AV7P2vF*#' );
define( 'NONCE_SALT',       'S~Ym-aMQk0U&v(w4]+>!cA.sI2S*u9K~{)k*>JV/{6j{-FDd%<F]aQ>0%<?:)~|V' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
