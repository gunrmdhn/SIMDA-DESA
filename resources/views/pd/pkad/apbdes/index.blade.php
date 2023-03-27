<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('apbdes.store') }}" enctype="multipart/form-data">
            @csrf
            @include('pd/pkad/apbdes/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('apbdes.update',$data->kode) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('pd/pkad/apbdes/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('pkad') }}" class="btn btn-secondary col-12">Kembali</a>
        @can('pengguna')
        <a href="{{ route('apbdes.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
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
                            <th>Pagu ADD</th>
                            <th>Jumlah Belanja ADD</th>
                            <th>Jumlah Salur Dana Desa</th>
                            <th>Jumlah Belanja Dana Desa</th>
                            <th>Sisa Dana Desa</th>
                            <th>Baliho</th>
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
                            <td>{{ $item->apbdesUser->kode_kecamatan }}</td>
                            <td>{{ $item->apbdesUser->kecamatan }}</td>
                            <td>{{ $item->apbdesUser->kode_desa }}</td>
                            <td>{{ $item->apbdesUser->desa }}</td>
                            <td>{{ $item->pagu_add }}</td>
                            <td>{{ $item->jumlah_belanja_add }}</td>
                            <td>{{ $item->jumlah_salur_dana_desa }}</td>
                            <td>{{ $item->jumlah_belanja_dana_desa }}</td>
                            <td>{{ $item->sisa_dana_desa }}</td>
                            <td>
                                <a class="btn btn-info col-12" href="{{ asset('storage/'.$item->baliho) }}"
                                    target="_blank">
                                    Lihat
                                </a>
                            </td>
                            @can('pengguna')
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('apbdes.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('apbdes.destroy', $item->kode) }}">
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