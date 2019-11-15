@extends('layouts.admin_template')
@section('title')
    Jenis
@endsection
@section('head')
    Jenis
@endsection
@section('desc')
    Index
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts.alert')
            <a href="{{ route('jenis.create') }}" class="btn btn-success">Tambah Jenis</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Nama</th>
                    <th>Kode Jenis</th>
                    <th>Keterangan</th>
                    <th colspan="2" class="text-center">Action</th>
                </thead>
                @foreach ($jenis as $row)
                    <tr>
                        <td>{{ $row->nama_jenis }}</td>
                        <td>{{ $row->kode_jenis }}</td>
                        <td>{{ $row->keterangan }}</td>
                        <td>
                            <a href="{{ route('jenis.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('jenis.delete',[$row->id]) }}" method="post"> @method("delete") @csrf<button  onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                        </td>
                    </tr>
                @endforeach
                {{ $jenis->links() }}
            </table>
        </div>
    </div>
@endsection