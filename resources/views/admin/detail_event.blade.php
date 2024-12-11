@extends('admin.layout')
@section('title', 'Detail Rapat')
@section('content')
<nav class="container w-full mx-auto pt-8 px-4 flex" aria-label="Breadcrumb">
    <ul class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 inline-flex items-center text-sm font-medium hover:text-blue-600">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            Dashboard
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="text-gray-400 w-3 h-3 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="{{ route('admin.event') }}">
                    <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">Event</span>
                </a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="text-gray-400 w-3 h-3 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <a href="{{ route('admin.event.show', $event->id) }}">
                    <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">{{ $event->nomor_rapat }}</span>
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="container mx-auto w-full px-4 py-8">
    <div class="row">
        <div class="col-md-12">
            <h1 class="font-bold text-3xl text-center">Detail Rapat</h1>
        </div>
    </div>
    <div class="flex justify-center mt-8">
        <div class="w-full md:w-1/2">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="mb-6">
                    <label for="nomor_rapat" class="block text-sm font-medium text-gray-700">Nomor Rapat</label>
                    <input type="text" name="nomor_rapat" id="nomor_rapat" 
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        value="{{ $event->nomor_rapat }}" readonly>
                </div>
                <div class="mb-6">
                    <label for="hal" class="block text-sm font-medium text-gray-700">Hal</label>
                    <input type="text" name="hal" id="hal" 
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        value="{{ $event->hal }}" readonly>
                </div>
                <div class="mb-6">
                    <label for="kepada" class="block text-sm font-medium text-gray-700">Kepada</label>
                    <input type="text" name="kepada" id="kepada" 
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        value="{{ $event->kepada }}" readonly>
                </div>
                <div class="mb-6">
                    <label for="tanggal_rapat" class="block text-sm font-medium text-gray-700">Tanggal Rapat</label>
                    <input type="date" name="tanggal_rapat" id="tanggal_rapat" 
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        value="{{ $event->tanggal_rapat }}" readonly>
                </div>
                <div class="mb-6">
                    <label for="tempat_rapat" class="block text-sm font-medium text-gray-700">Tempat Rapat</label>
                    <input type="text" name="tempat_rapat" id="tempat_rapat" 
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        value="{{ $event->tempat_rapat }}" readonly>
                </div>
                <div class="mb-6">
                    <label for="waktu_rapat" class="block text-sm font-medium text-gray-700">Waktu Rapat</label>
                    <input type="text" name="jam_rapat" id="waktu_rapat" 
                        class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        value="{{ $event->jam_rapat }}" readonly>
                </div>
                <div class="mb-6">
                    <label for="peserta_rapat" class="block text-sm font-medium text-gray-700">Peserta Rapat</label>
                    @foreach ($event->pesertas as $index => $peserta)
                        <input type="text" name="peserta_rapat" id="peserta_rapat" 
                            class="mt-2 block w-full border-gray-300 rounded-md shadow-sm border-b-2 sm:text-sm p-2" 
                            value="{{ 1 + $index . ". " . $peserta->name }}" readonly>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
