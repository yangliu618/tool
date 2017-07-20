#!/bin/bash

echo "Start  php_theone:"
echo `date "+%Y-%m-%d %H:%M:%S"`

if [ x$1 != x ];then
	echo "has param"
#	ssh -p 9022 root@54.169.180.90 "/bin/bash /root/release/rsync_test.sh $1"
fi 

ssh -p 9022 root@54.169.180.90 "/bin/bash /root/release/rsync_test.sh $1"

echo `date "+%Y-%m-%d %H:%M:%S"`
echo "Ok Done $file_name "

