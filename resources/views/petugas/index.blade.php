@extends('layouts.admin_template')
@section('title')
    Petugas
@endsection
@section('head')
    Petugas
@endsection
@section('desc')
    Index
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts.alert')
            <a href="{{ route('petugas.create') }}" class="btn btn-success">Tambah Petugas</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Username</th>
                    <th>Nama Petugas</th>
                    <th>ID Level</th>
                    <th colspan="2" class="text-center">Action</th>
                </thead>
                @foreach ($petugas as $row)
                    <tr>
                        <td>{{ $row->user->username }}</td>
                        <td>{{ $row->nama_petugas }}</td>
                        <td>{{ $row->user->level->nama_level }}</td>
                        <td>
                            <a href="{{ route('petugas.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('petugas.delete',[$row->id]) }}" method="post"> @method("delete") @csrf<button  onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                        </td>
                    </tr>
                @endforeach
                {{ $petugas->links() }}
            </table>
        </div>
    </div>
@endsection