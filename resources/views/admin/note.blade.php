<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notulensi</title>
    <link rel="icon" href="{{ asset('assets/logo-udinus.png') }}" type="image/x-icon">
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <style>
        .scrollable-table {
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            margin-bottom: 1rem;
            min-width: 100%;
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

        /* Make text smaller on mobile */
        @media (max-width: 768px) {
            th, td {
                font-size: 0.85rem; /* Smaller font size for mobile */
            }
        }

        /* Print styling */
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
            body * {
                visibility: hidden;
            }
            .container, .container * {
                visibility: visible;
            }
            .container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
            .print-button {
                display: none;
            }
            table, th, td {
                max-width: 100%;
                word-break: break-word;
                white-space: normal;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-r from-blue-500 to-[#003d7a]">
    <div class="container mx-auto w-full px-4 py-8">
        <!-- Print Button -->
        {{-- <div class="flex justify-end mb-4">
            <button onclick="printDocument()" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700">
                Print
            </button>
        </div> --}}
        <div class="flex justify-center mt-8">
            <div class="w-full" id="notulensi">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="row justify-start">
                        <div class="col-md-12 px-3">
                            <img src="{{ asset('assets/logo-udinus.png') }}" class="font-bold text-3xl text-start h-10 w-10 md:h-16 md:w-16"></img>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="font-bold text-xl lg:text-3xl text-center">Detail Notulensi</h1>
                        </div>
                    </div>
                    <div class="flex flex-wrap mt-6">
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="event_name" class="block text-sm md:text-base font-medium text-gray-700">Nama Rapat</label>
                            <input type="text" name="event_name" id="event_name" 
                                class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm text-sm md:text-base focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                                required aria-required="true" value="{{ $note->event->event_name }}" readonly disabled>
                        </div>
            
                        <div class="mb-6 px-3 w-full lg:w-1/2">
                            <label for="tempat_rapat" class="block text-sm md:text-base font-medium text-gray-700">Tempat/Media Rapat</label>
                            <input type="text" name="tempat_rapat" id="tempat_rapat" 
                                class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm text-sm md:text-base focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                                required aria-required="true" value="{{ $note->event->tempat_rapat }}" readonly disabled>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap mt-1">
                        <div class="mb-6 px-3 w-full">
                            <label for="hal" class="block text-sm md:text-base font-medium text-gray-700">Perihal</label>
                            <input type="text" name="hal" id="hal" 
                                class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm text-sm md:text-base focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                                required aria-required="true" value="{{ $note->event->hal }}" readonly disabled>
                        </div>
                    </div>
                    {{-- batas --}}
                    <!-- Content section with Edit functionality -->
                    <div class="mb-3 px-3 w-full">
                        <label for="content" class="block text-sm md:text-base font-medium text-gray-700">Konten</label>
                        <textarea name="content" id="content" 
                            class="hidden mt-2 w-full rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2" 
                            readonly>{!! $note->content !!}</textarea>
                            <div class="w-full" id="div-content" class="text-sm bg-white rounded-lg shadow-lg p-6">
                                {!! $note->content !!}
                            </div>
                            
                    </div>
                    
                    {{-- batas --}}
                    <div class="mb-6 flex justify-between">
                        <div class="">
                            <p class="md:mb-6 px-3 inline-flex font-semibold text-xs md:text-base">
                                <svg xmlns="http://www.w3.org/2000/svg" class="md:h-6 md:w-6 h-4 w-4 me-1 text-green-500" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                    <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                </svg> <span class="text-xs md:text-base">Hadir :{{ $present }}</span>
                            </p>
                            <p class="md:mb-6 px-3 inline-flex font-semibold text-xs md:text-base">
                                <svg xmlns="http://www.w3.org/2000/svg" class="md:h-6 md:w-6 h-4 w-4 me-1 text-red-500" fill="currentColor" class="bi bi-person-dash" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1m0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                    <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                </svg>
                                <span class="text-xs md:text-base">Tidak Hadir :{{ $no_present }}</span>
                                </p>
                            <p class="md:mb-6 px-3 inline-flex font-semibold text-xs md:text-base">
                                <svg xmlns="http://www.w3.org/2000/svg" class="md:h-6 md:w-6 h-4 w-4 me-1 text-blue-500" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                </svg>
                                <span class="text-xs md:text-base">Total :{{ $total_participant }}</span>
                            </p>
                        </div>
                        <div class="">
                            <p class="mb-6 px-3 text-center text-xs md:text-base">Semarang, {{ \Carbon\Carbon::parse($note->event->tanggal_rapat)->format('d M Y') }}</p>
                            <p class="mb-6 px-3 text-center text-xs md:text-base">{{ $note->event->responsible }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Find all tables within the content and wrap them in a scrollable div
            document.querySelectorAll('.bg-white table').forEach(table => {
                const wrapper = document.createElement('div');
                wrapper.classList.add('scrollable-table');
                table.parentNode.insertBefore(wrapper, table);
                wrapper.appendChild(table);
            });
        });

        function printDocument() {
            window.print();
        }
    </script>
</body>
</html>