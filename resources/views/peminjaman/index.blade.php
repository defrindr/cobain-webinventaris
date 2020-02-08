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
            <a href="{{ route('peminjaman.create') }}" class="btn mb-1 btn-success">Tambah Peminjaman</a>
            <a href="{{ route('peminjaman.pinjam') }}" class="btn mb-1 text-white btn-warning">Peminjaman Disetujui</a>
            <a href="{{ route('peminjaman.reqKembali') }}" class="btn mb-1 text-white btn-warning">Requested Kembali</a>
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
                    @if((\Auth::user()->level->nama_level == "Administrator") or (\Auth::user()->level->nama_level == "Operator"))
                        colspan="4" 
                    @else 
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
                        @if((\Auth::user()->level->nama_level == "Administrator") or (\Auth::user()->level->nama_level == "Operator"))
                            <td>
                                <a href="{{ route('peminjaman.acceptPinjam',$row->id) }}"><i class="fa fa-bell text-warning"></i>ACC Peminjaman</a>
                            </td>
                            <td>
                                <a href="{{ route('peminjaman.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                            </td>
                        @endif
                        <td>
                            <form action="{{ route('peminjaman.delete',[$row->id]) }}" method="post"> @method("delete") @csrf <button  onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                        </td>
                    </tr>
                @endforeach
                {{ $peminjaman->links() }}
            </table>
        </div>
    </div>
@endsection