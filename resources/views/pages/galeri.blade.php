<style>
    .img-hover-zoom img {
  transition: transform .5s ease;
}

.img-hover-zoom:hover img {
  transform: scale(1.1);
}
</style>
@extends('layouts.default')
@section('content')
    <div class="w-full flex flex-col">
        <div class="flex justify-between items-center">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <button data-modal-target="medium-modal" data-modal-toggle="medium-modal"
                class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add Picture
            </button>
            <div id="medium-modal" tabindex="-1"
                class="fixed top-0 bottom-0 left-0 right-0 z-50 hidden w-full overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full lg:w-1/2 max-w-lg max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between border-b rounded-t p-4 dark:border-gray-600">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                Add Picture
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="medium-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="my-8 space-y-3 p-4" action="{{ route('galeri.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 space-y-2">
                                <div class="flex items-center justify-center w-full">
                                    <label
                                        class="flex flex-col cursor-pointer rounded-lg border-4 border-dashed w-full h-ful p-10 group text-center">
                                        <div id="desc-input-image"
                                            class="h-full w-full text-center flex flex-col items-center justify-center">
                                            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                                <img class="has-mask h-36 object-center"
                                                    src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg"
                                                    alt="freepik image">
                                            </div>
                                            <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and
                                                    drop</span> files image here <br /> or <span id=""
                                                    class="text-blue-600 hover:underline">select a
                                                    file</span> from your
                                                computer</p>
                                            <input id="inputImageGalery" type="file" name='file' class="hidden"
                                                accept="image/*" required>
                                        </div>
                                        <div id="previewImage" class="w-full flex justify-center">

                                        </div>
                                    </label>
                                </div>
                            </div>
                            <p class="text-sm text-center text-gray-300">
                                <span>File type: types of images</span>
                            </p>
                            <div class="w-full">
                                <button type="submit"
                                    class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <div id="lightgallery" class="my-16 flex flex-wrap gap-2">
                @foreach ($images as $image)
                    <a href="{{ asset('galery/' . $image->image) }}">
                        <div class="relative overflow-hidden img-hover-zoom">
                            <img src="{{ asset('galery/' . $image->image) }}"
                                alt="{{ $image->image }}" class="object-cover w-[105px] h-[70px] md:w-[135px] md:h-[100px] lg:w-[220px] lg:h-[146px]">
                                <div class="absolute top-[5px] right-[5px]">
                                    <button type="button" data-modal-target="modal-delete" data-modal-toggle="modal-delete"
                                        data-delete-link="{{ route('galeri.destroy', $image->id) }}"
                                        class="bg-red-500 text-white rounded-full w-6 h-6 flex justify-center items-center delete-button">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                    </button>
                                </div>
                        </div>
                    </a>
                @endforeach
        </div>
    </div>
    <x-modal-delete>
        {{ __('foto') }}
    </x-modal-delete>
@stop

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const inputImageGalery = document.getElementById('inputImageGalery');
        const previewImage = document.getElementById('previewImage');
        const descInputImage = document.getElementById('desc-input-image');

        inputImageGalery.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    previewImage.innerHTML = `
                        <img src="${this.result}" class="h-40 object-center" alt="preview image">
                    `;
                    descInputImage.classList.add('hidden');
                });

                reader.readAsDataURL(file);
            } else {
                previewImage.innerHTML = '';
            }
        });

    });
</script>
