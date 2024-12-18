@extends('admin.layout')

@section('title', 'Update Mitra')
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
                    <a href="{{ route('admin.mitra.edit', ['id' => $mitra->id]) }}">
                        <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">Update Mitra</span>
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
            <h1 class="text-3xl font-bold">Update Mitra</h1>
        </header>
        {{-- ? header end --}}
        {{-- ? error alert start --}}
        @if (session()->has('error'))
            <div class="bg-red-100 text-red-700 mb-4 py-3 px-4 border border-red-400 rounded-md" role="alert">
                <strong>Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        {{-- ? error alert end --}}
        {{-- ? form start --}}
        <form action="{{ route('admin.mitra.update', ['id' => $mitra->id]) }}" method="POST" enctype="multipart/form-data"
            class="bg-white w-full mx-auto mb-4 p-8 rounded-md shadow-md">
            @method('PUT')
            @csrf
            {{-- ! mitra form start --}}
            <div class="flex flex-wrap">
                <div class="w-full mb-6 px-3 lg:w-1/2">
                    <label for="nama-mitra" class="text-gray-700 block text-sm font-medium">Nama Mitra:</label>
                    <input type="text" name="nama_mitra" id="nama-mitra" placeholder="..."
                        value="{{ old('nama_mitra', $mitra->nama_mitra) }}"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow focus:outline-[#003d7a] sm:text-sm"
                        autofocus>
                    @error('nama_mitra')
                        <small class="text-red-500 mt-2 text-sm">* {{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="kriteria-mitra" class="text-gray-700 block text-sm font-medium">Kriteria Mitra:</label>
                    <select name="kriteria_mitra" id="kriteria-mitra"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow focus:outline-[#003d7a] sm:text-sm">
                        <option value="">-- Pilih kriteria --</option>
                        @foreach ($kriterias as $kriteria)
                            @if (old('kriteria_mitra', $mitra->kriteria_mitra) == $kriteria)
                                <option value="{{ $kriteria }}" selected>{{ $kriteria }}</option>
                            @else
                                <option value="{{ $kriteria }}">{{ $kriteria }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('kriteria_mitra')
                        <small class="text-red-500 mt-2 text-sm">* {{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="tingkat" class="text-gray-700 block text-sm font-medium">Tingkat:</label>
                    <select name="tingkat" id="tingkat"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow focus:outline-[#003d7a] sm:text-sm">
                        <option value="">-- Pilih tingkat --</option>
                        @foreach ($tingkats as $tingkat)
                            @if (old('tingkat', $mitra->tingkat) == $tingkat)
                                <option value="{{ $tingkat }}" selected>{{ $tingkat }}</option>
                            @else
                                <option value="{{ $tingkat }}">{{ $tingkat }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('tingkat')
                        <small class="text-red-500 mt-2 text-sm">* {{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="regional" class="text-gray-700 block text-sm font-medium">Regional:</label>
                    <select name="regional" id="regional"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow focus:outline-[#003d7a] sm:text-sm"
                        disabled>
                        @if (old('regional', $mitra->regional))
                            <option value="{{ $mitra->regional }}">{{ $mitra->regional }}</option>
                        @else
                            <option value="">-- Pilih regional --</option>
                        @endif
                    </select>
                    @error('regional')
                        <small class="text-red-500 mt-2 text-sm">* {{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="kota" class="text-gray-700 block text-sm font-medium">Kota:</label>
                    <select name="kota" id="kota"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow focus:outline-[#003d7a] sm:text-sm"
                        disabled>
                        @if (old('kota', $mitra->kota))
                            <option value="{{ $mitra->kota }}">{{ $mitra->kota }}</option>
                        @else
                            <option value="">-- Pilih kota --</option>
                        @endif
                    </select>
                    @error('kota')
                        <small class="text-red-500 mt-2 text-sm">* {{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="negara" class="text-gray-700 block text-sm font-medium">Negara:</label>
                    <select name="negara" id="negara"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow focus:outline-[#003d7a] sm:text-sm"
                        disabled>
                        @if (old('negara', $mitra->negara))
                            <option value="{{ $mitra->negara }}">{{ $mitra->negara }}</option>
                        @else
                            <option value="">-- Pilih negara --</option>
                        @endif
                    </select>
                    @error('negara')
                        <small class="text-red-500 mt-2 text-sm">* {{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="jenis-mitra" class="text-gray-700 block text-sm font-medium">Jenis Mitra:</label>
                    <select name="jenis_mitra" id="jenis-mitra"
                        class="w-full mt-2 p-2 block border border-gray-300 rounded-md shadow focus:outline-[#003d7a] sm:text-sm">
                        @if (old('jenis_mitra', $mitra->jenis_mitra))
                            <option value="{{ $mitra->jenis_mitra }}">{{ $mitra->jenis_mitra }}</option>
                        @else
                            <option value="">-- Pilih jenis mitra --</option>
                        @endif
                        @foreach ($jenisMitras as $jenisMitra)
                            <option value="{{ $jenisMitra->jenis_mitra }}">{{ $jenisMitra->jenis_mitra }}</option>
                        @endforeach
                    </select>
                    @error('jenis_mitra')
                        <small class="text-red-500 mt-2 text-sm">* {{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full mb-6 px-3 lg:w-1/4">
                    <label for="logo-mitra" class="text-gray-700 block text-sm font-medium">Logo Mitra:</label>
                    <div
                        class="container-preview {{ $mitra->logo_mitra ? 'bg-transparent' : 'bg-[#003d7a]' }} w-40 h-40 mt-2 flex justify-center items-center rounded-md">
                        <input type="hidden" name="old_logo_mitra" value="{{ $mitra->logo_mitra }}">
                        @if (old('logo_mitra', $mitra->logo_mitra))
                            <img src="{{ asset('storage/' . $mitra->logo_mitra) }}"
                                alt="{{ $mitra->nama_mitra . '\'s Logo' }}" class="img-preview rounded-md">
                        @else
                            <span
                                class="span-preview text-gray-400 text-3xl font-bold tracking-widest text-center uppercase -rotate-45">Preview</span>
                        @endif
                    </div>
                    <input type="file" name="logo_mitra" id="logo-mitra" class="mt-2 focus:outline-[#003d7a]">
                    @error('logo_mitra')
                        <small class="text-red-500 mt-2 text-sm">* {{ $message }}</small>
                    @enderror
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
                            @for ($i = 0; $i < 5; $i++)
                                <tr class="odd:bg-white even:bg-gray-300">
                                    <td class="py-2 px-3 border-[#003d7a] border-r">
                                        <input type="text" name="mitra_kontaks[{{ $i }}][nama]"
                                            id="nama"
                                            value="{{ old('mitra_kontaks.' . $i . '.nama', $mitra->mitra_kontaks[$i]->nama ?? '') }}"
                                            class="bg-transparent w-full outline-none">
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="email" name="mitra_kontaks[{{ $i }}][email]"
                                            id="email"
                                            value="{{ old('mitra_kontaks.' . $i . '.email', $mitra->mitra_kontaks[$i]->email ?? '') }}"
                                            class="bg-transparent w-full outline-none">
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" name="mitra_kontaks[{{ $i }}][nomor_hp]"
                                            id="nomor-hp"
                                            value="{{ old('mitra_kontaks.' . $i . '.nomor_hp', $mitra->mitra_kontaks[$i]->nomor_hp ?? '') }}"
                                            class="bg-transparent w-full outline-none">
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" name="mitra_kontaks[{{ $i }}][nomor_telepon]"
                                            id="nomor-telepon"
                                            value="{{ old('mitra_kontaks.' . $i . '.nomor_telepon', $mitra->mitra_kontaks[$i]->nomor_telepon ?? '') }}"
                                            class="bg-transparent w-full outline-none">
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-x">
                                        <input type="text" name="mitra_kontaks[{{ $i }}][jabatan]"
                                            id="jabatan"
                                            value="{{ old('mitra_kontaks.' . $i . '.jabatan', $mitra->mitra_kontaks[$i]->jabatan ?? '') }}"
                                            class="bg-transparent w-full outline-none">
                                    </td>
                                    <td class="py-2 px-3 border-[#003d7a] border-l">
                                        <input type="text" name="mitra_kontaks[{{ $i }}][alamat]"
                                            id="alamat"
                                            value="{{ old('mitra_kontaks.' . $i . '.alamat', $mitra->mitra_kontaks[$i]->alamat ?? '') }}"
                                            class="bg-transparent w-full outline-none">
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- ! mitra kontak form end --}}
            {{-- ! action buttons start --}}
            <div class="flex flex-wrap">
                <div class="w-full px-3 flex justify-start space-x-2 sm:justify-end">
                    <a href="{{ route('admin.mitra.index') }}"
                        class="bg-red-500 text-white mb-4 py-2 px-4 font-bold tracking-wider rounded-md transition duration-300 hover:bg-red-600 hover:scale-105">Cancel</a>
                    <button type="submit"
                        class="bg-[#003d7a] text-white mb-4 py-2 px-4 font-bold tracking-wider rounded-md transition duration-300 hover:bg-blue-600 hover:scale-105">Update</button>
                </div>
            </div>
            {{-- ! action buttons end --}}
        </form>
        {{-- ? form end --}}
    </main>
    {{-- * main end --}}

    {{-- * javascript start --}}
    <script>
        // ? onload function start
        window.onload = function() {
            tingkatDisabledLogic();
            imagePreview();
        }
        // ? onload function end

        // ? tingkat disabled logic start
        function tingkatDisabledLogic() {
            const tingkat = document.getElementById('tingkat');
            const regional = document.getElementById('regional');
            const kota = document.getElementById('kota');
            const negara = document.getElementById('negara');

            tingkat.addEventListener('change', function() {
                regional.innerHTML = '<option value="">-- Pilih regional --</option>';
                kota.innerHTML = '<option value="">-- Pilih kota --</option>';
                negara.innerHTML = '<option value="">-- Pilih negara --</option>';

                if (tingkat.value == '') {
                    regional.disabled = true;
                    kota.disabled = true;
                    negara.disabled = true;
                } else if (tingkat.value == 'Dalam negeri (regional)') {
                    fetchJawaTengah();

                    regional.innerHTML = '<option value="Jawa Tengah">Jawa Tengah</option>';

                    regional.disabled = true;
                    kota.disabled = false;
                    negara.disabled = true;
                } else if (tingkat.value == 'Dalam negeri (nasional)') {
                    fetchRegionalAndKota();

                    regional.disabled = false;
                    kota.disabled = true;
                    negara.disabled = true;
                } else {
                    fetchNegara();

                    regional.disabled = true;
                    kota.disabled = true;
                    negara.disabled = false;
                }
            });
        }
        // ? tingkat disabled logic end

        // ? fetch regional and kota start
        function fetchRegionalAndKota() {
            const tingkat = document.getElementById('tingkat');
            const regional = document.getElementById('regional');
            const kota = document.getElementById('kota');

            fetch('/json/indonesia.json')
                .then(response => response.json())
                .then(data => {
                    data.forEach(region => {
                        const option = document.createElement('option');

                        option.value = region.provinsi;
                        option.textContent = region.provinsi;
                        regional.appendChild(option);
                    });

                    regional.addEventListener('change', function() {
                        const selectedRegional = regional.value;
                        const selectedRegion = data.find(region => region.provinsi == selectedRegional);

                        kota.innerHTML = '<option value="" disabled selected>-- Pilih kota --</option>';

                        if (selectedRegion) {
                            selectedRegion.kota.forEach(city => {
                                const option = document.createElement('option');

                                option.value = city;
                                option.textContent = city;
                                kota.appendChild(option);
                            });

                            kota.disabled = false;
                        } else {
                            kota.disabled = true;
                        }
                    });
                })
                .catch(error => console.error('Error loading indonesia.json: ' + error));
        }
        // ? fetch regional and kota end

        // ? fetch jawa tengah start
        function fetchJawaTengah() {
            const kota = document.getElementById('kota');

            fetch('/json/indonesia.json')
                .then(response => response.json())
                .then(data => {
                    const jawaTengah = data.find(regional => regional.provinsi == 'Jawa Tengah');

                    jawaTengah.kota.forEach(city => {
                        const option = document.createElement('option');

                        option.value = city;
                        option.textContent = city;
                        kota.appendChild(option);
                    });
                })
                .catch(error => console.error('Error loading indonesia.json: ' + error));
        }
        // ? fetch jawa tengah end

        // ? fetch negara start
        function fetchNegara() {
            const negara = document.getElementById('negara');

            fetch('/json/negara.json')
                .then(response => response.json())
                .then(data => {
                    data.forEach(country => {
                        const option = document.createElement('option');

                        option.value = country.name;
                        option.textContent = country.name;
                        negara.appendChild(option);
                    });
                })
                .catch(error => console.error('Error loading negara.json: ' + error));
        }
        // ? fetch negara end

        // ? image preview start
        function imagePreview() {
            const logoMitra = document.getElementById('logo-mitra');

            logoMitra.addEventListener('change', function() {
                const containerPreview = document.querySelector('.container-preview');
                const imgPreview = document.querySelector('.img-preview');
                const spanPreview = document.querySelector('.span-preview');
                const namaMitra = document.getElementById('nama-mitra');
                const oFReader = new FileReader();

                oFReader.readAsDataURL(logoMitra.files[0]);
                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                    imgPreview.alt = namaMitra.value + '\'s Logo';
                }

                containerPreview.classList.add('bg-transparent');
                spanPreview.classList.add('hidden');
            });
        }
        // ? image preview end
    </script>
    {{-- * javascript end --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tingkat = document.getElementById('tingkat');
            // Check if the value is not empty
            if (tingkat.value !== '') {
                const regional = document.getElementById('regional');
                const kota = document.getElementById('kota');
                const negara = document.getElementById('negara');

                if (tingkat.value == 'Dalam negeri (regional)') {
                    fetchJawaTengah();

                    regional.innerHTML = '<option value="Jawa Tengah">Jawa Tengah</option>';

                    regional.disabled = true;
                    kota.disabled = false;
                    negara.disabled = true;
                } else if (tingkat.value == 'Dalam negeri (nasional)') {
                    fetchRegionalAndKota();

                    regional.disabled = false;
                    kota.disabled = false;
                    negara.disabled = true;
                } else {
                    fetchNegara();

                    regional.disabled = true;
                    kota.disabled = true;
                    negara.disabled = false;
                }
            }

            function isRegionSelected() {
                return regional.value !== '';
            }
        });
    </script>
@endsection
