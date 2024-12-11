@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="container mx-auto w-full px-4 py-8">
        <div class="row mb-6">
            <div class="col-md-12">
                <h1 class="font-bold text-3xl">Dashboard</h1>
            </div>
        </div>

        <!-- Stats and User Info Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- User Info -->
            <div class="bg-white p-6 rounded-lg shadow flex justify-between items-center border-t-4 border-yellow-600">
                <div class="flex items-center gap-4">
                    <div class="bg-gray-300 rounded-full h-12 w-12 flex items-center justify-center">
                        <span class="text-xl font-bold">AD</span>
                    </div>
                    <div>
                        <h3 class="font-semibold">Welcome</h3>
                        <p class="text-gray-600">Admin</p>
                    </div>
                </div>
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="px-3 py-2 border border-gray-300 rounded-lg">Logout</button>
                </form>
                {{-- <a href="{{ route('admin.logout') }}" class="border border-gray-300 p-2 rounded-lg">Sign out</a> --}}
            </div>
            <div class="bg-white p-6 rounded-lg shadow flex justify-between items-center border-t-4 border-orange-600">
                <img src="{{ asset('assets/logo-udinus.png') }}" alt="Logo Udinus" class="h-12 w-12">
                <h2 class="font-bold text-blue-800">LKUI Internal APP</h2>
                <p class="text-sm font-semibold">v1.0</p>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white mt-3 p-6 rounded-lg shadow mb-6 flex flex-col md:flex-row md:justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                <label for="year" class="font-semibold">Select Years</label>
                <select id="year" name="year" class="border border-gray-300 p-2 rounded">
                    @for ($i = date('Y'); $i >= 2021; $i--)
                        <option value="{{ $i }}" {{ $selected_year == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="flex items-center gap-4">
                <label for="start_date" class="font-semibold">Start date</label>
                <input type="text" id="start_date" placeholder="dd/mm/yyyy" class="border border-gray-300 p-2 rounded">
            </div>
            <div class="flex items-center gap-4">
                <label for="end_date" class="font-semibold">End date</label>
                <input type="text" id="end_date" placeholder="dd/mm/yyyy" class="border border-gray-300 p-2 rounded">
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Revenue Card -->
            <div class="bg-white p-6 rounded-lg shadow border-t-4 border-red-600">
                <h3 class="text-gray-600">Total Event</h3>
                <p class="text-2xl font-bold">{{ $total_event }}</p>
            </div>
            <!-- New Customers Card -->
            <div class="bg-white p-6 rounded-lg shadow border-t-4 border-green-600">
                <h3 class="text-gray-600">Total Kerja Sama</h3>
                <p class="text-2xl font-bold">1.34k</p>
            </div>
            <!-- New Orders Card -->
            <div class="bg-white p-6 rounded-lg shadow border-t-4 border-blue-600">
                <h3 class="text-gray-600">Total Research Collaboration</h3>
                <p class="text-2xl font-bold">{{ $total_reserach_collaboration }}</p>
            </div>
        </div>
    </div>
@endsection
