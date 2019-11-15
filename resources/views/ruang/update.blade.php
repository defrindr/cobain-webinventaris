@extends('layouts.admin_template')
@section('head')
    Ruang
@endsection
@section('head')
    Ruang
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
            <form action="{{ route('ruang.update',$ruang->id) }}" method="POST" role="form">
                @method('PUT')
                @include('ruang.form')
            </form>
        </div>
    </div>
@endsection