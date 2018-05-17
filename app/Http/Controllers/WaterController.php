<?php

namespace App\Http\Controllers;

use App\Models\Water;
use App\Models\Tarif;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('water.index', ['waters' => Water::getList()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('water.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif = Tarif::where('slug', 'water')->first();
        $newValue = $request->input('value');
        $prevPayment = Water::orderBy('created_at', 'desc')->first();
        if ((int)$newValue < $prevPayment->value) {
            flash('Значение меньше чем за предыдущий месяц')->error()->important();
            return view('water.create');
        }
        $diff = (int)$newValue - $prevPayment->value;
        $amount = 0;
        $amount = $diff * $tarif->value;

        $water = new Water();
        $water->fill($request->input());
        $water->cost = $tarif->value;
        $water->amount = $amount;
        $water->save();
        flash('Показатели успешно сохранены')->success()->important();
        return view('water.update', ['object' => $water]);
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
        $water = Water::find($id);
        return view('water.update', ['object' => $water]);
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
        $water = Water::find($id);
        $tarif = Tarif::where('slug', 'water')->first();
        $newValue = $request->input('value');
        $prevPayment = Water::orderBy('created_at', 'desc')->skip(1)->first();
        if ((int)$newValue < $prevPayment->value && (int)$newValue !== $prevPayment->value) {
            flash('Значение меньше чем за предыдущий месяц')->error()->important();
            return view('water.update', ['object' => $water]);
        }

        if ($water->value !== $newValue) {
            $diff = (int)$newValue - $prevPayment->value;
            $amount = 0;
            $amount = $diff * $tarif->value;
            $water->fill($request->input());
            $water->cost = $tarif->value;
            $water->amount = $amount;
            $water->save();
        } else {
            $water->fill($request->input());
            $water->cost = $tarif->value;
            $water->save();
        }
        flash('Показатели успешно сохранены')->success()->important();
        return view('water.update', ['object' => $water]);
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
        Water::find($id)->delete();
        flash('Успешно удалено')->success()->important();
        return redirect(route('water.index'));
    }
}
