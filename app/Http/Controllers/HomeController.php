<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dados;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Dados::all();
        return view('home',compact('dados'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $dados = new Dados($request->all());
        $dados->save();
        return redirect(url('/home'))->with('success','Informação cadastrada com sucesso!');
    }

}
