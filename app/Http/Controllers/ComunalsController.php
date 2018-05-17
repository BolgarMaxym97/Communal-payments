<?php

namespace App\Http\Controllers;

use App\Models\Comunal;
use App\Models\Tarif;
use Illuminate\Http\Request;

class ComunalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comunals.index', ['comunals' => Comunal::getList()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarif = Tarif::where('slug', 'comunal')->first();
        return view('comunals.create', ['tarif' => $tarif]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif = Tarif::where('slug', 'comunal')->first();
        $comunal = new Comunal();
        $comunal->fill($request->input());
        $comunal->amount = $tarif->value;
        $comunal->save();
        flash('Показатели успешно сохранены')->success()->important();
        return view('comunals.update', ['object' => $comunal, 'tarif' => $tarif]);
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
        $comunal = Comunal::find($id);
        $tarif = Tarif::where('slug', 'comunal')->first();
        return view('comunals.update', ['object' => $comunal, 'tarif' => $tarif]);
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
        $tarif = Tarif::where('slug', 'comunal')->first();
        $comunal = new Comunal();
        $comunal->fill($request->input());
        $comunal->amount = $tarif->value;
        $comunal->save();
        flash('Показатели успешно сохранены')->success()->important();
        return view('comunals.update', ['object' => $comunal, 'tarif' => $tarif]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        Comunal::find($id)->delete();
        flash('Успешно удалено')->success()->important();
        return redirect(route('comunals.index'));
    }
}
