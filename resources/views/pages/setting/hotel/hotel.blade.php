@extends('layouts.default')

@section('content')
    <div class="flex flex-col justify-start">
        <div class="mb-3">
            <x-primary-button id="btn-create-modal" data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                Add Hotel
            </x-primary-button>
        </div>
        <table id="myTable" class="stripe">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kota</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->nama }}</td>
                        <td>{{ $hotel->kota }}</td>
                        <td>⭐{{ $hotel->rating }}</td>
                        <td>
                            <x-secondary-button id="edit-hotel" data-modal-target="crud-modal" data-modal-toggle="crud-modal" data-edit='{{ $hotel }}' data-route="{{ route('hotel.update', $hotel->id) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </x-secondary-button>
                            <x-danger-button class="delete-button" data-modal-target="modal-delete" data-modal-toggle="modal-delete"
                                data-delete-link="{{ route('hotel.destroy', $hotel->id) }}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </x-danger-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-modal-add-hotel id="modal-hotel" />
    <x-modal-delete>
        {{ __('hotel') }}
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