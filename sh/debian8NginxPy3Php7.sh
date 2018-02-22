#! /bin/bash

/etc/init.d/php7.0-fpm start

##### uwsgi
cd /work/d/code/flaskblog
source .env/bin/activate
uwsgi -d --ini uwsgi.ini  --thunder-lock  --enable-threads
deactivate
cd -

####### nginx
cd /etc/nginx/sites-enabled
rm *.conf -rf
ln -s /work/d/code/flaskblog/nginx.conf flaskblog.conf

ln -s /work/d/code/tbq_static/nginx.htaccess                tbq_static.conf
ln -s /work/d/code/yiicms_qiyezhan/nginx.conf               yiicms_qiyezhan.conf
ln -s /work/d/code/yii2cms_liufee/frontend/nginx.conf       yii2cms_liufee_frontend.conf
ln -s /work/d/code/yii2cms_liufee/backend/nginx.conf        yii2cms_liufee_backend.conf

# ln -s /work/d/code/yii2blog/nginx.htaccess                      yii_appblog.conf
# ln -s /work/d/code/yii2advanced/apps/basic/nginx.htaccess       yii_advanced_basic.conf
# ln -s /work/d/code/yii2advanced/apps/frontend/nginx.htaccess    yii2frontend.conf
#
# ln -s /work/d/tbqapp2/php/ci/apps/www/nginx.htaccess                cidev.conf
# ln -s /work/d/tbqapp2/php/chentu.info.wp/nginx.htaccess             wp_chentu_info.conf
# ln -s /work/d/code/koseven/apps/chentublog/nginx.htaccess           khn_chentublog.conf
# ln -s /work/d/code/koseven/apps/www/nginx.htaccess                  khn_www.conf
cd -

/etc/init.d/nginx restart

/bin/bash
