@extends('layouts.admin_template')
@section('title')
    Peminjaman
@endsection
@section('head')
    Peminjaman
@endsection
@section('desc')
    Create
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts/alert-validate')
        </div>
        <div class="box-body">
            <form action="{{ route('peminjaman.store') }}" method="POST" role="form">
                {{-- Stok Saat Ini {{ $inventaris->jumlah }} --}}
                @method('post')
                @include('peminjaman.form')
            </form>
        </div>
    </div>
@endsection