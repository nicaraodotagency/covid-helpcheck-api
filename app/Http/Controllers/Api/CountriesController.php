<?php

namespace App\Http\Controllers\Api;

use App\Contracts\CovidRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class CountriesController extends Controller
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

    public function countryByContinents(): Collection
    {
        ['response' => $statistics] = $this->covidRepository->getAllStatistics();

        return collect($statistics)->groupBy('continent');
    }
}
