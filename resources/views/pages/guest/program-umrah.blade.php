@extends('layouts.guest.layout')
@section('banner', 'img/makkah1.webp')
@section('jadwal-active', 'text-blue-500')
@section('title.hero', 'Program Umrah')
@section('content')
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="basis-8/12">
                <img src="{{ asset('img/product/' . $product->image) }}" alt="{{ $product->image }}" class="rounded-lg object-cover w-full">
                <div class="flex flex-col gap-3 mt-3">
                    <div>
                        <p class="font-bold text-xl">{{ $product->package->name }}</p>
                        <p>{{ $product->package->description }} Juta</p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div>
                            <p class="font-bold text-xl">Akomodasi Hotel</p>
                            <p>Rabbanitour selalu memberikan akomodasi hotel terbaik demi kenyamanan dan keamanan ibadan umroh Anda dan keluarga.</p>
                        </div>
                        <div class="flex flex-col md:flex-row gap-3">
                            <div class="flex-1 rounded-md border p-4">
                                <p>Makkah</p>
                                <div class="flex gap-3">
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
                            </div>
                            <div class="flex-1 rounded-md border p-4">
                                <p>Madinah</p>
                                <div class="flex gap-3">
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
                            <div class="flex-1 rounded-md border p-4">
                                <p>Hotel Plus</p>
                                <div class="flex gap-3">
                                    <div>
                                        <i aria-hidden="true" class="fas fa-hotel"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Hotel</p>
                                        <div class="text-sm">
                                            @if($product->rating_hotel_plus)
                                                @for ($i = 0; $i < $product->rating_hotel_plus; $i++)
                                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                                @endfor
                                            @else
                                                <p class="text-sm">Tidak ada</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div>
                            <p class="font-bold text-xl">Bonus dan Promo Program</p>
                            <p>Daftarkan diri anda dan keluarga sekarang juga, untuk perjalanan ibadah umroh yang aman dan nyaman bersama Rabbanitour Travel.</p>
                        </div>
                        <div class="flex flex-col md:flex-row gap-3">
                            <div class="flex-1 rounded-md border p-4">
                                <p>Harga Mulai Dari</p>
                                <div class="flex gap-3">
                                    <p class="font-bold text-2xl">{{ $product->price_quad }} Juta</p>
                                </div>
                            </div>
                            <div class="flex-1 rounded-md border p-4">
                                <p>Free</p>
                                <div class="flex gap-3">
                                    @if(count($product->free))
                                        @foreach ($product->free as $free)
                                            <p>{{ $free->name }}</p>
                                        @endforeach
                                    @else
                                        <p>Tidak ada</p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-1 rounded-md border p-4">
                                <p>Promo</p>
                                <div class="flex gap-3">
                                    @if(count($product->promo))
                                        @foreach ($product->promo as $promo)
                                            <p>{{ $promo->name }}</p>
                                        @endforeach
                                    @else
                                        <p>Tidak ada</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="basis-4/12 flex flex-col gap-3 p-3 rounded-lg border h-min">
                <div class="flex justify-between font-bold px-1">
                    <p>{{ $product->package->name }}</p>
                    <p>{{ \Carbon\Carbon::parse($product->date)->format('d F Y') }}</p>
                </div>
                <div class="rounded-md border p-3">
                    <div class="border-b">
                        <p class="font-bold pb-3">Harga Mulai Dari</p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div class="flex justify-between mt-3">
                            <p>Harga Quad</p>
                            <p class="font-bold">{{ $product->price_quad }} Juta</p>
                        </div>
                        <div class="flex justify-between">
                            <p>Harga Triple</p>
                            <p>{{ $product->price_triple }} Juta</p>
                        </div>
                        <div class="flex justify-between">
                            <p>Harga Double</p>
                            <p>{{ $product->price_double }} Juta</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-md border flex justify-between items-center p-3">
                    <div>
                        <p>Maskapai</p>
                        <p class="font-bold">{{ $product->relasi_maskapai->nama }}</p>
                    </div>
                    <img src="{{ asset('maskapai-img/'. $product->relasi_maskapai->image) }}" alt="{{ $product->relasi_maskapai->image }}" class="w-[119] h-[54px] object-cover">
                </div>
                <div class="rounded-md border p-3">
                    <p>Status seat</p>
                    <p class="font-bold">{{ $product->kuota }} Tersisa</p>
                </div>
                <x-primary-button class="mt-3 py-3">Pesan Sekarang</x-primary-button>
            </div>
        </div>
    </div>
    </div>
@endsection
