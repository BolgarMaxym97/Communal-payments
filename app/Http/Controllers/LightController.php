<?php

namespace App\Http\Controllers;

use App\Models\Light;
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
        $light = new Light();
        $light->fill($request->input());
        $light->save();
        return redirect(route('light.update', ['id' => $light->id]));
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
        if ($request->method() == 'post') {
            dd(111);
            $light->fill($request->input());
            $light->save();
        }
        return view('light.update', ['object' => $light]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Light::find($id)->delete();
        return redirect(route('light.index'));
    }
}
