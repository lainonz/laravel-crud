<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        background-color: #1f2937;
        color: white;
    }
</style>
<body>
    @if ($errors->any())
        <div class="flex flex-col items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <div class="flex items-center space-x-3">
                <svg class="flex-shrink-0 inline w-6 h-6 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <h1 class="font-bold text-2xl">Perhatian</h1>
            </div>
            <div>
                <ul class="mt-1.5 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <h1 class="my-3 text-center font-bold text-2xl">Form kelas</h1>
    <form action="{{ url('kelas', @$kelas->id) }}" method="POST" class="max-w-sm mx-auto">
        @csrf
        @if (!empty(@$kelas))
            @method('PATCH') 
        @endif

        <div class="mb-5">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kelas</label>
            <input type="text" name="nama_kelas" value="{{ old('nama_kelas', @$kelas->nama_kelas) }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
            <select name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" >Jurusan</option>
                <option value="Rekayasa Perangkat Lunak" {{ old('jurusan', @$kelas->jurusan) == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>RPL</option>
                <option value="TITL" {{ old('jurusan', @$kelas->jurusan) == 'TITL' ? 'selected' : '' }}>TITL</option>
                <option value="Teknik Komputer Jaringan" {{ old('jurusan', @$kelas->jurusan) == 'Teknik Komputer Jaringan' ? 'selected' : '' }}>TJKT</option>
                <option value="Teknik Audio Visual" {{ old('jurusan', @$kelas->jurusan) == 'Teknik Audio Visual' ? 'selected' : '' }}>TAV</option>
                <option value="Desain Komunikasi Visual" {{ old('jurusan', @$kelas->jurusan) == 'Desain Komunikasi Visual' ? 'selected' : '' }}>DKV</option>
                <option value="Teknik Otomasi Industri" {{ old('jurusan', @$kelas->jurusan) == 'Teknik Otomasi Industri' ? 'selected' : '' }}>TOI</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Ruangan</label>
            <input type="text" name="lokasi_ruangan" value="{{ old('lokasi_ruangan', @$kelas->lokasi_ruangan) }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-5">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama wali kelas</label>
            <input type="text" name="nama_walikelas" value="{{ old('nama_walikelas', @$kelas->nama_walikelas) }}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <input type="submit" value="Simpan" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
    </form>
</body>
</html>
