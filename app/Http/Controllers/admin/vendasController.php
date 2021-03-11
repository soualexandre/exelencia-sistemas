<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vendas;
use App\Models\Caixa;
use App\Models\Gastos;
use Carbon\Carbon;

class Vendascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = auth()->user()->id;

        $vendas = Vendas::where('id_usuario', $id)->orderBy('id', 'DESC')->paginate('7');

        return view('pages.vendas.index', compact('vendas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $method = $request->input('method');

        if ($method == "Selecione um tipo") {
            return back()->withStatu(__('Selecione um método de transação'));
        }
        $value = $request->input('value');
        $date = Carbon::yesterday();
        $id = auth()->user()->id;

        $this->adicionar($value, $id);

        DB::insert('insert into vendas (method, value, date, id_usuario) values (?, ?, ?, ?)', [$method, $value, $date, $id]);

        return back()->withStatus(__('Venda adicionada com sucesso'));
    }

    public function adicionar($value, $id)
    {
        $dados = DB::select('select * from caixas where id_usuario = :id_usuario', ['id_usuario' => $id]);
       
       
        if (!empty($dados)) {
            $atual = $dados[0]->value;
            $id_usuario = $dados[0]->id_usuario;

            $soma = $value += $atual;
            
            DB::table('caixas')
                ->update(
                    ['value' => $soma,
                    'id_usuario' => $id_usuario, 
                    ]
                );
        }
        else{
            DB::insert('insert into caixas (value, id_usuario) values (?, ?)', [$value, $id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //retornando um mês específico
        $users = DB::table('vendas')
            ->whereMonth('date', '03')
            ->get();
        return $users;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
