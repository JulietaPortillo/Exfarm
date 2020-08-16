<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::get()->where('status', Sale::ACTIVE);

        return view('sales.index')
                ->with('sales', $sales)
                ->with('title', 'Ventas Realizadas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function to_sell($purchase_id)
    {
        $purchase = Purchase::find($purchase_id);
        
        return view('sales.create')
                ->with('code', $purchase->code)
                ->with('purchase', $purchase->id)
                ->with('title', 'Registro de Venta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sale;

        $sale->code_id = $request->input('code_id');
        $sale->weight = $request->input('weight');
        $sale->sale_price = $request->input('sale_price');
        $sale->age = $request->input('age');
        $sale->purchase_id = $request->input('purchase_id');
        $sale->sale_date = $request->input('sale_date');

        $sale->save();

        $purchase = Purchase::find($sale->purchase_id);
        $purchase->status = Purchase::SOLD;

        $purchase->save();

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('sales.edit')
                ->with('sale', $sale)
                ->with('title', 'Actualizar datos de venta');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $sale->weight = $request->input('weight');
        $sale->sale_price = $request->input('sale_price');
        $sale->age = $request->input('age');
        $sale->sale_date = $request->input('sale_date');

        $sale->save();

        return redirect()->route('sales.index');
    }

    /**
     * Update State Resource - DELETE
     */
    public function updateState($id)
    {

        $sale = Sale::find($id);

        $sale->status = Sale::INACTIVE;
        $sale->save();

        $purchase = Purchase::find($sale->purchase_id);
        
        $purchase->status = Purchase::BOUGHT;
        $purchase->save();

        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
