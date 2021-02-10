@extends('layouts.layouts')
@section('title',$property->property_name)
@section('contents')
<div class='main-info'>
    <h1>{{ $property->property_name }}</h1>
    <div class='main-image'><img src="/images/{{ $property->main_image }}" alt="物件写真"></div>
    <p class='introduce'>{{ nl2br($property->introduce) }}</p>
</div>
@endsection