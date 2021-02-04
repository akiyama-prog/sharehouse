<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Area;

class PropertyController extends Controller
{
    /**
     *
     */
    public function index()
    {
        $areas = Area::select('id', 'area_name')->get();
        return view('welcome', compact('areas'));
    }
}
