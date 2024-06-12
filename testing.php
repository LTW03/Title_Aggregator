<?php
require "vendor/autoload.php";

use Goutte\Client;

$client = new Client();
$crawler = $client->request("GET", "https://sea.mashable.com/");

$articles = $crawler->filter(".blogroll ARTICLE")->each(function($node) {
    $title = $node->filter(".broll_info .caption")->text();
    $date = $node->filter(".broll_info .datepublished")->text();
    $link = $node->filter("a")->attr("href");

    return [
        'title' => $title,
        'date' => $date,
        'link' => $link
    ];
});

// Output the results
foreach ($articles as $article) {
    echo "Title: " . $article['title'] . "\n";
    echo "Date: " . $article['date'] . "\n";
    echo "Link: " . $article['link'] . "\n";
    echo "---------------------\n";
}
?>
