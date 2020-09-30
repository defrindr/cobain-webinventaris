@if(isset($peminjaman))
        @csrf
        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" value="{{ date('Y-m-d',strtotime($peminjaman->tanggal_pinjam)) }}">
        </div>
        @if(\Auth::user()->level->nama_level != "Peminjam")
            @if($peminjaman->status_peminjaman == 1)
                <div class="form-group">
                    <label for="tanggal_kembali">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" class="form-control" value="{{ date('Y-m-d',strtotime($peminjaman->tanggal_kembali)) }}">
                </div>
            @endif
            <div class="form-group">
                <label for="id_pegawai">ID Pegawai</label>
                <select name="id_pegawai" id="id_pegawai" class="form-control" disabled>
                    @foreach ($pegawai as $row)
                        <option @if($row->id == $peminjaman->id_pegawwai) selected @endif value="{{ $row->id }}">{{ $row->nama_pegawai }}</option>
                    @endforeach
                </select>
            </div>
            
        @endif
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/peminjaman" class="btn btn-danger">Cancel</a>
@else
        @csrf
        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" class="form-control" value="{{ date('Y-m-d',time()) }}" readonly>
        </div>
        <div class="form-group">
            @if(\Auth::user()->level->nama_level == "Peminjam")
                <input type="hidden" name="id_pegawai" value="{{ \Auth::user()->pegawai->id }}" class="form-control">
            @else
                <label for="id_pegawai">ID Pegawai</label>
                <select name="id_pegawai" id="id_pegawai" class="form-control">
                    @foreach ($pegawai as $row)
                        <option value="{{ $row->id }}">{{ $row->nama_pegawai }}</option>
                    @endforeach
                </select>
            @endif
        </div>
        <div class="form-group">
            Apakah Anda Yakin Untuk Melanjutkan ??
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/peminjaman" class="btn btn-danger">Cancel</a>
@endif