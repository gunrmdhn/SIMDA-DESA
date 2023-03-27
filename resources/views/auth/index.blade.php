<!doctype html>
<html lang="en">

<x-head></x-head>

<body class=" border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-2">
                <a href="{{ route('index') }}" class="navbar-brand navbar-brand-autodark">
                    <img src="{{ asset('img/lambang.png') }}" height="75" alt="lambang">
                </a>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger p-4">
                <strong>Masuk gagal!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @elseif(session()->has('berhasil'))
            <div class="alert alert-success p-4">
                <strong>{{ session()->get('berhasil') }}</strong>
            </div>
            @elseif(session()->has('gagal'))
            <div class="alert alert-danger p-4">
                <strong>{{ session()->get('gagal') }}</strong>
            </div>
            @endif
            <x-card title="Selamat Datang">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="post" action="{{ route('authenticate') }}">
                            @csrf
                            <div class="row justify-content-center align-items-center gy-2 gx-3">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                                        <div>
                                            <input autofocus type="text" class="form-control
                                        @error('nama_pengguna')
                                        is-invalid
                                        @enderror" id="nama_pengguna" name="nama_pengguna"
                                                value="{{ old('nama_pengguna') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Kata Sandi</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control
                                        @error('password')
                                        is-invalid
                                        @enderror" id="password" name="password">
                                            <span class="input-group-text">
                                                <button type="button"
                                                    class="view-password btn btn-sm btn-outline-info">Lihat</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-footer mt-3">
                                <button type="submit" class="btn btn-primary col-12">Masuk</button>
                            </div>
                            <a href="{{ route('index') }}" class="mt-2 col-12 btn btn-secondary">
                                Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
    @livewireScripts
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jqc-1.12.4/dt-1.12.1/datatables.min.js">
    </script>
</body>

</html>