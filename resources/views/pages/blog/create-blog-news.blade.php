@extends('layouts.default')

@section('content')
    <div class="w-full">
        <form action="{{ route('blog-news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="fle flex-col justify-center">
                <div class="flex flex-col">
                    <label for="title" class="text-sm text-gray-600 dark:text-gray-400">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title" value="{{ old('title') }}" required
                        class="w-full px-4 py-2 mt-2 text-base text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:border-blue-500 focus:bg-white focus:outline-none dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:focus:border-blue-500 dark:focus:bg-gray-600">
                    @error('title')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col">
                        <label for="content">Content</label>
                        <textarea name="content" id="editor"></textarea>
                    </div>
                    @error('content')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col mb-5">
                    <x-input-label for="image" value="Image" />
                    <div id="previewImage" class="w-full flex justify-center"></div>
                    {{-- <button type="button" id="btn-remove-img"
                    class="py-3 rounded-md text-white bg-red-500 mt-3 hover:bg-red-700">Remove Image</button> --}}
                    <input class="block mt-1 w-full" type="file" name="image" value="{{ old('image') }}"
                        placeholder="Image" required autofocus />
                    @error('image')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <button id="btn-submit" type="submit" class="py-2 px-7 text-white bg-blue-500 rounded-md">Submit</button>
        </form>
    </div>
@endsection
{{-- <script>
    window.addEventListener('DOMContentLoaded', function() {
        const inputImageGalery = document.getElementById('input-image');
        const previewImage = document.getElementById('previewImage');

        inputImageGalery.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    previewImage.innerHTML = `
                        <img src="${this.result}" class="h-40 object-center" alt="preview image">
                    `;
                    // descInputImage.classList.add('hidden');
                });

                reader.readAsDataURL(file);
            } else {
                previewImage.innerHTML = '';
            }
        });

        const btnSubmit = document.getElementById('btn-submit');
        btnSubmit.addEventListener('click', function() {
            console.log('clicked');
        });
    });
</script> --}}