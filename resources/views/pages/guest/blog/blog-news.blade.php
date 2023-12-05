
@extends('layouts.guest.layout')
@section('banner', 'img/makkah1.webp')
@section('blog-active', 'text-blue-500')
@section('title.hero', 'Blog & News')
@section('content')
    <div class="max-w-7xl mx-auto my-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-6">
            @forEach($blogs as $blog)
            <div class="w-full flex flex-col rounded-sm shadow-lg">
                <div class="w-full h-48 rounded-sm bg-gray-200">
                    <img src="{{ asset('blog/'. $blog->image) }}" alt="{{ $blog->image }}" class="w-full h-full object-cover rounded-sm">
                </div>
                <div class="w-full flex flex-col p-4">
                    <h4 class="text-lg font-semibold">{{ $blog->title }}</h4>
                    <p class="text-sm text-gray-400">{{ $blog->created_at->format('d F Y') }}</p>
                    <p class="mt-2 text-sm text-gray-500">{!! Str::limit($blog->content, 100) !!}</p>
                    <a href="{{ route('guest.blog-news-detail', $blog->id) }}" class="mt-2 text-sm text-blue-500 hover:underline">Baca selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop