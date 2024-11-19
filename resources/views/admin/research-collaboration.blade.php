@extends('admin.layout')
@section('title', 'Research Collaboration')
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
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Research Collaboration</span>
            </div>
        </li>
        </ol>
    </nav>  
    <div class="container mx-auto w-full px-4 py-8">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-bold text-3xl">Kolaborasi Penelitian</h1>
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
        <div class="flex justify-end mb-6">
            <a href="/research-collaboration-reporting" id="openModalBtn" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Form
            </a>
        </div>

        {{-- Table Reseach Collaboration --}}
        <div class="overflow-x-auto bg-white shadow overflow-y-auto relative mt-4 rounded-md">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#003d7a]">
                    <tr>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">No</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Koresponden</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Prodi</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Nama</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Email</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Universitas</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($researches as $index => $research)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="py-2 px-3 text-center">{{ $researches->firstItem() + $index }}</td>
                            <td class="py-2 px-3 text-center">{{ $research->correspondence }}</td>
                            <td class="py-2 px-3 text-center">{{ $research->study_program }}</td>
                            <td class="py-2 px-3 text-center">{{ $research->name }}</td>
                            <td class="py-2 px-3 text-center">{{ $research->email }}</td>
                            <td class="py-2 px-3 text-center">{{ $research->university }}</td>
                            <td class="py-2 px-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Show Data --}}
                                    <a href="{{ route('admin.researchCollaboration.show', $research->id) }}" class="text-yellow-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                        </svg>
                                    </a>
                                    {{-- Edit Data --}}
                                    <a href="" class="text-blue-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </a>
                                    {{-- Download data --}}
                                    <a href="{{ Storage::url(str_replace('public/', '', $research->path)) }}" class="text-green-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5 bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.researchCollaboration.delete', $research->id) }}" method="POST" class="inline-block transition duration-300 hover:scale-110">
                                        @csrf
                                        @method('DELETE')
                                        <button id="buttonDeleteEvent" onclick="confirmDelete(event)" type="button" class="text-red-600 deleteEvent">
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

        {{-- Link pagination --}}
        <div class="mt-4">
            {{ $researches->links() }}
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const openModalBtn = document.getElementById('openModalBtn');
            const closeModalBtn = document.getElementById('closeModalBtn');
            const eventModal = document.getElementById('eventModal');
            const submitModalBtn = document.getElementById('submitModalBtn');
            const spinner = document.getElementById('spinner');
            const createEventForm = document.getElementById('createEvent');
            const deleteEvent = document.getElementById('buttonDeleteEvent');

            // Open modal when the button is clicked
            openModalBtn.addEventListener('click', function () {
                eventModal.classList.remove('hidden');
                eventModal.classList.remove('opacity-0', 'scale-95');
                eventModal.classList.add('opacity-100', 'scale-100');
            });

            // Close modal when the close button is clicked
            closeModalBtn.addEventListener('click', function () {
                eventModal.classList.add('opacity-0');
                setTimeout(() => {
                    eventModal.classList.add('hidden');
                }, 100); // Delay to allow the transition to complete
            });

        });
    </script>
    <!-- JavaScript -->
    <script>

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
