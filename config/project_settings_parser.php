<?php
/**
 * Config parser.
 * Copyright (c) 2014 Evgeniy Blinov (http://blinov.in.ua/)
 * 
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 * 
 * @link       https://github.com/EvgeniyBlinov/BashUtilities for the canonical source repository
 * @author     Evgeniy Blinov <evgeniy_blinov@mail.ru>
 * @copyright  Copyright (c) 2014 Evgeniy Blinov
 * @license    http://www.opensource.org/licenses/mit-license.php MIT License
 */
defined('SCRIPT_NAME') or define('SCRIPT_NAME', $argv[0]);
$scriptStatus = 0;

/**
 * Print usage info
 * @return void
 */
function usage() 
{
    $scriptName = SCRIPT_NAME;
echo<<<EOF
Usage: {$scriptName} [parameter]

requred parameters:
    --server_name   - virtual host name
EOF;
    echo "\n";
    exit(100);
}

// Init config params
$config = array();

// Parse params, and add to $config
for ($i = 1; $i < count($argv); $i++) {
    if (preg_match('/^--(?<param>[^$]*)/', $argv[$i], $matches)) {
        if (isset($matches['param'])) {
            if (in_array($matches['param'], array('verbose'))) {
                $config[$matches['param']] = true;
            } else {
                $config[$matches['param']] = $argv[++$i];
            }
        }
    }
}

// If server_name not found print usage
if (!isset($config['server_name'])) {
    usage();
}

// Require configs
$_SERVER = array('SERVER_NAME' => $config['server_name']);
require_once dirname(SCRIPT_NAME) . '/../config/developer_settings.php';
require_once dirname(SCRIPT_NAME) . '/../config/settings.php';

// Get user constants
$allConstants = get_defined_constants(true);
$userConstants = array_diff_key($allConstants['user'], array_flip(array('SCRIPT_NAME')));

// Print shell config
echo '#! /bin/bash' . "\n";
echo "\n";

foreach ($userConstants as $constName => $constValue) {
    //if (is_bool($constValue)) {
        //$constValue = ($constValue == true) ? 'true' : 'false';
    //}
    echo $constName . '=' .  $constValue . "\n";
}

exit($scriptStatus);

