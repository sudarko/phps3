# phps3
Test minio/netapp S3

sudo docker build -t phps3:1.0 https://github.com/sudarko/phps3.git
sudo docker run -it --rm phps3:1.0 sh
cd
vim pre_signed.php
edit $endpoint $bucket key secret $key
php pre_signed.php
