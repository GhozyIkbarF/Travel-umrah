@extends('layouts.guest.layout')
@section('banner', 'img/makkah1.webp')
@section('hubkami-active', 'text-blue-500')
@section('title.hero', 'Hubungi Kami')
@section('content')
    <div class="flex flex-col max-w-7xl mx-auto">
        <div class="w-full grid grid-cols-1 lg:grid-cols-3 text-xl font-medium mt-16 gap-5">
            <div class="text-center">
                <i aria-hidden="true" class="fas fa-map-marker-alt text-2xl mb-3"></i>
                <p>Ruko Smart Market Telaga Mas Blok B-03, Harapan Baru, Bekasi
                    Utara, Bekasi 17123</p>
            </div>
            <div class="text-center">
                <i aria-hidden="true" class="fas fa-phone-alt text-2xl mb-3"></i>
                <p>0812-600-8585</p>
            </div>
            <div class="text-center">
                <i aria-hidden="true" class="fab fa-whatsapp text-2xl mb-3"></i>
                <p>0812-600-8585</p>
            </div>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.5468955988!2d110.79468967454977!3d-7.515164874148499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a136c08bc4f13%3A0x24bc85ae7d734e53!2sMantri%20Menot%20Samiyono!5e0!3m2!1sid!2sid!4v1699357172846!5m2!1sid!2sid" class="w-full h-[450px] my-16" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@stop