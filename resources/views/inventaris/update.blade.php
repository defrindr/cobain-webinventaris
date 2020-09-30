@extends('layouts.admin_template')
@section('title')
    Inventaris
@endsection
@section('head')
    Inventaris
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
            <form action="{{ route('inventaris.update',$inventaris->id) }}" method="POST" role="form">
                @method('PUT')
                @include('inventaris.form')
            </form>
        </div>
    </div>
@endsection