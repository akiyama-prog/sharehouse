@extends('layouts.layouts')
@section('title',$property->property_name)
@section('header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
@endsection
@section('contents')
<div id='property-show'>
    <div class='main-info'>
        <h1>{{ $property->property_name }}</h1>
        <div class='main-image'><img src="/images/{{ $property->main_image }}" alt="物件写真"></div>
        <p class='introduce'>{{ nl2br($property->introduce) }}</p>
    </div>

    <ul class='inside-page-link'>
        <a href="#facilities">
            <li>FACILITIES</br><span class='jp'>共用部</span></br><span class='facilities-color'><i class="fas fa-chevron-down"></i></span></li>
        </a>
        <a href="#rooms">
            <li>ROOMS</br><span class='jp'>占有部</span></br><span class='rooms-color'><i class="fas fa-chevron-down"></i></span></li>
        </a>
        <a href="#location">
            <li>LOCATION</br><span class='jp'>アクセス・環境</span></br><span class='location-color'><i class="fas fa-chevron-down"></i></span></li>
        </a>
        <a href="#oparation">
            <li>OPARATIOM</br><span class='jp'>運営・管理</span></br><span class='oparation-color'><i class="fas fa-chevron-down"></i></span></li>
        </a>
    </ul>

    <div class='facilities'>
        <div class='facilities-title'>
            <a id="facilities">
                <h2><span class='facilities-color'>F</span>ACILITIES</br><span class='jp'>共用部</span></h2>
            </a>
            @if($property->feature1)
            <ul class='feature'>
                <p class='info-title'>FEATURE</p>
                <li>{{ $property->feature1 }}</li>
                @if($property->feature2)<li>{{ $property->feature2 }}</li>@endif
                @if($property->feature3)<li>{{ $property->feature3 }}</li>@endif
            </ul>
            @endif
        </div>
        <div class='facilities-info'>
            <div class='images'>
                @foreach($property->sub_pictures as $picture)
                @if($loop->first)
                <a href="/images/{{ $picture->image_name }}" data-lightbox="sub_pics"><img src="/images/{{ $picture->image_name }}" width="300" alt='共用部写真'></a>
                @else
                <a href="/images/{{ $picture->image_name }}" data-lightbox="sub_pics"><img src="/images/{{ $picture->image_name }}" alt='共用部写真' class='subpics'></a>
                @endif
                @endforeach
            </div>
            <div class='facilities-info-table'>
                <table class='table'>
                    <tr>
                        <td>リビング</td>
                        <td>{{ $property->lounge }}</td>
                    </tr>
                    <tr>
                        <td>キッチン</td>
                        <td>{{ $property->kitchen }}</td>
                    </tr>
                    <tr>
                        <td>バス</td>
                        <td>{{ $property->shawer }}
                            @if($property->bath)
                            </br>{{ $property->bath }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>トイレ</td>
                        <td>{{ $property->toilet }}</td>
                    </tr>
                    <tr>
                        <td>洗濯</td>
                        <td>{{ $property->laundry }}
                            @if($property->dryer)
                            </br>{{ $property->dryer }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>インターネット</td>
                        <td>{{ $property->internet }}
                            @if($property->internet_memo)
                            </br>{{ $property->internet_memo }}
                            @endif
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td>その他</td>
                        <td>{{ $property->parking_1 }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class='rooms'>
        <div class='rooms-title'>
            <a id='rooms'>
                <h2><span class='rooms-color'>R</span>OOMS</br><span class='jp'>占有部</span></h2>
            </a>
            <div class='requirement'>
                @if($property->is_women_only === true)
                <p><i class="fas fa-female icon"></i></br>女性のみ</p>
                @else

                <p><i class="fas fa-restroom icon"></i></br>男性・女性OK</p>
                @endif
                @if($property->is_foreigner === true)

                <p><i class="fas fa-plane icon"></i></br>外国人OK</p>
                @endif
                @if($property->is_animals === true)

                <p><i class="fas fa-paw icon"></i></br>ペットOK</p>
                @endif
            </div>
        </div>
        @if($property->is_vacancy === true)
        <p><i class="fas fa-door-closed icon"></i> 入居可能な個室　<span class='number_of_vacancy'>{{ $number_vacancy_rooms }}</span><span class='total-room'> / {{ $property->total_rooms }}</span></p>
        <table class="table table-bordered index-room-table">
            <tr>
                <th>部屋</th>
                <th>広さ</th>
                <th>賃料</th>
                <th>その他の費用</th>
            </tr>
            @foreach($property->rooms as $room)
            <tr>
                <td>{{ $room->room_number }}</td>
                <td>{{ $room->room_size }}㎡<span class='jp'> {{ round($room->room_size / 1.62 ,1) }}畳</span></td>
                <td>￥{{ $room->lent }}</td>
                <td><span class='jp'>管理費</span> ￥{{ $room->management_fee }}<span class='jp'>　敷金・保証金</span> ￥{{ $room->security_deposit + $room->deposit }}</td>
            </tr>
            @endforeach
        </table>
        @else
        <p>現在空室の予定はございません。</p>
        @endif
    </div>

    <div class='location'>
        <div class='location-title'>
            <a id='location'>
                <h2><span class='location-color'>L</span>ATION</br><span class='jp'>アクセス・地域環境</span></h2>
            </a>
            <div class='station-walk'>
                <div class='station'>
                    <div><span class='route1'>{{ $property->route1 }}</span></br>{{ $property->station1 }}</div>
                    <span class='icon'><i class="fas fa-subway"></i></span>
                </div>
                <div class='shoe-print icon'><i class="fas fa-shoe-prints"></i>　<i class="fas fa-shoe-prints"></i></div>
                <div class='walk_min'><span class='icon'><i class="fas fa-home"></span></i>徒歩<span class='minutes'>{{ $property->station_walk1 }}</span>分</div>
            </div>
            @if($property->route2)
            <div class='station-walk'>
                <div class='station'>
                    <div><span class='route1'>{{ $property->route1 }}</span></br>{{ $property->station1 }}</div>
                    <span class='icon'><i class="fas fa-subway"></i></span>
                </div>
                <div class='shoe-print icon'><i class="fas fa-shoe-prints"></i>　<i class="fas fa-shoe-prints"></i></div>
                <div class='walk_min'><span class='icon'><i class="fas fa-home"></span></i>徒歩<span class='minutes'>{{ $property->station_walk1 }}</span>分</div>
            </div>
            @endif
        </div>
        <ul class='area-info'>
            <p class='info-title'>周辺施設</p>
            <li>{{ $property->area_info1 }}</br><span class='area-info-walk'>徒歩{{ $property->area_info_walk1 }}分</span></li>
            @if($property->area_info2)<li>{{ $property->area_info2 }}</br><span class='area-info-walk'>徒歩{{ $property->area_info_walk2 }}分</span></li>@endif
            @if($property->area_info3)<li>{{ $property->area_info3 }}</br><span class='area-info-walk'>徒歩{{ $property->area_info_walk3 }}分</span></li>@endif
        </ul>
    </div>

    <div class='oparation'>
        <a id='oparation'>
            <h2><span class='oparation-color'>O</span>PARATION</br><span class='jp'>運営管理</span></h2>
        </a>
        <div class='oparation-list'>
            <div>
                <i class="fas fa-broom icon"></i>
                <p class='genre'>清掃</p>
                <p>{{ $property->clean_style }}({{ $property->clean_frequency }})</p>
            </div>
            <div>
                <i class="far fa-circle icon"></i><i class="fas fa-times-circle icon"></i>
                <p class='genre'>ルール</p>
                <p>{{ $property->rule1 }}。
                    @if($property->rule2){{ $property->rule2}}。@endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection