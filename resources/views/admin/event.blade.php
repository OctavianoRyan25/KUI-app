@extends('admin.layout')
@section('title', 'Event')
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

        
        {{-- Create Event Button --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('admin.event.showForm') }}" id="openModalBtn" class="bg-blue-800 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                Create Event
            </a>
        </div>

        {{-- Table Event --}}
        <div class="overflow-x-auto bg-white shadow overflow-y-auto relative mt-4 rounded-md">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-[#003d7a]">
                    <tr>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">No</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Nomor Rapat</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Hal</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Tempat</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Tanggal Rapat</th>
                        <th class="py-3 px-6 text-center text-sm font-medium text-white uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($events as $index => $event)
                        <tr class="hover:bg-gray-100 transition duration-200">
                            <td class="py-2 px-3 text-center">{{ $events->firstItem() + $index }}</td>
                            <td class="py-2 px-3 text-center">{{ $event->nomor_rapat }}</td>
                            <td class="py-2 px-3 text-center">{{ $event->hal }}</td>
                            <td class="py-2 px-3 text-center">{{ $event->tempat_rapat }}</td>
                            <td class="py-2 px-3 text-center">{{ \Carbon\Carbon::parse($event->tanggal_rapat)->format('d M Y') }}</td>
                            <td class="py-2 px-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Show QR code --}}
                                    <button onclick="openModal('{{ route('admin.event.qrCode', $event->uuid) }}')" class="text-blue-600 inline-flex transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                            <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z"/>
                                            <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z"/>
                                            <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z"/>
                                            <path d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z"/>
                                            <path d="M12 9h2V8h-2z"/>
                                        </svg>
                                    </button>
                                    {{-- Show Data --}}
                                    <a href="{{ route('admin.event.show', $event->id) }}" class="text-yellow-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                        </svg>
                                    </a>
                                    {{-- Edit Data --}}
                                    <a href="{{ route('admin.event.edit', $event->id) }}" class="text-blue-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.event.delete', $event->id) }}" method="POST" class="inline-block transition duration-300 hover:scale-110">
                                        @csrf
                                        @method('DELETE')
                                        <button id="buttonDeleteEvent" onclick="confirmDelete(event)" type="button" class="text-red-600 deleteEvent">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                            </svg>
                                        </button>
                                    </form>
                                    {{-- Show by UUID --}}
                                    <a href="{{ route('admin.attendance', $event->uuid) }}" class="text-blue-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                        </svg>
                                    </a>
                                    {{-- Notulensi --}}
                                    <a href="" class="text-green-600 transition duration-300 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Link pagination --}}
        <div class="mt-4">
            {{ $events->links() }}
        </div>

        <!-- Modal -->
        <div id="qrModal" class="fixed inset-0 hidden items-center justify-center bg-gray-900 bg-opacity-50 flex transition-opacity duration-300">
            <div class="bg-white p-6 rounded-lg shadow-lg transform transition-all duration-300 scale-90 opacity-0" id="qrModalContent">
                <h2 class="text-xl font-bold mb-4">QR Code</h2>
                <!-- Loader (Spinner) -->
                <div id="qrLoader" class="flex justify-center items-center">
                    <div class="loader border-t-transparent border-4 border-blue-500 border-solid rounded-full w-8 h-8 animate-spin"></div>
                </div>
                <div class="flex justify-center mb-4">
                    <img id="qrImage" src="" alt="QR Code" class="max-w-full max-h-[300px]">
                </div>
                <div class="flex justify-between gap-6">
                    <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded">Close</button>
                    <button onclick="printQRCode()" class="bg-blue-500 text-white px-4 py-2 rounded">Print</button>
                </div>
                <div id="qrLoader" class="hidden mt-4 text-center">
                    <div class="loader"></div> <!-- You can add your loader animation here -->
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

            // document.querySelectorAll('.deleteEvent').forEach(button => {
            //     console.log('Delete button found');
                
            //     button.addEventListener('click', function (e) {
            //         console.log('Delete button clicked');
                    
            //         e.preventDefault();
            //         Swal.fire({
            //             title: 'Are you sure?',
            //             text: "You won't be able to revert this!",
            //             icon: 'warning',
            //             showCancelButton: true,
            //             confirmButtonColor: '#3085d6',
            //             cancelButtonColor: '#d33',
            //             confirmButtonText: 'Yes, delete it!'
            //         }).then((result) => {
            //             if (result.isConfirmed) {
            //                 console.log('Form submitted');
            //                 e.target.closest('form').submit();
            //             }
            //         });
            //     });
            // });

        });
    </script>
    <!-- JavaScript -->
    <script>
        function openModal(qrCodeUrl) {
            const modal = document.getElementById('qrModal');
            const modalContent = document.getElementById('qrModalContent');
            const qrImage = document.getElementById('qrImage');
            const qrLoader = document.getElementById('qrLoader');
            
            // Show modal and loader first
            qrImage.classList.add('hidden');
            qrLoader.classList.remove('hidden');
            
            modal.classList.remove('hidden'); // Show modal
            setTimeout(() => {
                modalContent.classList.remove('scale-90', 'opacity-0'); // Add transition effect
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10); // Delay to trigger transition

            // Fetch QR code as Blob (binary data for the image)
            fetch(qrCodeUrl)
                .then(response => response.blob()) // Fetching the response as a Blob
                .then(blob => {
                    const qrCodeUrl = URL.createObjectURL(blob); // Convert blob to an object URL
                    qrImage.src = qrCodeUrl; // Set the QR Code image URL from the blob
                    qrLoader.classList.add('hidden'); // Hide loader
                    qrImage.classList.remove('hidden'); // Show QR image
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to load QR Code!',
                    });
                    qrLoader.classList.add('hidden'); // Hide loader in case of error
                });
        }

        function closeModal() {
            const modal = document.getElementById('qrModal');
            const modalContent = document.getElementById('qrModalContent');
            
            modalContent.classList.add('scale-90', 'opacity-0'); // Start hiding transition
            modalContent.classList.remove('scale-100', 'opacity-100');

            setTimeout(() => {
                modal.classList.add('hidden'); // Hide modal after transition ends
            }, 300); // Match the duration of the transition
        }

        function printQRCode() {
            const qrImage = document.getElementById('qrImage').src;
            print(qrImage);
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
