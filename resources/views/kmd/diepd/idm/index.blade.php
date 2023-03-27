<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('idm.store') }}">
            @csrf
            @include('kmd/diepd/idm/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('idm.update',$data->kode) }}">
            @csrf
            @method('put')
            @include('kmd/diepd/idm/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('diepd') }}" class="btn btn-secondary col-12">Kembali</a>
        @can('pengguna')
        <a href="{{ route('idm.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
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
                            <th>Status DM {{ now()->year-1 }}</th>
                            <th>Status DM {{ now()->year }}</th>
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
                            <td>{{ $item->idmUser->kode_kecamatan }}</td>
                            <td>{{ $item->idmUser->kecamatan }}</td>
                            <td>{{ $item->idmUser->kode_desa }}</td>
                            <td>{{ $item->idmUser->desa }}</td>
                            <td>{{ $item->status_dm_sebelum }}</td>
                            <td>{{ $item->status_dm_sesudah }}</td>
                            @can('pengguna')
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('idm.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('idm.destroy', $item->kode) }}">
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