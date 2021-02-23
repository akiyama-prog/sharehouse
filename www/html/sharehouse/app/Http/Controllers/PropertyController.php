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
    public function index(Request $request)
    {
        if ($request->session()) {
            $request->session()->forget(['city', 'feature']);
        }
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
        switch ($feature) {
            case 'private_room':
                $properties = Property::where('is_private_room', true)->get();
                $feature = '個室あり';
                break;
            case 'dormitory':
                return Property::where('is_dormitory', true)->get();
                $feature = 'ドミトリーあり';
                break;
            case 'women_only':
                $properties = Property::where('is_women_only', true)->get();
                $feature = '女性専用';
                break;
            case 'foreigner':
                return Property::where('is_foreigner', true)->get();
                $feature = '外国人OK';
                break;
            case 'vacancy':
                return Property::where('is_vacancy', true)->get();
                $feature = '空室あり';
                break;
            case 'campaign':
                return Property::whereNotNull('campaign')->get();
                $feature = 'キャンペーン中';
                break;
        }
        return view('property.search_result', compact('properties', 'feature'));
    }

    /**
     * エリア詳細検索(区で検索)
     * @param string $city
     * @param Illuminate\Http\Request $request
     * @return view
     */
    public function detailAreaSearch(Request $request, string $city)
    {
        if ($request->session()->has('city')) {
            $request->session()->forget('city');
        }
        session(['city' => $city]);
        $properties = Property::where('city', $city)->get();
        $feature = $city;
        return view('property.search_result', compact('properties', 'feature'));
    }


    /**
     * 特徴詳細検索
     * @param string $feature
     * @param Illuminate\Http\Request $request
     * @return View
     */
    public function detailFeatureSearch(Request $request, string $feature)
    {
        //エリア検索されていたらそのエリア内で特徴検索を行う
        if ($request->session()->has('city')) {
            $properties = Property::where('city', session('city'));
        } else {
            $properties = Property::whereNotNull('id');
        }
        $jpFeature = $this->convertJPnSaveFeatureSession($feature);
        $request->session()->push('feature', $jpFeature);

        if ($request->session()->has('feature')) {
            foreach (session('feature') as $jpFeature) {
                $properties = $this->picPropertiesViaFeature($jpFeature, $properties);
            }
        }
        $properties = $properties->get();
        $feature = implode('/', session('feature'));

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

    /**
     * 特徴検索
     */
    protected function picPropertiesViaFeature($jpFeature, $properties)
    {
        switch ($jpFeature) {
            case '個室あり':
                return $properties->where('is_private_room', true);
                break;
            case 'ドミトリーあり':
                return $properties->where('is_dormitory', true);
                break;
            case '女性のみ':
                return $properties->where('is_women_only', true);
                break;
            case '外国人可':
                return $properties->where('is_foreigner', true);
                break;
            case '空室あり':
                return $properties->where('is_vacancy', true);
                break;
            case 'キャンペーンあり':
                return $properties->whereNotNull('campaign');
                break;
        }
    }

    /**
     * 特徴を日本語にしてセッションに保存
     */
    protected function convertJPnSaveFeatureSession($feature)
    {
        switch ($feature) {
            case 'private_room':
                return '個室あり';
                break;
            case 'dormitory':
                return 'ドミトリーあり';
                break;
            case 'women_only':
                return '女性のみ';
                break;
            case 'foreigner':
                return '外国人可';
                break;
            case 'vacancy':
                return '空室あり';
                break;
            case 'campaign':
                return 'キャンペーンあり';
                break;
        }
    }
}
