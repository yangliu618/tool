#!/bin/bash

cd /root/release/test

file_name="hongkong.web.h5"
file_ext=".tar.gz"
upload_file="$file_name$file_ext"
tmp_file="/tmp/$upload_file"

if [ -e "$tmp_file" ]; then
	rm -fr * 
	mv $tmp_file .
	cp $upload_file "../backup/${file_name}_`date +%Y%m%d_%H%M%S`$file_ext"
		
	#\cp -f $upload_file /root/project/H5/PC/$upload_file
	if [ x$1 != x ]; then
		\cp -f $upload_file /root/project/H5/PC/$upload_file
    fi  	
	tar -zxvf $upload_file
fi

rsync -varz --exclude ".git" --progress hongkong.web.h5/ root@172.31.8.66:/var/www/html/hongkong.web.h5

