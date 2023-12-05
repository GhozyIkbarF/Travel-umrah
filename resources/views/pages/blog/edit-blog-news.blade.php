@extends('layouts.default')

@section('content')
    <form method="POST" action="{{ route('blog-news.update', $blog->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="flex flex-col justify-center gap-4">
            <div class="flex flex-col">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" placeholder="Title" value="{{ $blog->title }}" required
                    class="w-full px-4 py-2 mt-2 text-base text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:border-blue-500 focus:bg-white focus:outline-none dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:focus:border-blue-500 dark:focus:bg-gray-600">
            </div>
            <div class="flex flex-col">
                <label for="content">Content</label>
                <textarea name="content" id="editor" required>{{ $blog->content }}</textarea>
            </div>
            <div class="flex flex-col mb-5">
                <img src="{{ asset('blog/' . $blog->image) }}" id="imagePreview" alt="{{ $blog->image }}">
                <button type="button" id="btn-remove-img"
                    class="py-3 rounded-md text-white bg-red-500 mt-3 hover:bg-red-700">Remove Image</button>
                <input type="file" name="image" id="input-image" accept="image/*" placeholder="Image" required
                    class="hidden w-full px-4 py-2 mt-2 text-base text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:border-blue-500 focus:bg-white focus:outline-none dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:focus:border-blue-500 dark:focus:bg-gray-600">
            </div>
            <button type="submit" class="py-2 px-7 text-white bg-blue-500 rounded-md">Submit</button>
        </div>
    </form>
@stop

