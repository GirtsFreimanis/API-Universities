<?php

declare(strict_types=1);

require_once "vendor/autoload.php";

use App\UniversityAPI;
use App\University;
use JJG\Ping;

$search = (trim(readline("Enter country> ")));
$search = str_replace(" ", "+", $search);
$baseUrl = "http://universities.hipolabs.com/search?country=";
$apiData = new UniversityAPI($baseUrl);
$collection = $apiData->fetchUniversities($search);

foreach ($collection->getUniversities() as $uni) {
    /** @var University $uni */
    echo "\nName: {$uni->getName()}\n";
    foreach ($uni->getDomains() as $domain) {
        echo "domain: $domain | ";

        $ping = new Ping($domain, 32, 1);
        $latency = $ping->ping();
        if ($latency !== false) {
            print "Latency is " . $latency . " ms\n";
        } else {
            print "Host could not be reached.\n";
        }
    }
}