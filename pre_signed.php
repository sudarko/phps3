<?php
# file pdf_upload.php

require "aws_sdk_php/aws-autoloader.php";

date_default_timezone_set("Asia/Jakarta");

$bucket = "aaaaaaaaaaaaaaaaaaaa";

$endpoint = "https://minio.rsudrsoetomo.jatimprov.go.id";

$s3 = new Aws\S3\S3Client([

    "version" => "latest",

    "region" => "us-east-1",

    "endpoint" => $endpoint,

    "use_path_style_endpoint" => true,

    "credentials" => [

        "key" => "ThF63zX52GteTSwj1SSEHjv1dyvTJ7JmzLZQwxlhgl6VFcZ6yVWW4lhVnGI96f7d",

        "secret" => "BrOSu0rBKUqJ0a0sUk7zfCKuzFDGQBJV55yUrMERSKENEipe71HqQjR5M2ESw0cU",

    ],

]);

$key = "EnamineStore.pdf";

// Get a command object from the client
$command = $s3->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key'    => $key
        ]);

// Create a pre-signed URL for a request with duration of 10 miniutes
$presignedRequest = $s3->createPresignedRequest($command, '+10 minutes');

// Get the actual presigned-url
$presignedUrl =  (string)  $presignedRequest->getUri();

var_dump($presignedUrl);