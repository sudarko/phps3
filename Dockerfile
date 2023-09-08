From php:8.1-cli-alpine3.17
RUN apk update
RUN apk add wget unzip vim curl
RUN wget https://docs.aws.amazon.com/aws-sdk-php/v3/download/aws.zip
RUN unzip aws.zip -d /root/aws_sdk_php
#RUN rm aws.zip -f
COPY pre_signed.php /root/
COPY S3SignatureV4.php /root/aws_sdk_php/Aws/Signature/
