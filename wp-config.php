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
define( 'DB_NAME', 'wp_gym' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'p^e ?o!E%.Vvs$@Xttg`TOs0+bA!is*#[V8T:r0N)?EW-9/RnABL])%$9^g0z)2#' );
define( 'SECURE_AUTH_KEY',  'o~c.LC[,E]#?^$iN&L@B1eB{D[IL 0<V;?:`HwVh_vr/1zEN*<6I=^~qi(ldMMAB' );
define( 'LOGGED_IN_KEY',    'ZcK{/w!Yiy{g<{Il_U>_ylc[`i&ZQZSrEAX*y#[#.9BA0z;!@$$hSKwmm=Ck:Nlc' );
define( 'NONCE_KEY',        'UALUeisN:.eFsKIWMNcJ55k_uV5>uBElu%@m?`P  -lD/# 1C(DxwBuc,vp]rNRa' );
define( 'AUTH_SALT',        '72eZKLJwmC3w%461 R@1>Jfd-4]&6#bIYG<*g`[z|96zwtfpOW/}9<D/$,5R4BVI' );
define( 'SECURE_AUTH_SALT', 'op0.o$X3.0rDZ0%lXhj V4(!q)o5eDrCfD8R!UdlgGZ+sz|XwuADQ+,e-Le+1Cz<' );
define( 'LOGGED_IN_SALT',   'Pb$)0raRm)A<*cvYtPy7ePBADqsQboV<i;nvxEO|qwewVm@cd/*+ctjtTzoZ?*Ca' );
define( 'NONCE_SALT',       '+@=1i2]t:A sO1xYyUn n%eQ&<$_F/.H#Hoz^U&3c!+UeOw04Dv&Bn2xg-wvstX_' );

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
