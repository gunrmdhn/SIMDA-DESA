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
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                    <div>
                        <input autofocus type="text" class="form-control @error('nama_pegawai') is-invalid @enderror"
                            id="nama_pegawai" name="nama_pegawai" value="{{ old('nama_pegawai',$data->nama_pegawai) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <div>
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                            name="jenis_kelamin">
                            <option hidden selected></option>
                            @foreach ($jenis_kelamin as $item)
                            <option @selected(old('jenis_kelamin',$data->jenis_kelamin)==$item) value="{{ $item
                                }}">{{ $item }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">KTP</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <div>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" name="alamat" value="{{ old('alamat',$data->alamat) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_ktp" class="form-label">Nomor KTP</label>
                                <div>
                                    <input type="number" min="0" step="1"
                                        class="form-control @error('nomor_ktp') is-invalid @enderror" id="nomor_ktp"
                                        name="nomor_ktp" value="{{ old('nomor_ktp',$data->nomor_ktp) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-12">
                <label class="form-label">Jabatan</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_sk_jabatan" class="form-label">Nomor SK Jabatan</label>
                                <div>
                                    <input type="text"
                                        class="form-control @error('nomor_sk_jabatan') is-invalid @enderror"
                                        id="nomor_sk_jabatan" name="nomor_sk_jabatan"
                                        value="{{ old('nomor_sk_jabatan',$data->nomor_sk_jabatan) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tmt_pelantikan" class="form-label">TMT Pelantikan</label>
                                <div>
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" type="text"
                                        class="form-control @error('tmt_pelantikan') is-invalid @enderror"
                                        id="tmt_pelantikan" name="tmt_pelantikan"
                                        value="{{ old('tmt_pelantikan',$data->tmt_pelantikan) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-12">
                <label class="form-label">Pangkat / Golongan Terakhir</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tmt" class="form-label">TMT</label>
                                <div>
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" type="text"
                                        class="form-control @error('tmt') is-invalid @enderror" id="tmt" name="tmt"
                                        value="{{ old('tmt',$data->tmt) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_sk" class="form-label">Nomor SK</label>
                                <div>
                                    <input type="text" class="form-control @error('nomor_sk') is-invalid @enderror"
                                        id="nomor_sk" name="nomor_sk" value="{{ old('nomor_sk',$data->nomor_sk) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="npwp" class="form-label">NPWP</label>
                    <div>
                        <input type="number" min="0" step="1" class="form-control @error('npwp') is-invalid @enderror"
                            id="npwp" name="npwp" value="{{ old('npwp',$data->npwp) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="file_dokumen" class="form-label">File Dokumen (SK Pangkat Terakhir/Naskah Pelantikan/SK
                        Jabatan/NPWP/KTP)</label>
                    <div>
                        <input type="file" class="form-control @error('file_dokumen') is-invalid @enderror"
                            id="file_dokumen" name="file_dokumen">
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
            <a class="btn btn-secondary col-12" href="{{ route('pegawai-dpmpd.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>