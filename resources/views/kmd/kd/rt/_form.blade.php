<div class="card shadow-sm">
    <div class="card-body">
        <div class="row gy-2 gx-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="kode" class="form-label">Kode</label>
                    <div>
                        <input readonly type="text" class="form-control" id="kode" name="kode" value="{{ $kode }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="kode_kecamatan" class="form-label">Kode Kecamatan</label>
                    <div>
                        <input readonly type="text" class="form-control" id="kode_kecamatan" name="kode_kecamatan"
                            value="{{ $kode_kecamatan }}">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <div>
                        <input readonly type="text" class="form-control" id="kecamatan" name="kecamatan"
                            value="{{ $kecamatan }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="kode_desa" class="form-label">Kode Desa</label>
                    <div>
                        <input readonly type="text" class="form-control" id="kode_desa" name="kode_desa"
                            value="{{ $kode_desa }}">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="desa" class="form-label">Desa</label>
                    <div>
                        <input readonly type="text" class="form-control" id="desa" name="desa" value="{{ $desa }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Informasi Jumlah RT/RW</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_rw" class="form-label">Jumlah RW</label>
                                <div>
                                    <input autofocus type="number" min="0"
                                        class="form-control @error('jumlah_rw') is-invalid @enderror" id="jumlah_rw"
                                        name="jumlah_rw" value="{{ old('jumlah_rw',$data->jumlah_rw) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_rt" class="form-label">Jumlah RT</label>
                                <div>
                                    <input type="number" min="0"
                                        class="form-control @error('jumlah_rt') is-invalid @enderror" id="jumlah_rt"
                                        name="jumlah_rt" value="{{ old('jumlah_rt',$data->jumlah_rt) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="form-footer mt-3">
            @if (Str::of(Route::currentRouteName())->after('.')=='create')
            <button type="submit" class="btn btn-primary col-12 mb-2">Tambah</button>
            @else
            <button type="submit" class="btn btn-warning col-12 mb-2">Ubah</button>
            @endif
            <a class="btn btn-secondary col-12" href="{{ route('rt.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>