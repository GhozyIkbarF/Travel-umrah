@extends('layouts.guest.layout')
@section('banner', 'img/makkah1.webp')
@section('galeri-active', 'text-blue-500')
@section('title.hero', 'Galeri')
@section('content')
    <div class="max-w-7xl mx-auto">
        <div id="lightgallery" class="my-16 flex flex-wrap gap-2 justify-center">
            @foreach ($images as $image)
                <a href="{{ asset('galery/' . $image->image) }}">
                    <div class="overflow-hidden img-hover-zoom">
                        <img src="{{ asset('galery/' . $image->image) }}"
                            alt="{{ $image->image }}" class="object-cover w-[105px] h-[70px] md:w-[135px] md:h-[100px] lg:w-[220px] lg:h-[146px]">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
