<?php

namespace App\Repositories;

use App\Contracts\CovidRepositoryInterface;
use Illuminate\Support\Facades\Http;

class CovidRepository implements CovidRepositoryInterface
{
    protected $covidClient;
    protected $baseUrl;

    public function __construct()
    {
        $this->covidClient = Http::withHeaders(
            [
                'x-rapidapi-host' => parse_url(config('services.covid.url'), PHP_URL_HOST),
                'x-rapidapi-key' => config('services.covid.key'),
            ]
        );
        $this->baseUrl = config('services.covid.url');
    }

    public function getAllCountries(): array
    {
        $countries = $this->covidClient->get("{$this->baseUrl}/countries");

        return $countries->json();
    }

    public function getAllStatistics(): array
    {
        $statistics = $this->covidClient->get("{$this->baseUrl}/statistics");

        return $statistics->json();
    }

    public function getHistory(string $country): array
    {
        $statistics = $this->covidClient->get("{$this->baseUrl}/history", [
            'country' => $country,
            'day' => now()->format('Y-m-d'),
        ]);

        return $statistics->json();
    }
}
