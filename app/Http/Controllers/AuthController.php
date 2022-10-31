<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        $response = $this->requestApiLogin($request->all());

        if ($response['status'] == 200) {
            session()->put('authenticated', time());
            session()->put('user', $response['data']['user']);
            session()->put('access_token', $response['data']['access_token']);
            return redirect()->route('oportunidades.index');
        } else {
            return redirect()->back()->withError('Falha a verificação dos dados');
        }
    }

    public function logout()
    {
        $this->requestApi('logout', 'delete');

        session()->flush();

        return redirect()->route('index');
    }
}
