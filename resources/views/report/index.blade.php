@extends('layouts.admin_template')
@section('title')
    Report Page
@endsection
@section('head')
    Menu Laporan
@endsection
@section('desc')
    inventaris apps
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts.alert')
        </div>
        <div class="box-body">
            <a href="{{ route('report.peminjaman') }}" class="btn btn-success m-2">Unduh Laporan Peminjaman</a>
            <a href="{{ route('report.inventaris') }}" class="btn btn-success m-2">Unduh Laporan Inventaris</a>
            <a href="{{ route('report.jenis') }}" class="btn btn-success m-2">Unduh Laporan Jenis Barang</a>
            <a href="{{ route('report.ruang') }}" class="btn btn-success m-2">Unduh Laporan Daftar Ruang</a>
        </div>
    </div>
    <style type="text/css" media="screen">
        .btn-success:focus{
            color: #fff;
        }
    </style>
@endsection