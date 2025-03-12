<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Research Collaboration Form</title>
    <link rel="icon" href="{{ asset('assets/logo-udinus.png') }}" type="image/x-icon">
    <script type="module" src="{{ asset('build/assets/app-z-Rg4TxU.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-Czl1uA6v.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #searchDropdown {
            position: absolute;
            background: white;
            border: 1px solid #ddd;
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
            width: 100%;
        }

        #searchDropdown li {
            padding: 8px;
            cursor: pointer;
        }

        #searchDropdown li:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-blue-500 to-[#003d7a]">
    @include('sweetalert::alert')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6 border-t-4 border-blue-600 flex justify-between">
            <div>
                <h2 class="text-xl lg:text-2xl font-bold mb-2 text-blue-800">Research Collaboration Form</h2>
                <p class="text-gray-700 text-sm lg:text-base">Fill out the details below for collaboration.</p>
            </div>
            <div>
                <img src="{{ asset('assets/logo-udinus.png') }}" alt="Logo" class="h-10 w-10 md:h-16 md:w-16">
            </div>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('admin.researchCollaboration.store') }}"
            class="bg-white shadow rounded-lg p-6" enctype="multipart/form-data"onsubmit="handleFormSubmit(event)">
            @csrf
            <div class="mb-4 relative">
                <div class="flex flex-wrap px-3">
                    <div class="w-full">
                        <label for="correspondence" class="block text-sm font-medium text-gray-700">Correspondence<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="correspondence" name="correspondence"
                            value="{{ old('correspondence') }}" autocomplete="off" required
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Type to search...">
                        <ul id="searchDropdown" class="hidden rounded-md my-1 w-11/12"></ul>
                        @error('correspondence')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="flex flex-wrap">
                    <div class="w-full px-3">
                        <label for="study_program" class="block text-sm font-medium text-gray-700">Prodi<span
                                class="text-red-500">*</span></label>
                        <input type="text" id="study_program" name="study_program" value="{{ old('study_program') }}"
                            required
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Teknik Informatika" value="{{ old('study_program') }}">
                        @error('study_program')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-4 flex flex-wrap">
                <div class="w-full px-3 md:w-1/2">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Author<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="John Doe">
                    @error('name')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full px-3 md:w-1/2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Author<span
                            class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="loremipsum@gmail.com">
                    @error('email')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 flex flex-wrap">
                <div class="w-full px-3">
                    <label for="list_authors" class="block text-sm font-medium text-gray-700">List
                        Authors</span></label>
                    <textarea type="text_area" id="list_authors" name="list_authors" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('list_authors') }}</textarea>
                    @error('list_authors')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 flex flex-wrap">
                <div class="w-full px-3 md:w-1/2">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon Author<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="0812317612">
                    @error('phone')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full px-3 md:w-1/2">
                    <label for="university" class="block text-sm font-medium text-gray-700">Universitas Author<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="university" name="university" value="{{ old('university') }}"
                        required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('university')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 flex flex-wrap">
                <div class="w-full px-3 md:w-1/2">
                    <label for="department" class="block text-sm font-medium text-gray-700">Prodi Author<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="department" name="department" value="{{ old('department') }}"
                        required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="information system">
                    @error('department')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full px-3 md:w-1/2">
                    <label for="faculty" class="block text-sm font-medium text-gray-700">Fakultas Author<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="faculty" name="faculty" value="{{ old('faculty') }}" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('faculty')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 flex flex-wrap">
                <div class="w-full px-3 md:w-1/3">
                    <label for="link_paper" class="block text-sm font-medium text-gray-700">Link Paper Author<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="link_paper" name="link_paper" value="{{ old('link_paper') }}"
                        required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('link_paper')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full px-3 md:w-1/3">
                    <label for="publish_date" class="block text-sm font-medium text-gray-700">Tanggal Terbit
                        Paper<span class="text-red-500">*</span></label>
                    <input type="date" id="publish_date" name="publish_date" value="{{ old('publish_date') }}"
                        required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="information system">
                    @error('publish_date')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full px-3 md:w-1/3">
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul Paper<span
                            class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 flex flex-wrap">
                <div class="w-full px-3 md:w-1/3">
                    <label for="fee_journal" class="block text-sm font-medium text-gray-700">FEE</label>
                    <div class="relative">
                        <input type="number" name="fee_journal" value="{{ old('fee_journal') }}"
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:border-slate-300 shadow-sm focus:shadow appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                            placeholder="1,000" />
                        <div class="absolute top-2 right-0 flex items-center pr-3">
                            <div class="h-6 border-l border-slate-200 mr-2"></div>
                            <a id="dropdownButton"
                                class="h-full text-sm flex justify-center items-center bg-transparent text-slate-700 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                    <path
                                        d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                                </svg>
                                <span id="dropdownSpan">USD</span>
                            </a>
                            <div id="dropdownMenu"
                                class="min-w-[150px] overflow-hidden absolute left-0 w-full mt-10 hidden w-full bg-white border border-slate-200 rounded-md shadow-lg z-10">
                                <ul id="dropdownOptions">
                                    <li class="px-4 py-2 text-slate-600 hover:bg-slate-50 text-sm cursor-pointer"
                                        data-value="USD">USD</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @error('fee_journal')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full px-3 md:w-1/3">
                    <label for="journal_output" class="block text-sm font-medium text-gray-700">Luaran Jurnal<span
                            class="text-red-500">*</span></label>
                    <select id="journal_output" name="journal_output" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Pilih Luaran Jurnal</option>
                        <option value="Jurnal Bereputasi">Jurnal Bereputasi</option>
                        <option value="Procedding">Procedding</option>
                    </select>
                    @error('journal_output')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full px-3 md:w-1/3">
                    <label for="journal_level" class="block text-sm font-medium text-gray-700">TIngkatan Jurnal<span
                            class="text-red-500">*</span></label>
                    <select id="journal_level" name="journal_level" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Pilih Tingkatan Jurnal</option>
                        <option value="Q1">Q1</option>
                        <option value="Q2">Q2</option>
                        <option value="Q3">Q3</option>
                        <option value="Q4">Q4</option>
                    </select>
                    @error('journal_level')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 flex flex-wrap">
                <div class="w-full px-3 md:w-1/3">
                    <label for="loa" class="text-sm font-bold text-gray-600">LOA</span></label>
                    <input id="loa" type="file" name="loa"
                        class="mt-2 block w-full text-sm file:mr-4 rounded-md file:rounded-md border file:border-0 file:bg-teal-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-teal-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" />
                    @error('loa')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full px-3 md:w-1/3">
                    <label for="paper" class="text-sm font-bold text-gray-600">Paper<span
                            class="text-red-500">*</span></label>
                    <input id="paper" type="file" name="paper"
                        class="mt-2 block w-full text-sm file:mr-4 rounded-md file:rounded-md border file:border-0 file:bg-teal-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-teal-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60"
                        required />
                    @error('paper')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full px-3 md:w-1/3">
                    <label for="invoice" class="text-sm font-bold text-gray-600">Invoice</span></label>
                    <input id="invoice" type="file" name="invoice"
                        class="mt-2 block w-full text-sm file:mr-4 rounded-md file:rounded-md border file:border-0 file:bg-teal-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-teal-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" />
                    @error('invoice')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 flex flex-wrap">
                <div class="w-full px-3 ">
                    {{-- radio form --}}
                    <label for="is_PKS" class="block text-sm font-medium text-gray-700">Apakah bersedia PKS fakultas
                        ke fakultas<span class="text-red-500">*</span></label>
                    <div class="mt-1 flex items-center">
                        <input id="is_PKS" name="is_PKS" type="radio" value="1"
                            class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                        <label for="is_PKS" class="ml-2 block text-sm text-gray-900">Ya</label>
                    </div>
                    <div class="mt-1 flex items-center">
                        <input id="is_PKS" name="is_PKS" type="radio" value="0"
                            class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                        <label for="is_PKS" class="ml-2 block text-sm text-gray-900">Tidak</label>
                    </div>
                    @error('is_PKS')
                        <div class="text-red-500 text-sm mt-2">Field ini harus Diisi</div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 flex flex-wrap">
                <div class="w-full px-3 ">
                    <button id="submitButton" type="submit"
                        class="bg-yellow-600 text-white px-4 py-3 rounded-lg hover:bg-yellow-700 transition duration-200 font-bold inline-flex">
                        <span id="submitText">Submit</span>
                        <svg id="submitSpinner" class="hidden animate-spin ml-2 h-5 w-5 text-white mt-1"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#correspondence').on('input', function() {
            const query = $(this).val();
            if (query.length > 3) {
                $.ajax({
                    url: '{{ route('admin.searchPeserta') }}',
                    method: "GET",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        let dropdown = $('#searchDropdown');
                        dropdown.empty().removeClass('hidden');
                        if (data.length > 0) {
                            data.forEach(item => {
                                dropdown.append(
                                    `<li data-name="${item.name}">${item.name}</li>`
                                    );
                            });
                        } else {
                            dropdown.append('<li>No results found</li>');
                        }
                    }
                });
            } else {
                $('#searchDropdown').empty().addClass('hidden');
            }
        });

        $(document).on('click', '#searchDropdown li', function() {
            const selectedName = $(this).data('name');
            $('#correspondence').val(selectedName);
            $('#searchDropdown').empty().addClass('hidden');
        });

        $(document).click(function(e) {
            if (!$(e.target).closest('#correspondence, #searchDropdown').length) {
                $('#searchDropdown').empty().addClass('hidden');
            }
        });
    });
</script>
<script>
    function handleFormSubmit(event) {
        event.preventDefault();

        const submitButton = document.getElementById('submitButton');
        submitButton.disabled = true;

        document.getElementById('submitSpinner').classList.remove('hidden');
        document.getElementById('submitText').textContent = 'Processing...';

        event.target.submit();
    }
</script>
</body>

</html>
