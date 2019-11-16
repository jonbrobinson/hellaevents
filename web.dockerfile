FROM nginx:1.17.1

ADD vhost.conf /etc/nginx/conf.d/default.conf