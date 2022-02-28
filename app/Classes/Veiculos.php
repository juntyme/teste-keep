<?php

namespace App\Classes;

use App\Models\DicasVeiculo;
use Illuminate\Support\Facades\Auth;

class Veiculos
{

    public function homeVeiculos()
    {
        $dicas = DicasVeiculo::join('users', 'users.id', '=', 'dicas_veiculos.user_id')
            ->join('tipo_veiculo', 'tipo_veiculo.id', '=', 'dicas_veiculos.tipo_veiculo_id')
            ->select(
                'dicas_veiculos.*',
                'users.name',
                'tipo_veiculo.tipo_veiculo'
            )
            ->orderBy('id', 'desc')
            ->limit(16)
            ->get();

        return $dicas;
    }


    public function searchVeiculos($search)
    {

        $dicas = DicasVeiculo::join('users', 'users.id', '=', 'dicas_veiculos.user_id')
            ->join('tipo_veiculo', 'tipo_veiculo.id', '=', 'dicas_veiculos.tipo_veiculo_id')
            ->where(function ($query) use ($search) {
                if (isset($search['tipo']) && trim($search['tipo']))
                    $query->where('dicas_veiculos.tipo_veiculo_id', '=', $search['tipo']);
                if (isset($search['marca']) && trim($search['marca']))
                    $query->where('dicas_veiculos.marca', '=', $search['marca']);
                if (isset($search['modelo']) && trim($search['modelo']))
                    $query->where('dicas_veiculos.modelo', '=', $search['modelo']);
                if (isset($search['search']) && trim($search['search']))
                    $query->where('dicas_veiculos.marca', 'LIKE', '%' . $search['search'] . '%')
                        ->orWhere('dicas_veiculos.modelo', 'LIKE', '%' . $search['search'] . '%');
            })
            ->select(
                'dicas_veiculos.*',
                'users.name',
                'tipo_veiculo.tipo_veiculo'
            )
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $dicas;
    }

    public function usuarioVeiculos()
    {
        $dicas = DicasVeiculo::where('user_id', Auth::user()->id)
            ->join('users', 'users.id', '=', 'dicas_veiculos.user_id')
            ->join('tipo_veiculo', 'tipo_veiculo.id', '=', 'dicas_veiculos.tipo_veiculo_id')
            ->select(
                'dicas_veiculos.*',
                'users.name',
                'tipo_veiculo.tipo_veiculo'
            )
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $dicas;
    }

    public function detalhesDicas($id)
    {

        $dica = DicasVeiculo::where('dicas_veiculos.id', $id)
            ->join('users', 'users.id', '=', 'dicas_veiculos.user_id')
            ->join('tipo_veiculo', 'tipo_veiculo.id', '=', 'dicas_veiculos.tipo_veiculo_id')
            ->select(
                'dicas_veiculos.*',
                'users.name',
                'tipo_veiculo.tipo_veiculo'
            )->first();

        return $dica;
    }

    public function salvarNovaDica($dicas)
    {

        $nova_dica = new DicasVeiculo();
        $nova_dica->user_id = Auth::user()->id;
        $nova_dica->tipo_veiculo_id = (int)$dicas['tipo_veiculo'];
        $nova_dica->marca = $dicas['marca'];
        $nova_dica->modelo = $dicas['modelo'];
        $nova_dica->versao = $dicas['versao'];
        $nova_dica->dicas = $dicas['dicas'];
        $nova_dica->save();
    }


    public function updateDica($dicas, $id)
    {
        DicasVeiculo::where('id', $id)->update([
            'tipo_veiculo_id' => (int)$dicas['tipo_veiculo'],
            'marca' => $dicas['marca'],
            'modelo' => $dicas['modelo'],
            'versao' => $dicas['versao'] ?? null,
            'dicas' => $dicas['dicas'],
        ]);
    }
}
