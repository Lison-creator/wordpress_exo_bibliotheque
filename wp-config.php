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
define( 'DB_NAME', 'wordpress_bibliotheque' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'e5A-iX~W;xT(2qp.u1Fbj?$gPp$:NXlI>@h7SP6`V~/k>;!:yGGB:Dq4(8751>r/' );
define( 'SECURE_AUTH_KEY',  '9=x@ZXY{;XBdTe<js]3k_|jmnO+jZ^OviH2FRR`}4&U*_dvS-r`M%?<Wtj@7cY{D' );
define( 'LOGGED_IN_KEY',    'hY!+{7vX8o<;fB?i.#0)5(1<bOWWo@Gg/N-6b(ML!d|ztH0:3{iu7%FKsbQ~c,3d' );
define( 'NONCE_KEY',        'r/&mGa Zty,-pejI[qM=@0/y Q#%X.&pzePh+*rT-lm>+?LsH;nC_fxPlaB%x=aV' );
define( 'AUTH_SALT',        'h%!yfbB8/N9D/7,@;En0;[+{2WTRdGl8BG_}2<xEFY8A+i=0%7o3d~kWnWd]sLZS' );
define( 'SECURE_AUTH_SALT', 'x:`Oh$`LbL0S|>}8A7%l{|D+9b+3&VwN]iM6*tIE_!sn3HWGQ|=d120,#I~PN0aC' );
define( 'LOGGED_IN_SALT',   '#&{Av^NFeqJqB)2PZ3y50qQ^X6T<V|M;V<WQ5Q[he:5gUU^0`W4_7Q:V/-XQ8Gf;' );
define( 'NONCE_SALT',       '&UWb.AsO$`=QXyN;q_{7`{mQ8nSw;e!qo*(-LfQ.TyzXVzytX(/uc8c*Ta2]>P;~' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
