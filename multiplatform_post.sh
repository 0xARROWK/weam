#!/bin/bash

cd /var/www/html/

cp -r ./weam/weam/app ./weam-multiplatform
cp -r ./weam/weam/config ./weam-multiplatform
cp -r ./weam/weam/public/css ./weam-multiplatform/public
cp -r ./weam/weam/public/js ./weam-multiplatform/public
cp -r ./weam/weam/resources ./weam-multiplatform
cp -r ./weam/weam/routes ./weam-multiplatform
cp -r ./weam/weam/.env ./weam-multiplatform/.env

cd ./weam-multiplatform
git add .
git commit -m "commit"
git push origin master
