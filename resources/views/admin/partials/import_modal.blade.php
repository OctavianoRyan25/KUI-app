<div id="importModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <div class="flex justify-center">
            <img src="{{ asset('assets/import_image.jpg') }}" alt="Archive Image" class="h-40 w-40 mr-4">
        </div>
        <div class="flex justify-center mb-4">
            <h3 class="text-lg font-bold">Import Peserta</h3>
        </div>
        <p class="text-gray-600">
            Import data peserta dari file excel. Pastikan file excel yang diimport sesuai dengan format yang telah ditentukan.
        </p>
        <form action="{{ route('admin.peserta.import') }}" method="POST" enctype="multipart/form-data">
            @csrf          
            <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input name="file" class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-teal-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-teal-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60" type="file">
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closePartialModal('importModal')" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded mr-2">
                    Cancel
                </button>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 mx-5 rounded transition duration-200">
                    Import
                </button>
            </div>
        </form>
    </div>
</div>
