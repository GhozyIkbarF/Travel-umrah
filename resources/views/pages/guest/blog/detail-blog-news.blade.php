@extends('layouts.guest.layout')
@section('banner', 'img/makkah1.webp')
@section('blog-active', 'text-blue-500')
@section('title.hero', 'Blog & News')
@section('content')
<div class="max-w-7xl mx-auto flex flex-col my-16">
    <h1 class="font-bold text-3xl lg:text-6xl mb-10">{{ $blog->title }}</h1>
    <div class="flex flex-col lg:flex-row gap-6">
        <div class="basis-8/12">
            <img src="{{ asset('blog/'. $blog->image) }}" alt="{{ $blog->image }}">
            <p class="text-sm md:text-md lg:text-lg mt-8">
                {!! $blog->content !!}
            </p>
        </div>
        <div class="basis-4/12 text-lg mt-10 lg:mt-0 lg:border-s lg:border-black lg:pl-3">
            <h1 class="font-bold text-center text-2xl lg:text-4xl">Artikel Terbari</h1>
            <div class="w-full flex flex-col gap-3">
                @forEach($other_blogs as $other_blog)
                    <a href="{{ route('guest.blog-news-detail', $other_blog->id) }}" class="shadow-lg rounded-md flex items-center cursor-pointer gap-2 p-5">
                        <img src="{{ asset('blog/'. $other_blog->image) }}" alt="{{ $other_blog->image }}" class="h-16 w-16">
                        <p class="font-semibold text-base">{{ $other_blog->title }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop