From php:8.1-cli-alpine3.17
RUN apk update
RUN apt add wget unzip
RUN wget https://docs.aws.amazon.com/aws-sdk-php/v3/download/aws.zip
RUN unzip aws.zip -d aws_sdk_php
RUN rm aws.zip -f
