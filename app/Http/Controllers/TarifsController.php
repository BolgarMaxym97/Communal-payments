<?php

namespace App\Http\Controllers;

use App\Models\Warm;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tarifs.index', ['tarifs' => Tarif::getList()]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $tarif = Tarif::find($id);
        return view('tarifs.update', ['object' => $tarif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarif = Tarif::find($id);
        $tarif->fill($request->input());
        $tarif->save();
        flash('Показатели успешно сохранены')->success()->important();
        return view('tarifs.update', ['object' => $tarif]);
    }
}
