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
     * @param Illuminate\Http\Requests
     * @return response
     */
    public function featureSearch(Request $request)
    {
        if ($request->is_private_room) {
            $properties = Property::where('is_private_room', true)->get();
            $feature = '個室あり';
        } elseif ($request->is_dormitory) {
            $properties = Property::where('is_dormitory', true)->get();
            $feature = 'ドミトリーあり';
        } elseif ($request->is_women_only) {
            $properties = Property::where('is_women_only', true)->get();
            $feature = '女性専用';
        } elseif ($request->is_foreigner) {
            $properties = Property::where('is_foreigner', true)->get();
            $feature = '外国人OK';
        } elseif ($request->is_vacancy) {
            $properties = Property::where('is_vacancy', true)->get();
            $feature = '空室あり';
        } elseif ($request->campaign) {
            $properties = Property::whereNotNull('campaign')->get();
            $feature = 'キャンペーン中';
        }
        return view('property.search_result', compact('properties', 'feature'));
    }
}
