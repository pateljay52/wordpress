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
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'YbsR>Gl$R<&cP%bI5J} ){ <Cne?+jHemAvj-#S+PMia[i?yy+u%k]v3~BGN.ee,' );
define( 'SECURE_AUTH_KEY',  'EJrkP[z%#lYc&rruZ/eXD{^P(i@N,9:kC~>Mga>E;&i:t&G=ye]phbJ&Fc-|+EnO' );
define( 'LOGGED_IN_KEY',    'g;A68Z?J >*^^[nXWR8i[X6q)[JT6;?^LDCG=r #yk*sukr,4-N%Ub7q%hH[D*eI' );
define( 'NONCE_KEY',        ']SfD2Fp9tF>`>Ld3u^ wu+ZnEr;BQEC[]3Syrg;{X*rAEh7pH`7@ip3PM|{7Gos|' );
define( 'AUTH_SALT',        'K ;8_/;G0o|gzs#bi#,o3c>^_>[:NphxP Zdj.NDOO%=TK+D786Pj<`lB(B2nya}' );
define( 'SECURE_AUTH_SALT', '~1%#qMA=k}~+PUy-0>Vn+`wl&-&@k33VWPU.Td@47i6JTJSDW#+*OWIoJ ,0wCne' );
define( 'LOGGED_IN_SALT',   '@4@Hj]v<X@MsNE@iWo- V|oK!Z=(tQ3Nx<ndOQ% ?l^7na*UM!9Mmt}3_p1Z(P&U' );
define( 'NONCE_SALT',       'J#~}/eTX4G{&IoX#;}{[Ggks_om{iJMsqXxu9vy{sGO0l6iv8[5Oyi/gOYRLI<_B' );

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
