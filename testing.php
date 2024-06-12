<?php
require "vendor/autoload.php";

use Goutte\Client;
$client = new Client();

$crawler = $client ->request("GET", "https://sea.mashable.com/");

$crawler ->filter(".broll_info")-> each(function($node){
    echo
})
?>