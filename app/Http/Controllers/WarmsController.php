<?php

namespace App\Http\Controllers;

use App\Models\Warm;
use App\Models\Tarif;
use Illuminate\Http\Request;

class WarmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('warms.index', ['warms' => Warm::getList()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warm = new Warm();
        $warm->fill($request->input());
        $warm->save();
        flash('Показатели успешно сохранены')->success()->important();
        return view('warms.update', ['object' => $warm]);
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
        $warm = Warm::find($id);
        return view('warms.update', ['object' => $warm]);
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
        $warm = Warm::find($id);
        $warm->fill($request->input());
        $warm->save();
        flash('Показатели успешно сохранены')->success()->important();
        return view('warms.update', ['object' => $warm]);
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
        Warm::find($id)->delete();
        flash('Успешно удалено')->success()->important();
        return redirect(route('warms.index'));
    }
}
