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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'CYWv3YOSwxZww+xqhY2gUMXJNdWZPrUHLQBRw1i8iAYWI/8ukqEiWddyoaEVElBu1qibrEdngSms53DsZxxuXA==');
define('SECURE_AUTH_KEY',  'GxpCSTL1UUegTd1JVdByVmhxHjaW3Z+zIIaaHTcPr3nmWfjfu2LR5xeUlmydwvXeVh1wFSugUgvclQMuYJJeQA==');
define('LOGGED_IN_KEY',    '8PlfgvFmI61j4pqf1xnQS5hUxVYALaRjd8XDXm28bxPMrO6gc+8KEVKVvwbfxm2C82fu0Ou/Uf9EG8AWEQKbTQ==');
define('NONCE_KEY',        'r9of6yxdXRu2eB1LiihFb74gAWvpMk5yn0Fm1ReN/NDWzG3TBJxMxZDWgR0zp3G443CL/JQLMZEiGSFitloN4A==');
define('AUTH_SALT',        'TOI0MfnN0g3iY/rH+NKuYv//r+UAjGu4iFlyvSAJAZyrtj1HQwW/lFkcbHHCZvbpHvfoC5DWnK3GyVS63QFOSw==');
define('SECURE_AUTH_SALT', '7i0iEQmTHyS7I4DQHG55ciX19xDFizig9WWuUrmJsOqyVTHzHTchUVzh2QEVAVhNvj4eZLlTocO7yOw25x1xpw==');
define('LOGGED_IN_SALT',   'q6emnA7Z3fuhxuIeeqNIqD0TS8ssUPp4wlfN7LYr/vJJ6Vip2TLhyv3/b+EX6/zQ1Lbjrfq/vE2fFwjK1H9SLg==');
define('NONCE_SALT',       'yn67pMFc5wr+BHn68qBm8CtWdyBS2m3O+aTiFVLA0qDUlrUwRw6lXEeH+FrWVdtgdgYGzBSded1tnSjYXb+Yyw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
