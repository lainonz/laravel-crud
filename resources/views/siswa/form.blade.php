@if ($errors->any())
    <div>
        <strong>Perhatian!</strong>
        </br>
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif

<h1>Form siswa</h1>
<form action="{{ url('siswa', @$siswa->id) }}" method="POST">
    @csrf

    @if (!empty(@$siswa))
       @method('PATCH') 
    @endif

    NIS : <input type="text" name="nis" value="{{ old('nis', @$siswa->nis) }}"></br>
    NAMA LENGKAP : <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', @$siswa->nama_lengkap) }}"></br>
    <label for="L"><input type="radio" name="jk" id="L" value="L" {{ old('jk', @$siswa->jk) == 'L' ? 'checked' : '' }}/>Laki Laki</label></br>
    <label for="P"><input type="radio" name="jk" id="P" value="P" {{ old('jk', @$siswa->jk) == 'P' ? 'checked' : '' }}/>Perempuan</label></br>
    GOLONGAN DARAH :
    <select name="golongan_darah">
        <option value="">Pilih Golongan Darah</option>
        <option value="A" {{ old('golongan_darah', @$siswa->golongan_darah) == 'A' ? 'selected' : '' }}>A</option>
        <option value="B" {{ old('golongan_darah', @$siswa->golongan_darah) == 'B' ? 'selected' : '' }}>B</option>
        <option value="AB" {{ old('golongan_darah', @$siswa->golongan_darah) == 'AB' ? 'selected' : '' }}>AB</option>
        <option value="O" {{ old('golongan_darah', @$siswa->golongan_darah) == 'O' ? 'selected' : '' }}>O</option>
    </select>
    </br>
    <input type="submit" value="Simpan">
</form>