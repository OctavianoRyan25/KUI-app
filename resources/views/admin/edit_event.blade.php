@extends('admin.layout')
@section('title', 'Edit Event')
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
    <li class="inline-flex items-center">
        <a href="{{ route('admin.event') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            Events
        </a>
    </li>
    <li>
        <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ $event->nomor_rapat }}</span>
        </div>
    </li>
    </ol>
</nav>  

<div class="container mx-auto p-6">
    <h1 class="text-xl lg:text-2xl px-3 font-semibold mb-4">Edit Detail Event {{ $event->event_name }}</h1>
    <div class="bg-white rounded p-6">
        <form action="{{ route('admin.event.update', $event->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap">
                <div class="mb-6 px-3 w-full lg:w-1/2">
                    <label for="event_name" class="block text-sm font-medium text-gray-700">Nama Rapat</label>
                    <input type="text" name="event_name" id="event_name" 
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        required aria-required="true" value="{{ $event->event_name }}">
                    @error('event_name')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 px-3 w-full lg:w-1/2">
                    <label for="nomor_rapat" class="block text-sm font-medium text-gray-700">Nomor Rapat</label>
                    <input type="text" name="nomor_rapat" id="nomor_rapat" 
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        required aria-required="true" value="{{ $event->nomor_rapat }}">
                    @error('nomor_rapat')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="mb-6 px-3 w-full lg:w-1/3">
                    <label for="hal" class="block text-sm font-medium text-gray-700">Hal</label>
                    <input type="text" name="hal" id="hal" 
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        required aria-required="true" value="{{ $event->hal }}">
                    @error('hal')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 px-3 w-full lg:w-1/3">
                    <label for="responsible" class="block text-sm font-medium text-gray-700">Penanggungjawab</label>
                    <input type="text" name="responsible" id="responsible" 
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        required aria-required="true" value="{{ $event->responsible }}">
                    @error('responsible')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 px-3 w-full lg:w-1/3">
                    <label for="kepada" class="block text-sm font-medium text-gray-700">Kepada</label>
                    <input type="text" name="kepada" id="kepada" 
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        required aria-required="true" value="{{ $event->kepada }}">
                    @error('kepada')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="mb-6 px-3 w-full lg:w-1/3">
                    <label for="tanggal_rapat" class="block text-sm font-medium text-gray-700">Tanggal rapat</label>
                    <input type="date" name="tanggal_rapat" id="tanggal_rapat" 
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        required aria-required="true" value="{{ $event->tanggal_rapat }}">
                    @error('tanggal_rapat')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
        
                <div class="mb-6 px-3 w-full lg:w-1/3">
                    <label for="tempat_rapat" class="block text-sm font-medium text-gray-700">Tempat rapat</label>
                    <input type="text" name="tempat_rapat" id="tempat_rapat" 
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        required aria-required="true" value="{{ $event->tempat_rapat }}">
                    @error('tempat_rapat')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 px-3 w-full lg:w-1/12">
                    <label for="jam_rapat" class="block text-sm font-medium text-gray-700">Jam rapat</label>
                    <input type="time" name="jam_rapat" id="jam_rapat" 
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        placeholder="e.g., 08.00" 
                        required aria-required="true" value="{{ $event->jam_rapat }}">
                    @error('jam_rapat')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.event') }}" class="bg-red-500 text-white px-5 py-3 rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-[#003d7a] focus:ring-offset-2 transition duration-200 hover:ease-in-out hover:scale-105 font-bold">
                    Cancel
                </a>
                <button type="submit" class="bg-[#003d7a] text-white px-5 py-3 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-[#003d7a] focus:ring-offset-2 transition duration-200 hover:ease-in-out hover:scale-105 font-bold">
                    Update Event
                </button>
            </div>

            
        </form>
    </div>

    {{-- Edit Peserta --}}
    <div class="bg-white rounded p-6 mt-6">
        <h2 class="text-xl font-semibold mb-4">Edit Peserta Rapat</h2>
        <form action="{{ route('admin.pesertaRapat.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="flex flex-wrap">
                <div class="px-3 w-full lg:w-1/2">
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <label for="peserta" class="block text-sm font-medium text-gray-700">Tambah Peserta</label>
                    <input type="text" name="peserta" id="participant-search" 
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                        placeholder="Nama peserta">
                    @error('peserta')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-4 px-3" id="search-results" style="display: none;">
                <p id="search-message"></p>
                <ul class="border border-gray-300 rounded-md shadow-md max-h-40 overflow-y-auto" id="results-list">
                    <!-- Search results will be appended here -->
                </ul>
            </div>

            <div class="mt-4 px-3">
                @error('peserta')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
                <h4 class="font-semibold">Peserta Terpilih:</h4>
                <ul id="selected-participants" class="space-y-2">
                    <!-- Selected participants will be appended here -->
                </ul>
            </div>

            <div class="flex justify-end gap-2">
                <button type="submit" class="bg-[#003d7a] text-white px-5 py-3 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-[#003d7a] focus:ring-offset-2 transition duration-200 hover:ease-in-out hover:scale-105 font-bold">
                    Tambah Peserta
                </button>
            </div>
        </form>

        <div class="mt-6">
            <table class="w-full border border-gray-300 rounded-md">
                <thead class="">
                    <tr class="bg-[#003d7a] text-white">
                        <th class="border border-gray-300 px-3 py-2">No</th>
                        <th class="border border-gray-300 px-3 py-2">Nama Peserta</th>
                        <th class="border border-gray-300 px-3 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->pesertas as $index => $peserta)
                        <tr>
                            <td class="border border-gray-300 px-3 py-2">{{ 1 + $index }}</td>
                            <td class="border border-gray-300 px-3 py-2">{{ $peserta->name }}</td>
                            <td class="border border-gray-300 px-3 py-2">
                                <form action="{{ route('admin.pesertaRapat.delete', $peserta->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-[#003d7a] focus:ring-offset-2 transition duration-200 hover:ease-in-out hover:scale-105 font-bold">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
        let selectedParticipants = [];

        // Handle live search
        $('#participant-search').on('input', function() {
            let query = $(this).val();

            if (query.length > 1) {
                $.ajax({
                    url: '{{ route('admin.searchPeserta') }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(data) {
                        $('#results-list').empty(); // Clear previous results
                        $('#search-message').empty(); // Clear previous messages
                        if (data.length > 0) {
                            $('#search-results').show();
                            data.forEach(function(participant) {
                                $('#results-list').append(
                                    `<li class="p-2 cursor-pointer hover:bg-gray-100" 
                                        data-id="${participant.id}" data-name="${participant.name}" data-email="${participant.position}">
                                        ${participant.name} - ${participant.position}
                                    </li>`
                                );
                            });
                        } else {
                            $('#search-results').show(); // Show search results box
                            $('#search-message').html('<div class="p-2 text-gray-500">Peserta tidak ditemukan</div>');
                        }
                    },
                    error: function() {
                        $('#search-results').show();
                        $('#search-message').html('<div class="p-2 text-red-500">Error saat mencari peserta</div>');
                    }
                });
            } else {
                $('#search-results').hide(); // Hide search results box if query is too short
            }
        });

        // Handle selecting a participant
        $(document).on('click', '#results-list li', function() {
            let id = $(this).data('id');
            let name = $(this).data('name');
            let email = $(this).data('email');
            let counter = 0;

            if (id && !selectedParticipants.includes(id)) {
                selectedParticipants.push(id);

                $('#selected-participants').append(
                    `<li class="flex justify-between items-center">
                        <input type="hidden" name="peserta[]" value="${id}">
                        ${name} - ${email}
                        <button type="button" class="text-red-500 ml-2 remove-participant" data-id="${id}">Remove</button>
                    </li>`
                );
            }

            $('#participant-search').val(''); // Clear input after selecting
            $('#search-results').hide(); // Hide search results after selection
        });

        // Handle removing a selected participant
        $(document).on('click', '.remove-participant', function() {
            let id = $(this).data('id');
            selectedParticipants = selectedParticipants.filter(function(pid) {
                return pid !== id;
            });
            $(this).parent().remove();
        });
    });
    </script>
</div>

@endsection
