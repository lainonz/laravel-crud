<h1>Siswa</h1>
Belajar Laravel</br>

<div>
    {{ session('success') }}
    {{ session('error') }}
</div>

<a href="{{ url('/siswa/create') }}">Tambah Data</a>
|
<a href="{{ url('/kelas') }}">Kelas</a>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>NIS</th>
            <th>NAMA LENGKAP</th>
            <th>JENIS KELAMIN</th>
            <th>GOLONGAN DARAH</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($siswa as $row)
            <tr>
                <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
                <td>{{ $row->nis }}</td>
                <td>{{ $row->nama_lengkap }}</td>
                <td>{{ $row->jk }}</td>
                <td>{{ $row->golongan_darah }}</td>
                <td><a href="{{ url('siswa/edit/' . $row->id) }}">edit</a></td>
                <td>
                    <form action="{{ url('/siswa', $row->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>