@extends('layouts.default')

@section('content')
    <div class="w-full flex flex-col">
        <h1 class="font-blod text-3xl mb-5">Edit package</h1>
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
        <form action="{{ route('package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="name" value="Nama" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $package->name  }}" placeholder="Nama" required autofocus />
                <x-input-error for="name" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="descriptio" value="Description" />
                <textarea name="description" id="description" cols="30" rows="10" class="block mt-1 w-full"
                    placeholder="Description" required>{{ $package->description }}</textarea>
                <x-input-error for="description" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <img src="{{ asset('img/package/' . $package->image) }}" id="imagePreview" alt="{{ $package->image }}">
                <button type="button" id="btn-remove-img"
                    class="py-3 rounded-md text-white bg-red-500 mt-3 hover:bg-red-700">Remove Image</button>
                <input id="input-image" class="block mt-1 w-full" type="file" name="image" value="{{ $package->image }}"
                    placeholder="Image" autofocus />
                <x-input-error for="image" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="price_double" value="Price Double" />
                <x-text-input id="price_double" class="block mt-1 w-full" type="number" name="price_double"
                    value="{{ $package->price_double }}" placeholder="Price Double" step="0.01" min='1' required autofocus />
                <x-input-error for="price_double" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="price_triple" value="Price Triple" />
                <x-text-input id="price_triple" class="block mt-1 w-full" type="number" name="price_triple"
                    value="{{ $package->price_triple }}" placeholder="Price Triple" step="0.01" min='1' required autofocus />
                <x-input-error for="price_triple" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="price_quad" value="Price Quad" />
                <x-text-input id="price_quad" class="block mt-1 w-full" type="number" name="price_quad" value="{{ $package->price_quad }}"
                    placeholder="Price Quad" step="0.01" min='1' required autofocus />
                <x-input-error for="price_quad" class="mt-2" />
            </div>
            <div class="flex flex-col gap-2 mb-3">
                <x-input-label for="rating_hotel_makkah" value="Rating Hotel Makkah" />
                <select name="rating_hotel_makkah" id="rating_hotel_makkah"
                    class="block mt-1 w-full rounded-md
                " required>
                    <option selected="{{ $package->rating_hotel_makkah }}">{{ $package->rating_hotel_makkah }}</option>
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
                <option selected="{{ $package->rating_hotel_madinah }}">{{ $package->rating_hotel_madinah }}</option>
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
                    <option selected="{{ $package->city_tour }}">{{ $package->city_tour }}</option>
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
                    <option selected="{{ $package->is_plus }}">{{ $package->is_plus }}</option>
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
