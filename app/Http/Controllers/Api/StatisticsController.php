<?php

namespace App\Http\Controllers\Api;

use App\Contracts\CovidRepositoryInterface;

class StatisticsController
{
    protected $covidRepository;

    public function __construct(CovidRepositoryInterface $covidRepository)
    {
        $this->covidRepository = $covidRepository;
    }

    public function index(): array
    {
        return $this->covidRepository->getAllStatistics();
    }
}
