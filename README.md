BashUtilities
=============

Bash utilities for PHP projects

### Для чего это все нужно? ###

Если проект работает с разными БД(production, test и пр.) и нужно передавать настройки сайта консольным утилитам. Например, для сохранения резервной копии БД.

### Применение ###

Указать имя сервера:

`echo 'first.site.blinov' > ./SERVER_NAME`

или так, если оно идентично имени папки с проектом:

`echo "$(basename $(readlink -m $(pwd)./../))" > ./SERVER_NAME`


Потом просто добавить скрипт `LOCAL.sh` в исполняемом скрипте:

```sh
#! /bin/bash

###################### INCLUDE CONFIG ##################################
SCRIPT_PATH=`dirname $0`
CONFIG_PATH=`readlink -m ${SCRIPT_PATH}/../../config/`
. "${CONFIG_PATH}/LOCAL.sh"
###################### INCLUDE CONFIG ##################################
```
