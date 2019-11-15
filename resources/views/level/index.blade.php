@extends('layouts.admin_template')
@section('title')
    Level
@endsection
@section('head')
    Level
@endsection
@section('desc')
    Index
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts.alert')
            <a href="{{ route('level.create') }}" class="btn btn-success">Tambah Level</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>Nama Level</th>
                    <th colspan="2" class="text-center">Action</th>
                </thead>
                @foreach ($level as $row)
                    <tr>
                        <td>{{ $row->nama_level }}</td>
                        <td>
                            <a href="{{ route('level.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('level.delete',$row->id) }}" method="post"> @method("delete") @csrf<button  onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                        </td>
                    </tr>
                @endforeach
                {{ $level->links() }}
            </table>
        </div>
    </div>
@endsection