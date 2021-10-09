#!/bin/bash

FLAG_COLUMN="flag"

FLAG_TABLE="bangumi_secret"

# 修改数据库中的 FLAG 
mysql -e "USE bangumi;INSERT $FLAG_TABLE VALUES('$FLAG');" -uroot -proot

export FLAG=not_flag
FLAG=not_flag

rm -f /flag.sh