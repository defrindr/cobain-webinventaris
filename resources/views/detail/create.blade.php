@extends('layouts.admin_template')
@section('title')
    Detail Pinjam
@endsection
@section('head')
    Detail Pinjam
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
            <form action="{{ route('detailPinjam.store') }}" method="POST" role="form">
                @method('post')
                @csrf
                @include('detail.form')
            </form>
        </div>
    </div>
@endsection