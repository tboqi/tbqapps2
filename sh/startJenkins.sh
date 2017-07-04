#!/bin/bash
export JAVA_HOME=/work/libs/jdk1.8.0_131
export CLASSPATH=.:%JAVA_HOME%/lib/dt.jar:%JAVA_HOME%/lib/tools.jar
export PATH=$PATH:$JAVA_HOME/bin

cd /work/d/code/jenkins
export JENKINS_HOME=/work/d/code/jenkins
nohup java -jar jenkins.war > run.log &
cd -
/bin/bash