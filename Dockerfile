FROM centos:6

MAINTAINER tboqi

RUN cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime

RUN echo "#!/bin/bash" >> /start.sh;
RUN chmod +x /start.sh;

CMD /start.sh
