@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    {{-- <div class="container mx-auto w-full px-4 py-8">
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
                <a href="{{ route('admin.logout') }}" class="border border-gray-300 p-2 rounded-lg">Sign out</a href="{{ route('admin.logout') }}">
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
    </div> --}}
    <main id="main-content" class="w-full p-6 bg-gray-50">
        <!-- Header -->
        <header class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-blue-900">Dashboard</h1>
        </header>
        <!-- Header end -->

        <!-- Welcome & Cards Section Start -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div
                class="col-span-1 md:col-span-2 bg-white shadow-md border border-gray-200 rounded-lg p-6 flex items-center justify-between hover:shadow-lg transition">
                <div class="flex items-center">
                    <div
                        class="bg-blue-100 text-blue-700 rounded-full h-12 w-12 flex items-center justify-center font-bold text-lg">
                        AD
                    </div>
                    <div class="ml-4">
                        <h2 class="font-semibold text-lg">Welcome</h2>
                        <p class="text-gray-600">Admin</p>
                    </div>
                </div>
                <div>
                    <a href="{{ route('admin.logout') }}"
                        class="sign-out-btn bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Sign Out
                    </a>
                </div>
            </div>

            <!-- Settings section -->
            <div id="settings-modal"
                class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden z-50">
                <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 p-6">
                    <h2 class="text-2xl font-bold text-blue-900 mb-4">Settings</h2>
                    <p class="text-gray-700 mb-6">Adjust your preferences below:</p>
                    <form>
                        <label class="block mb-4">
                            <span class="text-gray-700">Change Theme</span>
                            <select class="w-full p-2 border rounded">
                                <option>Light</option>
                                <option>Dark</option>
                                <option>System Default</option>
                            </select>
                        </label>
                        <label class="block mb-4">
                            <span class="text-gray-700">Notifications</span>
                            <input type="checkbox" class="ml-2" />
                            Enable notifications
                        </label>
                        <div class="flex justify-end space-x-4">
                            <button type="button" id="close-settings"
                                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 bg-blue-900 text-white rounded hover:bg-blue-700">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow-md border border-gray-200 rounded-lg p-6 text-center hover:shadow-lg transition">
                <h2 class="font-semibold text-lg text-blue-900">
                    LKUI Internal APP
                </h2>
                <p class="text-gray-600">v1.0</p>
            </div>
        </section>
        <!-- Welcome & Cards Section End -->

        <!-- Filter Section Start -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div>
                <label for="year" class="block font-medium mb-2">Select Year</label>
                <select id="year" class="w-full p-2 border rounded">
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                    <option>2027</option>
                </select>
            </div>
            <div>
                <label for="start-date" class="block font-medium mb-2">Start Date</label>
                <input type="date" id="start-date" class="w-full p-2 border rounded" />
            </div>
            <div>
                <label for="end-date" class="block font-medium mb-2">End Date</label>
                <input type="date" id="end-date" class="w-full p-2 border rounded" />
            </div>
        </section>
        <!-- Filter Section End -->

        <!-- Stats Cards -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            <div class="bg-red-50 border border-red-200 p-4 rounded-lg shadow-md hover:bg-red-100 transition">
                <h3 class="text-red-700 font-semibold">Total Event</h3>
                <p class="text-2xl font-bold">2</p>
            </div>
            <div class="bg-green-50 border border-green-200 p-4 rounded-lg shadow-md hover:bg-green-100 transition">
                <h3 class="text-green-700 font-semibold">Total Kerja Sama</h3>
                <p class="text-2xl font-bold">1.34k</p>
            </div>
            <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-100 transition">
                <h3 class="text-blue-700 font-semibold">
                    Total Research Collaboration
                </h3>
                <p class="text-2xl font-bold">1</p>
            </div>
        </section>
    </main>
@endsection
