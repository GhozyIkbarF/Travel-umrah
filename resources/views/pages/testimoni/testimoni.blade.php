@extends('layouts.default')

@section('content')
    <div class="w-full">
        <div>
            <a href="{{ route('testimoni.create') }}" class="rounded-md text-white bg-blue-500 py-3 px-7">Tambah testimoni</a>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 mt-10 gap-5">
            @foreach ($testimonials as $testimoni)
                <div class="rounded-md flex justify-between gap-5 p-5 shadow-lg">
                    <div class="w-full flex flex-col justify-start">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('testimonial/' . $testimoni->image) }}" class="w-14 h-14 rounded-full"
                                    alt="{{ $testimoni->image }}">
                                <p class="font-semibold text-md">{{ $testimoni->name }}</p>
                            </div>
                            <div>
                                @for ($i = 0; $i < $testimoni->rating; $i++)
                                    <i class="fa-solid fa-star text-yellow-400"></i>
                                @endfor
                                @for ($i = 0; $i < 5 - $testimoni->rating; $i++)
                                    <i class="fa fa-star-o text-yellow-400"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-sm mt-5">{{ $testimoni->message }}</p>
                    </div>
                    <div class="basis-1/6 flex flex-col justify-center items-center gap-5">
                        <a href="{{ route('testimoni.edit', $testimoni->id) }}">
                            <i class="fa-solid fa-pen text-gray-600 cursor-pointer"></i>
                        </a>
                        <i data-modal-target="modal-delete" data-modal-toggle="modal-delete"
                            data-delete-link="{{ route('testimoni.destroy', $testimoni->id) }}"
                            class="fa-solid fa-trash-can text-rose-600 cursor-pointer delete-button"></i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <x-modal-delete>
        {{ __('testimoni') }}
    </x-modal-delete>
@endsection

