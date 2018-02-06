#! /bin/bash

/etc/init.d/php7.0-fpm start

cd /work/d/code/flaskblog
source .env/bin/activate
uwsgi -d --ini uwsgi.ini  --thunder-lock  --enable-threads
deactivate
cd -

/etc/init.d/nginx restart

/bin/bash
