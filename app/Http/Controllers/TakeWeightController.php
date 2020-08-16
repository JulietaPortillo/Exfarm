<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\TakeWeight;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TakeWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getWeights($purchase_id)
    {
        $purchase = Purchase::find($purchase_id);

        $weights = TakeWeight::get()
                ->where('status', TakeWeight::ACTIVE)
                ->where('purchase_id', $purchase->id);
        
        return view('weights.index')
                ->with('weights', $weights)
                ->with('purchase', $purchase)
                ->with('title', 'Administración de pesos animalito');
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

    public function weight_assign($purchase_id)
    {
        $purchase = Purchase::find($purchase_id);

        return view('weights.create')
                ->with('code_id', $purchase->code)
                ->with('purchase_id', $purchase->id)
                ->with('title', 'Registrar peso del animalito');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $weight = new TakeWeight;

        $weight->code_id = $request->input('code_id');
        $weight->weight = $request->input('weight');
        $weight->registration_date = $request->input('registration_date');
        $weight->purchase_id = $request->input('purchase_id');

        $weight->save();

        return redirect()->route('weights.index', $weight->purchase_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TakeWeight  $takeWeight
     * @return \Illuminate\Http\Response
     */
    public function show(TakeWeight $takeWeight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TakeWeight  $takeWeight
     * @return \Illuminate\Http\Response
     */
    public function edit(TakeWeight $takeWeight)
    {
        return view('weights.edit')
                ->with('weight', $takeWeight)
                ->with('title', 'Actualizar peso del animalito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TakeWeight  $takeWeight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TakeWeight $takeWeight)
    {
        $takeWeight->weight = $request->input('weight');
        $takeWeight->registration_date = $request->input('registration_date');

        $takeWeight->save();

        return redirect()->route('weights.index', $takeWeight->purchase_id);

    }

    /**
     * Update State Resource - DELETE
     */
    public function updateState($id)
    {

        $weight = TakeWeight::find($id);

        $weight->status = TakeWeight::INACTIVE;
        $weight->save();

        return redirect()->route('weights.index', $weight->purchase_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TakeWeight  $takeWeight
     * @return \Illuminate\Http\Response
     */
    public function destroy(TakeWeight $takeWeight)
    {
        //
    }
}
