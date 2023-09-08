<?php
# file pdf_upload.php

require "aws_sdk_php/aws-autoloader.php";

date_default_timezone_set("Asia/Jakarta");

$bucket = "aaaaaaaaaaaaaaaaaaaa";
#$bucket = "emr";

$endpoint = "https://minio.rsudrsoetomo.jatimprov.go.id";
#$endpoint = "http://s3.rsudrsoetomo.jatimprov.go.id";

$s3 = new Aws\S3\S3Client([

    "version" => "latest",

    "region" => "us-east-1",

    "signature_version" => "v4",

    "endpoint" => $endpoint,

    "use_path_style_endpoint" => true,

    "credentials" => [

        "key" => "key",

        "secret" => "pw",

    ],

]);

$key = "EnamineStore.pdf";
#$key = "kepala.jpg";

// Get a command object from the client
$command = $s3->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key'    => $key
        ]);

// Create a pre-signed URL for a request with duration of 10 miniutes
$request = $s3->createPresignedRequest($command, '+10 minutes');
$presignedRequest = $s3->createPresignedRequest($command, '+10 minutes');

// Get the actual presigned-url
$presignedUrl =  (string)  $presignedRequest->getUri();

var_dump($presignedUrl);
