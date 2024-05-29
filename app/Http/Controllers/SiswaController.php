<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    function index()
    {
        $siswa = DB::table('t_siswa')->orderBy('nama_lengkap', 'ASC')->get();
        return view('belajar', compact('siswa'));
    }

    function create()
    {
        return view('siswa.form');
    }

    function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_siswa')->insert($input);
        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect('/siswa/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    function edit(Request $request, $id)
    {
        $siswa = DB::table('t_siswa')->find($id);
        return view('siswa.form', compact('siswa'));
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jk' => 'required',
            'golongan_darah' => 'required',
        ]);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $status = DB::table('t_siswa')->where('id', $id)->update($input);
        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil di edit');
        } else {
            return redirect('/siswa/edit' . $id)->with('error', 'Gagal mengedit data');
        }
    }

    function destroy($id)
    {
        $status = DB::table('t_siswa')->where('id', $id)->delete();
        if ($status) {
            return redirect('/siswa')->with('success', 'Data berhasil di hapus');
        } else {
            return redirect('/siswa' . $id)->with('error', 'Gagal menghapus data');
        }
    }
}
