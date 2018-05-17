<?php

namespace App\Http\Controllers;

use App\Models\Gas;
use App\Models\Tarif;
use Illuminate\Http\Request;

class GasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gas.index', ['gases' => Gas::getList()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif = Tarif::where('slug', 'gas')->first();
        $newValue = $request->input('value');
        $prevPayment = Gas::orderBy('created_at', 'desc')->first();
        if ((int)$newValue < $prevPayment->value) {
            flash('Значение меньше чем за предыдущий месяц')->error()->important();
            return view('gas.create');
        }
        $diff = (int)$newValue - $prevPayment->value;
        $amount = 0;
        $amount = $diff * $tarif->value;

        $gas = new Gas();
        $gas->fill($request->input());
        $gas->cost = $tarif->value;
        $gas->amount = $amount;
        $gas->save();
        flash('Показатели успешно сохранены')->success()->important();
        return view('gas.update', ['object' => $gas]);
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
        $gas = Gas::find($id);
        return view('gas.update', ['object' => $gas]);
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
        $gas = Gas::find($id);
        $tarif = Tarif::where('slug', 'gas')->first();
        $newValue = $request->input('value');
        $prevPayment = Gas::orderBy('created_at', 'desc')->skip(1)->first();
        if ((int)$newValue < $prevPayment->value && (int)$newValue !== $prevPayment->value) {
            flash('Значение меньше чем за предыдущий месяц')->error()->important();
            return view('gas.update', ['object' => $gas]);
        }

        if ($gas->value !== $newValue) {
            $diff = (int)$newValue - $prevPayment->value;
            $amount = 0;
            $amount = $diff * $tarif->value;
            $gas->fill($request->input());
            $gas->cost = $tarif->value;
            $gas->amount = $amount;
            $gas->save();
        } else {
            $gas->fill($request->input());
            $gas->cost = $tarif->value;
            $gas->save();
        }
        flash('Показатели успешно сохранены')->success()->important();
        return view('gas.update', ['object' => $gas]);
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
        Gas::find($id)->delete();
        flash('Успешно удалено')->success()->important();
        return redirect(route('gas.index'));
    }
}
