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
                <label class="form-label">Informasi Perkembangan Desa Lokus Stunting </label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="info_lokus_stunting" class="form-label">Info Lokus Stunting</label>
                                <div>
                                    <select atu class="form-control
                                    @error('info_lokus_stunting')
                                    is-invalid
                                    @enderror" id="info_lokus_stunting" name="info_lokus_stunting">
                                        <option value="{{ null }}" hidden selected></option>
                                        @foreach ($info_lokus_stunting as $item)
                                        <option @selected(old('info_lokus_stunting', $data->info_lokus_stunting)==$item)
                                            value="{{ $item }}">{{
                                            $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sk_bupati" class="form-label">SK Bupati</label>
                                <div>
                                    <input type="file" class="form-control @error('sk_bupati') is-invalid @enderror"
                                        id="sk_bupati" name="sk_bupati">
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
            <a class="btn btn-secondary col-12" href="{{ route('stunting.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>