@if(isset($jenis))
        @csrf
        <div class="form-group">
            <label for="kode_jenis">Kode Jenis</label>
            <input type="text" name="kode_jenis" class="form-control" value="{{ $jenis->kode_jenis }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_jenis">Nama Jenis</label>
            <input type="text" name="nama_jenis" class="form-control" value="{{ $jenis->nama_jenis }}">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $jenis->keterangan }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/jenis" class="btn btn-danger">Cancel</a>
@else
        @csrf
        <div class="form-group">
            <label for="kode_jenis">Kode Jenis</label>
            <input type="text" name="kode_jenis" class="form-control" value="{{ $kodeJenis }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_jenis">Nama Jenis</label>
            <input type="text" name="nama_jenis" class="form-control">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/jenis" class="btn btn-danger">Cancel</a>
@endif