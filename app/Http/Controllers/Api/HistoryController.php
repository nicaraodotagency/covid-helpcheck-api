<?php

namespace App\Http\Controllers\Api;

use App\Contracts\CovidRepositoryInterface;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    protected $covidRepository;

    public function __construct(CovidRepositoryInterface $covidRepository)
    {
        $this->covidRepository = $covidRepository;
    }

    public function index(): array
    {
        return $this->covidRepository->getHistory();
    }
}
