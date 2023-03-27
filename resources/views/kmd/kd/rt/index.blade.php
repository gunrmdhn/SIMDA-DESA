<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('rt.store') }}">
            @csrf
            @include('kmd/kd/rt/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('rt.update',$data->kode) }}">
            @csrf
            @method('put')
            @include('kmd/kd/rt/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('kd') }}" class="btn btn-secondary col-12">Kembali</a>
        @can('pengguna')
        <a href="{{ route('rt.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
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
                            <th>Jumlah RW</th>
                            <th>Jumlah RT</th>
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
                            <td>{{ $item->rtUser->kode_kecamatan }}</td>
                            <td>{{ $item->rtUser->kecamatan }}</td>
                            <td>{{ $item->rtUser->kode_desa }}</td>
                            <td>{{ $item->rtUser->desa }}</td>
                            <td>{{ $item->jumlah_rw }}</td>
                            <td>{{ $item->jumlah_rt }}</td>
                            @can('pengguna')
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('rt.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('rt.destroy', $item->kode) }}">
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