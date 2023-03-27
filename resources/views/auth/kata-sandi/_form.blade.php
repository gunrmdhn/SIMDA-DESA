<div class="card shadow-sm">
    <div class="card-body">
        <div class="row gy-2 gx-3">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-group">
                        <input autofocus type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password">
                        <span class="input-group-text">
                            <button type="button" class="view-password btn btn-sm btn-outline-info">Lihat</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <div class="input-group ">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation">
                        <span class="input-group-text">
                            <button type="button"
                                class="view-password-confirmation btn btn-sm btn-outline-info">Lihat</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-footer mt-3">
            <button type="submit" class="btn btn-warning col-12 mb-2">Ubah</button>
            <a href="{{ route('index') }}" class="col-12 btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>
</div>