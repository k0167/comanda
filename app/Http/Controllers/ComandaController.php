<?php

namespace App\Http\Controllers;
use App\Models\Comanda;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ComandaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comandas = Comanda::whereDate('created_at', '>=', Carbon::today()->toDateString())
                            ->orderBy('nome')
                            ->get();
        return response()->json($comandas,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newComanda = new Comanda([
            'nome' => $request->get('nome'),
            'valor_total' => $request->get('valor_total'),
            'desconto' => $request->get('desconto')
          ]);

          $newComanda->save();

          return response()->json($newComanda, 201);

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {

        $comanda = Comanda::findOrFail($id);
        return response()->json($comanda,200);
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

        $comanda = Comanda::findOrFail($id);

        $comanda->nome = $request->get('nome');
        $comanda->valor_total = $request->get('valor_total');
        $comanda->desconto = $request->get('desconto');

        $comanda->save();

        return response()->json($comanda,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comanda = Comanda::find($id);
        $comanda->delete();

        return response()->json($comanda,200);

    }
}
