<?php

namespace App\Http\Controllers;

use App\Classes\Veiculos;
use App\Http\Requests\DicasRequest;
use App\Models\DicasVeiculo;
use App\Models\TipoVeiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private $veiculos;

    public function __construct()
    {
        $this->middleware('auth');
        $this->veiculos = new Veiculos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dicas = $this->veiculos->usuarioVeiculos();
        return view('web.admin.logado', compact('dicas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adicionarDicas(Request $request)
    {
        $tipo_veiculo = TipoVeiculo::all();

        return view('web.admin.adicionarDicas', compact('tipo_veiculo'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function  salvarDicas(DicasRequest $dicasRequest)
    {
        $this->veiculos->salvarNovaDica($dicasRequest->all());

        return redirect()->route('admin.home')->with('alert', "Dica cadastrada com successo.");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editarDicas($id)
    {
        $tipo_veiculo = TipoVeiculo::all();

        $dica = DicasVeiculo::where('id', $id)->first();

        return view('web.admin.editarDicas', compact('tipo_veiculo', 'dica'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editarSalvarDicas(DicasRequest $dicasRequest, $id)
    {

        $this->veiculos->updateDica($dicasRequest->all(), $id);

        return redirect()->route('admin.home')->with('alert', "Dica ID: {$id} Editado com sucesso.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletarDicas($id)
    {
        // Não foi utilizado verificações de segurança pois é um script teste
        DicasVeiculo::where('id', $id)->where('user_id', Auth::user()->id)->delete();

        return redirect()->route('admin.home')->with('alert', "Dica ID: {$id} Carro excluido do registro com sucesso.");
    }
}
