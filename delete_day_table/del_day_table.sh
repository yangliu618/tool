#!/bin/sh

m_user='user';
m_psw='password';
m_db='database';
m_server='10.105.85.111';
m_port='3600';


dirname=$(cd "$(dirname "$0")"; pwd);
logdir=$dirname/log;
mkdir -p $logdir

#----------------------------fucntion--------------------------------------------

function log()
{
        echo -e "$(date +%Y-%m-%d_%H:%M:%S)\t$1" >> "$logdir/del_table.log"
}

#-----------------------------code-----------------------------------------------


#date=$(date -d yesterday +%Y-%m-%d)
#timestamp=$(date -d $date +%s)
#today=$(date +%Y-%m-%d)
#today_timestamp=$(date -d $today +%s)
##echo $date,$timestamp,$today,$today_timestamp


log "delete yeahwifi day table start:"

sql=`php delete_day_table.php` 
log "$sql"
mysql -h $m_server -u$m_user -D$m_db -p$m_psw -e "$sql" >> "$logdir/del_table.log"

log "delete yeahwifi day table end!!!"
