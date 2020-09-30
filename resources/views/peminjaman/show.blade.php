@extends('layouts.admin_template')
@section('title')
    Peminjaman
@endsection
@section('head')
    Peminjaman
@endsection
@section('desc')
    Show
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-danger">Cancel</a>
                    <a href="{{ route('peminjaman.update',$peminjaman->id) }}" class="btn btn-primary">Update</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Nama Pegawai</td>
                            <td>:</td>
                            <td>{{ $peminjaman->pegawai->nama_pegawai }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Pinjam</td>
                            <td>:</td>
                            <td>{{ $peminjaman->tanggal_pinjam }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Kembali</td>
                            <td>:</td>
                            <td>@if($peminjaman->tanggal_kembali == null) Dikembalikan @else Belum Dikembalikan @endif</td>
                        </tr>
                        <tr>
                            <td>Status Peminjaman</td>
                            <td>:</td>
                            <td>@if($peminjaman->status_peminjaman == 1) Dikembalikan @else Belum Dikembalikan @endif </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    @include('layouts.alert')
                    <h4>Detail Pinjam</h4>
                    <a href="{{ route('detailPinjam.create',$peminjaman->id) }}" class="btn btn-success">Tambah Detail Pinjam</a>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Tanggal Peminjaman</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th colspan="2" class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($detailPinjam as $row)
                                <tr>
                                    <td>{{ $row->peminjaman->tanggal_pinjam }}</td>
                                    <td>{{ $row->inventaris->nama }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                    <td>
                                        <a href="{{ route('detailPinjam.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('detailPinjam.delete',[$row->id]) }}" method="post"> @method("delete") @csrf<button  onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection