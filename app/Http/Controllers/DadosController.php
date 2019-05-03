<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Dados;

class DadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function consultaProcesso($numeroProcesso)
    {
        $processo = DB::table('dados')->where('processo', '=', $numeroProcesso)->get();

        //$json = json_encode($processo);
        //dd($json);

        return response()->json($processo);
    }

    public function confirmarProcesso(Request $request , $numeroProcesso)
    {
        $processo = DB::table('dados')->where('processo', '=', $numeroProcesso)->first();
        $processo->status = 'Validado';
        
        $teste = Dados::find($processo->id);
        $teste->status = 'Validado';
        $teste->save();
        
        dd($teste);

        return response()->json($teste);
        
    }

}
