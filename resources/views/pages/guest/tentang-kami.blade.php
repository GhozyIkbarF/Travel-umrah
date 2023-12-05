@extends('layouts.guest.layout')
@section('banner', 'img/makkah1.webp')
@section('about-active', 'text-blue-500')
@section('title.hero', 'Tentang Kami')
@section('content')
    <div class="max-w-7xl mx-auto flex flex-col my-16">
        <h1 class="font-bold text-3xl lg:text-6xl mb-10">Selamat datang di AL GHAZI Tour Travel</h1>
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="basis-8/12 space-y-8">
                <img src="{{ asset('img/makkah2.webp') }}" alt="{{ asset('img/makkah2.webp') }}">
                <p class="text-sm md:text-md lg:text-lg">
                    Setiap muslim tentu ingin menjalankan ibadah umroh dan haji ke Baitullah karena begitu banyaknya keutamaan dan
                    pahala yang begitu besar. Sesuai dengan hadis Nabi “Ibadah umrah ke ibadah umrah berikutnya adalah penggugur
                    (dosa) di antara keduanya, dan haji yang mabrur tiada balasan (bagi pelakunya) melainkan surga” (HR al-Bukhari
                    dan Muslim). <br><br>
        
                    Perjalanan ibadah Umroh dan Haji tentu bukan ibadah yang sederhana karena selain melakukan perjalnan yang jauh,
                    juga ada tata aturan ibadah sesuai dengan sunah dan contoh nabi, selain itu perlu panduan agar bisa nyaman dalam
                    ibadah di Baitullah. <br><br>
        
                    Dengan semangat melayani jamaah Umroh dan Haji, kami mendirikan biro perjalanan umroh dan haji AL GHAZI tour &
                    travel yang bernaung dalam perusaah PT Berkah Cahaya Safar.<br><br>
        
                    AL GHAZI Tour & Travel adalah biro perjalanan haji dan umroh berijin resmi Izin Umroh No. U. 257 Tahun 2020.
                    Dengan pengalaman yang kami miliki, anda akan mendapatkan pengalaman ibadah Umroh yang mengesankan, ibadah yang
                    khusuk dengan dipandu oleh mutowif yang berkompeten. Daftarnya diri anda sekarang, ibadah Umroh bersama Al Ghazi
                    Tour & Travel.
                </p>
            </div>
            <div class="basis-4/12 text-lg mt-10 lg:mt-0">
                <div class="mb-5">
                    <h1 class="text-center text-2xl lg:text-4xl font-medium mb-3">Visi Misi</h1>
                    <p class="font-bold">Visi : <span class="font-normal">Menjadi Biro Umroh yang istiqomah melayani para jamaah yang terbaik dan terbesar di Indonesia. </span></p>
                </div>
                <div>
                    <p class="font-bold">Misi :</p>
                    <ul class="list-disc pl-5">
                        <li>
                            <p>Melayani jamaah sepenuh hati, tulus dan ikhlas </p>
                        </li>
                        <li>
                            <p>Meningkatkan kualitas SDM sebagai ujung tombak pelayanan kepada para jamaah </p>
                        </li>
                        <li>
                            <p>Memperbanyak jaringan pelayanan di Seluruh Indonesia</p>
                        </li>
                        <li>
                            <p>Peningkatan kualitas , profesionalisme dan akuntabilitas dalam pelayanan</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
