@extends('layouts.admin_template')
@section('title')
    Level
@endsection
@section('head')
    Level
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
            <form action="{{ route('level.store') }}" method="POST" role="form">
                @method('post')
                @include('level.form')
            </form>
        </div>
    </div>
@endsection