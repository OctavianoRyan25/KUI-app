@extends('admin.layout')

@section('title', 'Kerja Sama')
@section('content')
  {{-- * breadcrumbs navigation start --}}
  <nav class="container w-full mx-auto pt-8 px-4 flex" aria-label="Breadcrumb">
    <ul class="inline-flex items-center space-x-1 rtl:space-x-reverse md:space-x-2">
      <li class="inline-flex items-center">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 inline-flex items-center text-sm font-medium hover:text-blue-600">
          <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
          </svg>
          Home
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="text-gray-400 w-3 h-3 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
          </svg>
          <a href="{{ route('admin.mitra.index') }}">
            <span class="text-gray-500 ms-1 text-sm font-medium hover:text-blue-600 md:ms-2">Kerja Sama</span>
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
      <h1 class="text-3xl font-bold">Kerja Sama</h1>
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
    {{-- ? error alert start --}}
    @if ($errors->any())
      <div class="bg-red-100 text-red-700 mb-4 py-3 px-4 border border-red-400 rounded-md" role="alert">
        <strong>Error!</strong>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    {{-- ? error alert end --}}
    {{-- ? tambah mitra button start --}}
    <div class="flex justify-end">
      <a href="{{ route('admin.mitra.create') }}" class="bg-[#003d7a] text-white mb-4 py-2 px-4 font-bold tracking-wider rounded-md transition duration-300 hover:bg-blue-600 hover:scale-105">Tambah Mitra</a>
    </div>
    {{-- ? tambah mitra button end --}}
    {{-- ? mitra table start --}}
    <div class="bg-white mb-4 rounded-md shadow overflow-auto">
      <table class="min-w-full">
        <thead class="bg-[#003d7a] text-white text-sm font-bold tracking-wider text-center uppercase">
          <tr>
            <th class="py-4 px-6">Nama Mitra</th>
            <th class="py-4 px-6">Kriteria Mitra</th>
            <th class="py-4 px-6">Tingkat</th>
            <th class="py-4 px-6">Regional</th>
            <th class="py-4 px-6">Kota</th>
            <th class="py-4 px-6">Negara</th>
            <th class="py-4 px-6">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-center">
          @foreach ($mitras as $mitra)
            <tr class="odd:bg-white even:bg-gray-300">
              <td class="py-2 px-4">{{ $mitra->nama_mitra }}</td>
              <td class="py-2 px-4">{{ $mitra->kriteria_mitra }}</td>
              <td class="py-2 px-4">{{ $mitra->tingkat }}</td>
              <td class="py-2 px-4">{{ $mitra->regional ?? '-' }}</td>
              <td class="py-2 px-4">{{ $mitra->kota ?? '-' }}</td>
              <td class="py-2 px-4">{{ $mitra->negara ?? '-' }}</td>
              <td class="py-2 px-4">
                <div class="flex justify-center items-center space-x-2">
                  {{-- ! read button start --}}
                  <a href="{{ route('admin.mitra.show', ['id' => $mitra->id]) }}" class="text-yellow-600 inline-block transition duration-300 hover:scale-110">
                    <svg class="bi bi-book w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                    </svg>
                  </a>
                  {{-- ! read button end --}}
                  {{-- ! update button start --}}
                  <a href="{{ route('admin.mitra.edit', ['id' => $mitra->id]) }}" class="text-blue-600 inline-block transition duration-300 hover:scale-110">
                    <svg class="bi bi-pencil-square w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>
                  </a>
                  {{-- ! update button end --}}
                  {{-- ! delete button start --}}
                  <form action="{{ route('admin.mitra.destroy', ['id' => $mitra->id]) }}" method="POST" class="inline-block transition duration-300 translate-y-[2px] hover:scale-110">
                    @method('DELETE')
                    @csrf
                    <button type="button" id="buttonDeleteEvent" onclick="confirmDelete(event)" class="text-red-600">
                      <svg class="bi bi-trash3-fill w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                      </svg>
                    </button>
                  </form>
                  {{-- ! delete button end --}}
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{-- ? mitra table end --}}
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
    // ? confirm delete end
  </script>
  {{-- * javascript end --}}
@endsection