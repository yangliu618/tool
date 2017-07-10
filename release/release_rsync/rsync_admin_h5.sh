#!/bin/bash

cd /root/release/test

file_name="hongkong.admin.h5"
file_ext=".tar.gz"
upload_file="$file_name$file_ext"
tmp_file="/tmp/$upload_file"

if [ -e "$tmp_file" ]; then
	rm -fr * 
	mv $tmp_file .
	cp $upload_file "../backup/${file_name}_`date +%Y%m%d_%H%M%S`$file_ext"
	tar -zxvf $upload_file
fi

rsync -varz --exclude ".git" --progress hongkong.admin.h5/ root@172.31.8.66:/var/www/html/hongkong.admin.h5
