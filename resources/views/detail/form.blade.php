@if(isset($detailPinjam))
{{-- Form untuk mengubah --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">ID Inventaris</div>
                <select name="id_inventaris" id="id_inventaris_ajax" class="form-control" disabled>
                    @foreach ($inventaris as $row)
                        <option @if($row->id == $detailPinjam->id_inventaris) selected @endif value="{{ $row->id }}">{{ $row->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">ID Inventaris</div>
                <select name="id_inventaris" id="id_inventaris_ajax" class="form-control" disabled>
                    @foreach ($inventaris as $row)
                        <option @if($row->id == $detailPinjam->id_inventaris) selected @endif value="{{ $row->id }}">{{ $row->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="label">ID Inventaris</div>
        <select name="id_inventaris" id="id_inventaris_ajax" class="form-control" disabled>
            @foreach ($inventaris as $row)
                <option @if($row->id == $detailPinjam->id_inventaris) selected @endif value="{{ $row->id }}">{{ $row->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" class="form-control"  max="{{ $jumlahInventaris+$detailPinjam->jumlah }}" value="{{ $detailPinjam->jumlah }}">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{ route('peminjaman.show',$peminjaman->id) }}" class="btn btn-danger">Cancel</a>
@else
{{-- Form Untuk Membuat --}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Nama Ruang</div>
                <select id="id_ruang_selected" class="form-control">
                    <option value="0">-- Pilih Ruang --</option>
                    @foreach($ruang as $row)
                        <option value="{{ $row->id }}">{{ $row->nama_ruang }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="label">Jenis Barang</div>
                <select name="id_jenis" id="id_jenis_ajax"class="form-control" disabled="disabled">
                    <option value="0">--Pilih Jenis --</option>
                </select>
            </div>
        </div>
    </div>

    <input type="hidden" name="id_peminjaman" id="id_peminjaman" value="{{ $peminjaman->id }}" class="form-control">
    <div class="form-group">
        <div class="label">Nama Inventaris</div>
        <select name="id_inventaris" id="id_inventaris_ajax" class="form-control" disabled="disabled">
        </select>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <div id="jumlahInvent"></div>
        <input type="number" disabled id="jumlah" name="jumlah" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{ route('peminjaman.show',$peminjaman->id) }}" class="btn btn-danger">Cancel</a>
@endif