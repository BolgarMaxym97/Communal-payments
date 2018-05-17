<?php

namespace App\Http\Controllers;

use App\Models\Comunal;
use App\Models\Gas;
use App\Models\Light;
use App\Models\Tarif;
use App\Models\Warm;
use App\Models\Water;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lightSum = Light::sum('amount');
        $gasSum = Gas::sum('amount');
        $waterSum = Water::sum('amount');
        $comunalSum = Comunal::sum('amount');
        $warmSum = Warm::sum('amount');

        $lightLast = Light::latest('created_at')->first()->amount;
        $gasLast = Gas::latest('created_at')->first()->amount;
        $waterLast = Water::latest('created_at')->first()->amount;
        $comunalLast = Comunal::latest('created_at')->first()->amount;
        $warmLast = Warm::latest('created_at')->first()->amount;

        $lightLastValue = Light::latest('created_at')->first();
        $gasLastValue = Gas::latest('created_at')->first();
        $waterLastValue = Water::latest('created_at')->first();

        $lightPrevValue = Light::latest('created_at')->skip(1)->first();
        $gasPrevValue = Gas::latest('created_at')->skip(1)->first();
        $waterPrevValue = Water::latest('created_at')->skip(1)->first();

        return view('dashboard', [
            'totalSums' => [
                'light' => $lightSum,
                'gas' => $gasSum,
                'water' => $waterSum,
                'comunal' => $comunalSum,
                'warm' => $warmSum,
            ],
            'last' => [
                'light' => $lightLast,
                'gas' => $gasLast,
                'water' => $waterLast,
                'comunal' => $comunalLast,
                'warm' => $warmLast,
                'lightLastValue' => $lightLastValue ? $lightLastValue->value : 0,
                'gasLastValue' => $gasLastValue ? $gasLastValue->value : 0,
                'waterLastValue' => $waterLastValue ? $waterLastValue->value : 0,
                'lightPrevValue' => $lightPrevValue ? $lightPrevValue->value : 0,
                'gasPrevValue' => $gasPrevValue ? $gasPrevValue->value : 0,
                'waterPrevValue' => $waterPrevValue ? $waterPrevValue->value : 0,
            ],
        ]);
    }
}
