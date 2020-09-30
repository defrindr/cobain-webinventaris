@if(isset($petugas))
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $petugas->user->username }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="nama_petugas">Nama Petugas</label>
            <input type="text" name="nama_petugas" class="form-control" value="{{ $petugas->nama_petugas }}">
        </div>
        <div class="form-group">
            <label for="id_level">Level Id</label>
            <select name="id_level" id="id_level" class="form-control">
                @foreach ($level as $row)
                    <option @if($row->id == $petugas->user->level->id) selected @endif value="{{ $row->id }}">{{ $row->nama_level }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/petugas" class="btn btn-danger">Cancel</a>
@else
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="nama_petugas">Nama Petugas</label>
            <input type="text" name="nama_petugas" class="form-control">
        </div>
        <div class="form-group">
            <label for="id_level">Level Id</label>
            <select name="id_level" id="id_level" class="form-control">
                @foreach ($level as $row)
                    <option value="{{ $row->id }}">{{ $row->nama_level }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/petugas" class="btn btn-danger">Cancel</a>
@endif