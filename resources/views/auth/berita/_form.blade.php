<div class="card shadow-sm">
    <div class="card-body">
        <div class="row gy-2 gx-3 justify-content-center">
            @if (Str::of(Route::currentRouteName())->after('.')=='edit')
            <div class="col-md-12">
                <img src="{{ asset('storage/'.$data->gambar) }}" class="img-thumbnail" alt="{{ $data->kode }}">
            </div>
            @endif
            <div class="col-md-2">
                <div class="form-group">
                    <label for="kode" class="form-label">Kode</label>
                    <div>
                        <input readonly type="text" class="form-control" id="kode" name="kode" value="{{ $kode }}">
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="judul" class="form-label">Judul</label>
                    <div>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                            name="judul" value="{{ old('judul',$data->judul) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <div>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                            id="keterangan" name="keterangan" value="{{ old('keterangan',$data->keterangan) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="gambar" class="form-label">Gambar</label>
                    <div>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                            name="gambar">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-footer mt-3">
            @if (Str::of(Route::currentRouteName())->after('.')=='create')
            <button type="submit" class="btn btn-primary col-12 mb-2">Tambah</button>
            @else
            <button type="submit" class="btn btn-warning col-12 mb-2">Ubah</button>
            @endif
            <a class="btn btn-secondary col-12" href="{{ route('berita.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>