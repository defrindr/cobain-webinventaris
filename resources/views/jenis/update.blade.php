@extends('layouts.admin_template')
@section('title')
    Jenis
@endsection
@section('head')
    Jenis
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
            <form action="{{ route('jenis.update',$jenis->id) }}" method="POST" role="form">
                @method('PUT')
                @include('jenis.form')
            </form>
        </div>
    </div>
@endsection