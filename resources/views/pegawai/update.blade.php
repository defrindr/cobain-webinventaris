@extends('layouts.admin_template')
@section('title')
    Pegawai
@endsection
@section('head')
    Pegawai
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
            <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST" role="form">
                @method('PUT')
                @include('pegawai.form')
            </form>
        </div>
    </div>
@endsection