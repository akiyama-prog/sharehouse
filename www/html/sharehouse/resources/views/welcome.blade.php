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
                    <td>{!! Form::submit($area->area_name,['value' => $area->id,'class'=>'area-select']) !!}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class='search'>test</div>
    </div>
</div>

@endsection