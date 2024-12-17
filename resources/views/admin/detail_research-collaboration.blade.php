@extends('admin.layout')
@section('title', 'Detail Research Collaboration')
@section('content')
<nav class="flex container mx-auto w-full px-4 pt-8" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    <li class="inline-flex items-center">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
        </svg>
        Home
        </a>
    </li>
    <li>
        <div class="flex items-center">
        <a href="{{ route('admin.researchCollaboration') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Research Collaboration</span>
        </a>
        </div>
    </li>
    <li>
        <div class="flex items-center">
        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">{{ $research->name }}</span>
        </div>
    </li>
    </ol>
</nav>
<div class="container mx-auto w-full px-4 py-8">
    <div class="row">
        <div class="col-md-12">
            <h1 class="font-bold text-3xl text-center">Detail Reseach Collaboration</h1>
        </div>
    </div>
    <div class="bg-white rounded-md shadow p-5 mt-6">
        <div class="mb-4 relative">
            <div class="flex flex-wrap px-3">
                <div class="w-full">
                    <label for="correspondence" class="block text-sm font-medium text-gray-700">Correspondence</label>
                    <input type="text" id="correspondence" name="correspondence" autocomplete="off" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" disabled value="{{ $research->correspondence }}">
                </div>
            </div>
        </div>

        <div class="mb-4">
            <div class="flex flex-wrap">
                <div class="w-full px-3">
                    <label for="study_program" class="block text-sm font-medium text-gray-700">Prodi</label>
                    <input type="text" id="study_program" name="study_program"  disabled value="{{ $research->study_program }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <div class="mb-4 flex flex-wrap">
            <div class="w-full px-3 md:w-1/2">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Author</label>
                <input type="text" id="name" name="name" disabled value="{{ $research->name }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="John Doe">
            </div>
            <div class="w-full px-3 md:w-1/2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Author</label>
                <input type="email" id="email" name="email" disabled value="{{ $research->email }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="loremipsum@gmail.com">
            </div>
        </div>
        
        <div class="mb-4 flex flex-wrap">
            <div class="w-full px-3">
                <label for="list_authors" class="block text-sm font-medium text-gray-700">List Authors</span></label>
                <textarea type="text_area" id="list_authors" name="list_authors" disabled class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $research->list_authors ? $research->list_authors : '-' }}</textarea>
            </div>
        </div>
        
        <div class="mb-4 flex flex-wrap">
            <div class="w-full px-3 md:w-1/2">
                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon Author</label>
                <input type="text" id="phone" name="phone" disabled value="{{ $research->phone }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="0812317612">
            </div>
            <div class="w-full px-3 md:w-1/2">
                <label for="university" class="block text-sm font-medium text-gray-700">Universitas Author</label>
                <input type="text" id="university" name="university" disabled value="{{ $research->university }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div class="mb-4 flex flex-wrap">
            <div class="w-full px-3 md:w-1/2">
                <label for="department" class="block text-sm font-medium text-gray-700">Prodi Author</label>
                <input type="text" id="department" name="department" disabled value="{{ $research->department }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="information system">
            </div>
            <div class="w-full px-3 md:w-1/2">
                <label for="faculty" class="block text-sm font-medium text-gray-700">Fakultas Author</label>
                <input type="text" id="faculty" name="faculty" disabled value="{{ $research->faculty }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        
        <div class="mb-4 flex flex-wrap">
            <div class="w-full px-3 md:w-1/3">
                <label for="link_paper" class="block text-sm font-medium text-gray-700">Link Paper Author</label>
                <input type="text" id="link_paper" name="link_paper" disabled value="{{ $research->link_paper }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="w-full px-3 md:w-1/3">
                <label for="publish_date" class="block text-sm font-medium text-gray-700">Tanggal Terbit Paper</label>
                <input type="date" id="publish_date" name="publish_date" disabled value="{{ $research->publish_date }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="information system">
            </div>
            <div class="w-full px-3 md:w-1/3">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Paper</label>
                <input type="text" id="title" name="title" disabled value="{{ $research->title }}" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        
        <div class="mb-4 flex flex-wrap">
            <div class="w-full px-3 md:w-1/3">
                <label for="fee_journal" class="block text-sm font-medium text-gray-700">FEE</label>
                <div class="relative">
                    <input value="{{ $research->fee_journal ? $research->fee_journal : '-' }}" disabled type="text" class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:border-slate-300 shadow-sm focus:shadow appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    />
                    <div class="absolute top-2 right-0 flex items-center pr-3">
                        <div class="h-6 border-l border-slate-200 mr-2"></div>
                            <a id="dropdownButton" class="h-full text-sm flex justify-center items-center bg-transparent text-slate-700 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z"/>
                                    </svg>
                                    <span id="dropdownSpan">USD</span>
                            </a>
                        <div id="dropdownMenu" class="min-w-[150px] overflow-hidden absolute left-0 w-full mt-10 hidden w-full bg-white border border-slate-200 rounded-md shadow-lg z-10">
                        <ul id="dropdownOptions">
                            <li class="px-4 py-2 text-slate-600 hover:bg-slate-50 text-sm cursor-pointer" data-value="USD">USD</li>
                        </ul>
                    </div>
                    </div> 
                </div>
            </div>
            <div class="w-full px-3 md:w-1/3">
                <label for="journal_output" class="block text-sm font-medium text-gray-700">Luaran Jurnal</label>
                <select id="journal_output" name="journal_output" disabled   class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="{{ $research->journal_output }}" disabled selected>{{ $research->journal_output }}</option>
                </select>
            </div>
            <div class="w-full px-3 md:w-1/3">
                <label for="journal_level" class="block text-sm font-medium text-gray-700">TIngkatan Jurnal</label>
                <select id="journal_level" name="journal_level" disabled class="mt-1 block w-full p-2 border bg-white border-blue-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="{{ $research->journal_level }}" disabled selected>P{{ $research->journal_level }}</option>
                </select>
                @error('journal_level')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-4 flex flex-wrap">
            <div class="w-full px-3 ">
                {{-- radio form --}}
                <label for="is_PKS" class="block text-sm font-medium text-gray-700">Apakah bersedia PKS fakultas ke fakultas</label>
                    @if($research->is_PKS)
                        <div class="mt-1 flex items-center">
                            <input id="is_PKS" name="is_PKS" type="radio" value="1" checked disabled class="focus:ring-blue-500 h-4 w-4 text-blue-600 bg-white border-blue-500">
                            <label for="is_PKS" class="ml-2 block text-sm text-gray-900">Ya</label>
                        </div>
                        <div class="mt-1 flex items-center">
                            <input id="is_PKS" name="is_PKS" type="radio" value="0" disabled class="focus:ring-blue-500 h-4 w-4 text-blue-600 bg-white border-blue-500">
                            <label for="is_PKS" class="ml-2 block text-sm text-gray-900">Tidak</label>
                        </div>
                    @else
                        <div class="mt-1 flex items-center">
                            <input id="is_PKS" name="is_PKS" type="radio" value="1" disabled class="focus:ring-blue-500 h-4 w-4 text-blue-600 bg-white border-blue-500">
                            <label for="is_PKS" class="ml-2 block text-sm text-gray-900">Ya</label>
                        </div>
                        <div class="mt-1 flex items-center">
                            <input id="is_PKS" name="is_PKS" type="radio" value="0" checked disabled class="focus:ring-blue-500 h-4 w-4 text-blue-600 bg-white border-blue-500">
                            <label for="is_PKS" class="ml-2 block text-sm text-gray-900">Tidak</label>
                        </div>
                    @endif
            </div>
        </div>

        <div class="mb-4 flex justify-end">
            <div class="px-3">
                <label for="loa" class="text-sm font-bold text-gray-600">Merged File</span></label>
                <a href="{{ Storage::url(str_replace('public/', '', $research->path)) }}" target="_blank" class="mt-1">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md inline-flex">
                        Download
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class=" ms-1 h-5 w-5 bi bi-filetype-pdf" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection