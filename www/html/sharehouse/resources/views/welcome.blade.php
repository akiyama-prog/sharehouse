@extends('layouts.layouts')
@section('title','トップページ')
@section('contents')

<div id='eyechach'>
    <img src="images/eyecatch_room.jpg" alt="部屋の背景" class='eyecatch-img'>
    <h2 class='description'>東京23区のシェアハウスを探そう</h2>
    <div class='searches'>
        <div class='search'>
            <p>エリアで探す</p>
            <table class='table table-hover'>
                @foreach($areas as $area)
                <tr>
                    <td>{!! Form::submit($area->area_name,['value' => $area->id,'class'=>'clear-button-css']) !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class='search'>
            <p>特徴で探す</p>
            {!! Form::open(['route' => 'feature_search','method' => 'get']) !!}
            <ul class='feature-select'>
                <li class='is-private-room'><i class="fas fa-person-booth icon-size"></i>　
                    {!! Form::submit('個室あり',['class' => 'clear-button-css','name' => 'is_private_room']) !!}
                </li>
                <li class='is-domitory'><i class="fas fa-bed icon-size"></i>　
                    {!! Form::submit('ドミトリーあり',['class' => 'clear-button-css','name' => 'is_dormitory']) !!}
                </li>
                <li class='is-women-only'><i class="fas fa-female icon-size"></i>　
                    {!! Form::submit('女性のみ',['class' => 'clear-button-css','name' => 'is_women_only']) !!}</li>
                <li class='is-foreigner'><i class="fas fa-plane icon-size"></i>　
                    {!! Form::submit('外国人可',['class' => 'clear-button-css','name' => 'is_foreigner']) !!}</li>
                <li class='is_vacancy'><i class="fas fa-sign-in-alt icon-size"></i>　
                    {!! Form::submit('空室あり',['class' => 'clear-button-css','name' => 'is_vacancy']) !!}</li>
                <li class='campaign'><i class="fas fa-glass-cheers icon-size"></i>　
                    {!! Form::submit('キャンペーンあり',['class' => 'clear-button-css','name' => 'campaign']) !!}</li>
            </ul>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection