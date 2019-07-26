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
define('DB_NAME', 'nova');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '< !,W>wT8E327.b+0_qS:Y#G!jYU@%FTKJsr%Rg3m7?|~iP1(}5mYQAM(|`s`*=u');
define('SECURE_AUTH_KEY',  ':8YM;Bk5V.q$3O2AT4smF=M<kzB0Vx.P>H$}TJvf]rM## T]z<@u;?ZxVAFk;iy ');
define('LOGGED_IN_KEY',    '6K9Jleym1TJAe*rD-CeIdnlhLh`XPC.Blj8)J|=q()W }(L`};g1NS:e`k#f *rK');
define('NONCE_KEY',        '}A)dzQHjS1t.tuhf7OyRe[7:kuBw|#iDNZLcfT&vQW$^_/5!g:ml(13yeUz7R*(6');
define('AUTH_SALT',        'P=BeK6o|@Pu,O_2CUV9=G_,JjK)*F^ RX@^Po}R 5ote>^!bq3Y3h*oXQ.+VGQ&t');
define('SECURE_AUTH_SALT', 'Gp``tq3eOT?&$]U3U&Dr}rOK(;#7T}+IZ^l#Aux@{Gn|[m]9#B}|&vj`R,[F:fr$');
define('LOGGED_IN_SALT',   'y$UjKAjD2y}z)K3Kwp5nMqiX?:Nlw)Zchv._LO%,}Y(-Y%E3oNm}M:&t:5Zwi4Pr');
define('NONCE_SALT',       'Kz2QtMn_0sTXV,yvG1+^Nl>)]dX[q*gL}yb{:8bKTEa2&C4WqPb&3n)}84gpmr<{');
const JETPACK_DEV_DEBUG = true;
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
