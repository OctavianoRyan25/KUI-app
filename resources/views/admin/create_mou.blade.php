@extends('admin.layout')

@section('title', 'MoU')
@section('content')

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        .input-focus:focus {
            border-color: #3182ce;
            outline: none;
        }

        .clear-button {
            background-color: #3182ce;
            transition: background-color 0.3s ease;
        }

        .clear-button:hover {
            background-color: red;
        }

        .clear-button:active {
            background-color: red;
        }

        .submit-button {
            background-color: #3182ce;
            transition: background-color 0.3s ease;
        }

        .submit-button:hover {
            background-color: #2b6cb0;
        }

        .submit-button:active {
            background-color: #2b6cb0;
        }

        .non-clickable {
            cursor: not-allowed;
        }
    </style>
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
                    <a href="{{ route('admin.mou.create') }}">
                        <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">Tambah MOU</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Container Form -->
    <main class="container w-full mx-auto py-8 px-4">
        {{-- ? header start --}}
        <header class="mb-4">
            <h1 class="text-3xl font-bold">Tambah Dokumen MoU</h1>
        </header>
        {{-- ? header end --}}
        {{-- ? error alert start --}}
        @if (session()->has('error'))
            <div class="bg-red-100 text-red-700 mb-4 py-3 px-4 border border-red-400 rounded-md" role="alert">
                <strong>Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        <div id="formPage" class="w-full h-full p-9 overflow-auto">
            <form id="formKerjasama" class="bg-white w-full mx-auto mb-4 p-8 rounded-md shadow-md" method="POST"
                action="{{ route('admin.mou.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Cari Mitra -->
                <div class="mb-4">
                    <label for="search_mitra" class="text-gray-700 pl-2">Cari Mitra<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="search_mitra" class="w-full px-3 py-2 mt-2 border rounded-md input-focus"
                        placeholder="Masukkan nama mitra...">
                    <input type="hidden" id="mitra_id" name="mitra_id">
                    <div id="mitra_results" class="mt-2 bg-white shadow-md rounded-md hidden"></div>
                    @error('mitra_id')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Awal dan Akhir -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                    <div>
                        <label for="start_date" class="text-gray-700 pl-2">Tanggal Awal<span
                                class="text-red-500">*</span></label>
                        <input type="date" id="start_date" name="start_date"
                            class="w-full px-3 py-2 border rounded-md input-focus mt-2">
                        @error('start_date')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="end_date" class="text-gray-700 pl-2">Tanggal Berakhir<span
                                class="text-red-500">*</span></label>
                        <input type="date" id="end_date" name="end_date"
                            class="w-full px-3 py-2 border rounded-md input-focus mt-2">
                        @error('end_date')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Nomor dan Nama Dokumen -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                    <div>
                        <label for="document_number" class="text-gray-700 pl-2">Nomor Dokumen<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="document_number" name="document_number"
                            class="w-full px-3 py-2 border rounded-md input-focus mt-2">
                        @error('document_number')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="document_name" class="text-gray-700 pl-2">Nama Dokumen<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="document_name" name="document_name"
                            class="w-full px-3 py-2 border rounded-md input-focus mt-2">
                        @error('document_name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Jenis MoU -->
                {{-- <div class="mb-4">
                    <label class="text-gray-700 pl-2">Jenis MoU<span class="text-red-500">*</span></label>
                    <div class="flex flex-wrap gap-4 mt-2">
                        @foreach (['Tridharma', 'Promosi', 'Sharing Profit', 'Beasiswa', 'Pemanfaatan Fasilitas Universitas', 'Pemanfaatan SDM'] as $jenis)
                            <div class="flex items-center">
                                <input type="checkbox" name="type_of_contract[]" value="{{ $jenis }}"
                                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label class="ml-2 text-gray-700">{{ $jenis }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('type_of_contract')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div> --}}

                <!-- Kategori MoU -->
                <div class="mb-4">
                    <label class="text-gray-700 pl-2">Kategori MoU<span class="text-red-500">*</span></label>
                    <div class="flex flex-wrap gap-4 mt-2">
                        @foreach ($categories as $category)
                            <div class="flex items-center">
                                <input type="checkbox" name="category_ids[]" value="{{ $category->id }}"
                                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label class="ml-2 text-gray-700">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('type_of_contract')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lama Kerjasama -->
                <div class="mb-4">
                    <label class="text-gray-700 pl-2">Lama Kerjasama<span class="text-red-500">*</span></label>
                    <div class="flex flex-wrap gap-4 mt-2">
                        @foreach (['5 Tahun', 'Life Time'] as $lama)
                            <div class="flex items-center">
                                <input type="radio" name="length_of_contract" value="{{ $lama }}"
                                    class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label class="ml-2 text-gray-700">{{ $lama }}</label>
                            </div>
                        @endforeach
                    </div>
                    @error('length_of_contract')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai Kontrak -->
                <div class="mb-4">
                    <label for="contract_value" class="text-gray-700 pl-2">Nilai Kontrak<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="contract_value" name="contract_value"
                        class="w-full px-3 py-2 border rounded-md input-focus mt-2">
                    @error('contract_value')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Lampiran -->
                <div class="mb-4">
                    <label for="MoU_path" class="text-gray-700 pl-2">Lampiran<span class="text-red-500">*</span></label>
                    <input type="file" id="MoU_path" name="MoU_path"
                        class="w-full px-3 py-2 border rounded-md input-focus mt-2">
                    @error('MoU_path')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label for="description" class="text-gray-700 pl-2">Deskripsi</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-3 py-2 border rounded-md input-focus mt-2"></textarea>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end gap-4">
                    <button type="reset"
                        class="px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">Clear</button>
                    <button type="button" id="buttonSubmit"
                        class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Submit</button>
                </div>
            </form>

        </div>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle input event
            $('#search_mitra').on('input', function() {
                const query = $(this).val();

                if (query.length > 2) {
                    // Ajax request
                    $.ajax({
                        url: '{{ route('admin.mitra.search') }}',
                        method: 'GET',
                        data: {
                            search: query
                        },
                        success: function(response) {
                            const results = $('#mitra_results');
                            results.empty(); // Clear previous results

                            if (response.length > 0) {
                                results.removeClass('hidden'); // Show results container

                                response.forEach(function(mitra) {
                                    results.append(`
                                    <div class="px-4 py-2 hover:bg-gray-100 cursor-pointer border-b" data-id="${mitra.id}">
                                        ${mitra.nama_mitra}
                                    </div>
                                `);
                                });
                            } else {
                                results.removeClass('hidden'); // Show results container
                                results.append(
                                    '<div class="px-4 py-2 text-gray-500 non-clickable" data-clickable="false">Tidak ada hasil ditemukan</div>'
                                );
                            }
                        },
                        error: function() {
                            const results = $('#mitra_results');
                            results.empty(); // Clear previous results
                            results.append(
                                '<div class="px-4 py-2 text-gray-500">Terjadi kesalahan saat mengambil data</div>'
                            );
                        }
                    });
                } else {
                    $('#mitra_results').addClass('hidden'); // Hide results container if query is empty
                }
            });

            $(document).on('click', '#mitra_results .non-clickable', function(event) {
                event.preventDefault(); // Prevent default behavior
                event.stopPropagation(); // Stop event from propagating
            });

            // Hide results when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#search_mitra, #mitra_results').length) {
                    $('#mitra_results').addClass('hidden');
                }
            });

            $('#mitra_results').on('click', 'div', function() {
                const isClickable = $(this).data('id') !== undefined;
                if (isClickable === false) {
                    return;
                }
                const mitraId = $(this).data('id');
                const mitraName = $(this).text().trim();

                $('#search_mitra').val(mitraName);
                $('#mitra_id').val(mitraId);

                $('#mitra_results').addClass('hidden');
            });

            $('#buttonSubmit').on('click', function() {
                $('#spinner').removeClass('hidden');
                $('#buttonSubmit').prop('disabled', true);
                $('buttonSubmit').addClass('cursor-not-allowed');
                $('#formKerjasama').submit();
            });
        });
    </script>
    <script>
        const formPage = document.getElementById('formPage');
        const resultPage = document.getElementById('resultPage');
        const formKerjasama = document.getElementById('formKerjasama');
        const output = document.getElementById('output');

        formKerjasama.addEventListener('submit', function(e) {
            e.preventDefault();


            const lamaKerjasamaElements = document.querySelectorAll('input[name="lama_kerjasama[]"]:checked');
            const lamaKerjasama = Array.from(lamaKerjasamaElements).map(el => el.nextElementSibling.textContent);

            const nilaiKontrak = document.getElementById('nilai_kontrak').value;

            const lampiranFile = document.getElementById('lampiran').files[0];
            const lampiranName = lampiranFile?.name || 'Tidak ada lampiran';
            const lampiranURL = lampiranFile ? URL.createObjectURL(lampiranFile) : null;

            const data = {
                tanggalAwal: document.getElementById('tanggal_awal').value,
                tanggalAkhir: document.getElementById('tanggal_akhir').value,
                nomorDokumen: document.getElementById('nomor_dokumen').value,
                jenisMou: document.getElementById('jenis_mou').value,
                deskripsi: document.getElementById('deskripsi').value,
                lamaKerjasama: lamaKerjasama.join(', '),
                nilaiKontrak: nilaiKontrak,
                lampiran: lampiranName,
                lampiranURL: lampiranURL,
            };

            output.innerHTML = `
                <p><strong>Tanggal Awal:</strong> ${data.tanggalAwal}</p>
                <p><strong>Tanggal Akhir:</strong> ${data.tanggalAkhir}</p>
                <p><strong>Nomor Dokumen:</strong> ${data.nomorDokumen}</p>
                <p><strong>Jenis MOU:</strong> ${data.jenisMou}</p>
                <p><strong>Lama Kerja Sama:</strong> ${data.lamaKerjasama}</p>
                <p><strong>Nilai Kontrak:</strong> ${data.nilaiKontrak}</p>
                <p><strong>Lampiran:</strong> 
                    ${data.lampiranURL ? `<a href="${data.lampiranURL}" target="_blank" class="text-blue-500 underline">Lihat Lampiran</a>` : data.lampiran}
                </p>
                <p><strong>Deskripsi:</strong> ${data.deskripsi}</p>
            `;

            formPage.classList.add('hidden');
            resultPage.classList.remove('hidden');
        });

        // document.getElementById('kembali').addEventListener('click', function() {
        //     resultPage.classList.add('hidden');
        //     formPage.classList.remove('hidden');
        // });
    </script>
@endsection
