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
define( 'DB_NAME', 'website-database' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'HfP9_xHGXcxKwq!&g(BLr,UlP7@SDq6:b> ksJe<fzb? r*A.e&ikoW FHnM@,9@' );
define( 'SECURE_AUTH_KEY',  'n/_V26h:vsb^O[oFI*Dd9}&lH6/L#ba0[]z}FE$VoP<B:.!ifOz!tOO_-fy/fO[y' );
define( 'LOGGED_IN_KEY',    '5<l!K&t{(9YNCm!bCZ114#>8SY&-uHo->({9MuYZP=Rn2uJsmBM$qWCj[}B^WM<]' );
define( 'NONCE_KEY',        '.GgimUr<RY+2{fKgL:1ntzMyZOYoT,V>AbB}3 )Sq0@hPA5ziN8{{@x>Pyg(CTo1' );
define( 'AUTH_SALT',        'e:6@@DRvH&aqA&q&Pt`1>+, /nmQ4sik>Ppw@KZ`*wSRgUTYmQ%gVTpEbn`pstRU' );
define( 'SECURE_AUTH_SALT', '~iWcmAF;_*FbuqZi52Zkx(sQ4ipHzipp&,hmL2|3T~Q.cZ]|fu+yG~*ra:s0l+ey' );
define( 'LOGGED_IN_SALT',   ':_6adJhP9Q-58jP|0:hhDLUjsAF<2jT8Ht7>P#}4:&@HVsX9)taW:a%CrzBhuJB ' );
define( 'NONCE_SALT',       ':.Fm~Uzrh4Z)YNgq%6{}XDCOCl$w&>W^vuIm*ys42oU/upJq/H$A2ADofi<[`}T|' );

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
