@if(isset($inventaris))
        @csrf
        <div class="form-group">
            <label for="id_ruang">Ruang ID</label>
            <select name="id_ruang" id="id_ruang" class="form-control">
                @foreach ($ruang as $row)
                    <option @if($row->id==$inventaris->id_ruang) selected @endif value="{{ $row->id }}">{{ $row->nama_ruang }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_jenis">Jenis ID</label>
            <select name="id_jenis" id="id_jenis" class="form-control">
                @foreach ($jenis as $row)
                    <option @if($row->id==$inventaris->id_jenis) selected @endif value="{{ $row->id }}">{{ $row->nama_jenis }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $inventaris->nama }}">
        </div>
        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select name="kondisi" id="kondisi" class="form-control">
                @foreach ($kondisi as $row)
                    <option @if($row == $inventaris->kondisi) selected @endif value="{{ $row }}">{{ $row }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $inventaris->keterangan }}">
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="{{ $inventaris->jumlah }}">
        </div>
        <div class="form-group">
            <label for="tanggal_register">Tanggal Register</label>
            <input type="date" name="tanggal_register" class="form-control" value="{{ date('Y-m-d',strtotime($inventaris->tanggal_register)) }}" readonly>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/inventaris" class="btn btn-danger">Cancel</a>
@else
        @csrf
        <div class="form-group">
            <label for="id_ruang">Ruang ID</label>
            <select name="id_ruang" id="id_ruang" class="form-control">
                @foreach ($ruang as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_ruang }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_jenis">Jenis ID</label>
            <select name="id_jenis" id="id_jenis" class="form-control">
                @foreach ($jenis as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_jenis }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select name="kondisi" id="kondisi" class="form-control">
                @foreach ($kondisi as $row)
                    <option value="{{ $row }}">{{ $row }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" value="1">
        </div>
        <div class="form-group">
            <label for="tanggal_register">tanggal_register</label>
            <input type="date" name="tanggal_register" class="form-control" value="{{ date('Y-m-d',time()) }}" readonly>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/inventaris" class="btn btn-danger">Cancel</a>
@endif