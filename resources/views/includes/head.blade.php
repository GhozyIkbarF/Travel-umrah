<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
<script>
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>
{{-- lightGallery --}}
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
{{-- lightGallery End --}}
