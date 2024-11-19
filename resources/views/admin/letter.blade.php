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
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Letters</span>
            </div>
        </li>
        </ol>
    </nav>  
    <div class="container mx-auto w-full px-4 py-8">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-bold text-3xl">Letter</h1>
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

        {{-- Create Event Button --}}
        <div class="w-full md:w-fit flex justify-between md:items-center gap-4 my-3 mt-3">
            <button id="addUser" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg inline-flex transition duration-200" onclick="openModal()">
                Tambah Peserta
            </button>
        </div>

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
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Mitra</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Kerma</th>
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
                            <td class="py-2 px-3 text-center">{{ $letter->mitra }}</td>
                            <td class="py-2 px-3 text-center">{{ $letter->kerma }}</td>
                            <td class="py-2 px-3 text-center">
                                <div class="flex justify-center gap-3">
                                    @if($letter->file1 && $letter->file2 && $letter->file3)
                                        <a href="{{ route('admin.letter.merge', $letter->id) }}" class="text-green-500 transition duration-200 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                            </svg>
                                        </a>
                                    @else
                                        <p class="text-red-500 relative group">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path d="M3.354 3.354a.5.5 0 0 1 .708 0L8 7.293l4.948-4.949a.5.5 0 0 1 .708.708L8.707 8l4.949 4.948a.5.5 0 0 1-.708.708L8 8.707l-4.948 4.949a.5.5 0 0 1-.708-.708L7.293 8 2.345 3.052a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                            <!-- Tooltip -->
                                            <span class="absolute top-full left-1/2 transform -translate-x-1/2 mt-1 hidden group-hover:block bg-gray-700 text-white text-xs rounded px-2 py-1 w-28 z-50">
                                                File belum lengkap
                                            </span>
                                        </p>
                                    @endif
                                    <form action="{{ route('admin.letter.delete', $letter->id) }}" method="POST" class="inline-block transition duration-300 hover:scale-110">
                                        @csrf
                                        @method('DELETE')
                                        <button id="buttonDeleteEvent" onclick="confirmDelete(event)" type="button" class="text-red-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                            </svg>
                                        </button>
                                    </form> 
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div id="createLetterModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 flex transition-opacity duration-300">
            <div class="bg-white p-6 rounded-lg shadow-lg transform transition-all duration-300 scale-90 opacity-0 w-full sm:w-3/4 lg:w-8/12" id="createLetterContent">
                <h2 class="text-xl font-bold mb-4 text-center">Tambah Letter</h2>
                <img src="{{ asset('assets/user.png') }}" alt="Add User" class="w-1/6 mx-auto mb-4">
                <form id="letterForm" action="{{ route('admin.letter.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="mb-6 px-3 w-full">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" title="title" id="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <p class="text-red-500 text-sm mt-2 error" id="error-name"></p>
                        </div>
                    </div>
                    <div class="flex flex-wrap">
                        <div class="mb-6 px-3 w-full">
                            <label for="mitra" class="block text-sm font-medium text-gray-700">Mitra</label>
                            <input type="text" name="mitra" id="mitra" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <p class="text-red-500 text-sm mt-2 error" id="error-mitra"></p>
                        </div>
                    </div>
                    <div class="flex flex-wrap">
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="labelKategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <select id="kategori" title="kategori" class="form-select me-3 mt-3 border border-gray-300 rounded-md px-3 py-2 focus:border-indigo-500 text-sm w-full" ></label>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="1">Pendidikan</option>
                                <option value="2">Penelitian</option>
                                <option value="3">Pengabdian kepada Masyarakat</option>
                            </select>
                            <p class="text-red-500 text-sm mt-2 error" id="error-nip"></p>
                        </div>
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="labelKategori" class="block text-sm font-medium text-gray-700">Kegiatan</label>
                            <select disabled id="bentukKegiatan" title="bentukKegiatan" name="kerma" class="form-select mt-3 px-3 py-2 w-full">
                                <option value="" disabled selected>Pilih Bentuk Kegiatan</option>
                            </select>
                            <p class="text-red-500 text-sm mt-2 error" id="error-nip"></p>
                        </div>
                    </div>
                    <div class="flex justify-between gap-6 mt-6 px-3">
                        <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">Close</button>
                        <button type="submit" id="submitModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function openModal() {
            const modal = document.getElementById('createLetterModal');
            const modalContent = document.getElementById('createLetterContent');

            modal.classList.remove('hidden'); // Show modal
            setTimeout(() => {
                modalContent.classList.add('scale-100', 'opacity-100'); // Transition to visible state
            }, 10); // Small delay to trigger transition
        }

        function closeModal() {
            const modal = document.getElementById('createLetterModal');
            const modalContent = document.getElementById('createLetterContent');

            // Add initial scale and opacity
            modalContent.classList.remove('scale-100', 'opacity-100');
            setTimeout(() => {
                modal.classList.add('hidden'); // Hide modal after transition
            }, 300); // Wait for the transition to complete
        }

        document.getElementById('kategori').addEventListener('change', function() {
            let alias = this.value;

            fetch(`/admin/kerma?alias=${alias}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText);
                    }
                    return response.json()
                })
                .then(data => {
                    let kegiatanDropdown = document.getElementById('bentukKegiatan');
                    kegiatanDropdown.innerHTML = '<option value="">Pilih Bentuk Kegiatan</option>';
                    kegiatanDropdown.disabled = false;
                    kegiatanDropdown.classList.add('border', 'border-gray-300', 'rounded-md', 'shadow-sm', 'focus:outline-none', 'focus:ring-indigo-500', 'focus:border-indigo-500', 'sm:text-sm', 'px-3', 'py-2');
                    data.forEach(kegiatan => {
                        let option = document.createElement('option');
                        option.value = kegiatan.name;
                        option.textContent = kegiatan.name;
                        kegiatanDropdown.appendChild(option);
                    });
                })
                .catch(error => {
                    let kegiatanDropdown = document.getElementById('bentukKegiatan');
                    kegiatanDropdown.innerHTML = '<option value="">Error</option>';
                });
        });

        function confirmDelete(event){
            event.preventDefault();
            const form = event.target.closest('form');
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const button = form.querySelector('button[type="button"]');
                        const deleteButton = form.querySelector('#buttonDeleteEvent');
                        // const spinner = form.querySelector('#spinner');
                        button.disabled = true; // Nonaktifkan tombol
                        deleteButton.classList.add('hidden'); // Sembunyikan icon delete
                        // spinner.classList.remove('hidden'); // Tampilkan spinner
                        form.submit(); // Kirim form setelah konfirmasi
                    }
                });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection