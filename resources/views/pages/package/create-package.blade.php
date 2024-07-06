@extends('layouts.default')

@section('content')
    <div class="w-full flex flex-col">
        <h1 class="font-blod text-3xl mb-5">Add new package</h1>
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
        <form action="{{ route('paket.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="name" value="Nama" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    placeholder="Nama" required autofocus />
                <x-input-error for="name" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="descriptio" value="Description" />
                <textarea name="description" id="description" cols="30" rows="10" class="block mt-1 w-full"
                    placeholder="Description" required>{{ old('description') }}</textarea>
                <x-input-error for="description" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="image" value="Image" />
                <div id="previewImage" class="w-full flex justify-center"></div>
                <input id="input-image" class="block mt-1 w-full" type="file" name="image" value="{{ old('image') }}"
                    placeholder="Image" required autofocus />
                <x-input-error for="image" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="price_double" value="Price Double" />
                <x-text-input id="price_double" class="block mt-1 w-full" type="number" name="price_double"
                    :value="old('price_double')" placeholder="Price Double" step="0.01" min='1' required autofocus />
                <x-input-error for="price_double" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="price_triple" value="Price Triple" />
                <x-text-input id="price_triple" class="block mt-1 w-full" type="number" name="price_triple"
                    :value="old('price_triple')" placeholder="Price Triple" step="0.01" min='1' required autofocus />
                <x-input-error for="price_triple" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="price_quad" value="Price Quad" />
                <x-text-input id="price_quad" class="block mt-1 w-full" type="number" name="price_quad" :value="old('price_quad')"
                    placeholder="Price Quad" step="0.01" min='1' required autofocus />
                <x-input-error for="price_quad" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="rating_hotel_makkah" value="Rating Hotel Makkah" />
                <select name="rating_hotel_makkah" id="rating_hotel_makkah"
                    class="block mt-1 w-full rounded-md
                " required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Star</option>
                    <option value="3">3 Star</option>
                    <option value="4">4 Star</option>
                    <option value="5">5 Star</option>
                </select>
                <x-input-error for="rating_hotel_makkah" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="rating_hotel_madinah" value="Rating Hotel Madinah" />
                <select name="rating_hotel_madinah" id="rating_hotel_madinah"
                    class="block mt-1 w-full rounded-md
                " required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Star</option>
                    <option value="3">3 Star</option>
                    <option value="4">4 Star</option>
                    <option value="5">5 Star</option>
                </select>
                <x-input-error for="rating_hotel_madinah" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="city_tour" value="City Tour" />
                <select name="city_tour" id="city_tour" class="block mt-1 w-full rounded-md
                " required>
                    @foreach ($ListCityTours as $ListCityTour)
                        <option value="{{ $ListCityTour->name }}">{{ $ListCityTour->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="city_tour" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="is_plus" value="Paket PLUS/NO" />
                <select name="is_plus" id="is_plus" class="block mt-1 w-full rounded-md
                " required>
                    <option value="yes">yes</option>
                    <option value="no">no</option>
                </select>
                <x-input-error for="is_plus" class="mt-2" />
            </div>
            <x-primary-button type='submit'>
                Add Package
            </x-primary-button>
        </form>
    </div>
@endsection

<script>
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
                    descInputImage.classList.add('hidden');
                });

                reader.readAsDataURL(file);
            } else {
                previewImage.innerHTML = '';
            }
        });

    });
</script>