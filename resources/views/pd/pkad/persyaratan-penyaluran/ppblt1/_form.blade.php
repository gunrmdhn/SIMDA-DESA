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
            <div class="col-md-6">
                <div class="form-group">
                    <label for="surat_pengantar_camat" class="form-label">Surat Pengantar Camat</label>
                    <div>
                        <input autofocus type="file"
                            class="form-control @error('surat_pengantar_camat') is-invalid @enderror"
                            id="surat_pengantar_camat" name="surat_pengantar_camat">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="surat_permohonan_penyaluran" class="form-label">Surat
                        Permohonan Penyaluran Bulan Januari/Maret</label>
                    <div>
                        <input type="file"
                            class="form-control @error('surat_permohonan_penyaluran') is-invalid @enderror"
                            id="surat_permohonan_penyaluran" name="surat_permohonan_penyaluran">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="perkades" class="form-label">Perkades Daftar KPM Penerima BLT {{ now()->year }}</label>
                    <div>
                        <input type="file" class="form-control @error('perkades') is-invalid @enderror" id="perkades"
                            name="perkades">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="perekaman" class="form-label">Perekaman BLT Sampai Dengan Bulan Desember {{ now()->year
                        - 1 }}</label>
                    <div>
                        <input type="file" class="form-control @error('perekaman') is-invalid @enderror" id="perekaman"
                            name="perekaman">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="perkades_tidak" class="form-label">Perkades Tidak Cukup Anggaran/Perkades Tidak Tersedia
                        Penerima BLT</label>
                    <div>
                        <input type="file" class="form-control @error('perkades_tidak') is-invalid @enderror"
                            id="perkades_tidak" name="perkades_tidak">
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
            <a class="btn btn-secondary col-12" href="{{ route('ppblt1.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>