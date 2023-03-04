#!/bin/bash

cd /var/www/html

rm -rf ./weam-multiplatform

git clone https://github.com/0xARK/weam-multiplatform

cp -r ./weam-multiplatform/app ./weam/weam
cp -r ./weam-multiplatform/config ./weam/weam
cp -r ./weam-multiplatform/public/css ./weam/weam/public
cp -r ./weam-multiplatform/public/js ./weam/weam/public
cp -r ./weam-multiplatform/resources ./weam/weam
cp -r ./weam-multiplatform/routes ./weam/weam
cp -r ./weam-multiplatform/.env ./weam/weam/.env
