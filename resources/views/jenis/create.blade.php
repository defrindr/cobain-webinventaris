@extends('layouts.admin_template')
@section('title')
    Jenis
@endsection
@section('head')
    Jenis
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
            <form action="{{ route('jenis.store') }}" method="POST" role="form">
                @method('post')
                @include('jenis.form')
            </form>
        </div>
    </div>
@endsection