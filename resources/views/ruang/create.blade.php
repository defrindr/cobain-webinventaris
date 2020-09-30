@extends('layouts.admin_template')
@section('title')
    Ruang
@endsection
@section('head')
    Ruang
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
            <form action="{{ route('ruang.store') }}" method="POST" role="form">
                @method('post')
                @include('ruang.form')
            </form>
        </div>
    </div>
@endsection