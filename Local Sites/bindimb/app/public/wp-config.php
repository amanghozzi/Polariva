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
define( 'AUTH_KEY',          '=cBD?J~=Na.,3i=~#feQ=Nnk<~fWZx_uM7>t?BKVUs-J[j8h#b6#osN)3C;bSZVg' );
define( 'SECURE_AUTH_KEY',   'S~]+}kV0K;.|O9;4E,lu!esUNvzJWgzp&f&=[ugU]&yED^D?y(d?,CHHn3;qaKDi' );
define( 'LOGGED_IN_KEY',     'x6q0wr|ZWB]h(_CH8%v6[T?$,j5s{UY;nI^lNSN6A9~,<O:I*>kL-%KjI)OZccl<' );
define( 'NONCE_KEY',         '5uz1[hdyw0+G4tG-9~Y0_E5yqMi16c`R%J$it8Dl;:.=$tO-f6WPd04<I|f)6jPD' );
define( 'AUTH_SALT',         'nW$R)y35u:0`!z&f`_RoKSH=R0TrD8 %N-r0l#1+*q/jW,Qw~bR9f,!Q%a@sr>v$' );
define( 'SECURE_AUTH_SALT',  'Vr>V|w_= d0jZ7+G_g$61MPxb-uz3Zr>8&pP1n}mfd>>`Ft;vVxI]r#wVIWGCk@r' );
define( 'LOGGED_IN_SALT',    '/sUE}0MRy3,wXpT[MT?Tda==tsvx?~Od06->=/2`Rp/3;c0&~Pgj,>>i@u4U=Fkc' );
define( 'NONCE_SALT',        'gmxXu%qRJBz{=-1K!;O71D_Sb^ZC&8j*;Zq+gJz<_]M&}b%=7+9|2quqY=>3hlGJ' );
define( 'WP_CACHE_KEY_SALT', 'lB_>k${C*^1o9xpK)[<B$/wa=P^B&KQ3TLT7phDk;Hix[#Pt%EE)LL>4>ci5BGN!' );


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
define('WP_MEMORY_LIMIT', '512M');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
