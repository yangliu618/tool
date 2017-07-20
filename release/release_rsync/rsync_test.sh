#!/bin/bash

cd /root/release/

DATE="`date +%Y%m%d%H%M%S`"

echo $DATE;

if [ x$1 != x ];then
	echo "has param";
	#/bin/bash a.sh
	echo $1 >> a.log
fi

