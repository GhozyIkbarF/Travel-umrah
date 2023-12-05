@extends('layouts.guest.layout')
@section('banner', 'img/makkah1.webp')
@section('galeri-active', 'text-blue-500')
@section('title.hero', 'Paket ' . $package->name)
@section('content')
    <div class="max-w-7xl mx-auto">
        {{-- <div class="text-center">
            <h1 class="text-2xl font-bold">{{ $package->name }}</h1>
            <h3 class="font-black text-4xl">Al Ghozy</h3>
            <p>Jadikanlah Perjalanan Umroh Anda Lebih Bermakna Dengan Bergabung Bersama Al Ghozy</p>
        </div> --}}
        <div class="relative rounded-lg border p-3 flex flex-col md:flex-row gap-5 mb-5">
            <div class="flex-1">
                <img src="{{ asset('img/package/' . $package->image) }}" alt="{{ $package->image }}"
                    class="w-full object-cover rounded-lg h-96">
            </div>
            <div class="flex-1 flex flex-col gap-3 text-sm">
                <h1 class="text-2xl font-bold">Paket {{ $package->name }}</h1>
                <div>
                    <p class="font-semibold mb-2">harga Mulai Dari</p>
                    <div class="flex gap-2">
                        <div class="flex-1 bg-[#ededed] border text-start px-3 py-2 rounded-lg">
                            <p class="font-semibold">Quad</p>
                            <p>{{ $package->price_quad }} Juta</p>
                        </div>
                        <div class="flex-1 bg-[#ededed] border text-start px-3 py-2 rounded-lg">
                            <p class="font-semibold">Triple</p>
                            <p>{{ $package->price_triple }} Juta</p>
                        </div>
                        <div class="flex-1 bg-[#ededed] border text-start px-3 py-2 rounded-lg">
                            <p class="font-semibold">Double</p>
                            <p>{{ $package->price_double }} Juta</p>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="font-semibold mb-2">Jadwal Keberangkatan</p>
                    <div class="flex gap-2">
                        <div class="flex-1 bg-[#ededed] text-start px-3 py-2 border rounded-lg flex flex-row gap-2">
                            <div class="text-xl font-bold"><i aria-hidden="true" class="far fa-calendar-alt"></i></div>
                            <div>
                                <p class="font-semibold">Dari Bulan</p>
                                <p>{{ \Carbon\Carbon::parse($start_date)->format('d F Y') }}</p>
                            </div>
                        </div>
                        <div class="flex-1 bg-[#ededed] text-start px-3 py-2 border rounded-lg flex flex-row gap-2">
                            <div class="text-xl font-bold"><i aria-hidden="true" class="far fa-calendar-alt"></i></div>
                            <div>
                                <p class="font-semibold">Sampai Bulan</p>
                                <p>{{ \Carbon\Carbon::parse($end_date)->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="font-semibold mb-2">Akomodasi Hotel</p>
                    <div class="flex items-center gap-2">
                        <div class="flex-1 bg-[#ededed] text-start px-3 py-2 border rounded-lg flex flex-row gap-2">
                            <div class="text-sm font-bold"><i aria-hidden="true" class="fas fa-hotel"></i></div>
                            <div>
                                <p>Madinah</p>
                                <div>
                                    @for ($i = 0; $i < $package->rating_hotel_madinah; $i++)
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 bg-[#ededed] text-start px-3 py-2 border rounded-lg flex flex-row gap-2">
                            <div class="text-sm font-bold"><i aria-hidden="true" class="fas fa-hotel"></i></div>
                            <div>
                                <p>Makkah</p>
                                <div>
                                    @for ($i = 0; $i < $package->rating_hotel_makkah; $i++)
                                        <i class="fa-solid fa-star text-yellow-400"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="flex-1 bg-[#ededed] text-start px-3 py-2 border rounded-lg">
                            <p class="font-semibold">{{ $package->city_tour }}</p>
                            <p>City Tour</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5">
            <p class="font-semibold text-2xl mb-3">{{ $package->name }}</p>
            <p>{{ $package->description }}</p>
        </div>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="rounded-lg w-full md:w-1/3 border h-min">
                <div class="p-5 border-b">
                    <h1 class="text-xl font-bold">Filter Program Umrah</h1>
                </div>
                <div class="p-5 flex flex-col gap-3">
                    <p class="font-bold">Bulan Keberangkatan</p>
                    <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover"
                        class="w-full justify-between font-medium rounded-lg border text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">Select Some Options<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownBgHover" class="z-10 hidden w-96 bg-white rounded-lg shadow">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownBgHoverButton">
                            <form id='form-search-program-umrah' action="">
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-4" type="checkbox" value="01" name="param_month[]"
                                            class="w-4 h-4  border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-4"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Januari</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-5" type="checkbox" value="02"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-5"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Februari</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-6" type="checkbox" value="03" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-6"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Maret</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-7" type="checkbox" value="04" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-7"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">April</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-8" type="checkbox" value="05" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-8"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Mei</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-9" type="checkbox" value="06" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-9"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Juni</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-10" type="checkbox" value="07" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-10"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Juli</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-11" type="checkbox" value="08" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-11"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Agustus</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-12" type="checkbox" value="09" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-12"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">September</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-13" type="checkbox" value="10" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-13"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Oktober</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-14" type="checkbox" value="11" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-14"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">November</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <input id="checkbox-item-15" type="checkbox" value="12" name='param_month[]'
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="checkbox-item-15"
                                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">Desember</label>
                                    </div>
                                </li>
                            </form>
                        </ul>
                    </div>
                    <div class="text-center">
                        <x-primary-button id="btn-search-program-umrah" data-id-package='{{ $package->id }}'
                            class="w-full bg-blue-500 py-3 hover:bg-blue-700">
                            Detail Program
                        </x-primary-button>
                    </div>

                </div>
            </div>
            <div id="list-package-program-umrah" class="rounded-lg w-full md:w-2/3 flex flex-col gap-5">
                @foreach ($products as $product)
                    <div class="rounded-lg border p-2 flex flex-col md:flex-row gap-4">
                        <div>
                            <img src="{{ asset('img/product/' . $product->image) }}" alt="{{ $product->image }}"
                                class="rounded-lg object-cover w-full md:w-[265px] md:h-[139px]">
                        </div>
                        <div class="w-full flex flex-col">
                            <div class="flex justify-between mb-5">
                                <p class="font-bold">{{ $package->name }}</p>
                                <p class="font-bold">{{ \Carbon\Carbon::parse($product->date)->format('d F Y') }}</p>
                            </div>
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="flex-1 flex flex-row justify-evenly md:flex-col gap-5 md:gap-3 ">
                                    <div class="flex gap-2">
                                        <div>
                                            <i aria-hidden="true" class="fas fa-wallet"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold">Mulai Dari</p>
                                            <p>{{ $product->price_double }} Juta</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <div>
                                            <i aria-hidden="true" class="fas fa-clock"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold">Durasi</p>
                                            <p>{{ $package->is_plus == 'yes' ? 11 : 9 }} Hari</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 flex flex-row justify-evenly md:flex-col gap-5 md:gap-3">
                                    <div class="flex gap-2 mb-2">
                                        <div>
                                            <i aria-hidden="true" class="fas fa-hotel"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $product->relasi_hotel_makkah->nama }}</p>
                                            <div class="text-sm">
                                                @for ($i = 0; $i < $product->relasi_hotel_makkah->rating; $i++)
                                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <div>
                                            <i aria-hidden="true" class="fas fa-hotel"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold">{{ $product->relasi_hotel_madinah->nama }}</p>
                                            <div class="text-sm">
                                                @for ($i = 0; $i < $product->relasi_hotel_madinah->rating; $i++)
                                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-1 flex flex-row justify-evenly md:flex-col items-center gap-5 md:gap-3">
                                    <img src="{{ asset('maskapai-img/' . $product->relasi_maskapai->image) }}"
                                        alt="{{ $product->relasi_maskapai->image }}" class="bg-cover w-[120px] h-[54px]">
                                    <a href="{{ route('product.program-umrah', $product->id) }}">
                                        <x-primary-button class="bg-blue-500 hover:bg-blue-700">
                                            Detail Program
                                        </x-primary-button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endForEach
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const formSearchProgramUmrah = document.getElementById('form-search-program-umrah')
            const btnSearchProgramUmrah = document.getElementById('btn-search-program-umrah')

            btnSearchProgramUmrah.addEventListener('click', () => {
                // console.log('clicked');
                const formData = new FormData(formSearchProgramUmrah)
                const packageId = btnSearchProgramUmrah.getAttribute('data-id-package')
                const paramMonth = formData.getAll('param_month[]')
                axios.get(`/search-program-umrah`, {
                        params: {
                            param_month: paramMonth,
                            package_id: packageId
                        }
                    })
                    .then(function(response) {
                        const listPackageProgramUmrah = document.getElementById(
                            'list-package-program-umrah')
                        listPackageProgramUmrah.innerHTML = ''
                        response.data?.forEach(element => {
                            const div = document.createElement('div')
                            div.classList.add('rounded-lg', 'border', 'p-2', 'flex', 'flex-col',
                                'md:flex-row', 'gap-4')
                            div.innerHTML = `
                                    <div>
                                        <img src="{{ asset('img/product/') }}/${element.image}" alt="${element.image}"
                                            class="rounded-lg object-cover w-full md:w-[265px] md:h-[139px]">
                                    </div>
                                    <div class="w-full flex flex-col">
                                        <div class="flex justify-between mb-5">
                                            <p class="font-bold">${element.name}</p>
                                            <p class="font-bold">${element.date}</p>
                                        </div>
                                        <div class="flex flex-col md:flex-row gap-4">
                                            <div class="flex-1 flex flex-row justify-evenly md:flex-col gap-5 md:gap-3 ">
                                                <div class="flex gap-2">
                                                    <div>
                                                        <i aria-hidden="true" class="fas fa-wallet"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">Mulai Dari</p>
                                                        <p>${element.price_double} Juta</p>
                                                    </div>
                                                </div>
                                                <div class="flex gap-2">
                                                    <div>
                                                        <i aria-hidden="true" class="fas fa-clock"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">Durasi</p>
                                                        <p>${element.is_plus == 'yes' ? 11 : 9} Hari</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-1 flex flex-row justify-evenly md:flex-col gap-5 md:gap-3">
                                                <div class="flex gap-2 mb-2">
                                                    <div>
                                                        <i aria-hidden="true" class="fas fa-hotel"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">${element.relasi_hotel_makkah.nama}</p>
                                                        <div class="text-sm">
                                                            ${element.relasi_hotel_makkah.rating}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex gap-2">
                                                    <div>
                                                        <i aria-hidden="true" class="fas fa-hotel"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">${element.relasi_hotel_madinah.nama}</p>
                                                        <div class="text-sm">
                                                            ${element.relasi_hotel_madinah.rating}
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="flex-1 flex flex-row justify-evenly md:flex-col items-center gap-5 md:gap-3">
                                                <img src="{{ asset('maskapai-img/') }}/${element.relasi_maskapai.image}"
                                                    alt="${element.relasi_maskapai.image}" class="bg-cover w-[120px] h-[54px]">
                                                <a href="${element.link}">
                                                    <x-primary-button class="bg-blue-500 hover:bg-blue-700">
                                                        Detail Program
                                                    </x-primary-button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                `
                            listPackageProgramUmrah.appendChild(div)
                        });

                    })
                    .catch(function(error) {
                        console.log(error);
                    })

            })
        })
    </script>
@endsection
