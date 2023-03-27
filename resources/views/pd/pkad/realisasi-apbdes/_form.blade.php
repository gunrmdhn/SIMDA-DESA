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
                <label class="form-label">Informasi ADD</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah_salur_add" class="form-label">Jumlah Salur ADD</label>
                                <div>
                                    <input autofocus type="number" min="0"
                                        class="form-control @error('jumlah_salur_add') is-invalid @enderror"
                                        id="jumlah_salur_add" name="jumlah_salur_add"
                                        value="{{ old('jumlah_salur_add',$data->jumlah_salur_add) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="realisasi_belanja_add" class="form-label">Realisasi Belanja ADD</label>
                                <div>
                                    <input type="number" min="0"
                                        class="form-control @error('realisasi_belanja_add') is-invalid @enderror"
                                        id="realisasi_belanja_add" name="realisasi_belanja_add"
                                        value="{{ old('realisasi_belanja_add',$data->realisasi_belanja_add) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sisa_add" class="form-label">Sisa ADD</label>
                                <div>
                                    <input type="number" min="0"
                                        class="form-control @error('sisa_add') is-invalid @enderror" id="sisa_add"
                                        name="sisa_add" value="{{ old('sisa_add',$data->sisa_add) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-12">
                <label class="form-label">Informasi Dana Desa</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah_salur_dana_desa" class="form-label">Jumlah Salur Dana Desa</label>
                                <div>
                                    <input type="number" min="0"
                                        class="form-control @error('jumlah_salur_dana_desa') is-invalid @enderror"
                                        id="jumlah_salur_dana_desa" name="jumlah_salur_dana_desa"
                                        value="{{ old('jumlah_salur_dana_desa',$data->jumlah_salur_dana_desa) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="realisasi_belanja_dana_desa" class="form-label">Realisasi Belanja
                                    ADD</label>
                                <div>
                                    <input type="number" min="0"
                                        class="form-control @error('realisasi_belanja_dana_desa') is-invalid @enderror"
                                        id="realisasi_belanja_dana_desa" name="realisasi_belanja_dana_desa"
                                        value="{{ old('realisasi_belanja_dana_desa',$data->realisasi_belanja_dana_desa) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sisa_dana_desa" class="form-label">Sisa ADD</label>
                                <div>
                                    <input type="number" min="0"
                                        class="form-control @error('sisa_dana_desa') is-invalid @enderror"
                                        id="sisa_dana_desa" name="sisa_dana_desa"
                                        value="{{ old('sisa_dana_desa',$data->sisa_dana_desa) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="baliho" class="form-label">Baliho</label>
                    <div>
                        <input type="file" class="form-control @error('baliho') is-invalid @enderror" id="baliho"
                            name="baliho">
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
            <a class="btn btn-secondary col-12" href="{{ route('realisasi-apbdes.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>