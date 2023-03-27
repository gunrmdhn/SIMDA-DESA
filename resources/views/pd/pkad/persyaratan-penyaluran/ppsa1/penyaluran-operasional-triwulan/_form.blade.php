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
                    <label for="surat_permohonan_penyaluran" class="form-label">Surat Permohonan Penyaluran</label>
                    <div>
                        <input type="file"
                            class="form-control @error('surat_permohonan_penyaluran') is-invalid @enderror"
                            id="surat_permohonan_penyaluran" name="surat_permohonan_penyaluran">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="perdes_apbdes_lampiran" class="form-label">Perdes APBDes {{ now()->year }} +
                        Lampiran</label>
                    <div>
                        <input type="file" class="form-control @error('perdes_apbdes_lampiran') is-invalid @enderror"
                            id="perdes_apbdes_lampiran" name="perdes_apbdes_lampiran">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="perkades_penjabaran_apbdes_lampiran" class="form-label">Perkades Penjabaran APBDes {{
                        now()->year }} + Lampiran</label>
                    <div>
                        <input type="file"
                            class="form-control @error('perkades_penjabaran_apbdes_lampiran') is-invalid @enderror"
                            id="perkades_penjabaran_apbdes_lampiran" name="perkades_penjabaran_apbdes_lampiran">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="berita_acara_keputusan_bpd" class="form-label">Berita Acara + Keputusan BPD Tentang
                        Kesepakatan APBDes</label>
                    <div>
                        <input type="file"
                            class="form-control @error('berita_acara_keputusan_bpd') is-invalid @enderror"
                            id="berita_acara_keputusan_bpd" name="berita_acara_keputusan_bpd">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dpa" class="form-label">DPA</label>
                    <div>
                        <input type="file" class="form-control @error('dpa') is-invalid @enderror" id="dpa" name="dpa">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="rak" class="form-label">RAK</label>
                    <div>
                        <input type="file" class="form-control @error('rak') is-invalid @enderror" id="rak" name="rak">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="rka" class="form-label">RKA</label>
                    <div>
                        <input type="file" class="form-control @error('rka') is-invalid @enderror" id="rka" name="rka">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sk_ppkd" class="form-label">SK PPKD</label>
                    <div>
                        <input type="file" class="form-control @error('sk_ppkd') is-invalid @enderror" id="sk_ppkd"
                            name="sk_ppkd">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sptjm" class="form-label">SPTJM</label>
                    <div>
                        <input type="file" class="form-control @error('sptjm') is-invalid @enderror" id="sptjm"
                            name="sptjm">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pakta_integritas" class="form-label">Pakta Integritas</label>
                    <div>
                        <input type="file" class="form-control @error('pakta_integritas') is-invalid @enderror"
                            id="pakta_integritas" name="pakta_integritas">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="daftar_kp_bpjs" class="form-label">Daftar KP BPJS Nakes dan Naker</label>
                    <div>
                        <input type="file" class="form-control @error('daftar_kp_bpjs') is-invalid @enderror"
                            id="daftar_kp_bpjs" name="daftar_kp_bpjs">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="laporan_realisasi_add" class="form-label">Laporan Realisasi ADD T.A {{ now()->year-1
                        }}</label>
                    <div>
                        <input type="file" class="form-control @error('laporan_realisasi_add') is-invalid @enderror"
                            id="laporan_realisasi_add" name="laporan_realisasi_add">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="daftar_pagu_siltap_tunjangan" class="form-label">Daftar Pagu Siltap dan Tunjangan 1
                        Tahun</label>
                    <div>
                        <input type="file"
                            class="form-control @error('daftar_pagu_siltap_tunjangan') is-invalid @enderror"
                            id="daftar_pagu_siltap_tunjangan" name="daftar_pagu_siltap_tunjangan">
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
            <a class="btn btn-secondary col-12" href="{{ route('penyaluran-operasional-triwulan.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>