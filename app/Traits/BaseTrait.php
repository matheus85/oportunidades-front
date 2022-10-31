<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Config;

trait BaseTrait
{
    public function requestApi(string $endpoint, string $method = 'get', array $data = null)
    {
        $url = rtrim(Config::get('app.api_host'), '/') . '/' . $endpoint;
        $token = session()->get('access_token');

        if (strtoupper($method) == 'POST') {
            $response = Http::acceptJson()->withToken($token)->post($url, $data);
        } elseif (strtoupper($method) == 'GET') {
            $response = Http::acceptJson()->withToken($token)->get($url, $data);
        } elseif (strtoupper($method) == 'PUT') {
            $response = Http::acceptJson()->withToken($token)->put($url, $data);
        } elseif (strtoupper($method) == 'DELETE') {
            $response = Http::acceptJson()->withToken($token)->delete($url, $data);
        }

        return [
            'data'   => $response->json(),
            'status' => $response->status()
        ];
    }

    public function requestApiLogin(array $data)
    {
        $url = rtrim(Config::get('app.api_host'), '/') . '/login';

        $response = Http::acceptJson()->post($url, $data);

        return [
            'data'   => $response->json(),
            'status' => $response->status()
        ];
    }
}
