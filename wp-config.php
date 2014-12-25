<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'admin_shop');

/** MySQL database username */
define('DB_USER', 'admin_shivam');

/** MySQL database password */
define('DB_PASSWORD', 'skblyy');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '+3?%Tzbgt_a#U+e7l-GU6<{Lb}>u]av5M%C[+X}$?+u/+2H W5M|q{N--0312`0c');
define('SECURE_AUTH_KEY',  'iK.2gP(S?&BFX10XY%+Vkr*++F5c8)|lMZA62/|<M^|w0ocQLk]u|Usa!+WB8@f=');
define('LOGGED_IN_KEY',    ' |kd{%/9,~^)92spyuhj~XyA^|hN=URbzfFvxZ+(Mm{N>.M`DuZ9ID1B?-PXriEI');
define('NONCE_KEY',        'GL-2P1ow=/y~Tzw=q*|Of*Lv(Q)a!Yl$Ojb=EJo8te}F+JE+?_Gyr-|:9Gc;mGJ_');
define('AUTH_SALT',        '@UaBd`Pntda~`:+`}R.8ntds=9c+n2)3%jtxoV{8ui-AHTC)Z2|rNz9-m LX.b8[');
define('SECURE_AUTH_SALT', '_5q6AV0E:2H9Q#epbe{JgWd3C]Q@JI~QL P-,EWo(*JWo<Q2hoJm9k`:vw~dd>:?');
define('LOGGED_IN_SALT',   'wuw2;pw}~o{QrZazX3_a<H(OrQ~$3zFkal^CawQ~F@GN]H>U&UJU-.,~ ,/({`|X');
define('NONCE_SALT',       '[-n($48+0!$c|cs7ZHvTL/ga py@7k0t4#*)VQbl,rur,?U-5B2gjy!v*c]ZV} 3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

