#!/bin/bash

# nginx installation

###########################################################
#                         DOCS                            #
###########################################################

# https://serversforhackers.com/c/compiling-third-party-modules-into-nginx
# https://github.com/winshining/nginx-http-flv-module
# https://github.com/arut/nginx-rtmp-module/wiki/Directives#hls_nested

###########################################################
#    REINSTALL NGINX WITH MODULE AND CORE MODIFICATION    #
###########################################################

# instructions

# sudo dpkg --install ./nginx/nginx-reinstall/nginx-full_1.16.1-0+bionic1_amd64.deb
# sudo apt --fix-broken install

# cp ./nginx/nginx-config/nginx.conf /etc/nginx/nginx.conf
# cp ./nginx/nginx-config/default /etc/nginx/sites-available/default

# sudo nginx -V