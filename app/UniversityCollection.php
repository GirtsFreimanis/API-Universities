<?php

declare(strict_types=1);

namespace App;

class UniversityCollection
{
    private array $universities = [];

    public function add(University $university)
    {
        $this->universities[] = $university;
    }

    public function getUniversities(): array
    {
        return $this->universities;
    }

}