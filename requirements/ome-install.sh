#!/bin/bash

# oven media engine installation

###########################################################
#                         DOCS                            #
###########################################################

# https://airensoft.gitbook.io/ovenmediaengine/getting-started
# https://airensoft.gitbook.io/ovenmediaengine/troubleshooting#prerequisites-sh-script-failed

###########################################################
#             OVEN MEDIA ENGINE INSTALLATION              #
###########################################################

# instructions

# (curl -LOJ https://github.com/AirenSoft/OvenMediaEngine/archive/v0.10.7.tar.gz && tar xvfz OvenMediaEngine-0.10.7.tar.gz)
# OvenMediaEngine-0.10.7/misc/prerequisites.sh
#
# sudo apt-get update
# cd OvenMediaEngine-0.10.7/src
# make release
# sudo make install
# systemctl start ovenmediaengine
# # If we want automatically start on boot
# systemctl enable ovenmediaengine.service
#
# sudo firewall-cmd --add-port=80/tcp
# sudo firewall-cmd --add-port=1935/tcp
# sudo firewall-cmd --add-port=4000-4005/udp
# sudo firewall-cmd --add-port=3333/tcp
# sudo firewall-cmd --add-port=9000/tcp
# sudo firewall-cmd --add-port=10000-10005/udp