<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Area;
use App\Model\Property;
use App\Model\Room;
use phpDocumentor\Reflection\Types\Integer;

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
     * @param App\Model\Area $area
     * @return View
     */
    public function areaSearch(Area $area)
    {
        $properties = Property::where('area_id', $area->id)->get();
        $feature = $area->area_name;
        return view('property.search_result', compact('properties', 'feature'));
    }

    /**
     * トップページからの特徴検索
     * @param string $feature
     * @return View
     */
    public function featureSearch(string $feature)
    {
        if ($feature = 'private_room') {
            $properties = Property::where('is_private_room', true)->get();
            $feature = '個室あり';
        } elseif ($feature = 'dormitory') {
            $properties = Property::where('is_dormitory', true)->get();
            $feature = 'ドミトリーあり';
        } elseif ($feature = 'women_only') {
            $properties = Property::where('is_women_only', true)->get();
            $feature = '女性専用';
        } elseif ($feature = 'foreigner') {
            $properties = Property::where('is_foreigner', true)->get();
            $feature = '外国人OK';
        } elseif ($feature = 'vacancy') {
            $properties = Property::where('is_vacancy', true)->get();
            $feature = '空室あり';
        } elseif ($feature = 'campaign') {
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
