@extends('layout.frame')

@section('content')

<form action='{{url('barang')}}' method='post'>
    @csrf 
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{url('barang')}}" class="btn btn-secondary">< kembali</a>
            <div class="mb-3 row">
                <label for="kode" class="col-sm-2 col-form-label">Kode Barang</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='kode' value="{{Session::get('kode')}}" id="kode">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{Session::get('nama')}}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='harga' value="{{Session::get('harga')}}" id="harga">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='stok' value="{{Session::get('stok')}}" id="stok">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="submit" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-success" name="submit">SIMPAN</button></div>
            </div>
          </div>
        </form>
        @endsection