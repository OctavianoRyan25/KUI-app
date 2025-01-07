@extends('admin.layout')

@section('title', 'MoU')
@section('content')
    {{-- * breadcrumbs navigation start --}}
    <nav class="container w-full mx-auto pt-8 px-4 flex" aria-label="Breadcrumb">
        <ul class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="text-gray-700 inline-flex items-center text-sm font-medium hover:text-blue-600">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="text-gray-400 w-3 h-3 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('admin.kerjaSama.index') }}">
                        <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">Kerja Sama</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="text-gray-400 w-3 h-3 mx-1 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ route('admin.mou.index') }}">
                        <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">MoU</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    {{-- * breadcrumbs navigation end --}}

    {{-- * main start --}}
    <main class="container w-full mx-auto py-8 px-4">
        {{-- ? header start --}}
        <header class="mb-4">
            <h1 class="text-3xl font-bold">Memorandum of Understanding</h1>
        </header>
        {{-- ? header end --}}
        {{-- ? success alert start --}}
        @if (session()->has('success'))
            <div class="bg-green-100 text-green-700 mb-4 py-3 px-4 border border-green-400 rounded-md" role="alert">
                <strong>Success!</strong>
                {{ session('success') }}
            </div>
        @endif
        {{-- ? success alert end --}}
        {{-- ? tambah mitra button start --}}
        <div class="flex flex-col justify-between md:flex-row">
            <form action="{{ route('admin.mou.index') }}" class="relative">
                <input type="search" name="search" id="search" placeholder="Cari nama mou..."
                    value="{{ request('search') }}"
                    class="bg-gray-300 text-black mb-4 py-2 px-4 me-2 tracking-wider rounded-md transition duration-300 focus:bg-gray-300 focus:outline-[#003d7a]">
                <button type="submit"
                    class="bg-[#003d7a] text-white py-2 px-4 font-bold tracking-wider rounded-md transition duration-300 absolute top-[2px] -right-14 hover:bg-blue-600 hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                </button>
            </form>
            <div class="inline-flex items-center space-x-2">
                <a href="{{ route('admin.mou.create') }}"
                    class="bg-[#003d7a] text-white mb-4 py-2 px-4 inline-block font-bold tracking-wider rounded-md transition duration-300 hover:bg-blue-600 hover:scale-105">Tambah
                    Dokumen MoU</a>
                <!-- Filter Dropdown -->
                <div x-data="{ open: false }" class="relative mb-4">
                    <button @click="open = !open"
                        class="bg-[#003d7a] text-white py-2 px-4 font-bold tracking-wider rounded-md transition duration-300 hover:bg-blue-600 hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" class="bi bi-funnel"
                            viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z" />
                        </svg>
                    </button>

                    <!-- Dropdown Content -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg z-50">
                        <p class="block px-4 py-2 text-gray-700 font-bold tracking-wider">Status</p>
                        <a href="{{ route('admin.mou.index', ['filter' => 'active']) }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Aktif</a>
                        <a href="{{ route('admin.mou.index', ['filter' => 'expired']) }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Kedaluarsa</a>
                        <p class="block px-4 py-2 text-gray-700 font-bold tracking-wider">Urut Berdasar</p>
                        <a href="{{ route('admin.mou.index', ['filter' => 'latest']) }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Terbaru</a>
                        <a href="{{ route('admin.mou.index', ['filter' => 'oldest']) }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Terlama</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="bg-white mb-4 rounded-md shadow overflow-auto">
            <table class="min-w-full">
                <thead class="bg-[#003d7a] text-white text-sm font-bold tracking-wider text-center uppercase">
                    <tr>
                        <th class="py-4 px-6">No.</th>
                        <th class="py-4 px-6">Nomor Dokumen</th>
                        <th class="py-4 px-6">Nama Dokumen</th>
                        <th class="py-4 px-6">Lama Kerjasama</th>
                        <th class="py-4 px-6">Jenis MoU</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @if ($mous->isEmpty())
                        <tr>
                            <td colspan="5" class="py-4 px-6 text-gray-500">Data tidak ditemukan</td>
                        </tr>
                    @else
                        @foreach ($mous as $index => $mou)
                            <tr class="odd:bg-white even:bg-gray-300">
                                <td class="py-2 px-4">{{ $loop->iteration ?? '-' }}</td>
                                <td class="py-2 px-4">{{ $mou->document_number ?? '-' }}</td>
                                <td class="py-2 px-4">{{ $mou->document_name ?? '-' }}</td>
                                <td class="py-2 px-4">
                                    {{ \Carbon\Carbon::parse($mou->start_date)->format('d/m/Y') . ' s/d ' . \Carbon\Carbon::parse($mou->end_date)->format('d/m/Y') ?? '-' }}
                                </td>
                                <td class="py-2 px-4">{{ $mou->type_of_contract ?? '-' }}</td>
                                @if ($mou->end_date < now())
                                    <td class="text-red-600 font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-exclamation-circle-fill justify-self-center"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                                        </svg>
                                    </td>
                                @else
                                    <td class="text-green-600 font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-check-circle-fill justify-self-center"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                    </td>
                                @endif
                                <td class="py-2 px-4">
                                    <div class="flex justify-center items-center space-x-2">
                                        {{-- ! read button start --}}
                                        <a href="{{ route('admin.mou.show', ['id' => $mou->id]) }}"
                                            class="text-yellow-600 inline-block transition duration-300 hover:scale-110">
                                            <svg class="bi bi-book w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                                            </svg>
                                        </a>
                                        {{-- ! read button end --}}
                                        {{-- ! update button start --}}
                                        <a href="{{ route('admin.mou.show', ['id' => $mou->id]) }}"
                                            class="text-blue-600 inline-block transition duration-300 hover:scale-110">
                                            <svg class="bi bi-pencil-square w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </a>
                                        {{-- ! update button end --}}
                                        {{-- ! delete button start --}}
                                        <form action="{{ route('admin.mou.destroy', ['id' => $mou->id]) }}"
                                            method="POST"
                                            class="inline-block transition duration-300 translate-y-[2px] hover:scale-110">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" id="buttonDeleteEvent" onclick="confirmDelete(event)"
                                                class="text-red-600">
                                                <svg class="bi bi-trash3-fill w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                </svg>
                                            </button>
                                        </form>
                                        {{-- ! delete button end --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{-- ? mou table end --}}
        {{-- Link pagination --}}
        <div class="flex justify-end items-center mb-4">
            <form id="paginationForm" method="GET" action="{{ url()->current() }}"
                class="flex items-center space-x-2">
                @if (request('filter'))
                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                @endif
                @if (request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                {{-- <input type="hidden" name="search" value="{{ request('search') }}">
                <input type="hidden" name="filter" value="{{ request('filter') }}"> --}}
                <label for="perPage" class="text-sm font-medium text-gray-700">Tampilkan:</label>
                <select name="perPage" id="perPage" class="border rounded-md py-1 px-2 text-sm"
                    onchange="this.form.submit()">
                    <option value="2" {{ request('perPage') == 2 ? 'selected' : '' }}>2</option>
                    <option value="3" {{ request('perPage') == 3 ? 'selected' : '' }}>3</option>
                    <option value="4" {{ request('perPage') == 4 ? 'selected' : '' }}>4</option>
                    <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                </select>
            </form>
        </div>
        <div class="mt-4">
            {{ $mous->appends(['perPage' => request('perPage')])->links() }}
        </div>
    </main>
    {{-- * main end --}}

    {{-- * javascript start --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // ? confirm delete start
        function confirmDelete(e) {
            const form = e.target.closest('form');

            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const button = form.querySelector('button[type="button"]');
                    const deleteButton = form.querySelector('#buttonDeleteEvent');

                    button.disabled = true;
                    deleteButton.classList.add('hidden');

                    form.submit();
                }
            });
        }

        function closeModal() {
            const modal = document.getElementById('createJenisMitraModal');
            const modalContent = document.getElementById('createJenisMitraContent');

            modalContent.classList.add('scale-90', 'opacity-0');
            modalContent.classList.remove('scale-100', 'opacity-100');

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        function openForm() {
            const judul = document.querySelector('#createJenisMitraContent h2');
            const tambahButton = document.getElementById('tambah-button');
            const kembaliButton = document.getElementById('kembali-button');
            const sectionForm = document.getElementById('section-form');
            const sectionList = document.getElementById('section-list');

            judul.textContent = 'Tambah Jenis Mitra';

            tambahButton.classList.add('hidden');
            kembaliButton.classList.remove('hidden');

            sectionList.classList.add('hidden');
            sectionForm.classList.remove('hidden');
        }

        function closeForm() {
            const judul = document.querySelector('#createJenisMitraContent h2');
            const tambahButton = document.getElementById('tambah-button');
            const kembaliButton = document.getElementById('kembali-button');
            const sectionForm = document.getElementById('section-form');
            const sectionList = document.getElementById('section-list');

            judul.textContent = 'Jenis Mitra';

            kembaliButton.classList.add('hidden');
            tambahButton.classList.remove('hidden');

            sectionForm.classList.add('hidden');
            sectionList.classList.remove('hidden');
        }
        // ? modal end
    </script>
    {{-- * javascript end --}}
@endsection
