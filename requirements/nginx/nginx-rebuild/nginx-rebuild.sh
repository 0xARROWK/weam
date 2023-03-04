#!/bin/bash

# nginx rebuild

###########################################################
#                         DOCS                            #
###########################################################

# https://serversforhackers.com/c/compiling-third-party-modules-into-nginx
# https://github.com/winshining/nginx-http-flv-module
# https://github.com/arut/nginx-rtmp-module/wiki/Directives#hls_nested

###########################################################
#                 BEFORE INSTALLATION                     #
###########################################################

# TODO : uncomment line "deb-src http://ppa.launchpad.net/nginx/stable/ubuntu bionic main" in /etc/apt/sources.list.d/nginx-ubuntu-stable-bionic.list

###########################################################
#     REBUILD NGINX WITH MODULE AND CORE MODIFICATION     #
###########################################################

# instructions

# sudo apt-get update
#
# sudo apt-get install -y dpkg-dev
#
# cp ./nginx-module /etc/nginx-module
#
# sudo mkdir /etc/rebuildnginx
# cd /etc/rebuildnginx
#
# sudo apt-get source nginx
# sudo apt-get build-dep nginx



# TODO : edit /etc/rebuildnginx/nginx-*.*.*/debian/rules, search "full_configure_flags" and add line "--add-module=/etc/nginx-module/nginx-http-flv-module"
# TODO : change NGX_LOG_ERR to NGX_LOG_INFO or NGX_LOG_DEBUG_RTMP on line 1054 in debian/modules/rtmp/ngx_rtmp_notify_module.c



# cd /etc/rebuildnginx/nginx-*.*.*
# sudo dpkg-buildpackage -b
#
# cd /etc/rebuildnginx
#
# sudo dpkg --install ./nginx/nginx-full_1.16.1-0+bionic1_amd64.deb
# sudo apt --fix-broken install
#
# sudo nginx -V