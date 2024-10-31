@extends('admin.layout')
@section('title', 'Detail Notulensi')
@section('content')
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin: 0 auto;
        margin-bottom: 1rem;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #4CAF50; /* Warna background header */
        color: white; /* Warna teks header */
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
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
    <li class="inline-flex items-center">
        <a href="{{ route('admin.event') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        Notulensi
        </a>
    </li>
    <li>
        <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ $note->event->nomor_rapat }}</span>
        </div>
    </li>
    </ol>
</nav>
<div class="container mx-auto w-full px-4 py-8">
    
    <div class="flex justify-center mt-8">
        <div class="w-full">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="row justify-start">
                    <div class="col-md-12 px-3">
                        <img src="{{ asset('assets/logo-udinus.png') }}" class="font-bold text-3xl text-start h-16 w-16"></img>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="font-bold text-3xl text-center">Detail Notulensi</h1>
                    </div>
                </div>
                <div class="flex flex-wrap mt-6">
                    <div class="mb-6 px-3 w-full lg:w-1/2">
                        <label for="event_name" class="block text-sm font-medium text-gray-700">Nama Rapat</label>
                        <input type="text" name="event_name" id="event_name" 
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                            required aria-required="true" value="{{ $note->event->event_name }}" readonly disabled>
                    </div>
        
                    <div class="mb-6 px-3 w-full lg:w-1/2">
                        <label for="tempat_rapat" class="block text-sm font-medium text-gray-700">Tempat/Media Rapat</label>
                        <input type="text" name="tempat_rapat" id="tempat_rapat" 
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                            required aria-required="true" value="{{ $note->event->tempat_rapat }}" readonly disabled>
                    </div>
                </div>
                
                <div class="flex flex-wrap mt-1">
                    <div class="mb-6 px-3 w-full">
                        <label for="hal" class="block text-sm font-medium text-gray-700">Perihal</label>
                        <input type="text" name="hal" id="hal" 
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                            required aria-required="true" value="{{ $note->event->hal }}" readonly disabled>
                    </div>
                </div>
                {{-- batas --}}
                <!-- Content section with Edit functionality -->
                <div class="mb-3 px-3 w-full">
                    <label for="content" class="block text-sm font-medium text-gray-700">Konten</label>
                    <textarea name="content" id="content" 
                        class="hidden mt-2 w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        readonly>{!! $note->content !!}</textarea>
                        <div class="w-full" id="div-content">
                            {!! $note->content !!}
                        </div>
                        
                </div>
                
                <!-- Edit / Save button -->
                <div class="inline-flex gap-3 mx-3">
                    <div class="mb-6 flex">
                        <button id="editButton" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="mb-6 flex">
                        <button id="cancelButton" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-700 transition duration-200 hidden">Cancel</button>
                    </div>
                </div>
                {{-- batas --}}
                <div class="mb-6 flex justify-between">
                    <div class="">
                        <p class="mb-6 px-3 inline-flex font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 me-1 text-green-500" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                            </svg> Hadir :{{ $present }}
                        </p>
                        <p class="mb-6 px-3 inline-flex font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 me-1 text-red-500" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                            </svg>
                            Tidak Hadir :{{ $no_present }}</p>
                        <p class="mb-6 px-3 inline-flex font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 me-1 text-blue-500" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                            </svg>
                            Total :{{ $total_participant }}</p>
                    </div>
                    <div class="">
                        <p class="mb-6 px-3">Semarang, {{ \Carbon\Carbon::parse($note->event->tanggal_rapat)->format('d M Y') }}</p>
                        <p class="mb-6 px-3 text-center">{{ $note->event->responsible }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let originalContent = `{!! $note->content !!}`;
    let isEditing = false;
    const divContent = document.getElementById('div-content');

    // Toggle Edit/Save Functionality
    document.getElementById('editButton').addEventListener('click', function() {
        const contentElement = document.getElementById('content');
        const cancelButton = document.getElementById('cancelButton');

        if (!isEditing) {
            CKEDITOR.replace('content');  // Initialize CKEditor
            this.textContent = 'Save';
            cancelButton.classList.remove('hidden');
            divContent.classList.add('hidden');
            contentElement.removeAttribute('readonly');
            isEditing = true;
        } else {
            // Save content via AJAX
            CKEDITOR.instances.content.updateElement();
            const updatedContent = document.getElementById('content').value;

            fetch('{{ route('admin.note.update', $note->id) }}', {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ content: updatedContent })
            }).then(response => {
                if (response.ok) {
                    Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    }).fire({
                        icon: 'success',
                        title: 'Konten berhasil disimpan'
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                } else {
                    Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    }).fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan saat menyimpan konten'
                    });
                }
            });
        }
    });

    // Cancel Editing
    document.getElementById('cancelButton').addEventListener('click', function() {
        if (isEditing) {
            CKEDITOR.instances.content.setData(originalContent);  
            CKEDITOR.instances.content.destroy();  
            document.getElementById('editButton').innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>`;
            this.classList.add('hidden');
            document.getElementById('content').setAttribute('readonly', true);
            divContent.classList.remove('hidden');
            isEditing = false;
        }
    });
</script>
@endsection
