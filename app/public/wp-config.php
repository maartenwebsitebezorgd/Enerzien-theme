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
define( 'AUTH_KEY',          'F}f{+])Z;u}9R9VXV1Y!ugaa*x&-REB`I,eOEYm_lvP-}VG1{e&1WN|.lnTaG#&f' );
define( 'SECURE_AUTH_KEY',   'cBk0N=wc=v(RKQ}{Ut=HGvJ rThH_eEiP=$VVH H,j_ayK<3#!)r^!6n^&8!45a]' );
define( 'LOGGED_IN_KEY',     'f!qg/lVfIZu6EfQipRRfRbqwx|@HB8bxM7[+aD+(-@W:R`qL,a[P[V6NTjzzo3Y_' );
define( 'NONCE_KEY',         '{dBzy>V%a}xUjazmkeb|f!,`0TI~*,~v&n?mNq,;]&5::pm{E63bbX>StP/HZ4$k' );
define( 'AUTH_SALT',         'c?]y*y7OR<vUmrhBBU^;/GP~JL,nBXzNl&dPW;!Q$-6$,.*%hoM |4;UNF0ph593' );
define( 'SECURE_AUTH_SALT',  'bJKHW;+jO*BQ[4rSxXO}KvszhzdR_p0<O3YTiuM,;0:!<$m|6&QyaO08G<]kanIK' );
define( 'LOGGED_IN_SALT',    '<Yu&6I&mYxY75nsd(3?={sIVN{8cF5 ;sgP.HsL}.0fWe_lWF!TMRk@I-)W(:b9E' );
define( 'NONCE_SALT',        'o6d.:{0<=Dax4ge2t$pcOg_o)<fJX)Qu&K2zpp?x!q3V_bRRXV5=/?o&b3D&-_NZ' );
define( 'WP_CACHE_KEY_SALT', '%;XD]Q$YrTFYAa]$0i3Qm]Wvii#<c2wC`g?+S7Rm>Z>|acnnGn$zu2{UFP`2]D%G' );


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
