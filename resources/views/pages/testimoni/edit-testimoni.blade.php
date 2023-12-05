@extends('layouts.default')

@section('content')
    <div class="w-full">
        <form action="{{ route('testimoni.update', $testimoni->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col space-y-6">
            @csrf
            @method('PATCH')
            <div class="flex flex-col">
                <label for="name" class="text-lg font-semibold text-gray-600 dark:text-gray-400">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" value="{{ $testimoni->name }}"
                    class="w-full px-4 py-2 mt-2 text-base text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:border-blue-500 focus:bg-white focus:outline-none dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:focus:border-blue-500 dark:focus:bg-gray-600"
                    required>
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="message" class="text-lg font-semibold text-gray-600 dark:text-gray-400">Message</label>
                <textarea name="message" id="message" cols="30" rows="4"  required>{{ $testimoni->message }}</textarea>
                @error('message')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="rating" class="text-lg font-semibold text-gray-600 dark:text-gray-400">Rating</label>
                <input type="number" name="rating" min="1" max="5"  value="{{ $testimoni->rating }}" required>
                @error('rating')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col mb-5">
                <label for="image" class="text-lg font-semibold text-gray-600 dark:text-gray-400">Image</label>
                <img src="{{ asset('testimonial/' . $testimoni->image) }}" id="imagePreview" alt="{{ $testimoni->image }}">
                <button type="button" id="btn-remove-img"
                    class="py-3 rounded-md text-white bg-red-500 mt-3 hover:bg-red-700">Remove Image</button>
                <input type="file" name="image" id="input-image" accept="image/*" placeholder="Image"
                    class="hidden w-full px-4 py-2 mt-2 text-base text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:border-blue-500 focus:bg-white focus:outline-none dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:focus:border-blue-500 dark:focus:bg-gray-600">
                    @error('image')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="rounded-md py-3 px-7 bg-blue-500 text-white">Submit</button>
        </form>
    </div>
@stop
