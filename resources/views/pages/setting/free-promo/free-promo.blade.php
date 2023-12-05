@extends('layouts.default')

@section('content')
    <div class="flex flex-col justify-start py-10">
        <section class="flex flex-col justify-start mb-10 p-4 rounded-md shadow-lg">
            <div class="mb-3">
                <form action="{{ route('free-promo.store', 'free') }}" method="POST"
                    class='w-full lg:w-[400px] flex flex-col md:flex-row gap-2'>
                    @csrf
                    <div>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                            placeholder="Free" required autofocus />
                    </div>
                    <x-primary-button type='submit'>
                        Add New Free
                    </x-primary-button>
                </form>
            </div>
            <table id="myTable" class="stripe">
                <thead>
                    <tr>
                        <th>Free</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($frees as $free)
                        <tr>
                            <td>{{ $free->name }}</td>
                            <td>
                                <x-secondary-button id="btn-edit-free-promo" data-modal-target="free-promo-modal"
                                    data-modal-toggle="free-promo-modal" data-edit='{{ JSON_encode($free->name) }}' data-title-edit='Edit Free'
                                    data-route="{{ route('free-promo.update', ['param' => 'free', 'id' => $free->id]) }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </x-secondary-button>
                                <x-danger-button class="delete-button" data-modal-target="modal-delete"
                                    data-modal-toggle="modal-delete"
                                    data-delete-link="{{ route('free-promo.destroy', ['param' => 'free', 'id' => $free->id]) }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </x-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        {{-- section Promo --}}
        <section class="flex flex-col justify-start p-4 rounded-md shadow-lg">
            <div class="mb-3">
                <form action="{{ route('free-promo.store', $promo_param) }}" method="POST"
                    class='w-full lg:w-[400px] flex flex-col md:flex-row gap-2'>
                    @csrf
                    <div>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" placeholder="Promo" required autofocus />
                    </div>
                    <x-primary-button type='submit'>
                        Add New Promo
                    </x-primary-button>
                </form>
            </div>
            <table id="myTablePromo" class="stripe">
                <thead>
                    <tr>
                        <th>Promo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promos as $promo)
                        <tr>
                            <td>{{ $promo->name }}</td>
                            <td>
                                <x-secondary-button id="btn-edit-free-promo" data-modal-target="free-promo-modal" 
                                    data-modal-toggle="free-promo-modal" data-edit='{{ JSON_encode($promo->name) }}' data-title-edit='Edit Promo'
                                    data-route="{{ route('free-promo.update',  ['param' => 'promo', 'id' => $promo->id]) }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </x-secondary-button>
                                <x-danger-button class="delete-button" data-modal-target="modal-delete"
                                    data-modal-toggle="modal-delete"
                                    data-delete-link="{{ route('free-promo.destroy', ['param' => 'promo', 'id' => $promo->id]) }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </x-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <div id="free-promo-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 id="title-modal" class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Free
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="free-promo-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form id="form-free-promo" class="space-y-4" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                        <input type="text" name="name" id="input-edit-name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <x-modal-delete>
        {{ __('free') }}
    </x-modal-delete>
@endsection
<script>
    window.addEventListener('DOMContentLoaded', function() {
        const btnEditFreePromo = document.querySelectorAll('#btn-edit-free-promo');
        console.log(btnEditFreePromo);
       
        btnEditFreePromo.forEach(element => {
            element.addEventListener('click', function() {
                const data = JSON.parse(this.getAttribute('data-edit'));
                const title = this.getAttribute('data-title-edit');
                const route = this.getAttribute('data-route');
                document.getElementById('title-modal').innerText = title;
                document.getElementById('input-edit-name').value = data;
                document.getElementById('form-free-promo').setAttribute('action', route);
            });
        });

        
    });
</script>
