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
        $vagas = vagCad::all();
        return view('listvaga' , compact('vagas'));
    }
}
