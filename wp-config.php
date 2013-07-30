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
define('DB_NAME', 'paulkaiju');

/** MySQL database username */
define('DB_USER', 'pk-user');

/** MySQL database password */
define('DB_PASSWORD', 'secure');

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
define('AUTH_KEY',         'Nf+LTp(?&(%o/zt)N|?)zb6n+<2l@#=t(LB%D;%&;~-frsI/3L]$8Qp*q<Na+Wg6');
define('SECURE_AUTH_KEY',  'wS{bB~<|;b+yxB0,m16g-eq6XB. HC8 )M~Ox+un6u!M`#R$*PyM;UZR5;+{C~kZ');
define('LOGGED_IN_KEY',    '/ Du3vl2P_Zg,fiMfOlPuo3L>dYxOh$b(+`SJPSnWS:/APRJg-}bjG$]=UzoZ$-j');
define('NONCE_KEY',        'OiLy1W?(,bU~{B&zo6OS5Dg(wh#EwS(rPp$$Vj->563+Z}knw=)ya}fp4zO:&k.y');
define('AUTH_SALT',        'CX&G>?BU8Fv:uWDH^:8d^LIUjop0FuTU pc9*@{svb|eXNp+8)nt5SBm(LQryp>-');
define('SECURE_AUTH_SALT', 'q|}RSri^$ZqB-+h>{I8Lo4Oa5+6t[]CTbs,EBO%m=qp3!7H]Z&;g$WXm+GQV{};I');
define('LOGGED_IN_SALT',   'l:.z{=C:o(: ;KS0-]V%[vz8^a;)-o2^|+K=|>EOggWr+|@P@%-G,Z-y/Zk!?![U');
define('NONCE_SALT',       'B}L936]}pE[fo^mO* *U5&BEtpFD?cpH}ul/%zC-VJ4Sht]5H]KRWFB)K*Mga@_d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
