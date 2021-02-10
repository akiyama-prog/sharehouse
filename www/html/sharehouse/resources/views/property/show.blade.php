@extends('layouts.layouts')
@section('title',$property->property_name)
@section('contents')
<div id='property-show'>
    <div class='main-info'>
        <h1>{{ $property->property_name }}</h1>
        <div class='main-image'><img src="/images/{{ $property->main_image }}" alt="物件写真"></div>
        <p class='introduce'>{{ nl2br($property->introduce) }}</p>
    </div>
    <ul class='inside-page-link'>
        <a href="">
            <li>FACILITIES</br><span class='jp'>共用部</span></br><span class='facilities-arrow'><i class="fas fa-chevron-down"></i></span></li>
        </a>
        <a href="">
            <li>ROOMS</br><span class='jp'>占有部</span></br><span class='rooms-arrow'><i class="fas fa-chevron-down"></i></span></li>
        </a>
        <a href="">
            <li>LOCATION</br><span class='jp'>アクセス・環境</span></br><span class='location-arrow'><i class="fas fa-chevron-down"></i></span></li>
        </a>
        <a href="">
            <li>OPARATIOM</br><span class='jp'>運営・管理</span></br><span class='oparation-arrow'><i class="fas fa-chevron-down"></i></span></li>
        </a>
    </ul>

</div>
@endsection