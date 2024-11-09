        @extends('layout.frame')

         @section('content')
        <div class="my-3 p-3 bg-body rounded shadow-sm">

                <div class="pb-3">
                  <form class="d-flex" action="{{url('barang')}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                

                <div class="pb-3">
                  <a href='{{ url('barang/create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped" style="border: 1px solid black;
                border-collapse: collapse;" >
                    <h1 style="text-align: center">Tabel Barang</h1>
                    <thead>
                        <tr style="background-color: rgb(63, 63, 63); color:white">
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Kode Barang</th>
                            <th class="col-md-3">Nama Barang</th>
                            <th class="col-md-2">Harga</th>
                            <th class="col-md-1">Stok</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                            <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{$item->stok}}</td>
                            <td>
                                <a href='{{url('barang/'.$item->kode.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <form class="d-inline" action="{{url('barang/'.$item->kode)}}" method="POST" id="deleteForm-{{$item->kode}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('{{$item->kode}}')" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                {{$data->withQueryString()->links()}}               
          </div>
          @endsection        
