<?php

namespace App\Contracts;

interface CovidRepositoryInterface
{
    public function getAllCountries(): array;

    public function getAllStatistics(): array;

    public function getHistory(): array;
}
