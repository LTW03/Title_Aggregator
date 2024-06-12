<?php
require "vendor/autoload.php";

use Goutte\Client;

$client = new Client();

$baseUrl = "https://sea.mashable.com/";
$pageNum = 1;
$stopDate = strtotime('2022-12-30');

do {
    $crawler = $client->request("GET", $baseUrl . "?page=" . $pageNum);

    $crawler->filter(".blogroll")->each(function($node) use ($stopDate) {
        $datePublished = strtotime($node->filter(".datepublished")->text());
        if ($datePublished >= $stopDate) {
            $caption = $node->filter(".caption")->text();
            $link = $node->filter("a")->attr("href");

            echo "Title: $caption\n </br>";
            echo "Date Published: " . date("F j, Y", $datePublished) . "\n</br>"; // format date
            echo "Link: $link\n\n</br>";
            echo "</br>";
        } else {
            
            return false;
        }
    });

    $pageNum++; 
} while ($crawler->filter("#showmore")->count() && $pageNum <= 10000); 

?>
