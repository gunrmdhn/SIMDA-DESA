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
                        <input readonly type="text" class="form-control" id="nama_bumdes" name="nama_bumdes"
                            value="{{ $data->nama_bumdes }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tahun_pembentukan" class="form-label">Tahun Pembentukan</label>
                    <div>
                        <input readonly type="text" class="form-control" id="tahun_pembentukan" name="tahun_pembentukan"
                            value="{{ $data->tahun_pembentukan }}">
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
                                    <input readonly type="text" class="form-control" id="npp" name="npp"
                                        value="{{ $data->npp }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nkkpp" class="form-label">Nomor Keputusan Kades Pengangkatan
                                    Pengurus</label>
                                <div>
                                    <input type="text" class="form-control" id="nkkpp" name="nkkpp"
                                        value="{{ $data->nkkpp }}">
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
                                    <input readonly type="text" class="form-control" id="verifikasi_nama"
                                        name="verifikasi_nama" value="{{ $data->verifikasi_nama }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="verifikasi_dokumen" class="form-label">Verifikasi Dokumen</label>
                                <div>
                                    <input readonly type="text" class="form-control" id="verifikasi_dokumen"
                                        name="verifikasi_dokumen" value="{{ $data->verifikasi_dokumen }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="proses_registrasi_badan_hukum" class="form-label">Proses Registrasi Badan
                                    Hukum</label>
                                <div>
                                    <input readonly type="text" class="form-control" id="proses_registrasi_badan_hukum"
                                        name="proses_registrasi_badan_hukum"
                                        value="{{ $data->proses_registrasi_badan_hukum }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_unggah" class="form-label">Tanggal Unggah</label>
                                <div>
                                    <input readonly type="text" class="form-control" id="tanggal_unggah"
                                        name="tanggal_unggah" value="{{ $data->tanggal_unggah }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_kedaluwarsa" class="form-label">Tanggal Kedaluwarsa</label>
                                <div>
                                    <input readonly type="text" class="form-control" id="tanggal_kedaluwarsa"
                                        name="tanggal_kedaluwarsa" value="{{ $data->tanggal_kedaluwarsa }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun" class="form-label">Tahun</label>
                                <div>
                                    <input readonly type="text" class="form-control" id="tahun" name="tahun"
                                        value="{{ $data->tahun }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_sk" class="form-label">Nomor SK</label>
                                <div>
                                    <input readonly type="text" class="form-control" id="nomor_sk" name="nomor_sk"
                                        value="{{ $data->nomor_sk }}">
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
                                    <input readonly type="text" class="form-control" id="nama_ketua" name="nama_ketua"
                                        value="{{ $data->nama_ketua }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <div>
                                    <input readonly type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ $data->alamat }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <div>
                                    <input readonly type="text" class="form-control" id="jenis_kelamin"
                                        name="jenis_kelamin" value="{{ $data->jenis_kelamin }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jumlah_pengurus" class="form-label">Jumlah Pengurus</label>
                                <div>
                                    <input readonly type="text" class="form-control" id="jumlah_pengurus"
                                        name="jumlah_pengurus" value="{{ $data->jumlah_pengurus }}">
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
                        <input readonly type="text" class="form-control" id="jumlah_unit_usaha" name="jumlah_unit_usaha"
                            value="{{ $data->jumlah_unit_usaha }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jumlah_omzet" class="form-label">Jumlah Omzet Tahun {{ now()->year-1 }}</label>
                    <div>
                        <input readonly type="text" class="form-control" id="jumlah_omzet" name="jumlah_omzet"
                            value="{{ $data->jumlah_omzet }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jumlah_total_pmd" class="form-label">Jumlah Total Penyertaan Modal Desa</label>
                    <div>
                        <input readonly type="text" class="form-control" id="jumlah_total_pmd" name="jumlah_total_pmd"
                            value="{{ $data->jumlah_total_pmd }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jumlah_total_pmsl" class="form-label">Jumlah Total Penyertaan Modal Sumber
                        Lainnya</label>
                    <div>
                        <input readonly type="text" class="form-control" id="jumlah_total_pmsl" name="jumlah_total_pmsl"
                            value="{{ $data->jumlah_total_pmsl }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-footer mt-3">
            <a class="btn btn-secondary col-12" href="{{ route('registrasi.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>