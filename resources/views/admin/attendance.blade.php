<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi Event</title>
    <link rel="icon" href="{{ asset('assets/logo-udinus.png') }}" type="image/x-icon">
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Signature Pad -->
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    <style>
        /* Smooth transition for modal */
        #signaturePadModal {
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-out;
        }
        .hidden {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-20%);
        }
        .visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-500 to-[#003d7a]">

<div class="container mx-auto p-6">
    <!-- Detail Event -->
    <div class="bg-white shadow-lg rounded-lg p-6 mb-6 border-t-4 border-blue-600 flex justify-between">
        <div class="">
            <h2 class="text-xl lg:text-2xl font-bold mb-2 text-blue-800">Absensi Rapat: {{ $event->nomor_rapat }}</h2>
            <p class="text-gray-700 text-sm lg:text-base">{{ $event->hal }} - {{ \Carbon\Carbon::parse($event->tanggal_rapat)->format('d M Y') }}</p>
            <p class="text-gray-600 text-sm lg:text-base">{{ $event->tempat_rapat }} | Jam: {{ $event->jam_rapat }}</p>
        </div>
        <div class="content-center">
            <img src="{{ asset('assets/logo-udinus.png') }}" alt="Logo" class="h-10 w-10 md:h-16 md:w-16 content-center">
        </div>
    </div>

    <!-- Search Bar -->
    <div class="mb-4">
        <input type="text" id="searchInput" class="p-3 rounded-lg border border-gray-300 w-full" placeholder="Cari peserta..." onkeyup="searchParticipant()">
    </div>

    <!-- Tabel Peserta -->
    <div class="overflow-x-auto rounded">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-2 px-4">Nama Peserta</th>
                    <th class="py-2 px-4">Jabatan</th>
                    <th class="py-2 px-4">Hadir</th>
                    <th class="py-2 px-4">TTD</th>
                </tr>
            </thead>
            <tbody id="participantTable">
                @foreach($event->pesertas as $participant)
                <tr class="border-b">
                    <td class="py-3 px-4 participant-name">{{ $participant->name }}</td>
                    <td class="py-3 px-4">{{ $participant->position }}</td>
                    <td class="py-3 px-4">
                        @if($participant->pivot->is_present == 1)
                            <svg class="h-6 w-6 text-green-500 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                        @endif
                    </td>
                    <td class="py-3 px-4">
                        @if($participant->pivot->signature)
                            <img src="{{ $participant->pivot->signature }}" alt="Signature" class="h-10 w-auto border border-gray-300 rounded">
                        @else
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200"
                                    data-participant-id="{{ $participant->id }}" 
                                    data-name="{{ $participant->name }}"
                                    data-nip="{{ $participant->nip }}"
                                    onclick="openSignaturePad(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
                                        <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086z"/>
                                    </svg>
                                      Sign</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Signature Pad -->
    <div id="signaturePadModal" class="fixed z-10 inset-0 overflow-y-auto hidden bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white p-6 rounded-lg shadow-lg relative max-w-md w-full overflow-auto">
                <button class="absolute top-2 right-2 text-red-500" onclick="closeModal()">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <div class="flex flex-wrap">
                    <div class="mb-6 px-1 w-full lg:w-1/2">
                        <label for="event_name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" value="{{  $participant->name  }}"
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" disabled>
                    </div>
        
                    <div class="mb-6 px-1 w-full lg:w-1/2">
                        <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" name="nip" id="nip" value="{{  $participant->nip  }}"
                            class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" disabled >
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <label for="signature" class="block text-sm font-medium text-gray-700 mb-6">Tanda tangan</label>
                    <canvas id="signaturePad" width="300" height="150" class="border rounded-md border-gray-300 mb-6 px-3"></canvas>
                </div>
                <div class="mt-4 space-x-2">
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200" onclick="clearSignature()">Clear</button>
                    <button class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-200" onclick="saveSignature()">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let signaturePad;
    let selectedParticipantId = null;

    document.addEventListener("DOMContentLoaded", function() {
        const canvas = document.getElementById('signaturePad');
        signaturePad = new SignaturePad(canvas);
    });

    function openSignaturePad(button) {
        // Ambil data dari atribut tombol
        const participantId = button.getAttribute('data-participant-id');
        const participantName = button.getAttribute('data-name');
        const participantNIP = button.getAttribute('data-nip');

        // Set participantId globally (if needed for saving signature)
        selectedParticipantId = participantId;

        // Isi input modal dengan nama dan NIP yang sesuai
        document.getElementById('name').value = participantName;
        document.getElementById('nip').value = participantNIP;

        // Tampilkan modal
        const modal = document.getElementById('signaturePadModal');
        modal.classList.remove('hidden');
        setTimeout(() => modal.classList.add('visible'), 10); // Smooth transition
    }

    function clearSignature() {
        signaturePad.clear();
    }

    function closeModal() {
        const modal = document.getElementById('signaturePadModal');
        modal.classList.remove('visible');
        setTimeout(() => modal.classList.add('hidden'), 100); // Smooth close transition
    }

    function saveSignature() {
        if (signaturePad.isEmpty()) {
            alert("Please provide a signature first.");
            return;
        }

        const signature = signaturePad.toDataURL(); // Get signature image as base64

        $.ajax({
            url: "{{ route('admin.saveSignature', $event->uuid) }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                peserta_id: selectedParticipantId,
                signature: signature
            },
            success: function(response) {
                location.reload();  // Reload page after saving signature
            }
        });
    }

    // Search function
    function searchParticipant() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#participantTable tr');

        rows.forEach(row => {
            const name = row.querySelector('.participant-name').innerText.toLowerCase();
            row.style.display = name.includes(input) ? '' : 'none';
        });
    }
</script>

</body>
</html>
