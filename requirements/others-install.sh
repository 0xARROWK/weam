#!/bin/bash

# others required installation

###########################################################
#                         DOCS                            #
###########################################################

# https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04
# https://www.digitalocean.com/community/tutorials/how-to-deploy-a-laravel-application-with-nginx-on-ubuntu-16-04
# https://5balloons.info/getting-started-with-tailwindcss-on-laravel/

###########################################################
#                   OTHERS REQUIREMENTS                   #
###########################################################

# instructions

# php and php-fpm installation :
# sudo apt install php7.4 php-fpm7.4 php7.4-mbstring php-mysql
# TODO : update php-fpm7.2 to php-fpm7.4 in /etc/nginx/sites-available/default

# mysql installation :
# sudo apt install mysql-server
# sudo mysql_secure_installation
# TODO : create databases and grant privileges

# laravel and vue installation used :
#
# sudo apt install composer
# composer create-project --prefer-dist laravel/laravel weam
# cd weam/
# composer require laravel/ui //--auth
# php artisan ui vue //--auth
# npm install
# npm run dev
# sudo chmod 777 -R .
# TODO : change .env file
# php artisan migrate
#
# OR other laravel and vue installation :
#
# sudo apt install composer
# composer global require "laravel/installer"
# export PATH=$PATH:$HOME/.config/composer/vendor/bin
# laravel new weam --jet : 1 and no
# cd weam
# chmod 777 -R .
# TODO : change .env file
# php artisan migrate

# npm install vue-loader
# npm install vue-router
# npm install vuex
# npm install vue-sweetalert2
# npm install --save @fortawesome/fontawesome-free
# npm uninstall bootstrap
# npm install tailwindcss
# npm install autoprefixer # require node >= 14, for upgrade nodejs : npm i -g n && n stable && npm uninstall n
#
# composer require laravel/passport
# php artisan migrate
# php artisan passport:install --uuids
# php artisan passport:keys
# TODO: put client id and client secret on .env file
# composer require bjeavons/zxcvbn-php

# TODO: replace content of resources/sass/app.scss by the following :
# @tailwind base;
#
# @tailwind components;
#
# @tailwind utilities;

# npx tailwindcss init --full
# npm install postcss

# TODO: modify tailwind.config.js and replace purge with these lines :
#
#  purge: {
#      enabled: true,
#      content: [
#      './resources/**/*.html',
#      './resources/**/*.scss',
#      './resources/**/*.css',
#      './resources/**/*.vue',
#      './resources/**/*.js'
#      ]
#  }

# optional
#
# const tailwindcss = require('tailwindcss')
#
# mix.js('resources/js/app.js', 'public/js')
#    .scripts('resources/js/lib.js', 'public/js/lib.js')
#    .sass('resources/sass/async.scss', 'public/css')
#    .sass('resources/sass/app.scss', 'public/css')
#    .options({
#        processCssUrls: false,
#        postCss: [ tailwindcss('tailwind.config.js') ],
#    })
#    .then(() => {
#        var fs = require('fs');
#        var mix_manifest_file = path.resolve(__dirname) + '/public/mix-manifest.json';
#        var mix_manifest = require(mix_manifest_file);
#        for(var key in mix_manifest) {
#            mix_manifest[key] = mix_manifest[key].replace(/\/js/, 'js')
#            mix_manifest[key] = mix_manifest[key].replace(/\/css/, 'css')
#        }
#        fs.writeFile(mix_manifest_file, JSON.stringify(mix_manifest), function (err) {
#            if (err !== null) {
#                console.log("Mix manifest error : " + err);
#            }
#        });
#    });
#

# TODO: change app url in resources/js/app.js and config/app.php
# TODO: change app_key in .env file
# npm run dev
