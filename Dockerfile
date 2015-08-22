FROM openshift/php-55-centos7

EXPOSE 8080
WORKDIR /opt/app-root/src
ENTRYPOINT [ "/bin/bash", "./run.sh"]
