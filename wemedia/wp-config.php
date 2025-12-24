<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
 * This has been slightly modified (to read environment variables) for use in Docker.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// IMPORTANT: this file needs to stay in-sync with https://github.com/WordPress/WordPress/blob/master/wp-config-sample.php
// (it gets parsed by the upstream wizard in https://github.com/WordPress/WordPress/blob/f27cb65e1ef25d11b535695a660e7282b98eb742/wp-admin/setup-config.php#L356-L392)

// a helper function to lookup "env_FILE", "env", then fallback


// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wemedia_db' );

/** Database username */
define( 'DB_USER', 'wemedia_user' );

/** Database password */
define( 'DB_PASSWORD', 'adgasdfasasdfa234523@@.@' );

/**
 * Docker image fallback values above are sourced from the official WordPress installation wizard:
 * https://github.com/WordPress/WordPress/blob/1356f6537220ffdc32b9dad2a6cdbe2d010b7a88/wp-admin/setup-config.php#L224-L238
 * (However, using "example username" and "example password" in your database is strongly discouraged.  Please use strong, random credentials!)
 */

/** Database hostname */
define( 'DB_HOST', 'db:3306' );

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
define( 'AUTH_KEY',         'ab665d68bead3985ced568b67449317b051dfdea');
define( 'SECURE_AUTH_KEY',  '413f9b1030ab4eef5110a817eae4d0748f8e2ca6' );
define( 'LOGGED_IN_KEY',    'ae62e3de5644cb76b00475920f64c57f09c2c1e2' );
define( 'NONCE_KEY',        '7c8ea71501fb05bee229cac5bea0e7dd31c2bee6' );
define( 'AUTH_SALT',        '295ffcf10df98c1609bab5ed4e215a9a7564a672' );
define( 'SECURE_AUTH_SALT', 'e0cd666770ceffe1663985cbbaaeb15a00fd535d' );
define( 'LOGGED_IN_SALT',   '4b098ab9a2a7f95c626cd90ad770be94a9e12fba' );
define( 'NONCE_SALT',       '199d10fad1c18208bd78380eae64fd7d37c755fd' );
// (See also https://wordpress.stackexchange.com/a/152905/199287)

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'ws_';
define('FS_METHOD', 'direct');
define('WP_POST_REVISIONS', 3);
define( 'AUTOSAVE_INTERVAL', 120);

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */

/* Configure HTTP Proxy Server */
// define('WP_PROXY_HOST', '172.16.190.254');
// define('WP_PROXY_PORT', '8080');
// define('WP_PROXY_USERNAME', '');
// define('WP_PROXY_PASSWORD', '');
// define('WP_PROXY_BYPASS_HOSTS', 'localhost');


define( 'WP_MEMORY_LIMIT', '1024M' );

define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

define('COOKIE_DOMAIN', false);

define('WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] .'/');
define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] .'/');
define('WP_CONTENT_URL', '/wp-content');
define('DOMAIN_CURRENT_SITE', $_SERVER['HTTP_HOST'] .'/');

/* Add any custom values between this line and the "stop editing" line. */

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also https://wordpress.org/support/article/administration-over-ssl/#using-a-reverse-proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strpos($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') !== false) {
	$_SERVER['HTTPS'] = 'on';
}
// (we include this by default because reverse proxying is extremely common in container environments)


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
