@extends('layouts.admin_template')
@section('title')
    Ruang
@endsection
@section('head')
    Ruang
@endsection
@section('desc')
    Index
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts.alert')
            <a href="{{ route('ruang.create') }}" class="btn btn-success">Tambah Ruang</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Nama Ruang</th>
                    <th>Kode Ruang</th>
                    <th>Keterangan</th>
                    <th colspan="2" class="text-center">Action</th>
                </thead>
                @foreach ($ruang as $row)
                    <tr>
                        <td>{{ $row->nama_ruang }}</td>
                        <td>{{ $row->kode_ruang }}</td>
                        <td>{{ $row->keterangan }}</td>
                        <td>
                            <a href="{{ route('ruang.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('ruang.delete',[$row->id]) }}" method="post"> @method("delete") @csrf<button  onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                        </td>
                    </tr>
                @endforeach
                {{ $ruang->links() }}
            </table>
        </div>
    </div>
@endsection