-----BEGIN PGP SIGNED MESSAGE-----
Hash: SHA512

Format: 3.0 (quilt)
Source: nginx
Binary: nginx, nginx-doc, nginx-common, nginx-full, nginx-light, nginx-extras, libnginx-mod-http-geoip, libnginx-mod-http-image-filter, libnginx-mod-http-xslt-filter, libnginx-mod-mail, libnginx-mod-stream, libnginx-mod-http-perl, libnginx-mod-http-auth-pam, libnginx-mod-http-lua, libnginx-mod-http-ndk, libnginx-mod-nchan, libnginx-mod-http-echo, libnginx-mod-http-upstream-fair, libnginx-mod-http-headers-more-filter, libnginx-mod-http-cache-purge, libnginx-mod-http-fancyindex, libnginx-mod-http-uploadprogress, libnginx-mod-http-subs-filter, libnginx-mod-http-dav-ext, libnginx-mod-rtmp
Architecture: any all
Version: 1.16.1-0+bionic1
Maintainer: Debian Nginx Maintainers <pkg-nginx-maintainers@lists.alioth.debian.org>
Uploaders: Christos Trochalakis <ctrochalakis@debian.org>
Homepage: http://nginx.net
Standards-Version: 4.1.4
Vcs-Browser: https://salsa.debian.org/nginx-team/nginx
Vcs-Git: https://salsa.debian.org/nginx-team/nginx.git
Testsuite: autopkgtest
Testsuite-Triggers: curl, ssl-cert
Build-Depends: debhelper (>= 10), po-debconf, dpkg-dev (>= 1.15.5), libexpat-dev, libgd-dev, libgeoip-dev, libhiredis-dev, liblua5.1-0-dev [!i386 !amd64 !kfreebsd-i386 !armel !armhf !powerpc !powerpcspe !mips !mipsel], libluajit-5.1-dev [i386 amd64 kfreebsd-i386 armel armhf powerpc powerpcspe mips mipsel], libmhash-dev, libpam0g-dev, libpcre3-dev, libperl-dev, libssl-dev, libxslt1-dev, quilt, zlib1g-dev
Package-List:
 libnginx-mod-http-auth-pam deb httpd optional arch=any
 libnginx-mod-http-cache-purge deb httpd optional arch=any
 libnginx-mod-http-dav-ext deb httpd optional arch=any
 libnginx-mod-http-echo deb httpd optional arch=any
 libnginx-mod-http-fancyindex deb httpd optional arch=any
 libnginx-mod-http-geoip deb httpd optional arch=any
 libnginx-mod-http-headers-more-filter deb httpd optional arch=any
 libnginx-mod-http-image-filter deb httpd optional arch=any
 libnginx-mod-http-lua deb httpd optional arch=any
 libnginx-mod-http-ndk deb httpd optional arch=any
 libnginx-mod-http-perl deb httpd optional arch=any
 libnginx-mod-http-subs-filter deb httpd optional arch=any
 libnginx-mod-http-uploadprogress deb httpd optional arch=any
 libnginx-mod-http-upstream-fair deb httpd optional arch=any
 libnginx-mod-http-xslt-filter deb httpd optional arch=any
 libnginx-mod-mail deb httpd optional arch=any
 libnginx-mod-nchan deb httpd optional arch=any
 libnginx-mod-rtmp deb httpd optional arch=any
 libnginx-mod-stream deb httpd optional arch=any
 nginx deb httpd optional arch=all
 nginx-common deb httpd optional arch=all
 nginx-doc deb doc optional arch=all
 nginx-extras deb httpd optional arch=any
 nginx-full deb httpd optional arch=any
 nginx-light deb httpd optional arch=any
Checksums-Sha1:
 77ce4d26481b62f7a9d83e399454df0912f01a4b 1032630 nginx_1.16.1.orig.tar.gz
 e1460b3617b0cbdb3ffb313c31ee58bf9fefed67 917512 nginx_1.16.1-0+bionic1.debian.tar.xz
Checksums-Sha256:
 f11c2a6dd1d3515736f0324857957db2de98be862461b5a542a3ac6188dbe32b 1032630 nginx_1.16.1.orig.tar.gz
 9d80e089958d959efa5d2d3013b39e86d5c3da2fa3203bcdc122078f532a2f19 917512 nginx_1.16.1-0+bionic1.debian.tar.xz
Files:
 45a80f75336c980d240987badc3dcf60 1032630 nginx_1.16.1.orig.tar.gz
 1c2ae0c026bd3a8cc812bf2a4fadc7ee 917512 nginx_1.16.1-0+bionic1.debian.tar.xz

-----BEGIN PGP SIGNATURE-----

iQIzBAEBCgAdFiEEV5L2YWTQV+/G0G+vW4rW9MJq3d0FAl1Z9boACgkQW4rW9MJq
3d0fcg/9FXdwPAQ8Xb61OCZ5maR+3FhGMSXIHNSsfXMRydbT/3Iyk264Op+kpyOH
v3wOmuhfKIDmFXqX8X/2stL8kxHEM6QnuktWKa+L1JFeSNumq6w1LUz+/+v1O9kG
MpY1tVkZVjwiFD5C8vhG7J5zEs4Amjg5hQdM1eF/kCBitSQdjsR8rhqI5LlrLomZ
BnM6p2kH/ENx0B8IPgn1Ey3/GXUHlS7K4Vznv0Nvp/Tk0SyEFfIjpdXchYw1wlNL
3OoZGshaS7SM99YQgTEiaf5FJCihJiTVdfJPS2rxWJZFE2moVjInP/8DUbCqUedl
B5a9g4y/ZUShYv4xoZmUuoE24cWI8y3MFOo2PKZ7j48ZpoXIuaCYzlNjervuMkzs
pj57qISc5rgrvkyatoZm7yp5ojriNuHH+6JpeRehIL2veapoeFWBXgr7OMCJc4ye
dd12aJ3pDExz1UDvbZt/1oyZo1Kc9RziD16qfrcLnzRNbM1QOumfV+PeJatFaUXS
3IV+3CAZ+9HY/IBeH5RhgWn+LTDcCaPzuK52uDsL2vwLEj51pDj2TCdjegl0nXQN
KkWN0+VIO5ftWFM1BL/bC4h+2VpCHogescCbYnZUh8CwB4HVtmQ5bPMPH2mmlGwg
bHbytv++l0pu169UQGH+bxWbTXhMArEWE8HXk1Zw79kj81X55Ds=
=M1KU
-----END PGP SIGNATURE-----
