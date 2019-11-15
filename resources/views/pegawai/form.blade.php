@if(isset($pegawai))
        @csrf
        <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" class="form-control" value="{{ $pegawai->nama_pegawai }}">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="{{ $pegawai->user->username }}">
        </div>

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}" disabled>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $pegawai->alamat }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/pegawai" class="btn btn-danger">Cancel</a>
@else
        @csrf
        <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" class="form-control">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control">
        </div>

        <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $nip }}" readonly>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/pegawai" class="btn btn-danger">Cancel</a>
@endif