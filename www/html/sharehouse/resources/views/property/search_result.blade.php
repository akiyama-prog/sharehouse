@extends('layouts.layouts')
@section('title','トップページ')
@section('contents')
<div id='main-area'>
    <aside id='side_content'>
        <div class='detail-search'>
            <p>エリアで絞り込む</p>
            @foreach(App\Model\Area::all() as $area)
            <ul class='area-table'>

                <input type="checkbox" id="area-{{$area->id}}" class='acc' />
                <label for="area-{{$area->id}}">{{ $area->area_name }}</label>
                @foreach(explode(',',$area->cities) as $city)
                <li class='acc-hidden'>
                    <a href="{{ route('detail_area_search',$city) }}" class='area-select'>{{ $city }}</a>
                </li>
                @endforeach
            </ul>
            @endforeach

        </div>
        <p>特徴で絞り込む</p>
        <ul class='feature-select'>
            <a href="{{ route('detail_feature_search','private_room') }}" class='is-private-room'>
                <li><i class="fas fa-person-booth icon-size"></i>　
                    個室あり
                </li>
            </a>
            <a href="{{ route('detail_feature_search','dormitory') }}" class='is-domitory'>
                <li><i class="fas fa-bed icon-size"></i>　
                    ドミトリーあり
                </li>
            </a>
            <a href="{{ route('detail_feature_search','women_only') }}" class='is-women-only'>
                <li><i class="fas fa-female icon-size"></i>　
                    女性のみ
                </li>
            </a>
            <a href="{{ route('detail_feature_search','foreigner') }}" class='is-foreigner'>
                <li><i class="fas fa-plane icon-size"></i>　
                    外国人可
                </li>
            </a>
            <a href="{{ route('detail_feature_search','vacancy') }}" class='is_vacancy'>
                <li><i class="fas fa-sign-in-alt icon-size"></i>　
                    空室あり
                </li>
            </a>
            <a href="{{ route('detail_feature_search','campaign') }}" class='campaign'>
                <li><i class="fas fa-glass-cheers icon-size"></i>　
                    キャンペーンあり
                </li>
            </a>
        </ul>
    </aside>
    <article id='main_content'>
        <h2 class='search-title'>
            @if($area_name && $feature === null) {{ $area_name }}
            @elseif($feature && $area_name === null) {{ $feature }}
            @elseif($area_name && $feature) {{ $area_name }}/{{ $feature }}
            @endif
            のシェアハウス
        </h2>
        @foreach($properties as $property)
        <div class='property'>
            <h3 class='property-name'>{{ $property->property_name }}</h3>
            <div class='property-info'>
                <img src="/images/{{ $property->main_image }}" alt="物件メイン画像" class='property-img'>
                <div class='info'>
                    <table class='table info-table'>
                        <tr>
                            <th>賃料</th>
                            <td>￥{{ number_format(App\Model\Property::getMinLent($property)) }} ~ ￥{{ number_format(App\Model\Property::getMaxLent($property)) }}/月</td>
                        </tr>
                        <tr>
                            <th>アクセス</th>
                            <td>{{ $property->route1 }}　{{ $property->station1 }}駅　徒歩{{ $property->station_walk1 }}分</td>
                        </tr>
                        <tr>
                            <th>空室</th>
                            <td>{{ App\Model\Property::countVacancyRooms($property) }}室</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class='access-btn'>
                <a href="{{ route('show_property',$property) }}" class='show-detail-btn'><i class="fas fa-arrow-circle-right mr-1"></i>詳細をみる</a>
                <a href="" class='query-btn'><i class="fas fa-envelope mr-1"></i>この物件に問い合わせる</a>
            </div>
        </div>
        @endforeach
    </article>
</div>
@endsection