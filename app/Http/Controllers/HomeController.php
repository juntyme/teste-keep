<?php

namespace App\Http\Controllers;

use App\Classes\Veiculos;
use App\Models\DicasVeiculo;
use App\Models\TipoVeiculo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $veiculos;

    public function __construct()
    {
        $this->veiculos = new Veiculos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dicas =  $this->veiculos->homeVeiculos();

        $tipo_veiculo = TipoVeiculo::all();

        return view('web.home', compact('dicas', 'tipo_veiculo'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $dateForm = $request->except('_token');

        $tipo_veiculo = TipoVeiculo::all();

        $dicas =  $this->veiculos->searchVeiculos($request->all());

        return view('web.search', compact('dicas', 'request', 'tipo_veiculo', 'dateForm'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detalhes($id)
    {

        $dicas =  $this->veiculos->detalhesDicas($id);

        return view('web.detalhesDicas', compact('dicas'));
    }


    /**
     * Filtro por Marca.
     *
     * @return Json
     */
    public function filtroMarca(Request $request)
    {

        $categories = DicasVeiculo::where('tipo_veiculo_id', $request->get('dep'))
            ->select(
                'marca'
            )
            ->groupBy('marca')
            ->orderBy('marca', 'asc')
            ->get();

        $response['success'] = true;
        $response['message'] = json_encode($categories, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return $response;
    }


    /**
     * Filtro Por Modelo.
     *
     * @return Json
     */
    public function filtroModelo(Request $request)
    {

        $modelo = DicasVeiculo::where('marca', $request->get('dep'))
            ->where('tipo_veiculo_id', $request->get('tipo'))
            ->select(
                'modelo'
            )
            ->groupBy('modelo')
            ->orderBy('modelo', 'asc')
            ->get();

        $response['success'] = true;
        $response['message'] = json_encode($modelo, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return $response;
    }
}
