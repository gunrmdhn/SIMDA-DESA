<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('registrasi.store') }}">
            @csrf
            @include('ppmd/puem/registrasi/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('registrasi.update',$data->kode) }}">
            @csrf
            @method('put')
            @include('ppmd/puem/registrasi/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='show')
        @include('ppmd/puem/registrasi/_show')
        @else
        @slot('button')
        <a href="{{ route('puem') }}" class="btn btn-secondary col-12">Kembali</a>
        @can('pengguna')
        <a href="{{ route('registrasi.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
        @endcan
        @endslot
        <div class="card shadow-sm">
            <div class="card-body">
                <table id="table" class="table table-responsive table-vcenter table-nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Kode Kecamatan</th>
                            <th>Kecamatan</th>
                            <th>Kode Desa</th>
                            <th>Desa</th>
                            <th>Nama BUMDes</th>
                            <th></th>
                            @can('pengguna')
                            <th></th>
                            <th></th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->bumdesUser->kode_kecamatan }}</td>
                            <td>{{ $item->bumdesUser->kecamatan }}</td>
                            <td>{{ $item->bumdesUser->kode_desa }}</td>
                            <td>{{ $item->bumdesUser->desa }}</td>
                            <td>{{ $item->nama_bumdes }}</td>
                            <td>
                                <a class="btn btn-info col-12" href="{{ route('registrasi.show',$item->kode) }}">
                                    Lihat
                                </a>
                            </td>
                            @can('pengguna')
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('registrasi.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('registrasi.destroy', $item->kode) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger col-12"
                                        onclick="return confirm('Data {{ $item->kode }} akan dihapus?')">Hapus</button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </x-card>
</x-layout>