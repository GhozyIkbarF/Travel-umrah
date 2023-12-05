@extends('layouts.guest.layout')
@section('banner', 'img/banner.webp')
@section('home-active', 'text-blue-500')
@section('content')
    <div class="w-full flex flex-col items-center">
        <div class="flex flex-col mx-auto w-3/4 gap-4">
            <section data-aos="fade-up" class="my-16">
                <h1 class="font-bold text-3xl lg:text-5xl text-center mb-10">Paket Umroh</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($program_umrahs as $umroh)
                        <div class="flex flex-col justify-center shadow p-4 gap-2 rounded-md">
                            <div class="flex justify-center">
                                <img src="{{ asset('img/product/' . $umroh->image) }}" alt="{{ $umroh->image }}"
                                    class="w-full h-[150px]">
                            </div>
                            <h1 class="font-bold text-xl">{{ $umroh->package->name }}</h1>
                            <div class="flex justify-between">
                                <p>{{  \Carbon\Carbon::parse($umroh->date)->format('d F Y') }}</p>
                                <p>{{ $umroh->package->is_plus == 'yes' ? 11 : 9}} Hari</p>
                            </div>
                            <div class="rounded-md p-2 border">
                                <p>{{ $umroh->relasi_hotel_makkah->nama }}</p>
                            </div>
                            <div class="rounded-md p-2 border">
                                <p>{{ $umroh->relasi_hotel_madinah->nama }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p>Seat</p>
                                    <p>{{ $umroh->kuota }}</p>
                                </div>
                                <div>
                                    <img src="{{ asset('maskapai-img/'. $umroh->relasi_maskapai->image) }}" alt="{{ $umroh->relasi_maskapai->image }}" class="object-cover max-h-[57px] max-w-[150px]">
                                </div>
                            </div>
                            <div class="rouded-md text-center rounded-md border">
                                <p>Harga Mulai</p>
                                <p class="font-semibold text-xl">{{ $umroh->price_quad }} Juta</p>
                            </div>
                            <div class="flex justify-center mt-4">
                                <a href="{{ route('product.program-umrah', $umroh->id) }}" class="w-full">
                                <x-primary-button class="w-full">Detail Program</x-primary-button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="my-16 text-center">
                <h1 class="font-bold text-3xl lg:text-5xl mb-10">Galeri Foto</h1>
                <p class="font-medium text-lg lg:text-xl mb-14">Dibawah ini adalah dokumentasi foto-foto
                    keberangkantan umroh Al Ghozy Tour & Travel bersama dengan para jamaah. </p>
                <div id="lightgallery" class="my-16 flex flex-wrap gap-2 justify-center">
                    @foreach ($galeris as $galeri)
                        <a data-aos="zoom-in" data-aos-delay="400" href="{{ asset('galery/' . $galeri->image) }}">
                            <div class="overflow-hidden img-hover-zoom">
                                <img src="{{ asset('galery/' . $galeri->image) }}" alt="{{ $galeri->image }}"
                                    class="object-cover w-[105px] h-[70px] md:w-[135px] md:h-[100px] lg:w-[210px] lg:h-[136px]">
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>

            <section data-aos="fade-up" class="my-16">
                <h1 class="font-bold text-3xl lg:text-5xl text-center mb-10">Testimoni Para Jamaah</h1>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    @foreach ($testimonials as $testimonial)
                        <div class="flex flex-col justify-center bg-[#c7c7c7] text-white p-4 rounded-md">
                            <p>{{ $testimonial->message }}</p>
                            <div class="flex justify-between md:justify-start lg:justify-between items-center mt-4 gap-3">
                                <div class="flex gap-2 font-semibold items-center">
                                    <img src="{{ asset('testimonial/' . $testimonial->image) }}"
                                        alt="{{ $testimonial->image }}" class="w-12 h-12 rounded-full">
                                    <p>{{ $testimonial->name }}</p>
                                </div>
                                <div class="flex text-yellow-400">
                                    @for ($i = 0; $i < $testimonial->rating; $i++)
                                        <i class="fa-solid fa-star"></i>
                                    @endfor
                                    @for ($i = 0; $i < 5 - $testimonial->rating; $i++)
                                        <i class="fa fa-star-o"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section data-aos="fade-up" class="my-16">
                <h1 class="text-center font-bold text-3xl lg:text-5xl mb-10">News & Blog</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 gap-y-6">
                    @foreach ($blogs as $blog)
                        <div class="w-full flex flex-col rounded-sm shadow-lg overflow-hidden">
                            <div class="w-full h-48 rounded-sm bg-gray-200">
                                <img src="{{ asset('blog/' . $blog->image) }}" alt="$blog->image"
                                    class="w-full h-full object-cover rounded-sm">
                            </div>
                            <div class="w-full flex flex-col p-4">
                                <h4 class="text-lg font-semibold">{{ $blog->title }}</h4>
                                <p class="text-sm text-gray-400">{{ $blog->created_at->format('d F Y') }}</p>
                                <p class="mt-2 text-sm text-gray-500">{!! Str::limit($blog->content, 100) !!}</p>
                                <a href="{{ route('guest.blog-news-detail', $blog->id) }}"
                                    class="mt-2 text-sm text-blue-500 hover:underline">Baca selengkapnya</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <section data-aos="fade-up" class="relative my-16">
                <h1 class="font-bold text-4xl text-center mb-8">PARTNER MASKAPAI</h1>
                <swiper-container class="mySwiper " init="false" loop="true" autoPlay='true' speed='400'>
                    @foreach ($maskapais as $maskapai)
                            <swiper-slide class="">
                                <div class="relstive border border-gray-400 rounded-md overflow-hidden">
                                    <img src="{{ asset('maskapai-img/' . $maskapai->image) }}" alt="{{ $maskapai->nama }}" class="rounded-md">
                                </div>
                            </swiper-slide>
                    @endforeach
                </swiper-container>
            </section>

        </div>
    </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const swiperEl = document.querySelector('swiper-container')
        Object.assign(swiperEl, {
            slidesPerView: 2,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 40,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            },
        });
        swiperEl.initialize();
    });
</script>
@endsection