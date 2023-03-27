<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('stunting.store') }}" enctype="multipart/form-data">
            @csrf
            @include('pkp/ppkp/stunting/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('stunting.update',$data->kode) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('pkp/ppkp/stunting/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('ppkp') }}" class="btn btn-secondary col-12">Kembali</a>
        @can('pengguna')
        <a href="{{ route('stunting.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
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
                            <th>Info Lokus Stunting</th>
                            <th>SK Bupati</th>
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
                            <td>{{ $item->stuntingUser->kode_kecamatan }}</td>
                            <td>{{ $item->stuntingUser->kecamatan }}</td>
                            <td>{{ $item->stuntingUser->kode_desa }}</td>
                            <td>{{ $item->stuntingUser->desa }}</td>
                            <td>{{ $item->info_lokus_stunting }}</td>
                            <td>
                                <a class="btn btn-info col-12" href="{{ asset('storage/'.$item->sk_bupati) }}"
                                    target="_blank">
                                    Lihat
                                </a>
                            </td>
                            @can('pengguna')
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('stunting.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('stunting.destroy', $item->kode) }}">
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