@extends('admin.layout')

@section('title', 'Detail MOU')
@section('content')
    {{-- * breadcrumbs navigation start --}}
    <nav class="container w-full mx-auto pt-8 px-4 flex" aria-label="Breadcrumb">
        <ul class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="text-gray-700 inline-flex items-center text-sm font-medium hover:text-blue-600">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="text-gray-400 w-3 h-3 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('admin.mou.index') }}">
                        <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">Kerja Sama</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="text-gray-400 w-3 h-3 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('admin.mou.index') }}">
                        <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">MOU</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="text-gray-400 w-3 h-3 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('admin.mou.show', ['id' => $mou->id]) }}">
                        <span
                            class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">{{ $mou->document_name }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    {{-- * breadcrumbs navigation end --}}

    {{-- * main start --}}
    <main class="container w-full mx-auto py-8 px-4">
        {{-- ? header start --}}
        <header class="mb-4">
            <h1 class="text-3xl font-bold">{{ $mou->document_name }}</h1>
        </header>
        {{-- ? header end --}}
        {{-- ? form start --}}
        <form class="bg-white w-full mx-auto mb-4 p-8 rounded-md shadow-md">
            @csrf
            {{-- ! mitra form start --}}
            <div class="flex flex-wrap">
                <div class="w-full mb-6 px-3 lg:w-1/2">
                    <label for="document_name" class="text-gray-700 block text-sm font-medium">Nama Dokumen:</label>
                    <input type="text" name="document_name" id="document_name"
                        value="{{ old('document_name', $mou->document_name) }}"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="document_number" class="text-gray-700 block text-sm font-medium">Nomer Dokumen:</label>
                    <input type="text" name="document_number" id="document_number"
                        value="{{ old('document_number', $mou->document_number) }}"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="length-of-contract" class="text-gray-700 block text-sm font-medium">Lama Kontrak:</label>
                    <input type="text" name="length_of_contract" id="length-of-contract"
                        value="{{ old('length_of_contract', $mou->length_of_contract) }}"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="satrt_date-end_date" class="text-gray-700 block text-sm font-medium">Masa Berlaku:</label>
                    <input type="text" name="start_date-end_date" id="satrt_date-end_date"
                        value="{{ old('start_date-end_date', \Carbon\Carbon::parse($mou->start_date)->format('d M Y') . ' s/d ' . \Carbon\Carbon::parse($mou->end_date)->format('d M Y') ?? '-') }}"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="contract_value" class="text-gray-700 block text-sm font-medium">Nilai Kontrak:</label>
                    <input type="text" name="contract_value" id="contract_value"
                        value="{{ old('contract_value', $mou->contract_value) }}"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                </div>
                <div class="w-full mb-6 px-3 lg:w-2/4">
                    <label class="text-gray-700 block text-sm font-medium">Deskripsi:</span>
                        <textarea name="description" id="description"
                            class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>{{ old('description', $mou->description) }}</textarea>
                </div>
                {{-- download file MOU --}}
                <div class="w-full mb-6 px-3 lg:w-1/6">
                    <label class="text-gray-700 block text-sm font-medium">Download File:</label>
                    <a href="{{ asset('storage/' . $mou->MoU_path) }}"
                        class="group text-[#003d7a] py-2 px-3 mt-2 font-semibold tracking-wide rounded-md transition-all duration-300 transform hover:bg-[#003d7a] hover:text-white hover:border-white hover:shadow-lg inline-flex border-2 border-[#003d7a] border-solid bg-white items-center justify-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-file-earmark-arrow-down-fill h-5 text-[#003d7a] group-hover:text-white transition-colors duration-300"
                            viewBox="0 0 16 16">
                            <path
                                d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                        </svg>
                        <span>Download</span>
                    </a>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/6">
                    <label for="mitra" class="text-gray-700 block text-sm font-medium">Mitra:</label>
                    <a href="{{ route('admin.mitra.show', ['id' => $mou->mitra->id]) }}"
                        class="group text-[#003d7a] py-2 px-3 mt-2 font-semibold tracking-wide rounded-md transition-all duration-300 transform hover:bg-[#003d7a] hover:text-white hover:border-white hover:shadow-lg inline-flex border-2 border-[#003d7a] border-solid bg-white items-center justify-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="bi bi-person-vcard-fill h5 w-5 text-[#003d7a] group-hover:text-white transition-colors duration-300"
                            viewBox="0 0 16 16">
                            <path
                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5M9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8m1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5m-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96q.04-.245.04-.5M7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                        </svg>
                        <span>{{ $mou->mitra->nama_mitra }}<span>
                    </a>
                </div>
                <div class="w-full mb-6 px-3 lg:w-2/4">
                    <label for="type_of_contract" class="text-gray-700 block text-sm font-medium">Tipe Kontrak:</label>
                    @foreach ($mou->categories as $category)
                        <span class="bg-yellow-600 text-white rounded-full px-2 py-1 text-xs font-bold mr-1 mt-1">
                            {{ $category->name }}
                        </span>
                    @endforeach
                </div>
            </div>
            {{-- ! mitra form end --}}
            {{-- ! action button start --}}
            <div class="flex flex-wrap">
                <div class="w-full px-3 flex justify-start space-x-2 sm:justify-end">
                    <a href="{{ route('admin.mou.index') }}"
                        class="bg-[#003d7a] text-white mb-4 py-2 px-4 font-bold tracking-wider rounded-md transition duration-300 hover:bg-blue-600 hover:scale-105">Back</a>
                </div>
            </div>
            {{-- ! action button end --}}
        </form>
        {{-- ? form end --}}
    </main>
    {{-- * main end --}}
@endsection
