<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('kades.store') }}" enctype="multipart/form-data">
            @csrf
            @include('pd/apd/kades/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('kades.update',$data->kode) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('pd/apd/kades/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('apd') }}" class="btn btn-secondary col-12">Kembali</a>
        @can('pengguna')
        <a href="{{ route('kades.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
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
                            <th>Nama</th>
                            <th>Nomor SK</th>
                            <th>Tanggal SK</th>
                            <th>Tanggal Pelantikan</th>
                            <th>Periode Jabatan</th>
                            <th>File SK</th>
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
                            <td>{{ $item->kadesUser->kode_kecamatan }}</td>
                            <td>{{ $item->kadesUser->kecamatan }}</td>
                            <td>{{ $item->kadesUser->kode_desa }}</td>
                            <td>{{ $item->kadesUser->desa }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nomor_sk }}</td>
                            <td>{{ $item->tanggal_sk }}</td>
                            <td>{{ $item->tanggal_pelantikan }}</td>
                            <td>{{ $item->periode_jabatan }}</td>
                            <td>
                                <a class="btn btn-info col-12" href="{{ asset('storage/'.$item->file_sk) }}"
                                    target="_blank">
                                    Lihat
                                </a>
                            </td>
                            @can('pengguna')
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('kades.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('kades.destroy', $item->kode) }}">
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