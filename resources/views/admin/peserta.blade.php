@extends('admin.layout')
@section('title', 'Peserta')
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
                    <a href="{{ route('admin.peserta') }}">
                        <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">Peserta</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container mx-auto w-full px-4 py-8">
        <div class="row mb-4">
            <div class="col-md-12">
                <h1 class="font-bold text-3xl">Peserta</h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        {{-- Create Event Button --}}
        <div class="w-full md:w-fit flex justify-between md:items-center gap-4 my-3 mb-4">
            <button id="addUser" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg inline-flex transition duration-200" onclick="openModal()">
                Tambah Peserta
            </button>
            <button id="import-button" class="bg-blue-500 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg inline-flex transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill-add h-5 w-5 me-2" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1"/>
                    <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12 12 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7m6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.55 4.55 0 0 1 .23-2.002m-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.5 4.5 0 0 1-1.3-1.905"/>
                </svg>Import
            </button>
        </div>

        {{-- Table Event --}}
        <div class="bg-white mb-4 rounded-md shadow overflow-auto">
            <table class="min-w-full">
                <thead class="bg-[#003d7a] text-white text-sm font-bold tracking-wider text-center uppercase">
                    <tr>
                        <th class="py-4 px-6">No</th>
                        <th class="py-4 px-6">Nama</th>
                        <th class="py-4 px-6">NIP</th>
                        <th class="py-4 px-6">Prodi</th>
                        <th class="py-4 px-6">Jabatan</th>
                        <th class="py-4 px-6">Email</th>
                        <th class="py-4 px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($pesertas as $index => $peserta)
                        <tr class="odd:bg-white even:bg-gray-300">
                            <td class="py-2 px-4">{{ $pesertas->firstItem() + $index }}</td>
                            <td class="py-2 px-4">{{ $peserta->name }}</td>
                            <td class="py-2 px-4">{{ $peserta->nip }}</td>
                            <td class="py-2 px-4">{{ $peserta->study_program }}</td>
                            <td class="py-2 px-4">
                                @if ($peserta->position)
                                    {{ $peserta->position }}
                                @else
                                    <span class="text-red-500 flex justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                            <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                        </svg>
                                    </span>
                                @endif
                            </td>
                            <td class="py-2 px-4">
                                @if ($peserta->email)
                                    {{ $peserta->email }}
                                @else
                                    <span class="text-red-500 flex justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                            <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                        </svg>
                                    </span>
                                @endif
                            </td>
                            <td class="py-2 px-4">
                                <div class="flex justify-center space-x-2">
                                    {{-- Show Data --}}
                                    {{-- <a href="{{ route('admin.event.show', $event->id) }}" class="text-yellow-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                        </svg>
                                    </a> --}}
                                    {{-- Edit Data --}}
                                    {{-- <a href="{{ route('admin.event.edit', $event->id) }}" class="text-blue-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </a> --}}
                                    <form action="{{ route('admin.peserta.delete', $peserta->id) }}" method="POST" class="inline-block transition duration-300 hover:scale-110">
                                        @csrf
                                        @method('DELETE')
                                        <button id="buttonDeleteEvent" onclick="confirmDelete(event)" type="button" class="text-red-600 deleteEvent">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                            </svg>
                                        </button>
                                    </form> 
                                    {{-- Show by UUID --}}
                                    {{-- <a href="{{ route('admin.attendance', $event->uuid) }}" class="text-blue-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                        </svg>
                                    </a> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Link pagination --}}
        <div class="mt-4">
            {{ $pesertas->links() }}
        </div>

        <!-- Modal -->
        <div id="createPesertaModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 flex transition-opacity duration-300">
            <div class="bg-white p-6 rounded-lg shadow-lg transform transition-all duration-300 scale-90 opacity-0 w-full sm:w-3/4 lg:w-8/12" id="createPesertaContent">
                <h2 class="text-xl font-bold mb-4 text-center">Tambah Pengguna</h2>
                <img src="{{ asset('assets/user.png') }}" alt="Add User" class="w-1/4 mx-auto mb-4">
                <form id="pesertaForm" action="{{ route('admin.peserta.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <p class="text-red-500 text-sm mt-2 error" id="error-name"></p>
                        </div>
        
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                            <input type="text" name="nip" id="nip" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" required>
                            <p class="text-red-500 text-sm mt-2 error" id="error-nip"></p>
                        </div>
                    </div>
                    <div class="flex flex-wrap">
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="bag" class="block text-sm font-medium text-gray-700">Bag</label>
                            <input type="text" name="bag" id="bag" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <p class="text-red-500 text-sm mt-2 error" id="error-bag"></p>
                        </div>
        
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="subbag" class="block text-sm font-medium text-gray-700">SubBag</label>
                            <input type="text" name="subbag" id="subbag" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" required>
                            <p class="text-red-500 text-sm mt-2 error" id="error-subbag"></p>
                        </div>
                    </div>
                    <div class="flex flex-wrap">
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="position" class="block text-sm font-medium text-gray-700">Posisi</label>
                            <input type="text" name="position" id="position" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <p class="text-red-500 text-sm mt-2 error" id="error-position"></p>
                        </div>
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="text" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <p class="text-red-500 text-sm mt-2 error" id="error-email"></p>
                        </div>
                    </div>
                </form>
                <div class="flex justify-between gap-6 mt-6 px-3">
                    <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">Close</button>
                    <button id="submitModalBtn" type="button" class="bg-blue-500 text-white px-4 py-2 rounded" onclick="submitForm()">Submit</button>
                </div>
            </div>
        </div>


        <style>
            .loader {
                border-radius: 50%;
                width: 32px;
                height: 32px;
                border-top-color: transparent;
                border-right-color: transparent;
            }
        </style>

    </div>

    @include('admin.partials.import_modal')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JavaScript -->
    <script>
        function openModal() {
            const modal = document.getElementById('createPesertaModal');
            const modalContent = document.getElementById('createPesertaContent');
            
            modal.classList.remove('hidden'); // Show modal
            setTimeout(() => {
                modalContent.classList.remove('scale-90', 'opacity-0'); // Add transition effect
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10); // Delay to trigger transition
        }

        function closeModal() {
            const modal = document.getElementById('createPesertaModal');
            const modalContent = document.getElementById('createPesertaContent');
            
            modalContent.classList.add('scale-90', 'opacity-0'); // Start hiding transition
            modalContent.classList.remove('scale-100', 'opacity-100');

            setTimeout(() => {
                modal.classList.add('hidden'); // Hide modal after transition ends
            }, 300); // Match the duration of the transition
        }

        function submitForm() {
            const form = document.getElementById('pesertaForm');
            const submitButton = document.getElementById('submitModalBtn');

            // Clear previous errors
            document.querySelectorAll('.error').forEach(error => error.innerText = '');

            // Show loading state
            submitButton.innerText = 'Loading...';
            submitButton.disabled = true;

            // Create form data
            const formData = new FormData(form);

            // Send data to server
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => { throw data });
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        }).fire({
                            icon: 'success',
                            title: data.message
                        });
                    setTimeout(() => {
                        window.location.reload();
                    }, 3000);
                }
            })
            .catch(errorData => {
                if (errorData.errors) {
                    Object.keys(errorData.errors).forEach(key => {
                        const errorElement = document.getElementById(`error-${key}`);
                        if (errorElement) errorElement.innerText = errorData.errors[key][0];
                    });
                } else {
                    Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    }).fire({
                        icon: 'error',
                        title: errorData.message || 'An error occurred. Please try again.'
                    });
                }
            })
            .finally(() => {
                submitButton.innerText = 'Submit';
                submitButton.disabled = false;
            });
        }

        // Export Button Click
        document.getElementById('import-button').addEventListener('click', function() {
            document.getElementById('importModal').classList.remove('hidden');
        });

        // Close Modal
        function closePartialModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        function confirmDelete(event) {
                event.preventDefault(); // Mencegah form agar tidak submit secara langsung
                const form = event.target.closest('form'); // Temukan form terdekat
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
