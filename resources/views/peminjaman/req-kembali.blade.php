@extends('layouts.admin_template')
@section('title')
    Peminjaman
@endsection
@section('head')
    Peminjaman
@endsection
@section('desc')
    Index
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts.alert')
            <a href="{{ route('peminjaman.index') }}" class="btn mb-1 text-white btn-primary">Index Peminjaman</a>
            <a href="{{ route('peminjaman.pinjam') }}" class="btn mb-1 text-white btn-warning">Peminjaman Disetujui</a>
            <a href="{{ route('peminjaman.reqKembali') }}" class="btn mb-1 text-white btn-warning">Request Kembali</a>
            <a href="{{ route('peminjaman.history') }}" class="btn mb-1 text-white btn-warning">History Peminjaman</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped table-responsive-lg">
                <thead>
                    <th>Nama Pegawai</th>
                    <th>Jumlah Item Barang</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal kembali</th>
                    <th>Status peminjaman</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th
                    @if((\Auth::user()->level->nama_level == "Operator") or (\Auth::user()->level->nama_level == "Administrator"))
                        colspan="2" 
                    @endif
                     class="text-center">Action</th>
                </thead>
                @foreach ($peminjaman as $row)
                    <tr>
                        <td>{{ $row->pegawai->nama_pegawai }}</td>
                        <td>{{ count($row->detailPinjam)." Item" }}</td>
                        <td>{{ $row->tanggal_pinjam }}</td>
                        <td>@if($row->tanggal_kembali == null) Belum Dikembalikan @else {{ $row->tanggal_kembali }} @endif </td>
                        <td>@if($row->status_peminjaman == 1) Dikembalikan @else Belum Dikembalikan @endif</td>
                        <td>{{ $row->created_at }}</td>
                        <td>{{ $row->updated_at }}</td>
	                    <td>
	                        <a href="{{ route('peminjaman.show',$row->id) }}"><i class="fa fa-eye text-success"></i></a>
	                    </td>
                        @if((\Auth::user()->level->nama_level == "Operator") or (\Auth::user()->level->nama_level == "Administrator"))
                            <td>
                                <a href="{{ route('peminjaman.kembali',$row->id) }}"><i class="fa fa-bell text-warning"></i>ACC Kembali</a>
                            </td>
	                    @endif
                    </tr>
                @endforeach
                {{ $peminjaman->links() }}
            </table>
        </div>
    </div>
@endsection