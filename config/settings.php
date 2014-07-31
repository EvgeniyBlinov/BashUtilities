<?php
// base constants
defined('APPLICATION_REDIS_CONNECTION_SCHEME') or define('APPLICATION_REDIS_CONNECTION_SCHEME', "tcp");
defined('APPLICATION_REDIS_CONNECTION_HOST') or define('APPLICATION_REDIS_CONNECTION_HOST', "127.0.0.1");
defined('APPLICATION_REDIS_CONNECTION_PORT') or define('APPLICATION_REDIS_CONNECTION_PORT', 6379);

define('APPLICATION_SERVER_PREFIX', $_SERVER['SERVER_NAME']);

if (defined('APPLICATION_DEVELOPER_SERVER') && !APPLICATION_DEVELOPER_SERVER) {
    // for production, test or other servers
    switch ($_SERVER['SERVER_NAME']) {
        case 'first.site.blinov':
            define('APPLICATION_MYSQL_USER', 'first_site');
            define('APPLICATION_MYSQL_PASS', 'pass');
            define('APPLICATION_MYSQL_DB_NAME', 'first_site_db_name');
            break;
        case 'second.site.blinov':
            define('APPLICATION_MYSQL_USER', 'second_site');
            define('APPLICATION_MYSQL_PASS', 'pass');
            define('APPLICATION_MYSQL_DB_NAME', 'second_site_db_name');
            break;
        default:
            define('APPLICATION_MYSQL_USER', 'first_site');
            define('APPLICATION_MYSQL_PASS', 'pass');
            define('APPLICATION_MYSQL_DB_NAME', 'first_site_db_name');
            break;
    }

} else {
    // for developer servers
    switch ($_SERVER['SERVER_NAME']) {
        case 'developer.blinov':
            define('APPLICATION_MYSQL_USER', 'root');
            define('APPLICATION_MYSQL_PASS', '');
            define('APPLICATION_MYSQL_DB_NAME', 'mysite');
            break;
        case 'developer2.blinov':
            define('APPLICATION_MYSQL_USER', 'root');
            define('APPLICATION_MYSQL_PASS', 'root');
            define('APPLICATION_MYSQL_DB_NAME', 'mysite');
            break;
        default :
            define('APPLICATION_MYSQL_USER', 'root');
            define('APPLICATION_MYSQL_PASS', 'root');
            define('APPLICATION_MYSQL_DB_NAME', 'mysite');
            break;
    }
}
