<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Area;
use App\Model\Property;
use App\Model\Room;

class PropertyController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        $areas = Area::select('id', 'area_name')->get();
        return view('welcome', compact('areas'));
    }

    /**
     * トップページからのエリア検索
     * @param Illuminate\Http\Requests
     * @return View
     */
    public function areaSearch(Request $request)
    {
        $area_id = Area::where('area_name', $request->area)->value('id');
        $properties = Property::where('area_id', $area_id)->get();
        $feature = $request->area;
        return view('property.search_result', compact('properties', 'feature'));
    }

    /**
     * トップページからの特徴検索
     * @param Illuminate\Http\Requests
     * @return View
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

    /**
     * 物件詳細ページ
     * @param Property $property
     * @return View
     */
    public function showProperty(Property $property)
    {
        $number_vacancy_rooms = Room::where('property_id', $property->id)->count();
        return view('property.show', compact('property', 'number_vacancy_rooms'));
    }
}
