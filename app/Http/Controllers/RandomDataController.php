<?php

namespace App\Http\Controllers;
use App\Http\Services\RandomDataService;

class RandomDataController extends Controller
{
    protected $randomDataService;
    public function __construct(RandomDataService $randomDataService)
    {
        $this->randomDataService = $randomDataService;
    }
    public function index()
    {   
        $data = $this->randomDataService->fetchRandomData();
        return view('results', ['users' => $data]);
    }
}
