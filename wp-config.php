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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'if0_37981912_wp94' );

/** Database username */
define( 'DB_USER', 'if0_37981912' );

/** Database password */
define( 'DB_PASSWORD', 'Ut2nMVH1oKJnLqA' );

/** Database hostname */
define( 'DB_HOST', 'sql100.infinityfree.com' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'HfHDh9q2oSy6ue7bftmn9dVXXE3veejtMgif40m72wkIv4b7HNlRHA5wGIT4YIt1' );
define( 'SECURE_AUTH_KEY',  'SHYvPBwtVbVrem782CmdZlTAPyPzxbNk9TqUXcoTvVVfBINIp87rk2Ik2UWJc9BM' );
define( 'LOGGED_IN_KEY',    'w3saB5hmxjDGTK0r9PWMmDQFR9lN9FVRth6N8h9CWeG6Bovhb1PXriF7cJsXKg0S' );
define( 'NONCE_KEY',        'R5w8o4B9CTpYPXRvKY1DgbVbek4ed9o9FOIxlYW0mYecspsEzp6IrVJkVeMiraQG' );
define( 'AUTH_SALT',        'krWmLEjKV7KDR3v60KgYKel8g6SY6pwjwhak0pxaM0RAXuUvIdVn62yZCtzMSX61' );
define( 'SECURE_AUTH_SALT', 'MNmB0e1mdi6iT90FyxxjfgL5jQIJYGEunKB8WR8bdjuZtzmlR1L3J8mDkHnhkLjk' );
define( 'LOGGED_IN_SALT',   'bv8HJw2zpcEMnMjZ5uHUrz2i1kYjXysdpfETXqjXDL6f085X97jKyuNzx5Vco7Mo' );
define( 'NONCE_SALT',       'PQAmvZMr2kl13amibIhsOQYn3Uuxy4AKKDjM9v5G56Q50NMxUZ4gGKKlIUrqWfkt' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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