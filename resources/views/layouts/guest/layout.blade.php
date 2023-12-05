<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('includes.head')
    <script src="https://kit.fontawesome.com/323007005a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery.min.css"
        integrity="sha512-F2E+YYE1gkt0T5TVajAslgDfTEUQKtlu4ralVq78ViNxhKXQLrgQLLie8u1tVdG2vWnB3ute4hcdbiBtvJQh0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-zoom.min.css"
        integrity="sha512-vIrTyLijDDcUJrQGs1jduUCSVa3+A2DaWpVfNyj4lmXkqURVQJ8LL62nebC388QV3P4yFBSt/ViDX8LRW0U6uw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-thumbnail.min.css"
        integrity="sha512-GRxDpj/bx6/I4y6h2LE5rbGaqRcbTu4dYhaTewlS8Nh9hm/akYprvOTZD7GR+FRCALiKfe8u1gjvWEEGEtoR6g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-share.min.css"
        integrity="sha512-dOqsuo1HGMv5ohBl/0OIUVzkwFLF8ZmjhpZp2VT2mpH5UuOJXwtBhxxtbrrEIpvTDWm7mESg0JsEl4zkUGv/gw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-fullscreen.min.css"
        integrity="sha512-JlgW3xkdBcsdFiSfFk5Cfj3sTgo3hA63/lPmZ4SXJegICSLcH43BuwDNlC9fqoUy2h3Tma8Eo48xlZ5XMjM+aQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    {{-- <div class="fixed -z-10 top-0 w-full min-h-screen bg-cover bg-center {{ Request::is('/') ? 'min-h-screen' : 'max-h-[470px]' }}"
        style="background-image: url('{{ asset(Request::is('/') ? 'img/banner.webp' : 'img/makkah1.webp') }}')"></div> --}}
    <div class="fixed -z-10 top-0 w-full min-h-screen bg-cover bg-center {{ Request::is('/') ? 'min-h-screen' : 'max-h-[470px]' }}"
        style="background-image: url('@yield('banner')')"></div>
    <div class="relative bg-transparent w-full {{ Request::is('/') ? 'min-h-screen' : 'min-h-[450px]' }}">
        <div class="absolute bg-black bg-opacity-80 transition-all duration-1000 top-0 left-0 right-0 bottom-0">
            <div class="flex flex-col items-center justify-center h-full text-white">
                @if (Request::is('/'))
                    <div class="flex flex-col items-center text-center min-h-[300px] mt-8">
                        <h1
                            class="font-bold text-3xl lg:text-6xl max-w-5xl mb-8 animate__animated  animate__bounce animate__delay-1s">
                            UMROH PENUH MAKNA DENGAN AL GHOZY TOUR
                            TRAVEL</h1>
                        <p class="font-semibold text-lg lg:text-2xl max-w-6xl animate__animated  animate__bounce animate__delay-1s"
                            style="line-height: 2.5rem">“Ibadah umrah
                            ke ibadah umrah berikutnya adalah penggugur (dosa) di antara keduanya, dan haji yang mabrur
                            tiada balasan (bagi pelakunya) melainkan surga” (HR al-Bukhari dan Muslim)</p>
                    </div>
                @else
                    <h1 class="font-semibold text-3xl lg:text-5xl mt-16">
                        @yield('title.hero')
                    </h1>
                @endif
            </div>
        </div>
        @include('includes.guest.navbar')
    </div>
    <div class="p-4 bg-white">
        @yield('content')
    </div>
    @include('includes.guest.footer')
</body>

</html>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js"
    integrity="sha512-jEJ0OA9fwz5wUn6rVfGhAXiiCSGrjYCwtQRUwI/wRGEuWRZxrnxoeDoNc+Pnhx8qwKVHs2BRQrVR9RE6T4UHBg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js"
    integrity="sha512-BLW2Jrofiqm6m7JhkQDIh2olT0EBI58+hIL/AXWvo8gOXKmsNlU6myJyEkTy6rOAAZjn0032FRk8sl9RgXPYIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js"
    integrity="sha512-VBbe8aA3uiK90EUKJnZ4iEs0lKXRhzaAXL8CIHWYReUwULzxkOSxlNixn41OLdX0R1KNP23/s76YPyeRhE6P+Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/share/lg-share.min.js"
    integrity="sha512-phbNIp+K+Fna0FQomV8kLzwnaSsvV7H5/cpTeZ1DanG/NFYPGzkcZS3Q+2z9eJOfjM3MLb0BdqzOzgxp1pgGKw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/fullscreen/lg-fullscreen.min.js"
    integrity="sha512-11B0rPDzvnSOYzAT37QdnYgt0z9Xg+wX5tckB1QKl5Znl8RPvrB5npo38K2jCt+Ad44udCfBiKt9D4jRdkSE1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            delay: 400,
            once: true,
        });

        lightGallery(document.getElementById('lightgallery'), {
            plugins: [lgZoom, lgThumbnail, lgShare, lgFullscreen],
            controls: true,
        });
    })
</script>
@yield('script')