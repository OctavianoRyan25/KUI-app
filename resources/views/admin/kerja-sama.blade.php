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
          <a href="{{ route('admin.kerjaSama.index') }}">
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
    <header class="mb-8">
      <h1 class="text-3xl font-bold">Kerja Sama</h1>
    </header>
    {{-- ? header end --}}
    {{-- ? kerja sama lists start --}}
    <div class="flex flex-wrap justify-start gap-x-[1%] gap-y-4">
      <a href="{{ route('admin.mitra.index') }}" class="bg-white w-full h-24 p-6 flex items-center space-x-3 rounded-md shadow-md transition duration-300 group hover:bg-[#003d7a] lg:w-[19%]">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-building text-[#003d7a] group-hover:text-white" viewBox="0 0 16 16">
            <path d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
            <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z"/>
          </svg>
          <h3 class="text-xl font-semibold group-hover:text-white">Mitra</h3>
      </a>
    </div>
    {{-- ? kerja sama lists end --}}
  </main>
  {{-- * main end --}}
@endsection
