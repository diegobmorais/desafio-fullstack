<?php

namespace App\Http\Services;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RandomDataService
{   
    protected $clientHttp;
    protected $url = 'https://random-data-api.com/api/v2/users?size=100';
    public function __construct()
    {
        $this->clientHttp = new Client();
    }
    public function fetchRandomData()
    {
        $clientHttp = new Client();            
        try {
            $response = $clientHttp->request('GET', $this->url);                
            return json_decode($response->getBody(), true);
        }catch (RequestException $r){
            return ['error' => $r->getMessage()];
        }
            catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}