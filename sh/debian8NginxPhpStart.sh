#! /bin/bash

cd /work/libs/nginx-1.12.1/conf/vhost/
rm *.conf -rf
ln -s /work/d/code/phpcms.tiens.com/nginx.htaccess                  tiens_phpcms_alllengend.conf
ln -s /work/d/code/www.tiens.com/nginx.htaccess                     tiens_www.conf
ln -s /work/d/code/tjtjs-ecstore/nginx.access                       tiens_testshop_taijisun.conf
ln -s /work/d/code/tiens_hualang/nginx.htaccess                     tiens_hualang.conf

ln -s /work/d/code/koseven/apps/tiens_mqtest/nginx.htaccess         tiens_mqtest.conf

ln -s /work/d/code/yii2blog/nginx.htaccess                  yii_appblog.conf
# ln -s /work/d/code/yii2advanced/apps/frontend/nginx.htaccess        yii2frontend.conf
# ln -s /work/d/code/yii2apps/appTiensMq/nginx.htaccess               appTiensMq.conf
ln -s /work/d/code/yii2apps_tiens/backend/nginx.htaccess   appTiensZhaopinBackend.conf
ln -s /work/d/code/yii2apps_tiens/frontend/nginx.htaccess  appTiensZhaopinFrontend.conf

# ln -s /work/d/code/yii2advanced/apps/basic/nginx.htaccess yii_advanced_basic.conf

# ln -s /work/d/tbqapp2/php/ci/apps/www/nginx.htaccess                cidev.conf
ln -s /work/d/tbqapp2/php/chentu.info.wp/nginx.htaccess             wp_chentu_info.conf
# ln -s /work/d/tbqapp2/php/tbq.com/apps/tiens_mq/nginx.htaccess      khn_tiens_mq.conf
ln -s /work/d/code/koseven/apps/chentublog/nginx.htaccess           khn_chentublog.conf
ln -s /work/d/code/koseven/apps/www/nginx.htaccess                  khn_www.conf
ln -s /work/d/code/tbq_static/nginx.htaccess                        static.conf
cd -

rm /work/libs/php-5.3.29/var/log/php-fpm.log -rf
cd /work/libs/php-5.3.29/var/log
ln -s /work/d/docker_php_log/php-fpm.53.log php-fpm.log
cd -

rm /work/libs/php-5.6.30/var/log/php-fpm.log -rf
cd /work/libs/php-5.6.30/var/log
ln -s /work/d/docker_php_log/php-fpm.56.log php-fpm.log
cd -

rm /work/libs/php-7.1.6/var/log/php-fpm.log -rf
cd /work/libs/php-7.1.6/var/log
ln -s /work/d/docker_php_log/php-fpm.71.log php-fpm.log
cd -

/work/libs/php-7.1.6/sbin/php-fpm
/work/libs/php-5.6.30/sbin/php-fpm
/work/libs/php-5.3.29/sbin/php-fpm
/work/libs/nginx-1.12.1/sbin/nginx

#/etc/init.d/crond restart
/bin/bash
