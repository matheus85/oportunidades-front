<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OportunidadeController extends Controller
{
    public function index()
    {
        $oportunidades = $this->requestApi('oportunidades')['data'];

        return view('oportunidade.index', compact('oportunidades'));
    }

    public function create()
    {
        $clientes = $this->requestApi('users-clientes')['data'];

        return view('oportunidade.create', compact('clientes'));
    }

    public function edit($id)
    {
        $clientes = $this->requestApi('users-clientes')['data'];
        $oportunidade = $this->requestApi("oportunidades/$id")['data'];

        return view('oportunidade.edit', compact('clientes', 'oportunidade'));
    }

    public function store(Request $request)
    {
        $api = $this->requestApi('oportunidades', 'post', $request->all());

        if ($api['status'] != 201) {
            return redirect()->route('oportunidades.index')->withError($api['data']['message'] ?? 'Falha na requisição!');
        }

        return redirect()->route('oportunidades.index')->withSuccess('Oportunidade cadastrada com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $api = $this->requestApi("oportunidades/$id", 'put', $request->all());

        if ($api['status'] != 200) {
            return redirect()->route('oportunidades.index')->withError($api['data']['message'] ?? 'Falha na requisição!');
        }

        return redirect()->route('oportunidades.index')->withSuccess('Atualização realizada com sucesso!');
    }

    public function destroy($id)
    {
        $api = $this->requestApi("oportunidades/$id", 'delete');

        return response()->json($api, $api['status']);
    }

    public function datatables()
    {
        $clientes = $this->requestApi('oportunidades');

        return response()->json($clientes);
    }
}
