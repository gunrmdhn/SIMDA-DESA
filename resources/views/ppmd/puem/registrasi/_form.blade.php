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
                    <label for="nama_bumdes" class="form-label">Nama Bumdes</label>
                    <div>
                        <input autofocus type="text" class="form-control @error('nama_bumdes') is-invalid @enderror"
                            id="nama_bumdes" name="nama_bumdes" value="{{ old('nama_bumdes',$data->nama_bumdes) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tahun_pembentukan" class="form-label">Tahun Pembentukan</label>
                    <div>
                        <input type="number" min="1990" max="{{ now()->year }}" step="1"
                            class="form-control @error('tahun_pembentukan') is-invalid @enderror" id="tahun_pembentukan"
                            name="tahun_pembentukan" value="{{ old('tahun_pembentukan',$data->tahun_pembentukan) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <label class="form-label">Produk Hukum</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="npp" class="form-label">Nomor Perdes Pembentukan</label>
                                <div>
                                    <input type="text" class="form-control @error('npp') is-invalid @enderror" id="npp"
                                        name="npp" value="{{ old('npp',$data->npp) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nkkpp" class="form-label">Nomor Keputusan Kades Pengangkatan
                                    Pengurus</label>
                                <div>
                                    <input type="text" class="form-control @error('nkkpp') is-invalid @enderror"
                                        id="nkkpp" name="nkkpp" value="{{ old('nkkpp',$data->nkkpp) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-12">
                <label class="form-label">Register Badan Hukum</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="verifikasi_nama" class="form-label">Verifikasi Nama</label>
                                <div>
                                    <select class="form-select @error('verifikasi_nama') is-invalid @enderror"
                                        id="verifikasi_nama" name="verifikasi_nama">
                                        <option hidden selected></option>
                                        @foreach ($verifikasi as $item)
                                        <option @selected(old('verifikasi_nama',$data->verifikasi_nama)==$item)
                                            value="{{
                                            $item
                                            }}">{{ $item }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="verifikasi_dokumen" class="form-label">Verifikasi Dokumen</label>
                                <div>
                                    <select class="form-select @error('verifikasi_dokumen') is-invalid @enderror"
                                        id="verifikasi_dokumen" name="verifikasi_dokumen">
                                        <option hidden selected></option>
                                        @foreach ($verifikasi as $item)
                                        <option @selected(old('verifikasi_dokumen',$data->verifikasi_dokumen)==$item)
                                            value="{{
                                            $item
                                            }}">{{ $item }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="proses_registrasi_badan_hukum" class="form-label">Proses Registrasi Badan
                                    Hukum</label>
                                <div>
                                    <select
                                        class="form-select @error('proses_registrasi_badan_hukum') is-invalid @enderror"
                                        id="proses_registrasi_badan_hukum" name="proses_registrasi_badan_hukum">
                                        <option hidden selected></option>
                                        @foreach ($verifikasi as $item)
                                        <option @selected(old('proses_registrasi_badan_hukum',$data->
                                            proses_registrasi_badan_hukum)==$item)
                                            value="{{
                                            $item
                                            }}">{{ $item }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_unggah" class="form-label">Tanggal Unggah</label>
                                <div>
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" type="text"
                                        class="form-control @error('tanggal_unggah') is-invalid @enderror"
                                        id="tanggal_unggah" name="tanggal_unggah"
                                        value="{{ old('tanggal_unggah',$data->tanggal_unggah) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_kedaluwarsa" class="form-label">Tanggal Kedaluwarsa</label>
                                <div>
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" type="text"
                                        class="form-control @error('tanggal_kedaluwarsa') is-invalid @enderror"
                                        id="tanggal_kedaluwarsa" name="tanggal_kedaluwarsa"
                                        value="{{ old('tanggal_kedaluwarsa',$data->tanggal_kedaluwarsa) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun" class="form-label">Tahun</label>
                                <div>
                                    <input type="number" min="1990" max="{{ now()->year }}" step="1"
                                        class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                                        name="tahun" value="{{ old('tahun',$data->tahun) }}">
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
                <label class="form-label">Profil Pengurus</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_ketua" class="form-label">Nama Ketua</label>
                                <div>
                                    <input type="text" class="form-control @error('nama_ketua') is-invalid @enderror"
                                        id="nama_ketua" name="nama_ketua"
                                        value="{{ old('nama_ketua',$data->nama_ketua) }}">
                                </div>
                            </div>
                        </div>
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
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <div>
                                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror"
                                        id="jenis_kelamin" name="jenis_kelamin">
                                        <option hidden selected></option>
                                        @foreach ($jenis_kelamin as $item)
                                        <option @selected(old('jenis_kelamin',$data->jenis_kelamin)==$item) value="{{
                                            $item
                                            }}">{{ $item }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jumlah_pengurus" class="form-label">Jumlah Pengurus</label>
                                <div>
                                    <input type="number" min="0"
                                        class="form-control @error('jumlah_pengurus') is-invalid @enderror"
                                        id="jumlah_pengurus" name="jumlah_pengurus"
                                        value="{{ old('jumlah_pengurus',$data->jumlah_pengurus) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jumlah_unit_usaha" class="form-label">Jumlah Unit Usaha</label>
                    <div>
                        <input type="number" min="0"
                            class="form-control @error('jumlah_unit_usaha') is-invalid @enderror" id="jumlah_unit_usaha"
                            name="jumlah_unit_usaha" value="{{ old('jumlah_unit_usaha',$data->jumlah_unit_usaha) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jumlah_omzet" class="form-label">Jumlah Omzet Tahun {{ now()->year-1 }}</label>
                    <div>
                        <input type="number" min="0" class="form-control @error('jumlah_omzet') is-invalid @enderror"
                            id="jumlah_omzet" name="jumlah_omzet" value="{{ old('jumlah_omzet',$data->jumlah_omzet) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jumlah_total_pmd" class="form-label">Jumlah Total Penyertaan Modal Desa</label>
                    <div>
                        <input type="number" min="0"
                            class="form-control @error('jumlah_total_pmd') is-invalid @enderror" id="jumlah_total_pmd"
                            name="jumlah_total_pmd" value="{{ old('jumlah_total_pmd',$data->jumlah_total_pmd) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jumlah_total_pmsl" class="form-label">Jumlah Total Penyertaan Modal Sumber
                        Lainnya</label>
                    <div>
                        <input type="number" min="0"
                            class="form-control @error('jumlah_total_pmsl') is-invalid @enderror" id="jumlah_total_pmsl"
                            name="jumlah_total_pmsl" value="{{ old('jumlah_total_pmsl',$data->jumlah_total_pmsl) }}">
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
            <a class="btn btn-secondary col-12" href="{{ route('registrasi.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>