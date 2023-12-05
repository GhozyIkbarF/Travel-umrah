@extends('layouts.default')

@section('content')
    <div class="flex flex-col justify-start">
        <div class="mb-3">
            <form action="{{ route('list-city-tour.store') }}" method="POST" class='w-full lg:w-[400px] flex flex-col md:flex-row gap-2'>
                @csrf
                <div>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Nama" required autofocus />
                </div>
                <x-primary-button type='submit'>
                    Add City Tour
                </x-primary-button>
            </form>
        </div>
        <table id="myTable" class="stripe">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ListCityTours as $ListCityTour)
                    <tr>
                        <td>{{ $ListCityTour->name }}</td>
                        <td>
                            {{-- <x-secondary-button id="edit-list-city-tour" data-modal-target="crud-modal" data-modal-toggle="crud-modal" data-edit='{{ $ListCityTour }}' data-route="{{ route('list-city-tour.update', $ListCityTour->name) }}">
                                Edit
                            </x-secondary-button> --}}
                            <x-danger-button class="delete-button" data-modal-target="modal-delete" data-modal-toggle="modal-delete"
                                data-delete-link="{{ route('list-city-tour.destroy', $ListCityTour->name) }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-modal-delete>
        {{ __('city tour') }}
    </x-modal-delete>
@endsection

<script>
     window.addEventListener('DOMContentLoaded', function() {
         const btnEditHotel = document.querySelectorAll('#edit-hotel');
         const btnCreateModal = document.getElementById('btn-create-modal');
         const formEditHotel = document.getElementById('form-create-hotel'); 
         
         btnCreateModal.addEventListener('click', function() {
            document.getElementById('title-modal').innerHTML = 'Add Hotel';
            formEditHotel.setAttribute('action', '{{ route("hotel.store") }}');
            formEditHotel.querySelector('button[type="submit"]').innerHTML = 'Add Hotel';
         });

         btnEditHotel.forEach(element => {
             element.addEventListener('click', function() {
                const data = JSON.parse(this.getAttribute('data-edit'));
                document.getElementById('title-modal').innerHTML = 'Edit Hotel';
                formEditHotel.setAttribute('action', this.getAttribute('data-route'));
                formEditHotel.querySelector('#nama').value = data.nama;
                formEditHotel.querySelector('#rating').value = data.rating;
                formEditHotel.querySelector('#kota').value = data.kota;
                formEditHotel.querySelector('button[type="submit"]').innerHTML = 'Edit Hotel';
             });
         });
     })
</script>