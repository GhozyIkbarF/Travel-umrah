@extends('layouts.default')

@section('content')
    <!-- Modal toggle -->
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Toggle modal
    </button>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create New Product
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="my-8 space-y-3 p-4" action="{{ route('maskapai.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col gap-4 mb-4">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                maskapai</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Maskapai name" required>
                        </div>
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
                                    <input id="inputImageGalery" type="file" name='image' class="hidden"
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
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Add new Maskapai
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap gap-4 mt-10">
        @forEach($maskapais as $maskapai)
        <div class="flex flex-col text-center">
            <img src="{{ asset('maskapai-img/'. $maskapai->image) }}" alt="{{ $maskapai->nama }}" class="object-cover h-14 w-28">
            <p class="font-semibold">{{ $maskapai->nama }}</p>
        </div>
        @endforEach
    </div>

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