#!/bin/bash
if [ "$#" -lt 1 ]; then
echo "Usage: $0 [path] ([mode])"
exit 1
fi
if [ ! -d "$1" ]; then
echo "Directory $1 does not exist."
exit 1
fi
rsync -rlptoD .. $1 --exclude=deploy --exclude=nbproject
chmod 775 $1/download
chmod 775 $1/temp
chmod 775 $1/parser_logs
if [ "$2" == "test" ]; then
cp -rf ./testconfig/config.php $1/application/config/
cp -rf ./testconfig/infra2.php $1/application/config/ 
fi
echo "Done." 
