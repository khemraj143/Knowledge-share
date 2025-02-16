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
define( 'AUTH_KEY',          '2~==%14Noj)Z~+=+-xAk]dma*,QFCN@).Yd](&_xlOnv r^lZK_ir@81^=/3z+y.' );
define( 'SECURE_AUTH_KEY',   'm/Xd|xyeM7l`5h_$MZG}|OCTJD=_d[m6E?gB=8toge%;@h/%ha&((czubBq7$XV@' );
define( 'LOGGED_IN_KEY',     '#-Dwu^)T#gF(Mi_ou&zQ)x(Z/8|xI;M oy)7+lk;9k+YE~WD|C)}=oQ#G8IB,s`m' );
define( 'NONCE_KEY',         'Va~U8O<@fj.@x^!vx)iKhD 7*i9ac58tJ:,HCZ-hIFHG:H~N0y=#r!MF{B{dp)Pd' );
define( 'AUTH_SALT',         'P{#2z7`^iBejCr2yx]t0Mi%f9R<.=qkCN*R/>SCZ,ys(HD.t_.(?VbCr+1LPWu/)' );
define( 'SECURE_AUTH_SALT',  'A5Z& py(.w]/HROh9s!dc:gKylW}td89AF6Ym!guG: T;{*Y<M9W}2|6i$Z$3`vI' );
define( 'LOGGED_IN_SALT',    '2*RF<8B^`m!cmRW0NC4ntpAg@&x&r$,2-b90Ko:xuV/aX%FTt|Bw`;?eQy`0s&+6' );
define( 'NONCE_SALT',        '4$<.&dvr~r+9ZE<<`%t9(AKt(e;3mdjIvg-~V|c@wT4mulw;L.1`S0]T.!,7V|Nu' );
define( 'WP_CACHE_KEY_SALT', 'jmc|/]?W`~o_uSw`D8~1sm#Zb&tU9x $)X0r$^q#rO.6eygvljfbzCQ;._[]ZW)C' );


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
