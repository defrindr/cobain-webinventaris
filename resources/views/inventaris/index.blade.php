@extends('layouts.admin_template')
@section('title')
    Inventaris
@endsection
@section('head')
    Inventaris
@endsection
@section('desc')
    Index
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts.alert')
            <a href="{{ route('inventaris.create') }}" class="btn btn-success">Tambah Inventaris</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-responsive-lg table-striped">
                <thead>
                    <th>Nama</th>
                    <th>Kondisi</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Tanggal Register</th>
                    <th>Kode Inventaris</th>
                    <th>ID Jenis</th>
                    <th>ID Ruang</th>
                    <th>ID Petugas</th>
                    <th colspan="2" class="text-center">Action</th>
                </thead>
                @foreach ($inventaris as $row)
                    <tr>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->kondisi }}</td>
                        <td>{{ $row->keterangan }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>{{ $row->tanggal_register }}</td>
                        <td>{{ $row->kode_inventaris }}</td>
                        <td>{{ $row->jenis->nama_jenis }}</td>
                        <td>{{ $row->ruang->nama_ruang }}</td>
                        <td>{{ $row->petugas->nama_petugas }}</td>
                        <td>
                            <a href="{{ route('inventaris.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('inventaris.delete',[$row->id]) }}" method="post"> @method("delete") @csrf<button  onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                        </td>
                    </tr>
                @endforeach
                {{ $inventaris->links() }}
            </table>
        </div>
    </div>
@endsection