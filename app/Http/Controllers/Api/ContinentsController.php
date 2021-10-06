<?php

namespace App\Http\Controllers\Api;

use App\Contracts\CovidRepositoryInterface;

class ContinentsController
{
    protected $covidRepository;

    public function __construct(CovidRepositoryInterface $covidRepository)
    {
        $this->covidRepository = $covidRepository;
    }

    public function index(): array
    {
        ['response' => $statistics] = $this->covidRepository->getAllStatistics();

        $countryFiltered = collect($statistics)->filter(function ($country) {
            return !empty($country['continent']) && $country['continent'] != 'All';
        });

        return $countryFiltered->groupBy('continent')->toArray();
    }
}
