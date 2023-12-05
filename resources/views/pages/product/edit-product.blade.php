@extends('layouts.default')

@section('content')
    <div class="w-full flex flex-wrap">
        <div class="w-full">
            <h1 class="text-xl font-bold mb-8">create new product paket {{ $title }}</h1>
        </div>
        <div class="mb-5">
            <h1 class="mb-2">Keterangan</h1>
            <div class="flex flex-col gap-1">
                <div class="flex gap-1">
                    <div class="p-3 rounded-md border">
                        <p>rating hotel makkah</p>
                        <div>
                            <div>
                                @for ($i = 0; $i < $package->rating_hotel_makkah; $i++)
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                @endfor
                                @for ($i = 0; $i < 5 - $package->rating_hotel_makkah; $i++)
                                    <i class="fa fa-star-o text-yellow-400"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="p-3 rounded-md border">
                        <p>rating hotel madinah</p>
                        <div>
                            <div>
                                @for ($i = 0; $i < $package->rating_hotel_madinah; $i++)
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                @endfor
                                @for ($i = 0; $i < 5 - $package->rating_hotel_madinah; $i++)
                                    <i class="fa fa-star-o text-yellow-400"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-1 text-sm text-center">
                    <div class="flex-1 p-3 rounded-md border">
                        <p>harga double</p>
                        <p>{{ $package->price_double }}</p>
                    </div>
                    <div class="flex-1 p-3 rounded-md border">
                        <p>harga triple</p>
                        <p>{{ $package->price_triple }}</p>
                    </div>
                    <div class="flex-1 p-3 rounded-md border">
                        <p>harga quad</p>
                        <p>{{ $package->price_quad }}</p>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ route('product.update', ['param' =>$title, 'id' => $product->id]) }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf
            <div class="fle flex-col justify-center">
                <div class="flex flex-col gap-1 mb-3">
                    <x-input-label for="date" value="Date" />
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker" type="text" name="date" value="{{ $product->date }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Select date">
                    </div>
                    @error('date')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-3">
                    <x-input-label for="maskapai" value="Maskapai" />
                    <select name="maskapai" id="maskapai" class="block mt-1 w-full rounded-md"
                        required>
                        @forEach($maskapais as $maskapai)
                            <option {{ $product->relasi_maskapai->id == $maskapai->id ? 'selected' : '' }} value="{{ $maskapai->id }}">{{ $maskapai->nama }}</option>
                        @endforeach
                    </select>
                    @error('maskapai')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-3">
                    <x-input-label for="price_double" value="Price Double" />
                    <x-text-input id="price_double" class="block mt-1 w-full" type="number" name="price_double"
                        value="{{ $product->price_double }}" placeholder="Price Double" step="0.01" min='1' required autofocus />
                        @error('price_double')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-3">
                    <x-input-label for="price_triple" value="Price Triple" />
                    <x-text-input id="price_triple" class="block mt-1 w-full" type="number" name="price_triple"
                        value="{{ $product->price_triple }}" placeholder="Price Triple" step="0.01" min='1' required autofocus />
                        @error('price_triple')
                        <div class="text-red-500">{{ $message }}</div>
                        @enderror
                </div>
                <div class="flex flex-col gap-1 mb-3">
                    <x-input-label for="price_quad" value="Price Quad" />
                    <x-text-input id="price_quad" class="block mt-1 w-full" type="number" name="price_quad"
                        value="{{ $product->price_quad }}" placeholder="Price Quad" step="0.01" min='1' required autofocus />
                    @error('price_quad')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-3">
                    <x-input-label for="hotel_makkah" value="Rating Hotel Makkah" />
                    <select name="hotel_makkah" id="hotel_makkah" class="block mt-1 w-full rounded-md
                    "
                        required>
                        @foreach ($hotels_makkah as $hotel_makkah)
                        <option {{ $product->hotel_makkah == $hotel_makkah->id ? 'selected' : '' }} value="{{ $hotel_makkah->id }}">{{ $hotel_makkah->nama }} {{ $hotel_makkah->nama }} (⭐{{ $hotel_makkah->rating }})</option>
                        @endforeach
                    </select>
                    @error('hotel_makkah')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-1 mb-3">
                    <x-input-label for="hotel_madinah" value="Rating Hotel Madinah" />
                    <select name="hotel_madinah" id="hotel_madinah" class="block mt-1 w-full rounded-md" required>

                        @foreach ($hotels_madinah as $hotel_madinah)
                        <option {{ $product->hotel_madinah == $hotel_madinah->id ? 'selected' : '' }} value="{{ $hotel_madinah->id }}">{{ $hotel_madinah->nama }} {{ $hotel_madinah->nama }} (⭐{{ $hotel_madinah->rating }})</option>
                        @endforeach
                    </select>
                    @error('hotel_madinah')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                @if ($is_plus == 'yes')
                    <div class="flex flex-col gap-1 mb-3">
                        <x-input-label for="rating_hotel_plus" value="Rating Hotel plus" />
                        <select name="rating_hotel_plus" id="rating_hotel_plus" class="block mt-1 w-full rounded-md"
                            required>
                            <option value="{{ $product->rating_hotel_plus }}">
                               @for($i = 0; $i < $product->rating_hotel_plus; $i++)
                                    ⭐
                                @endfor
                            </option>
                            <option value="1">⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                        </select>
                        @error('rating_hotel_plus')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
                <div class="flex flex-col gap-1 mb-3">
                    <x-input-label for="kuota" value="Kuota" />
                    <x-text-input id="kuota" class="block mt-1 w-full" type="number" name="kuota"
                        value="{{ $product->kuota }}" placeholder="Kuota" min='1' required autofocus />
                    @error('kuota')
                        <div class="text-red-500">{{ $message }}</div>      
                    @enderror
                </div>
                <div class="hidden">
                    <x-input-label for="package_id" value="Package ID" />
                    <x-text-input id="" class="block mt-1 w-full" type="number" name="package_id"
                        value="{{ $package->id }}" required autofocus />
                    @error('package_id')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col gap-2 mb-3">
                    <img src="{{ asset('img/product/' . $product->image) }}" id="imagePreview" alt="{{ $product->image }}">
                    <button type="button" id="btn-remove-img"
                        class="py-3 rounded-md text-white bg-red-500 mt-3 hover:bg-red-700">Remove Image</button>
                    <input id="input-image" class="block mt-1 w-full" type="file" name="image" value="{{ $product->image }}"
                        placeholder="Image" autofocus />
                        @error('image')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                </div>
                <div class="flex flex-col sm:flex-row gap-5">
                    <div class="rounded-lg shadow w-72 max-h-96 mb-3">
                        <div class="p-3">
                          <label for="input-group-search" class="sr-only">Search</label>
                          <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            </div>
                            <input id="search-free" type="search" id="input-group-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search free">
                          </div>
                        </div>
                        <ul id="list-free" class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200">
                            @forEach($frees as $free)
                            <li>
                              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="checkbox-item-{{ $free->id }}-free" type="checkbox" value="{{ $free->id }}" {{ in_array($free->id, $product->free) ? 'checked':'' }} name="free[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-item-{{ $free->id }}-free" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $free->name }}</label>
                              </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="rounded-lg shadow w-72 max-h-96 mb-3">
                        <div class="p-3">
                          <label for="input-group-search" class="sr-only">Search</label>
                          <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            </div>
                            <input id="search-promo" type="search" id="input-group-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search promo">
                          </div>
                        </div>
                        <ul id="list-promo" class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200">
                            @forEach($promos as $promo)
                            <li>
                              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="checkbox-item-{{ $promo->id }}-promo" type="checkbox" value="{{ $promo->id }}" {{ in_array($promo->id, $product->promo) ? 'checked':'' }} name="promo[]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="checkbox-item-{{ $promo->id }}-promo" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $promo->name }}</label>
                              </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button type="submit" class="py-2 px-7 text-white bg-blue-500 rounded-md">Submit</button>
        </form>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#datepicker", {
            dateFormat: "Y-m-d",
        });

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

        const searchFree = document.getElementById('search-free');
        const searchPromo = document.getElementById('search-promo');

        searchFree.addEventListener('keyup', function() {
            const value = this.value.toLowerCase();
            const listFree = document.querySelectorAll('#list-free li');

            listFree.forEach((item) => {
                const text = item.textContent.toLowerCase();

                if (text.indexOf(value) != -1) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        searchPromo.addEventListener('keyup', function() {
            const value = this.value.toLowerCase();
            const listFree = document.querySelectorAll('#list-promo li');

            listFree.forEach((item) => {
                const text = item.textContent.toLowerCase();

                if (text.indexOf(value) != -1) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
