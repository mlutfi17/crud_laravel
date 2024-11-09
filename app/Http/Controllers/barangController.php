<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class barangController extends Controller
{
    
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = barang::where('kode','like',"%$katakunci%")
            ->orWhere('nama','like',"%$katakunci%") 
            ->orWhere('harga','like',"%$katakunci%") 
            ->orWhere('stok','like',"%$katakunci%")
            ->paginate($jumlahbaris) ;
        }else{
            $data = barang::orderBy('kode','asc')->paginate($jumlahbaris);
        }
        return view('barang.index')->with('data',$data);
    }

    
    public function create()
    {
        return view('barang.create');
    }

    
    public function store(Request $request)
    {
        Session::flash('kode', $request->kode);
        Session::flash('nama', $request->nama);
        Session::flash('harga', $request->harga);
        Session::flash('stok', $request->stok);
        $request ->validate([
            'kode'=>'required|numeric|unique:barang,kode',
            'nama'=>'required',
            'harga'=>'required',
            'stok'=>'required',
        ],[
            'kode.required' => 'Kode wajib diisi',
            'kode.numeric' => 'Kode wajib diisi angka',
            'kode.unique' => 'Kode sudah ada',
            'nama.required' => 'Nama wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'stok.required' => 'Stok wajib diisi',
        ]);
        $data = [
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'stok'=>$request->stok,
        ];
        barang::create($data);
        return redirect()->to ('barang')->with('success','Data berhasil ditambahkan');
    }

    
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $data=barang::where('kode',$id)->first();
        return view('barang.edit')->with('data',$data);
    }

    
    public function update(Request $request, string $id)
    {
        $request ->validate([
            'nama'=>'required',
            'harga'=>'required',
            'stok'=>'required',
        ],[
            'nama.required' => 'Nama wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'stok.required' => 'Stok wajib diisi',
        ]);
        $data = [
            'nama'=>$request->nama,
            'harga'=>$request->harga,
            'stok'=>$request->stok,
        ];
        barang::where('kode',$id)->update($data);
        return redirect()->to ('barang')->with('success','Data telah di Update');
    }

    
    public function destroy(string $id)
    {
        barang::where('kode',$id)->delete();
        return redirect()->to ('barang')->with('success','Data berhasil di Hapus');
    }
}
