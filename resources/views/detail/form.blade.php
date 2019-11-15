@if(isset($detailPinjam))
{{-- Form untuk mengubah --}}
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
    
    <input type="hidden" name="id_peminjaman" id="id_peminjaman" value="{{ $peminjaman->id }}" class="form-control">
    <div class="form-group">
        <div class="label">ID Inventaris</div>
        <select name="id_inventaris" id="id_inventaris_ajax" class="form-control">
            <option value="#">-- Pilih Inventaris --</option>
            @foreach ($inventaris as $row)
                <option value="{{ $row->id }}">{{ $row->nama }}</option>
            @endforeach
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