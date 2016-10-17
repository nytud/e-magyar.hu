#!/bin/bash

if [ "$#" -lt 1 ]; then
echo "Usage: $0 [mode]"
exit 1
fi

if [ "$1" != "test" ] && [ "$1" != "prod" ]; then
echo "Mode: test OR prod."
exit 1
fi

if [ "$1" == "prod" ]; then
path="/var/www/infra2"
else
path="/var/www/infra2test"
fi

if [ ! -d $path ]; then
echo "Directory $path does not exist."
exit 1
fi

rsync -rlptoD .. $path --exclude=deploy --exclude=nbproject
# azert nem -a, mert abban -g is lenne (ami group infot is masol),
# es az alabbi 3 kvtarra meg akarjuk tartani a www-data -t mint group-ot!

chmod 775 $path/download
chmod 775 $path/temp
chmod 775 $path/parser_logs

if [ "$1" == "test" ]; then
base_url="\"http:\/\/oliphant.nytud.hu\/infra2test\/\";"
port="8080;"
cat $path/application/config/config.php | sed "s/^\$config\['base_url'\] \?= \?.\+$/\$config\['base_url'\] = $base_url/gi" > $path/application/config/config.php 
cat $path/application/config/infra2.php | sed "s/^\$config\['port'\] \?= \?.\+$/\$config\['port'\] = $port/gi" > $path/application/config/infra2.php
fi

echo "Done." 

