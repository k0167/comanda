<?php

namespace App\Http\Controllers;
use App\Models\ComandaProduto;

use Illuminate\Http\Request;
use Carbon\Carbon;


class ComandaProdutoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comanda_produtos = ComandaProduto::whereDate('created_at', '>=', Carbon::today()->toDateString())
                            ->orderBy('updated_at')
                            ->get();
        return response()->json($comanda_produtos,200);
    }

    public function store(Request $request)
    {
        $newComandaProduto = new ComandaProduto([
            'id_comanda' => $request->get('id_comanda'),
            'id_produto' => $request->get('id_produto'),
            'valor' => $request->get('valor'),
            'qtde' => $request->get('qtde'),
            'valor_pago' => $request->get('valor_pago')
          ]);
          $newComandaProduto->save();

          return response()->json($newComandaProduto, 201);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $comandaProduto = ComandaProduto::where('id_comanda',$id)->get();
        return response()->json($comandaProduto,200);
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

        $comanda_produto = ComandaProduto::findOrFail($id);

        $comanda_produto->valor = $request->get('valor');
        $comanda_produto->qtde = $request->get('qtde');
        $comanda_produto->valor_pago = $request->get('valor_pago');

        $comanda_produto->save();

        return response()->json($comanda_produto,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comandaProduto = ComandaProduto::findOrFail($id);
        $comandaProduto->delete();
        
        return response()->json($comandaProduto,200);

    }
}
