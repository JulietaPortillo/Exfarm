<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::get()->where('status', Purchase::BOUGHT);

        return view('purchases.index')
                ->with('purchases', $purchases)
                ->with('title', 'Inventario de Animalitos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchases.create')
                ->with('title', 'Registro de un nuevo animalito');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = new Purchase;

        $purchase->code = $request->input('code');
        $purchase->weight = $request->input('weight');
        $purchase->purchase_price = $request->input('purchase_price');
        $purchase->description = $request->input('description');
        $purchase->age = $request->input('age');
        $purchase->purchase_date = $request->input('purchase_date');

        $purchase->save();

        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view('purchases.edit')
                ->with('purchase', $purchase)
                ->with('title', 'Actualizar datos del animalito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $purchase->code = $request->input('code');
        $purchase->weight = $request->input('weight');
        $purchase->purchase_price = $request->input('purchase_price');
        $purchase->description = $request->input('description');
        $purchase->age = $request->input('age');
        $purchase->purchase_date = $request->input('purchase_date');

        $purchase->save();

        return redirect()->route('purchases.index');
    }

    /**
     * Update State Resource - DELETE
     */
    public function updateState($id)
    {

        $purchase = Purchase::find($id);

        $purchase->status = Purchase::INACTIVE;

        $purchase->save();

        return redirect()->route('purchases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
