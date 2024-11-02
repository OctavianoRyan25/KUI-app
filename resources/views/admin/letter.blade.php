@extends('admin.layout')
@section('title', 'Letter')
@section('content')

    <nav class="flex container mx-auto w-full px-4 pt-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Events</span>
            </div>
        </li>
        </ol>
    </nav>  
    <div class="container mx-auto w-full px-4 py-8">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-bold text-3xl">Event</h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Table Letter --}}
        <div class="overflow-x-auto bg-white shadow overflow-y-auto relative mt-4 rounded-md">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#003d7a]">
                    <tr>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">No</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Nama</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">File 1</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">File 2</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">File 3</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($letters as $index => $letter)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="py-2 px-3 text-center">{{ $letters->firstItem() + $index }}</td>
                            <td class="py-2 px-3 text-center">{{ $letter->title }}</td>
                            <td class="py-2 px-3 text-center">
                                <div class="flex justify-center">
                                    @if($letter->file1)
                                    <p class="text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                        </svg>
                                    </p>
                                    @else
                                    <p class="text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M3.354 3.354a.5.5 0 0 1 .708 0L8 7.293l4.948-4.949a.5.5 0 0 1 .708.708L8.707 8l4.949 4.948a.5.5 0 0 1-.708.708L8 8.707l-4.948 4.949a.5.5 0 0 1-.708-.708L7.293 8 2.345 3.052a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </p>
                                    @endif
                                </div>
                            </td>
                            <td class="py-2 px-3 text-center">
                                <div class="flex justify-center">
                                    @if($letter->file2)
                                    <p class="text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                        </svg>
                                    </p>
                                    @else
                                    <p class="text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M3.354 3.354a.5.5 0 0 1 .708 0L8 7.293l4.948-4.949a.5.5 0 0 1 .708.708L8.707 8l4.949 4.948a.5.5 0 0 1-.708.708L8 8.707l-4.948 4.949a.5.5 0 0 1-.708-.708L7.293 8 2.345 3.052a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </p>
                                    @endif
                                </div>
                            </td>
                            <td class="py-2 px-3 text-center">
                                <div class="flex justify-center">
                                    @if($letter->file3)
                                    <p class="text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0"/>
                                        </svg>
                                    </p>
                                    @else
                                    <p class="text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M3.354 3.354a.5.5 0 0 1 .708 0L8 7.293l4.948-4.949a.5.5 0 0 1 .708.708L8.707 8l4.949 4.948a.5.5 0 0 1-.708.708L8 8.707l-4.948 4.949a.5.5 0 0 1-.708-.708L7.293 8 2.345 3.052a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </p>
                                    @endif
                                </div>
                            </td>
                            <td class="py-2 px-3 text-center">
                                <div class="flex justify-center">
                                    @if($letter->file1 && $letter->file2 && $letter->file3)
                                    <a href="{{ route('admin.letter.merge', $letter->id) }}" class="text-green-500 transition duration-200 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                        </svg>
                                    </a>
                                    @else
                                    <p class="text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                            <path d="M3.354 3.354a.5.5 0 0 1 .708 0L8 7.293l4.948-4.949a.5.5 0 0 1 .708.708L8.707 8l4.949 4.948a.5.5 0 0 1-.708.708L8 8.707l-4.948 4.949a.5.5 0 0 1-.708-.708L7.293 8 2.345 3.052a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </p>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection