@extends('layouts.layouts')
@section('title','トップページ')
@section('contents')

<div id='eyechach'>
    <img src="images/eyecatch_room.jpg" alt="部屋の背景" class='eyecatch-img'>
    <h2 class='description'>東京23区のシェアハウスを探そう</h2>
    <div class='searches'>
        <div class='search'>
            <p><span class='emphasis-letter'>エ</span>リアで探す</p>
            <table class='table table-hover'>
                @foreach($areas as $area)
                <tr>
                    <td><a href="{{ route('area_search',$area->id) }}" class='area-select'>{{ $area->area_name }}</a></td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class='search'>
            <p><span class='emphasis-letter'>特</span>徴で探す</p>
            <ul class='feature-select'>
                <a href="{{ route('feature_search','private_room') }}" class='is-private-room'>
                    <li><i class="fas fa-person-booth icon-size"></i>　
                        個室あり
                    </li>
                </a>
                <a href="{{ route('feature_search','dormitory') }}" class='is-domitory'>
                    <li><i class="fas fa-bed icon-size"></i>　
                        ドミトリーあり
                    </li>
                </a>
                <a href="{{ route('feature_search','women_only') }}" class='is-women-only'>
                    <li><i class="fas fa-female icon-size"></i>　
                        女性のみ
                    </li>
                </a>
                <a href="{{ route('feature_search','foreigner') }}" class='is-foreigner'>
                    <li><i class="fas fa-plane icon-size"></i>　
                        外国人可
                    </li>
                </a>
                <a href="{{ route('feature_search','vacancy') }}" class='is_vacancy'>
                    <li><i class="fas fa-sign-in-alt icon-size"></i>　
                        空室あり
                    </li>
                </a>
                <a href="{{ route('feature_search','campaign') }}" class='campaign'>
                    <li><i class="fas fa-glass-cheers icon-size"></i>　
                        キャンペーンあり
                    </li>
                </a>
            </ul>
        </div>
    </div>
</div>

@endsection