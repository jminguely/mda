<?php

/*
|--------------------------------------------------------------------------
| Notes - README
|--------------------------------------------------------------------------
|
| You can add as many WordPress constants as you want here. Just make sure
| to add them at the end of the file or at least after the "WordPress
| authentication keys and salts" section.
|
*/

/*
|--------------------------------------------------------------------------
| WordPress authentication keys and salts
|--------------------------------------------------------------------------
|
| @link https://api.wordpress.org/secret-key/1.1/salt/
|
*/
define('AUTH_KEY',         '%#aE-i,5vZch53Fp*3]!># 2Nvr4pM%Cl&[n:sty_{|sMHd. ,%~mwO?@3eb `}5');
define('SECURE_AUTH_KEY',  ']$mva[z0cXUn[^@ZEzI#$I0s c<|)80@?50;j7z/:kRJME}BWSyNRVZ8DClVJ)B1');
define('LOGGED_IN_KEY',    'UQb}D%,pw}e{ERj=$8tUXiy2tm&Cli/uDP4sabL6E{0?jnsU:{Q`[.T;_DWTry7z');
define('NONCE_KEY',        'VI|}t*#x=d(_,-f<?bgLl7-:V8ZiI92g^L*M*X/8+F{3F81&( y|u55L;T5rY.MB');
define('AUTH_SALT',        '(neIW1=:^d(WBT7$: [U)2)=[q&;ymqN0W*.vuR*Ctmq|zL/ I~{V6/h!O`5}E$L');
define('SECURE_AUTH_SALT', '10g>|RZTir|f,5K2*)}H(^N43{1{3AJW?6s-um$0%vC+|4%VN@NSh #vdd95}HYZ');
define('LOGGED_IN_SALT',   '!8K:`V0pFSmW/:30*8c|es?$NEAe_1~jcvpEmHu]H)qqXoKxjCA2,*-b+`+Xm3<5');
define('NONCE_SALT',       '@AgPx9-V+-GpY1-B<p5LX+Q<3U#@fH2UE)EST2EJ|pBC^-I4~fF5f%XOM,Hln]+^');

/*
|--------------------------------------------------------------------------
| WordPress database
|--------------------------------------------------------------------------
*/
define('DB_NAME', config('database.connections.mysql.database'));
define('DB_USER', config('database.connections.mysql.username'));
define('DB_PASSWORD', config('database.connections.mysql.password'));
define('DB_HOST', config('database.connections.mysql.host'));
define('DB_CHARSET', config('database.connections.mysql.charset'));
define('DB_COLLATE', config('database.connections.mysql.collation'));

/*
|--------------------------------------------------------------------------
| WordPress URLs
|--------------------------------------------------------------------------
*/
define('WP_HOME', config('app.url'));
define('WP_SITEURL', config('app.wp.url'));
define('WP_CONTENT_URL', WP_HOME.'/'.CONTENT_DIR);

/*
|--------------------------------------------------------------------------
| WordPress debug
|--------------------------------------------------------------------------
*/
define('SAVEQUERIES', config('app.debug'));
define('WP_DEBUG', config('app.debug'));
define('WP_DEBUG_DISPLAY', config('app.debug'));
define('SCRIPT_DEBUG', config('app.debug'));

/*
|--------------------------------------------------------------------------
| WordPress auto-update
|--------------------------------------------------------------------------
*/
define('WP_AUTO_UPDATE_CORE', false);

/*
|--------------------------------------------------------------------------
| WordPress file editor
|--------------------------------------------------------------------------
*/
define('DISALLOW_FILE_EDIT', true);

/*
|--------------------------------------------------------------------------
| WordPress default theme
|--------------------------------------------------------------------------
*/
define('WP_DEFAULT_THEME', 'mda');

/*
|--------------------------------------------------------------------------
| JetPack
|--------------------------------------------------------------------------
*/
define('JETPACK_DEV_DEBUG', config('app.debug'));
