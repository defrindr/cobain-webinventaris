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
                    <th>Status</th>
                    @if(\App\Helpers\MyHelper::isAdmin())
                        <th colspan="2" class="text-center">Action</th>
                    @endif
                </thead>
                @foreach ($pegawai as $row)
                    <tr>
                        <td>{{ $row->nama_pegawai }}</td>
                        <td>{{ $row->user->username }}</td>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ \App\Helpers\MyHelper::statusChange($row->status,"Akun Aktif","Akun tidak aktif") }}</td>
                        @if(\App\Helpers\MyHelper::isAdmin())
                            <td>
                                <a href="{{ route('pegawai.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('pegawai.switch',[$row->id]) }}" method="post"> @method("post") @csrf<button onclick="return confirm('Yakin Ingin menjalankan aksi ini ?')" style="background:transparent;border:0;color:blue" class="fa fa-map-marker"></button></form>
                            </td>
                            <td>
                                <form action="{{ route('pegawai.delete',[$row->id]) }}" method="post"> @method("delete") @csrf<button onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                            </td>
                        @endif
                    </tr>
                @endforeach
                {{ $pegawai->links() }}
            </table>
        </div>
    </div>
@endsection