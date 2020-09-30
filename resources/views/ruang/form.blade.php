@if(isset($ruang))
        @csrf
        <div class="form-group">
            <label for="kode_ruang">Kode Ruang</label>
            <input type="text" name="kode_ruang" class="form-control" value="{{ $ruang->kode_ruang }}" disabled>
        </div>
        <div class="form-group">
            <label for="nama_ruang">Nama Ruang</label>
            <input type="text" name="nama_ruang" class="form-control" value="{{ $ruang->nama_ruang }}">
        </div>
        <div class="form-group">
            <label for="keterangan">keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $ruang->keterangan }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/ruang" class="btn btn-danger">Cancel</a>
@else
        @csrf
        <div class="form-group">
            <label for="kode_ruang">kode_ruang</label>
            <input type="text" name="kode_ruang" class="form-control" value="{{ $kodeRuang }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_ruang">Nama Ruang</label>
            <input type="text" name="nama_ruang" class="form-control">
        </div>
        <div class="form-group">
            <label for="keterangan">keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/ruang" class="btn btn-danger">Cancel</a>
@endif