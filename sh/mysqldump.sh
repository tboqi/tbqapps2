mysqldump -h192.168.3.34 -ushopdbadmin -ptjsshopdb123456 tjsshopdb | gzip > tjsshopdb.test.`date +%Y%m%d`.sql.gz