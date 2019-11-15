@if(isset($level))
        @csrf
        <div class="form-group">
            <label for="nama_level">Nama Level</label>
            <input type="text" name="nama_level" class="form-control" value="{{ $level->nama_level }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/level" class="btn btn-danger">Cancel</a>
@else
        @csrf
        <div class="form-group">
            <label for="nama_level">Nama level</label>
            <input type="text" name="nama_level" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/level" class="btn btn-danger">Cancel</a>
@endif