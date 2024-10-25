@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="container mx-auto w-full px-4 py-8">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-bold text-3xl">Dashboard</h1>
                <p>Welcome to the admin dashboard.</p>
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

        <!-- Stats and User Info Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- User Info -->
            <div class="bg-white p-6 rounded-lg shadow flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="bg-gray-300 rounded-full h-12 w-12 flex items-center justify-center">
                        <span class="text-xl font-bold">AD</span>
                    </div>
                    <div>
                        <h3 class="font-semibold">Welcome</h3>
                        <p class="text-gray-600">Admin</p>
                    </div>
                </div>
                <button class="border border-gray-300 p-2 rounded-lg">Sign out</button>
            </div>
            <!-- Filament and GitHub Info -->
            <div class="bg-white p-6 rounded-lg shadow flex justify-between items-center">
                <h2 class="font-bold">filament</h2>
                <p class="text-sm">v3.2.115</p>
                <div class="flex items-center gap-2">
                    <span class="text-gray-600">Documentation</span>
                    <a href="#" class="text-gray-600">GitHub</a>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Revenue Card -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600">Total Event</h3>
                <p class="text-2xl font-bold">$192.10k</p>
                <p class="text-green-500">32k increase</p>
            </div>
            <!-- New Customers Card -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600">Total Kebutuhan Mahasiswa</h3>
                <p class="text-2xl font-bold">1.34k</p>
                <p class="text-red-500">3% decrease</p>
            </div>
            <!-- New Orders Card -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-gray-600">New orders</h3>
                <p class="text-2xl font-bold">3.54k</p>
                <p class="text-green-500">7% increase</p>
            </div>
        </div>

        <!-- Graphs Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Orders per Month Graph -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-semibold mb-4">Orders per month</h3>
                <img src="orders-chart.png" alt="Orders per month">
            </div>
            <!-- Total Customers Graph -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="font-semibold mb-4">Total customers</h3>
                <img src="customers-chart.png" alt="Total customers">
            </div>
        </div>
    </div>
@endsection
