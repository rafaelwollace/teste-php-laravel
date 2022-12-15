<?php

namespace App\Http\Controllers;
use App\Models\VagaCandidato as vagCad;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;

class VagaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vaga');
    }

    public function lista()
    {
        $id_user = Auth::user()->id;
        $tipo = Auth::user()->tipo;
        if($tipo == 1){
            $vagas = vagCad::select('vaga_candidatos.id as cadt_id', 'titulo_vaga', 'tipo_vaga', 'status_vaga', 'name', 'fk_users')
                ->leftJoin('vagas', 'vagas.id', '=', 'vaga_candidatos.fk_vagas')
                ->leftJoin('users', 'users.id', '=', 'vaga_candidatos.fk_users')
                ->where('fk_users', '=', $id_user)->get();
        }else{
            $vagas = vagCad::select('vaga_candidatos.id as cadt_id', 'titulo_vaga', 'tipo_vaga', 'status_vaga', 'name', 'fk_users')
                ->leftJoin('vagas', 'vagas.id', '=', 'vaga_candidatos.fk_vagas')
                ->leftJoin('users', 'users.id', '=', 'vaga_candidatos.fk_users')->get();
        }

        return view('listvaga' , compact('vagas'));
    }
}