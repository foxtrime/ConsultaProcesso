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
     $dados = Dados::where('arquivado','=',0)->where('deletado','=',0)->get();

     $dadosarq = Dados::where('arquivado','=',1)->where('deletado','=',0)->get();

     $dadosdeletados = Dados::where('arquivado','=',0)->where('deletado','=',1)->get();

     //-------------------------- REALIZADA
     $a = Dados::where('statusinterno', '=' , 'Realizada')->count();

     $b = Dados::where('statusinterno', '=' , 'Não Autorizado e Possivel Estimar')->count();

     $c = Dados::where('statusinterno', '=' , 'Não Atendido e Possivel Estimar')->count();

     //----------------------------------------
     
     $realizada = $a + $b + $c;
     
     //-----------------------------Não Atendida
     $d = Dados::where('statusinterno', '=' , 'Não Atendido e Impossivel Estimar')->count();

     $e = Dados::where('statusinterno', '=' , 'Não Compareceu à Presencial')->count();

     $f = Dados::where('statusinterno', '=' , 'Não Atendido')->count();
     //--------------------------------------------
     
     $naoatendida = $d + $e + $f;
     
     //----------------------------------Não Autorizada
     $g = Dados::where('statusinterno', '=' , 'Não Autorizado e Impossivel Estimar')->count();

     //-----------------------------------Não localizada
     $h = Dados::where('statusinterno', '=' , 'Não Localizado')->count();

            

      return view('home',compact('dados','dadosarq','dadosdeletados','realizada','naoatendida','g','h'));
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

    public function editstatus(Request $request, $data)
    {
        $dados = Dados::find($request->id);
        $dados->statusinterno = $data;
        $dados->arquivado = 1;
        $dados->save();
        dd($dados);
    }

    public function deletaagendamento(Request $request)
    {
        $deleta = Dados::find($request->id);
        $deleta->deletado = 1;
        $deleta->save();
    }

}
