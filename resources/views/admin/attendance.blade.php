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
    <div class="flex flex-wrap justify-between">
        <div class="mb-4 w-full lg:w-5/6 ">
            <input type="text" id="searchInput" class="p-3 rounded-lg border border-blue-300 w-full active:border-blue-900" placeholder="Cari peserta..." onkeyup="searchParticipant()">
        </div>
        <div class="mb-4 w-full lg:w-1/6 flex justify-end">
            <div class="w-full lg:ms-3 text-center">
                <a class="bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition duration-200 inline-flex w-full justify-center" href="{{ route('admin.notulensi',$event->note->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" class="bi bi-file-earmark-post" viewBox="0 0 16 16">
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z"/>
                        <path d="M4 6.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5H7a.5.5 0 0 1 0 1H4.5a.5.5 0 0 1-.5-.5"/>
                    </svg>
                    Notulensi
                </a>
            </div>
        </div>
    </div>
    

    <!-- Tabel Peserta -->
    <div class="overflow-x-auto rounded">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-2 px-4">Nama Peserta</th>
                    <th class="py-2 px-4">Posisi</th>
                    <th class="py-2 px-4">Hadir</th>
                    <th class="py-2 px-4">TTD</th>
                </tr>
            </thead>
            <tbody id="participantTable">
                @foreach($event->pesertas as $participant)
                <tr class="border-b">
                    <td class="py-3 px-4 text-center text-xs md:text-base participant-name">{{ $participant->name }}</td>
                    <td class="py-3 text-center text-xs md:text-base px-4">
                        @if($participant->position)
                            {{ $participant->position }}
                        @else
                        <span class="text-red-500 flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                                <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                            </svg>
                        </span>
                        @endif
                    </td>
                    <td class="py-3 justify-items-center px-4">
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
                    <td class="py-3 px-4 justify-items-center items-center">
                        @if($participant->pivot->signature)
                            <img src="{{ $participant->pivot->signature }}" draggable="false" oncontextmenu="return false;" alt="Signature" class="h-10 w-auto border border-gray-300 rounded">
                        @else
                        <div class="flex justify-center">
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200"
                                    data-participant-id="{{ $participant->id }}" 
                                    data-name="{{ $participant->name }}"
                                    data-nip="{{ $participant->nip }}"
                                    onclick="openSignaturePad(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-flex" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
                                        <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086z"/>
                                    </svg>
                                Sign
                            </button>
                        </div>
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
                    <label for="signature" class="block text-sm font-medium text-gray-700 mb-3">Tanda tangan</label>
                    <p class="text-sm text-red-500 bg-red-50 border border-red-200 rounded-md px-3 py-2 w-full mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 me-1" fill="currentColor" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        <span class="font-semibold">Perhatian:</span> Tanda tangan hanya dapat dilakukan sekali
                    </p>
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
