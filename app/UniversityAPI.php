<?php

declare(strict_types=1);

namespace App;


class UniversityAPI
{
    private string $baseUrl;

    public function __construct(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function fetchUniversities(string $search): UniversityCollection
    {
        $url = $this->baseUrl . $search;

        $response = file_get_contents($url);

        $data = json_decode($response);

        $collection = new UniversityCollection();

        foreach ($data as $uni) {
            $collection->add(new university(
                $uni->name,
                $uni->domains
            ));
        }
        return $collection;
    }
}