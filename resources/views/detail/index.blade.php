@extends('layouts.admin_template')
@section('title')
    Detail Pinjam
@endsection
@section('head')
    Detail Pinjam
@endsection
@section('desc')
    Index
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-header">
            @include('layouts.alert')
            <a href="{{ route('detailPinjam.create') }}" class="btn btn-success">Tambah Detail Pinjam</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <th>ID Inventaris</th>
                    <th>Jumlah</th>
                    <th colspan="2" class="text-center">Action</th>
                </thead>
                @foreach ($detailPinjam as $row)
                    <tr>
                        <td>{{ $row->id_inventaris }}</td>
                        <td>{{ $row->jumlah }}</td>
                        <td>
                            <a href="{{ route('detailPinjam.edit',$row->id) }}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('detailPinjam.delete',[$row->id]) }}" method="post"> @method("delete") @csrf<button  onclick="return confirm('Yakin Ingin menghapus data ini ?')" style="background:transparent;border:0;color:red" class="fa fa-trash"></button></form>
                        </td>
                    </tr>
                @endforeach
                {{ $detailPinjam->links() }}
            </table>
        </div>
    </div>
@endsection