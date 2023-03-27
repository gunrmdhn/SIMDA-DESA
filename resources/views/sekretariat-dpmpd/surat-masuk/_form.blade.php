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
                <label class="form-label">Registrasi Terima Surat</label>
                <fieldset class="form-fieldset mb-0 bg-white">
                    <div class="row gy-2 gx-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tahun_terima" class="form-label">Tahun Terima</label>
                                <div>
                                    <input autofocus type="number" min="1990" max="{{ now()->year }}" step="1"
                                        class="form-control @error('tahun_terima') is-invalid @enderror"
                                        id="tahun_terima" name="tahun_terima"
                                        value="{{ old('tahun_terima',$data->tahun_terima) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bulan_terima" class="form-label">Bulan Terima</label>
                                <div>
                                    <select class="form-select @error('bulan_terima') is-invalid @enderror"
                                        id="bulan_terima" name="bulan_terima">
                                        <option hidden selected></option>
                                        @foreach ($bulan_terima as $item)
                                        <option @selected(old('bulan_terima',$data->bulan_terima)==$item) value="{{
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
                                <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
                                <div>
                                    <input type="number" min="1" max="31" step="1"
                                        class="form-control @error('tanggal_terima') is-invalid @enderror"
                                        id="tanggal_terima" name="tanggal_terima"
                                        value="{{ old('tanggal_terima',$data->tanggal_terima) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                <div>
                                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror"
                                        id="nomor_surat" name="nomor_surat"
                                        value="{{ old('nomor_surat',$data->nomor_surat) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                                <div>
                                    <input onfocus="(this.type='date')" onblur="(this.type='text')" type="text"
                                        class="form-control @error('tanggal_surat') is-invalid @enderror"
                                        id="tanggal_surat" name="tanggal_surat"
                                        value="{{ old('tanggal_surat',$data->tanggal_surat) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="asal_surat" class="form-label">Asal Surat</label>
                    <div>
                        <input type="text" class="form-control @error('asal_surat') is-invalid @enderror"
                            id="asal_surat" name="asal_surat" value="{{ old('asal_surat',$data->asal_surat) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tujuan_surat" class="form-label">Tujuan Surat</label>
                    <div>
                        <input type="text" class="form-control @error('tujuan_surat') is-invalid @enderror"
                            id="tujuan_surat" name="tujuan_surat" value="{{ old('tujuan_surat',$data->tujuan_surat) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="perihal_surat" class="form-label">Perihal Surat</label>
                    <div>
                        <input type="text" class="form-control @error('perihal_surat') is-invalid @enderror"
                            id="perihal_surat" name="perihal_surat"
                            value="{{ old('perihal_surat',$data->perihal_surat) }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="file_surat_masuk" class="form-label">File Surat Masuk</label>
                    <div>
                        <input type="file" class="form-control @error('file_surat_masuk') is-invalid @enderror"
                            id="file_surat_masuk" name="file_surat_masuk">
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
            <a class="btn btn-secondary col-12" href="{{ route('surat-masuk.index') }}">
                Kembali
            </a>
        </div>
    </div>
</div>