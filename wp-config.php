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
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fourmind' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define('AUTH_KEY',         'WO5~~SC#}W;!lKp&:=3)JF433qsj-gqgv^5gSlq.P}:}{Kw.IE&AlQd*,_X{f4gm');
define('SECURE_AUTH_KEY',  'axAjTPX:kux!oT:40os?qh.No+xW;}AW!RDbys1]kA$T>;%R9u^sFaZteW(J86_o');
define('LOGGED_IN_KEY',    '<#Nn>*|*a`A9r26-Y7PkMmgrPa07?nG2LKFdEDo0hKgq:~@ng3BNHD=r-gCaNHi&');
define('NONCE_KEY',        'fH)3VcKk.]$nTsKcoow;GNo&@:j&r?{3<k<rHy$^ywSvKH IsgMB|>Oyrp59BPBO');
define('AUTH_SALT',        'XD?iKT9Xhv7EUu0;^SaDR@..(x2C{S^)H_*O,S!5/]b9+J4fi($}eI6,:;kO:}[S');
define('SECURE_AUTH_SALT', 'CEJ<j`+:oYxxM3BM$FfQws[i)_RvHepV>4tSKmQq}eJ[ycc2aP/OP[.ML!@]yp+m');
define('LOGGED_IN_SALT',   'Me%Y9${Kmd`PkPR(xWx4 _+S![{A]:=-Ut:w|Wk^r<r]7BVs+E%K%+_#Vdod~KP9');
define('NONCE_SALT',       'R_tqrTuBSC|g<o=h2}Wi|Ed7m9=3_|x#`u5Ka .+py|59DpvH=lIU}UEL#C/zbA~');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fm_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */
/* SSL */
// define( 'FORCE_SSL_LOGIN', true );
// define( 'FORCE_SSL_ADMIN', true );

/* Disable Post Revisions. */
// define( 'WP_POST_REVISIONS', false );
// define( 'WP_POST_REVISIONS', 3 );
// define('AUTOSAVE_INTERVAL', 86400 );
/* Media Trash. */
// define( 'MEDIA_TRASH', true );
/* Trash Days. */
// define( 'EMPTY_TRASH_DAYS', '7' );

/* PHP Memory */
// define( 'WP_MEMORY_LIMIT', '64M' );
// define( 'WP_MAX_MEMORY_LIMIT', '256M' );

/* WordPress Cache */
// define( 'WP_CACHE', true );

/* Compression */
// define( 'COMPRESS_CSS',        true );
// define( 'COMPRESS_SCRIPTS',    true );
// define( 'CONCATENATE_SCRIPTS', true );
// define( 'ENFORCE_GZIP',        true );
// define( 'DO_NOT_UPGRADE_GLOBAL_TABLES', true );

define( 'WP_AUTO_UPDATE_CORE', false );
define( 'DISALLOW_FILE_MODS', true );
define( 'DISALLOW_FILE_EDIT', true );
define( 'AUTOMATIC_UPDATER_DISABLED', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
