@extends('layouts.layouts')
@section('title','トップページ')
@section('contents')
<div id='main-area'>
    <aside id='side_content'>
        <div class='detail-search'>
            <p>エリアで絞り込む</p>
        </div>
        <div class='detail-search'>
            <p>特徴で絞り込む</p>
        </div>
    </aside>
    <article id='main_content'>
        <h2 class='search-title'>{{ $feature }}のシェアハウス</h2>
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
                <button class='show-detail-btn'><a href=""><i class="fas fa-arrow-circle-right mr-1"></i>詳細をみる</a></button>
                <button class='query-btn'><a href=""><i class="fas fa-envelope mr-1"></i>この物件に問い合わせる</a></button>
            </div>
        </div>
        @endforeach
    </article>
</div>
@endsection