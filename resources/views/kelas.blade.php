<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    body {
        background-color: #1f2937;
        color: white;
    }
</style>
<body>
    <h1 class="text-2xl mt-2 text-center font-bold">Data Kelas</h1>
    <p class="text-center">Belajar Laravel</p></br>
    @if ($errors->any())
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Perhatian</span>
            <div>
                <ul class="mt-1.5 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="pl-3 mb-2 flex justify-between items-center">
        <div>
            <a href="{{ url('/kelas/create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Data</a>
            <a href="{{ url('/siswa') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Data Siswa</a>
        </div>
        <div>
            @if (session('success'))
                <div class="p-4 mr-4 text-sm flex items-center text-green-800 rounded-lg bg-green-50 dark:bg-gray-700 w-[300px] dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div>
                        <span class="font-medium">
                            {{ session('success') }}
                        </span>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div class="p-4 mr-4 text-sm flex items-center text-green-800 rounded-lg bg-green-50 dark:bg-gray-700 w-[300px] dark:text-green-400" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div>
                        <span class="font-medium">
                            {{ session('error') }}
                        </span>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md pt-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        # 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jurusan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Lokasi Ruangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Wali Kelas 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($kelas as $row)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ isset($i) ? ++$i : $i = 1 }}</td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $row->nama_kelas }}</th>
                    <td>{{ $row->jurusan }}</td>
                    <td>{{ $row->lokasi_ruangan }}</td>
                    <td>{{ $row->nama_walikelas }}</td>
                    <td class="flex space-x-3 mt-3">
                        <a href="{{ url('kelas/edit/' . $row->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">edit</a>
                        <form action="{{ url('/kelas', $row->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
