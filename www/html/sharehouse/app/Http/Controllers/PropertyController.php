<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Area;
use App\Model\Property;

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

    /**
     * トップページからの検索
     */
    public function featureSearch(Request $request)
    {
        if ($request->is_private_room) {
            $properties = Property::where('is_private_room', true)->get();
        } elseif ($request->is_dormitory) {
            $properties = Property::where('is_dormitory', true)->get();
        } elseif ($request->is_women_only) {
            $properties = Property::where('is_women_only', true)->get();
        } elseif ($request->is_foreigner) {
            $properties = Property::where('is_foreigner', true)->get();
        } elseif ($request->is_animals) {
            $properties = Property::where('is_animals', true)->get();
        } elseif ($request->campaign) {
            $properties = Property::whereNotNull('campaign')->get();
        }
        return view('property.search_result', compact('properties'));
    }
}
