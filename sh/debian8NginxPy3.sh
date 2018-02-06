#! /bin/bash

cd /work/d/code/flaskblog
source .env/bin/activate
uwsgi -d --ini uwsgi.ini  --thunder-lock  --enable-threads
/etc/init.d/nginx restart
deactivate
cd -

/bin/bash
