<?php

namespace App\Http\Controllers\Api;

use App\Contracts\CovidRepositoryInterface;

class CountriesController
{
    protected $covidRepository;

    public function __construct(CovidRepositoryInterface $covidRepository)
    {
        $this->covidRepository = $covidRepository;
    }

    public function index(): array
    {
        return $this->covidRepository->getAllCountries();
    }
}
