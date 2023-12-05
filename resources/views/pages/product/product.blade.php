@extends('layouts.default')

@section('content')
    <div class="flex flex-col justify-start">
        <h1 class="text-xl font-bold mb-5">product dari paket {{ $title }}</h1>
        <div class="mb-5">
            <a href="{{ route('product.create', $title) }}" class="py-3 px-5 border rounded-md">Add new product</a>
        </div>
        <table id="myTable" class="stripe" style="font-size: 13px">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Maskapai</th>
                    <th>Hotel Makkah</th>
                    <th>Hotel Madinah</th>
                    <th>Price Double</th>
                    <th>Price Triple</th>
                    <th>Price Quad</th>
                    <th>Kuota</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->date }}</td>
                        <td>{{ $product->relasi_maskapai->nama }}</td>
                        <td>{{ $product->relasi_hotel_makkah->nama }} ⭐{{ $product->relasi_hotel_makkah->rating }}</td>
                        <td>{{ $product->relasi_hotel_madinah->nama}} ⭐{{$product->relasi_hotel_madinah->rating}}</td>
                        <td>{{ $product->price_double }}</td>
                        <td>{{ $product->price_triple }}</td>
                        <td>{{ $product->price_quad }}</td>
                        <td>{{ $product->kuota }}</td>
                        <td>
                            <a href="{{ route('product.edit', ['param' => $title, 'id' => $product->id]) }}">
                                <x-secondary-button>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </x-secondary-button>
                            </a>
                            <x-danger-button class="delete-button" data-modal-target="modal-delete" data-modal-toggle="modal-delete"
                                data-delete-link="{{ route('product.destroy', $product->id) }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <x-modal-add-product id="modal-product" /> --}}
    <x-modal-delete>
        {{ __('product') }}
    </x-modal-delete>
@endsection