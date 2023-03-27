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
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <div>
                        <input autofocus type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama',$data->nama) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nomor_sk" class="form-label">Nomor SK</label>
                    <div>
                        <input type="text" class="form-control @error('nomor_sk') is-invalid @enderror" id="nomor_sk"
                            name="nomor_sk" value="{{ old('nomor_sk',$data->nomor_sk) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tanggal_sk" class="form-label">Tanggal SK</label>
                    <div>
                        <input onfocus="(this.type='date')" onblur="(this.type='text')" type="text"
                            class="form-control @error('tanggal_sk') is-invalid @enderror" id="tanggal_sk"
                            name="tanggal_sk" value="{{ old('tanggal_sk',$data->tanggal_sk) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tanggal_pelantikan" class="form-label">Tanggal Pelantikan</label>
                    <div>
                        <input onfocus="(this.type='date')" onblur="(this.type='text')" type="text"
                            class="form-control @error('tanggal_pelantikan') is-invalid @enderror"
                            id="tanggal_pelantikan" name="tanggal_pelantikan"
                            value="{{ old('tanggal_pelantikan',$data->tanggal_pelantikan) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="periode_jabatan" class="form-label">Periode Jabatan
                        <span class="text-info">
                            (Awal-Akhir)
                        </span></label>
                    <div>
                        <input type="text" class="form-control @error('periode_jabatan') is-invalid @enderror"
                            id="periode_jabatan" name="periode_jabatan"
                            value="{{ old('periode_jabatan',$data->periode_jabatan) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="file_sk" class="form-label">File SK</label>
                    <div>
                        <input type="file" class="form-control @error('file_sk') is-invalid @enderror" id="file_sk"
                            name="file_sk">
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
            <a class="btn btn-secondary col-12" href="{{ route('kades.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>