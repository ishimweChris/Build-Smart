<?php
/**
 * Build Smart Ltd - WordPress Configuration File
 * Generated: January 30, 2026
 */

// ** Database settings ** //
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'D:\xampp\htdocs\build\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'buildsmart_db' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 */
define('AUTH_KEY',         '0y-B#pI^+^KK3V8Bhoe@@(xw||.q%T{ov6qkO0u-oids0--t5$qvi(lj__2LJ-27');
define('SECURE_AUTH_KEY',  '|pQUhaf=.v|<:|O-Mei})uVMzGi7o^R0@CLVJxVtg3)`LC3YrcB<Ycx}PD=aK2AB');
define('LOGGED_IN_KEY',    '+v=ri|fxaRJFCjRZ:oI5(Za;_~S0`|u$KQ.H6&`k?:iR7v@PlLb?|6;`TS !=NhE');
define('NONCE_KEY',        '+xt6&p9,v18|WBNLj,Eluq+mJ#|tr?ku1^mWE;^_d7{PBhG,59uTFC%{t6$h!U|8');
define('AUTH_SALT',        '+ePJ|!e(,B`RkRC|^@*!f[jlYRkv(t^JP6__I<Qrhw7FjX~!evgBYNnZ}:kb)k&m');
define('SECURE_AUTH_SALT', 'Usy>!u/uRS%YGyHHGNw_bMCK~z+_;Z]V-}/jkAvrpXLU(S,TMZ=[JK1*QJc+C-^+');
define('LOGGED_IN_SALT',   'JhrCQ<.fWqS4ho6fNO$0>8r~U==G3<rIQ%|$--)1G$z{uK]S/f }ina2)#wG;fK&');
define('NONCE_SALT',       'Z98~z`La9tN3|F*,t9F X/jzeV7~,NAHN:,vSs-UyU6*o U-gsr/P7{`@>%}+Uc|');
/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'bs_';

/**
 * For developers: WordPress debugging mode.
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/**
 * Performance & Security Settings
 */
define( 'WP_POST_REVISIONS', 5 );
define( 'AUTOSAVE_INTERVAL', 300 );
define( 'WP_MEMORY_LIMIT', '256M' );
define( 'DISALLOW_FILE_EDIT', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
