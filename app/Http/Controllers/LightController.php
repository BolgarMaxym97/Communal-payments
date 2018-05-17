<?php

namespace App\Http\Controllers;

use App\Models\Light;
use App\Models\Tarif;
use Illuminate\Http\Request;

class LightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('light.index', ['lights' => Light::getList()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('light.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif = Tarif::where('slug', 'light')->first();
        $newValue = $request->input('value');
        $prevPayment = Light::orderBy('created_at', 'desc')->first();
        if ((int)$newValue < $prevPayment->value) {
            flash('Значение меньше чем за предыдущий месяц')->error()->important();
            return view('light.create');
        }
        $diff = (int)$newValue - $prevPayment->value;
        $amount = 0;
        if ($diff < 100) {
            $amount = $diff * $tarif->additionalValue;
        } else {
            $diffFirst = 100;
            $diffSecond = $diff - $diffFirst;
            $amount = ($diffFirst * $tarif->additionalValue) + ($diffSecond * $tarif->value);
        }
        $light = new Light();
        $light->fill($request->input());
        $light->additionalCost = $tarif->additionalValue;
        $light->cost = $tarif->value;
        $light->amount = $amount;
        $light->save();
        flash('Показатели успешно сохранены')->success()->important();
        return view('light.update', ['object' => $light]);
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
        $light = Light::find($id);
        return view('light.update', ['object' => $light]);
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
        $light = Light::find($id);
        $tarif = Tarif::where('slug', 'light')->first();
        $newValue = $request->input('value');
        $prevPayment = Light::orderBy('created_at', 'desc')->skip(1)->take(1)->first();
        if ((int)$newValue < $prevPayment->value && (int)$newValue !== $prevPayment->value) {
            flash('Значение меньше чем за предыдущий месяц')->error()->important();
            return view('light.update', ['object' => $light]);
        }

        if ($light->value !== $newValue) {
            $diff = (int)$newValue - $prevPayment->value;
            $amount = 0;
            if ($diff < 100) {
                $amount = $diff * $tarif->additionalValue;
            } else {
                $diffFirst = 100;
                $diffSecond = $diff - $diffFirst;
                $amount = ($diffFirst * $tarif->additionalValue) + ($diffSecond * $tarif->value);
            }
            $light->fill($request->input());
            $light->additionalCost = $tarif->additionalValue;
            $light->cost = $tarif->value;
            $light->amount = $amount;
            $light->save();
        } else {
            $light->fill($request->input());
            $light->additionalCost = $tarif->additionalValue;
            $light->cost = $tarif->value;
            $light->save();
        }
        flash('Показатели успешно сохранены')->success()->important();
        return view('light.update', ['object' => $light]);
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
        Light::find($id)->delete();
        flash('Успешно удалено')->success()->important();
        return redirect(route('light.index'));
    }
}
