@extends('layouts.admin_template')
@section('title')
    Petugas
@endsection
@section('head')
    Petugas
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
            <form action="{{ route('petugas.store') }}" method="POST" role="form">
                @method('post')
                @include('petugas.form')
            </form>
        </div>
    </div>
@endsection