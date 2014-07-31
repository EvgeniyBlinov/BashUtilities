#! /bin/bash

[ -z $CONFIG_PATH ] && CONFIG_PATH=$(readlink -m $(dirname $0))

# get $_SERVER['SERVER_NAME'] from file ./SERVER_NAME
SERVER_NAME_PATH="${CONFIG_PATH}/SERVER_NAME"
if [ ! -f $SERVER_NAME_PATH ]; then
    echo "File ${SERVER_NAME_PATH} not found!"
    exit 1
fi

SERVER_NAME=`cat ${SERVER_NAME_PATH}`

# get settings from project configs
. <(/usr/bin/php ${CONFIG_PATH}/project_settings_parser.php --server_name "${SERVER_NAME}")
if [ $? -ne 0 ]; then
    echo "Error $? on ${CONFIG_PATH}/project_settings_parser.php"
    exit 2
fi

MYSQL=mysql
MYSQLDUMP=mysqldump
APPLICATION_HOST='127.0.0.1'
