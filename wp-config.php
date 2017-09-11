<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'globo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '40t:h&iT Yr6-|9p>c!i2OFL2X9.7bUgj|lkZuX0p}8:bN:_z?J@a(j ;2>ugs_b');
define('SECURE_AUTH_KEY',  'hwV+TFqob@sC|f+x$R9DFoB Kt^Xj/9k>1nC..VG&P7Z WsI,Xz|Egw?]G#*V3 W');
define('LOGGED_IN_KEY',    '(WF[@.0RH+fIcA_{t88V9z9ctiA5,8++@{t)kG0,(3k[JC]`oIn`7H/Dw%)ziPG&');
define('NONCE_KEY',        'G|guoXhl-}%,Q ]k ~3heAd.J#r*-8ZFdqaYbb;ZBa;7jE)C3/]YJy6}F;TyNb9,');
define('AUTH_SALT',        'yT1@.M-In^Z+5$sN%[/oX 3KEM[*rbty[|R0I6skL+rr-+}hi/r*5y?]#0~y-W=T');
define('SECURE_AUTH_SALT', 'S`E_mS=]xO1qMymgiOR<_}//7b-a(g3:zj|$gOf/udP1cRlVw-.$wbx1G,%JkEuK');
define('LOGGED_IN_SALT',   '/g<gY J7[QpU1*h9+Fl///%UkX9.5>&;G/4mUv3C?*Uh(<n$`f(+F4~h]1-#kgwo');
define('NONCE_SALT',       '9WP3OpIAwFGm,hB-N4*zfG 0]*Fq%Q~r| e+eAea8.W{+FYN=c7),qr}G7@QI.8v');

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
