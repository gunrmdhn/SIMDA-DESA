<div class="card shadow-sm">
    <div class="card-body">
        <div class="row gy-2 gx-3">
            @if (Str::of(Route::currentRouteName())->after('.')=='create'
            ||Str::of(Route::currentRouteName())->after('.')=='edit')
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                    <div>
                        <input autofocus type="text" class="form-control @error('nama_pengguna') is-invalid @enderror"
                            id="nama_pengguna" name="nama_pengguna"
                            value="{{ old('nama_pengguna',$data->nama_pengguna) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="peran" class="form-label">Peran</label>
                    <div>
                        <select class="form-control
                        @error('peran')
                        is-invalid
                        @enderror" id="peran" name="peran">
                            <option value="{{ null }}" hidden selected></option>
                            @foreach ($peran as $item)
                            <option @selected(old('peran', $data->peran)==$item) value="{{ $item }}">{{ $item }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="kode_kecamatan" class="form-label">Kode Kecamatan</label>
                    <div>
                        <input type="text" class="form-control @error('kode_kecamatan') is-invalid @enderror"
                            id="kode_kecamatan" name="kode_kecamatan"
                            value="{{ old('kode_kecamatan',$data->kode_kecamatan) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <div>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"
                            name="kecamatan" value="{{ old('kecamatan',$data->kecamatan) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="kode_desa" class="form-label">Kode Desa</label>
                    <div>
                        <input type="text" class="form-control @error('kode_desa') is-invalid @enderror" id="kode_desa"
                            name="kode_desa" value="{{ old('kode_desa',$data->kode_desa) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="desa" class="form-label">Desa</label>
                    <div>
                        <input type="text" class="form-control @error('desa') is-invalid @enderror" id="desa"
                            name="desa" value="{{ old('desa',$data->desa) }}">
                    </div>
                </div>
            </div>
            @if(Str::of(Route::currentRouteName())->after('.')=='create')
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password">
                        <span class="input-group-text">
                            <button type="button" class="view-password btn btn-sm btn-outline-info">Lihat</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <div class="input-group">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation">
                        <span class="input-group-text">
                            <button type="button"
                                class="view-password-confirmation btn btn-sm btn-outline-info">Lihat</button>
                        </span>
                    </div>
                </div>
            </div>
            @endif
            @endif
        </div>
        <div class="form-footer mt-3">
            @if (Str::of(Route::currentRouteName())->after('.')=='create')
            <button type="submit" class="btn btn-primary col-12 mb-2">Tambah</button>
            @else
            <input type="hidden" name="id" value="{{ $data->id }}">
            <button type="submit" class="btn btn-warning col-12 mb-2">Ubah</button>
            @endif
            <a class="btn btn-secondary col-12" href="{{ route('admin.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>