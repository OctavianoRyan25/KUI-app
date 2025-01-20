@extends('admin.layout')

@section('title', 'Detail Mitra')
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
                    <a href="{{ route('admin.kerjaSama.index') }}">
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
                    <a href="{{ route('admin.mitra.index') }}">
                        <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">Mitra</span>
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
                    <a href="{{ route('admin.mitra.show', ['id' => $mitra->id]) }}">
                        <span
                            class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">{{ $mitra->nama_mitra }}</span>
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
            <h1 class="text-3xl font-bold">{{ $mitra->nama_mitra }}</h1>
        </header>
        {{-- ? header end --}}
        {{-- ? form start --}}
        <form class="bg-white w-full mx-auto mb-4 p-8 rounded-md shadow-md">
            @csrf
            {{-- ! mitra form start --}}
            <div class="flex flex-wrap">
                <div class="w-full mb-6 px-3 lg:w-1/2">
                    <label for="nama-mitra" class="text-gray-700 block text-sm font-medium">Nama Mitra:</label>
                    <input type="text" name="nama_mitra" id="nama-mitra"
                        value="{{ old('nama_mitra', $mitra->nama_mitra) }}"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="kriteria-mitra" class="text-gray-700 block text-sm font-medium">Kriteria Mitra:</label>
                    <select name="kriteria_mitra" id="kriteria-mitra"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                        <option value="{{ $mitra->kriteria_mitra ?? '' }}">{{ $mitra->kriteria_mitra ?? '-' }}</option>
                    </select>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="tingkat" class="text-gray-700 block text-sm font-medium">Tingkat:</label>
                    <select name="tingkat" id="tingkat"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                        @foreach ($tingkats as $tingkat)
                            @if (old('tingkat', $mitra->tingkat) == $tingkat)
                                <option value="{{ $tingkat }}" selected>{{ $tingkat }}</option>
                            @else
                                <option value="">-</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="regional" class="text-gray-700 block text-sm font-medium">Regional:</label>
                    <select name="regional" id="regional"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                        @if (old('regional', $mitra->regional))
                            <option value="{{ $mitra->regional }}">{{ $mitra->regional }}</option>
                        @else
                            <option value="">-</option>
                        @endif
                    </select>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="kota" class="text-gray-700 block text-sm font-medium">Kota:</label>
                    <select name="kota" id="kota"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                        @if (old('kota', $mitra->kota))
                            <option value="{{ $mitra->kota }}">{{ $mitra->kota }}</option>
                        @else
                            <option value="">-</option>
                        @endif
                    </select>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="negara" class="text-gray-700 block text-sm font-medium">Negara:</label>
                    <select name="negara" id="negara"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow sm:text-sm" disabled>
                        @if (old('negara', $mitra->negara))
                            <option value="{{ $mitra->negara }}">{{ $mitra->negara }}</option>
                        @else
                            <option value="">-</option>
                        @endif
                    </select>
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <span class="text-gray-700 block text-sm font-medium">Logo Mitra:</span>
                    <div
                        class="container-preview {{ $mitra->logo_mitra ? 'bg-transparent' : 'bg-[#003d7a]' }} w-40 h-40 mt-2 flex justify-center items-center rounded-md">
                        @if (old('logo_mitra', $mitra->logo_mitra))
                            <img src="{{ asset('storage/' . $mitra->logo_mitra) }}"
                                alt="{{ $mitra->nama_mitra . '\'s Logo' }}" class="img-preview rounded-md">
                        @else
                            <span
                                class="span-preview text-gray-400 text-3xl font-bold tracking-widest text-center uppercase -rotate-45">Preview</span>
                        @endif
                    </div>
                </div>
            </div>
            {{-- ! mitra form end --}}
            {{-- ! mitra kontak form start --}}
            <div class="px-3 flex flex-wrap">
                <label for="logo-mitra" class="text-gray-700 block text-sm font-medium">List Kontak:</label>
                <div class="bg-white w-full mt-2 mb-6 rounded-md shadow overflow-auto">
                    <table class="min-w-full">
                        <thead class="bg-[#003d7a] text-white text-sm font-bold tracking-wider text-center uppercase">
                            <tr>
                                <th class="py-4 px-6">Nama</th>
                                <th class="py-4 px-6">Email</th>
                                <th class="py-4 px-6">Nomor HP</th>
                                <th class="py-4 px-6">Nomor Telepon</th>
                                <th class="py-4 px-6">Posisi atau Jabatan</th>
                                <th class="py-4 px-6">Alamat</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($mitra->mitra_kontaks as $mitra_kontak)
                                <tr class="odd:bg-white even:bg-gray-300">
                                    <td class="py-2 px-3 border-[#003d7a] border-r">
                                        <input type="text" id="nama" value="{{ $mitra_kontak->nama ?? '-' }}"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="email" id="email" value="{{ $mitra_kontak->email ?? '-' }}"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" id="nomor-hp"
                                            value="{{ $mitra_kontak->nomor_hp ?? '-' }}"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" id="nomor-telepon"
                                            value="{{ $mitra_kontak->nomor_telepon ?? '-' }}"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" id="jabatan" value="{{ $mitra_kontak->jabatan ?? '-' }}"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-l">
                                        <input type="text" id="alamat" value="{{ $mitra_kontak->alamat ?? '-' }}"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                </tr>
                            @endforeach
                            @for ($i = $mitra->mitra_kontaks->count(); $i < 5; $i++)
                                <tr class="odd:bg-white even:bg-gray-300">
                                    <td class="py-2 px-3 border-[#003d7a] border-r">
                                        <input type="text" id="nama" value="-"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="email" id="email" value="-"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" id="nomor-hp" value="-"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" id="nomor-telepon" value="-"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" id="jabatan" value="-"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-l">
                                        <input type="text" id="alamat" value="-"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- ! mitra kontak form end --}}
            {{-- MOU list --}}
            <div class="px-3 flex flex-wrap">
                <label for="logo-mitra" class="text-gray-700 block text-sm font-medium">List MOU:</label>
                <div class="bg-white w-full mt-2 mb-6 rounded-md shadow overflow-auto">
                    <table class="min-w-full">
                        <thead class="bg-[#003d7a] text-white text-sm font-bold tracking-wider text-center uppercase">
                            <tr>
                                <th class="py-4 px-6">Nomor MOU</th>
                                <th class="py-4 px-6">Tanggal MOU</th>
                                <th class="py-4 px-6">Nama MOU</th>
                                <th class="py-4 px-6">File MOU</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($mitra->mous as $mitra_mou)
                                <tr class="odd:bg-white even:bg-gray-300">
                                    <td class="py-2 px-3 border-[#003d7a] border-r">
                                        <input type="text" id="nomor-mou"
                                            value="{{ $mitra_mou->document_number ?? '-' }}"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" id="tanggal-mou"
                                            value="{{ \Carbon\Carbon::parse($mitra_mou->start_date)->format('d-m-Y') . ' s/d ' . \Carbon\Carbon::parse($mitra_mou->end_date)->format('d-m-Y') ?? '-' }}"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" id="tahun-mou"
                                            value="{{ $mitra_mou->document_name ?? '-' }}"
                                            class="bg-transparent w-full outline-none" disabled>
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-l">
                                        <a href="{{ asset('storage/' . $mitra_mou->MoU_path) }}"
                                            class="text-blue-600 underline">Download</a>
                                        <a href="{{ route('admin.mou.show', ['id' => $mitra_mou->id]) }}"
                                            class="text-blue-600 underline">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- MOU end list --}}
            {{-- ! action button start --}}
            <div class="flex flex-wrap">
                <div class="w-full px-3 flex justify-start space-x-2 sm:justify-end">
                    <a href="{{ route('admin.mitra.index') }}"
                        class="bg-[#003d7a] text-white mb-4 py-2 px-4 font-bold tracking-wider rounded-md transition duration-300 hover:bg-blue-600 hover:scale-105">Back</a>
                </div>
            </div>
            {{-- ! action button end --}}
        </form>
        {{-- ? form end --}}
    </main>
    {{-- * main end --}}
@endsection
