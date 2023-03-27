<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('admin.store') }}">
            @csrf
            @include('auth/admin/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('admin.update',$data->nama_pengguna) }}">
            @csrf
            @method('put')
            @include('auth/admin/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('index') }}" class="btn btn-secondary col-12">Kembali</a>
        <a href="{{ route('admin.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
        @endslot
        <div class="card-tabs ">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a href="#akun_desa" class="nav-link active" data-bs-toggle="tab">Akun Desa</a>
                </li>
                <li class="nav-item"><a href="#pengguna" class="nav-link" data-bs-toggle="tab">Pengguna</a></li>
            </ul>
            <div class="tab-content">
                <div id="akun_desa" class="card tab-pane active show">
                    <div class="card-body">
                        <table id="table" class="table table-responsive table-vcenter table-nowrap" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Peran</th>
                                    <th>Kode Kecamatan</th>
                                    <th>Kecamatan</th>
                                    <th>Kode Desa</th>
                                    <th>Desa</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($desa as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_pengguna }}</td>
                                    <td>{{ $item->peran }}</td>
                                    <td>{{ $item->kode_kecamatan }}</td>
                                    <td>{{ $item->kecamatan }}</td>
                                    <td>{{ $item->kode_desa }}</td>
                                    <td>{{ $item->desa }}</td>
                                    <td>
                                        <a class="btn btn-warning col-12"
                                            href="{{ route('admin.edit',$item->nama_pengguna) }}">
                                            Ubah
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin.destroy', $item->nama_pengguna) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger col-12"
                                                onclick="return confirm('Data {{ $item->nama_pengguna }} akan dihapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="pengguna" class="card tab-pane">
                    <div class="card-body">
                        <table id="table-pengguna" class="table table-responsive table-vcenter table-nowrap"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Peran</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengguna as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_pengguna }}</td>
                                    <td>{{ $item->peran }}</td>
                                    <td>
                                        <a class="btn btn-warning col-12"
                                            href="{{ route('admin.edit',$item->nama_pengguna) }}">
                                            Ubah
                                        </a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('admin.destroy', $item->nama_pengguna) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger col-12"
                                                onclick="return confirm('Data {{ $item->nama_pengguna }} akan dihapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </x-card>
</x-layout>