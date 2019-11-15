@extends('layouts.admin_template')
@section('title')
    Peminjaman
@endsection
@section('head')
    Peminjaman
@endsection
@section('desc')
    Update
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts/alert-validate')
        </div>
        <div class="box-body">
            <form action="{{ route('peminjaman.update',$peminjaman->id) }}" method="POST" role="form">
                @method('PUT')
                @include('peminjaman.form')
            </form>
        </div>
    </div>
@endsection