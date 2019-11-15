@extends('layouts.admin_template')
@section('title')
    Pegawai
@endsection
@section('head')
    Pegawai
@endsection
@section('desc')
    Index
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts.alert')
            <a href="{{ route('pegawai.create') }}" class="btn btn-success">Tambah Pegawai</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>NIP</th>
                    <th>Keterangan</th>
                    <th colspan="2" class="text-center">Action</th>
                </thead>
                @foreach ($pegawai as $row)
                    <tr>
                        <td>{{ $row->nama_pegawai }}</td>
                        <td>{{ $row->user->username }}</td>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>
                            <a href="{{ route('pegawai.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('pegawai.delete',[$row->id]) }}" method="post"> @method("delete") @csrf<button onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                        </td>
                    </tr>
                @endforeach
                {{ $pegawai->links() }}
            </table>
        </div>
    </div>
@endsection