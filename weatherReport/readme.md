<pre>
一、安装 
1、安装mutt
# yum -y install mutt

2、安装msmtp
# wget http://garr.dl.sourceforge.net/project/msmtp/msmtp/1.4.31/msmtp-1.4.31.tar.bz2
# tar xf msmtp-1.4.31.tar.bz2
# cd msmtp-1.4.31
# ./configure --prefix=/usr/lib/msmtp
# make && make install
# mkdir -p /usr/lib/msmtp/etc
# mkdir -p /usr/lib/msmtp/log
# vim /usr/local/msmtp/etc/msmtprc

二、配置
1、配置msmtp
[root@Centos6 ~]# cd /usr/lib/msmtp/
[root@Centos6 msmtp]# ll
总用量 16
drwxr-xr-x. 2 root root 4096 9月 26 16:21 bin
drwxr-xr-x. 2 root root 4096 9月 26 16:51 etc
drwxr-xr-x. 2 root root 4096 9月 26 16:52 log
drwxr-xr-x. 5 root root 4096 9月 26 16:21 share
[root@Centos6 msmtp]# cat etc/msmtprc
account default
host smtp.exmail.qq.com
from yangliu@group-net.cn
auth login
port 25
tls off
user yangliu@group-net.cn
password admin618
logfile /usr/lib/msmtp/log/msmtp.log

2、配置mutt
向 /etc/Muttrc 文件添加最下面添加如下配置：
set sendmail="/usr/lib/msmtp/bin/msmtp"
set use_from=yes
set realname="杨鎏"
set editor="vim"


三、实测
echo "Email" |mutt -s "test" yangliu@group-net.cn #不带附件
echo "testmail" | mutt -s "测试" -a /etc/hosts -b ufo@sina.com #带附件

自己试验后发现问题，有报错，如下：
[root@bogon report]# echo "fujian" |mutt -s "fujian_test" -a "/root/qingshell/report/8.8.8.8.xls" liuzhiqing@123.com
无法 stat liuzhiqing@123.com：没有那个文件或目录
liuzhiqing@123.com：无法附加文件
后来解决，添加一个-b参数，这样发送附件就没问题了...
如下：echo "fujian" | mutt -s "fujian_test" -a "/root/qingshell/report/8.8.8.8.xls" -b liuzhiqing@123.com

</pre>
