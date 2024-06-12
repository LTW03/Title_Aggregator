<?php
require "vendor/autoload.php";

use Goutte\Client;
$client = new Client();

$crawler = $client->request("GET", "https://sea.mashable.com/");

$crawler->filter(".blogroll")->each(function($node) {
    $caption = $node->filter(".caption")->text();
    $datePublished = $node->filter(".datepublished")->text();
    $link = $node->filter("a")->attr("href");

    echo "Caption: $caption\n";
    echo "Date Published: $datePublished\n";
    echo "Link: $link\n\n";
});
?>
