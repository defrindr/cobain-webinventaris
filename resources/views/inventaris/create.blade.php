@extends('layouts.admin_template')
@section('title')
    Inventaris
@endsection
@section('head')
    Inventaris
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
            <form action="{{ route('inventaris.store') }}" method="POST" role="form">
                @method('post')
                @include('inventaris.form')
            </form>
        </div>
    </div>
@endsection