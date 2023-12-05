@extends('layouts.default')

@section('content')
    <div class="flex flex-col justify-start">
        <div class="mb-3">
            <x-nav-link :href="route('package.create')" :active="request()->routeIs('package.create')">
                {{ __('Add package') }}
            </x-nav-link>
            {{-- <x-primary-button id="btn-create-modal" data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                Add package
            </x-primary-button> --}}
        </div>
        <table id="myTable" class="stripe">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Price Double</th>
                    <th>Price Triple</th>
                    <th>Price Quad</th>
                    <th>Rating Hotel Makkah</th>
                    <th>Rating Hotel Madinah</th>
                    <th>City Tour</th>
                    <th>Is Plus/No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                    <tr>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->price_double }}</td>
                        <td>{{ $package->price_triple }}</td>
                        <td>{{ $package->price_quad }}</td>
                        <td>{{ $package->rating_hotel_makkah }}</td>
                        <td>{{ $package->rating_hotel_madinah }}</td>
                        <td>{{ $package->city_tour }}</td>
                        <td>{{ $package->is_plus }}</td>
                        <td>
                            <a href="{{ route('package.edit', $package->id) }}" id="edit-package"
                                data-edit="{{ json_encode($package) }}" data-route="{{ route('package.update', $package->id) }}"
                                data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                                <x-secondary-button>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </x-secondary-button>
                            </a>
                            <x-danger-button type='button' class="delete-button mt-2" data-modal-target="modal-delete" data-modal-toggle="modal-delete"
                                data-delete-link="{{ route('package.destroy', $package->id) }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <x-modal-add-package id="modal-package" /> --}}
    <x-modal-delete>
        {{ __('package') }}
    </x-modal-delete>
@endsection
