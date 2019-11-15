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
                    <a href="{{ route('peminjaman.history') }}" class="btn btn-danger">Cancel</a>
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
                            <td>{{ $peminjaman->tanggal_kembali }}</td>
                        </tr>
                        <tr>
                            <td>Status Peminjaman</td>
                            <td>:</td>
                            <td>@if($peminjaman->status_peminjaman==1) Dikembalikan @else Belum Dikembalikan @endif </td>
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
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Tanggal Peminjaman</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                        </thead>
                        <tbody>
                            @foreach ($detailPinjam as $row)
                                <tr>
                                    <td>{{ $row->peminjaman->tanggal_pinjam }}</td>
                                    <td>{{ $row->inventaris->nama }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection