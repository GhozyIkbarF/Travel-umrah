@extends('layouts.default')

@section('content')
<div class="w-full">
    <h1 class="font-semibold text-3xl mb-5">{{ $blog->title }}</h1>
    <img src="{{ asset('blog/'. $blog->image) }}" alt="$blog->image">
    <p class="mt-5">{!! $blog->content !!}</p>
</div>
@stop