<?php
defined('APPLICATION_REPAIRE') or define('APPLICATION_REPAIRE', false);
defined('APPLICATION_PROFILING') or define('APPLICATION_PROFILING', false);

defined('APPLICATION_DEBUG_MODE') or define('APPLICATION_DEBUG_MODE', true);
defined('APPLICATION_DEVELOPER_SERVER') or define('APPLICATION_DEVELOPER_SERVER', true);
defined('APPLICATION_DEV_INFO_MODE') or define('APPLICATION_DEV_INFO_MODE', true);

return array(
    'developer_settings' => array(
        // available IP's in repaire mode
        'ip' => array('127.0.0.1'),
    ),
);
