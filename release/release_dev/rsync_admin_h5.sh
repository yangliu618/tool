#!/bin/bash


file_name="hongkong.admin.h5"

echo "Start $file_name "
echo `date "+%Y-%m-%d %H:%M:%S"`

cd "/var/www/html/theone/h5/$file_name/"

git checkout -- .
git pull

upload_file="/home/jack/release/upload/${file_name}.tar.gz"

git archive --format tar.gz --prefix "${file_name}/" --output $upload_file dev 

scp -P 9022 $upload_file root@54.169.180.90:/tmp/

ssh -p 9022 root@54.169.180.90 "/bin/bash /root/release/rsync_admin_h5.sh"

mv $upload_file "/home/jack/release/backup/${file_name}_`date +%Y%m%d_%H%M%S`.tar.gz"

echo `date "+%Y-%m-%d %H:%M:%S"`
echo "Ok Done $file_name "


