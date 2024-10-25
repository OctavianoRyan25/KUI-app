@extends('admin.layout')
@section('title', 'Add Event')
@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-3xl font-bold mb-8 text-center text-[#003d7a]">Create New Event</h2>
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.event.store') }}" method="POST" class="w-full mx-auto bg-white p-8 rounded-lg shadow-lg">
        @csrf
        <div class="flex flex-wrap">
            <div class="mb-6 px-3 w-full lg:w-1/2">
                <label for="event_name" class="block text-sm font-medium text-gray-700">Nama Rapat</label>
                <input type="text" name="event_name" id="event_name" 
                    class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                    required aria-required="true">
                @error('nomor_rapat')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 px-3 w-full lg:w-1/2">
                <label for="nomor_rapat" class="block text-sm font-medium text-gray-700">Nomor Rapat</label>
                <input type="text" name="nomor_rapat" id="nomor_rapat" 
                    class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                    required aria-required="true">
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
                    required aria-required="true">
                @error('hal')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 px-3 w-full lg:w-1/3">
                <label for="responsible" class="block text-sm font-medium text-gray-700">Penanggungjawab</label>
                <input type="text" name="responsible" id="responsible" 
                    class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                    required aria-required="true">
                @error('responsible')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 px-3 w-full lg:w-1/3">
                <label for="kepada" class="block text-sm font-medium text-gray-700">Kepada</label>
                <input type="text" name="kepada" id="kepada" 
                    class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                    required aria-required="true">
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
                    required aria-required="true">
                @error('tanggal_rapat')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6 px-3 w-full lg:w-1/3">
                <label for="tempat_rapat" class="block text-sm font-medium text-gray-700">Tempat rapat</label>
                <input type="text" name="tempat_rapat" id="tempat_rapat" 
                    class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                    required aria-required="true">
                @error('tempat_rapat')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 px-3 w-full lg:w-1/12">
                <label for="jam_rapat" class="block text-sm font-medium text-gray-700">Jam rapat</label>
                <input type="time" name="jam_rapat" id="jam_rapat" 
                    class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                    placeholder="e.g., 08.00-selesai" 
                    required aria-required="true">
                @error('jam_rapat')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Live search participant -->
        <div class="mb-6">
            <label for="participant-search" class="block text-sm font-medium text-gray-700">Cari Peserta</label>
            <input type="text" id="participant-search" placeholder="Search for participants..." 
                class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2">
            <small class="text-gray-500 block mt-2">Minimal 3 karakter untuk mencari peserta</small>

            <div class="mt-4" id="search-results" style="display: none;">
                <p id="search-message"></p>
                <ul class="border border-gray-300 rounded-md shadow-md max-h-40 overflow-y-auto" id="results-list">
                    <!-- Search results will be appended here -->
                </ul>
            </div>

            <div class="mt-4">
                @error('peserta')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
                <h4 class="font-semibold">Peserta Terpilih:</h4>
                <ul id="selected-participants" class="space-y-2">
                    <!-- Selected participants will be appended here -->
                </ul>
            </div>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.event') }}" class="bg-red-500 text-white px-5 py-3 rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-[#003d7a] focus:ring-offset-2 transition duration-200 hover:ease-in-out hover:scale-105 font-bold">
                Cancel
            </a>
            <button type="submit" class="bg-[#003d7a] text-white px-5 py-3 rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-[#003d7a] focus:ring-offset-2 transition duration-200 hover:ease-in-out hover:scale-105 font-bold">
                Create rapat
            </button>
        </div>
    </form>
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
@endsection
