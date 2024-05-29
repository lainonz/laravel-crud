<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    function index()
    {
        $kelas = DB::table('t_kelas')->orderBy('nama_walikelas')->get();
        return view('kelas', compact('kelas'));
    }
    function create()
    {
        return view('kelas.form');
    }

    function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string',
            'jurusan' => 'required',
            'lokasi_ruangan' => 'required',
            'nama_walikelas' => 'required|string',
        ]);
        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_kelas')->insert($input);
        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/kelas/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    function edit(Request $request, $id)
    {
        $kelas = DB::table('t_kelas')->find($id);
        return view('kelas.form', compact('kelas'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string',
            'jurusan' => 'required',
            'lokasi_ruangan' => 'required',
            'nama_walikelas' => 'required|string',
        ]);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $status = DB::table('t_kelas')->where('id', $id)->update($input);
        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil di edit');
        } else {
            return redirect('/kelas/edit' . $id)->with('error', 'Gagal mengedit data');
        }
    }

    function destroy($id)
    {
        $status = DB::table('t_kelas')->where('id', $id)->delete();
        if ($status) {
            return redirect('/kelas')->with('success', 'Data berhasil di hapus');
        } else {
            return redirect('/kelas' . $id)->with('error', 'Gagal menghapus data');
        }
    }
}
