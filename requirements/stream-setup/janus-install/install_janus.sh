sudo apt install libmicrohttpd-dev libjansson-dev libssl-dev libsrtp-dev libsofia-sip-ua-dev libglib2.0-dev libopus-dev libogg-dev libcurl4-openssl-dev liblua5.3-dev libconfig-dev pkg-config gengetopt libtool automake gtk-doc-tools doxygen graphviz libnanomsg-dev cmake -y --fix-missing

# Install libnice
cd ~
git clone https://gitlab.freedesktop.org/libnice/libnice
cd libnice
./autogen.sh
./configure --prefix=/usr
make && sudo make install

# Install libsrtp2
cd ~
wget https://github.com/cisco/libsrtp/archive/v2.2.0.tar.gz
tar xfv v2.2.0.tar.gz
cd libsrtp-2.2.0
./configure --prefix=/usr --enable-openssl
make shared_library && sudo make install

# Install usrsctp
cd ~
git clone https://github.com/sctplab/usrsctp
cd usrsctp
./bootstrap
./configure --prefix=/usr && make && sudo make install

# Install libwebsockets
cd ~
git clone https://libwebsockets.org/repo/libwebsockets
cd libwebsockets
# If you want the stable version of libwebsockets, uncomment the next line
# git checkout v2.4-stable
mkdir build
cd build
# See https://github.com/meetecho/janus-gateway/issues/732 re: LWS_MAX_SMP
cmake -DLWS_MAX_SMP=1 -DCMAKE_INSTALL_PREFIX:PATH=/usr -DCMAKE_C_FLAGS="-fpic" ..
make && sudo make install

# Install MQTT C
cd ~
git clone https://github.com/eclipse/paho.mqtt.c.git
cd paho.mqtt.c
make && sudo prefix=/usr make install

# Install RabbitMQ
cd ~
git clone https://github.com/alanxz/rabbitmq-c
cd rabbitmq-c
git submodule init
git submodule update
mkdir build && cd build
cmake -DCMAKE_INSTALL_PREFIX=/usr ..
make && sudo make install

# Install janus
cd ~
git clone https://github.com/meetecho/janus-gateway.git
cd janus-gateway
sh autogen.sh
./configure --prefix=/opt/janus
make
sudo make install
sudo make configs 
