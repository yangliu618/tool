#!/bin/bash

echo "Start  php_theone:"
echo `date "+%Y-%m-%d %H:%M:%S"`


cd /var/www/html/theone/theone
git checkout -- .
git pull
rm -f theone.tar.gz

/bin/bash /home/jack/release/swagger.sh

git archive --format tar.gz --prefix theone/ --output theone.tar.gz dev

scp -P 9022 theone.tar.gz root@54.169.180.90:/tmp/

ssh -p 9022 root@54.169.180.90 "/bin/bash /root/release/rsync_php_theone.sh $1"

mv theone.tar.gz "/home/jack/release/backup/theone_`date +%Y%m%d_%H%M%S`.tar.gz"

echo `date "+%Y-%m-%d %H:%M:%S"`
echo "Ok Done $file_name "

