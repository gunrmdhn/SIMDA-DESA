<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('pegawai-dpmpd.store') }}" enctype="multipart/form-data">
            @csrf
            @include('sekretariat-dpmpd/pegawai-dpmpd/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('pegawai-dpmpd.update',$data->kode) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('sekretariat-dpmpd/pegawai-dpmpd/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('index') }}" class="btn btn-secondary col-12">Kembali</a>
        <a href="{{ route('pegawai-dpmpd.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
        @endslot
        <div class="card shadow-sm">
            <div class="card-body">
                <table id="table" class="table table-responsive table-vcenter table-nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Nomor KTP</th>
                            <th>Nomor SK Jabatan</th>
                            <th>TMT Pelantikan</th>
                            <th>TMT</th>
                            <th>Nomor SK</th>
                            <th>NPWP</th>
                            <th>File Dokumen</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->nama_pegawai }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->nomor_ktp }}</td>
                            <td>{{ $item->nomor_sk_jabatan }}</td>
                            <td>{{ $item->tmt_pelantikan }}</td>
                            <td>{{ $item->tmt }}</td>
                            <td>{{ $item->nomor_sk }}</td>
                            <td>{{ $item->npwp }}</td>
                            <td>
                                <a class="btn btn-info col-12" href="{{ asset('storage/'.$item->file_dokumen) }}"
                                    target="_blank">
                                    Lihat
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('pegawai-dpmpd.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('pegawai-dpmpd.destroy', $item->kode) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger col-12"
                                        onclick="return confirm('Data {{ $item->kode }} akan dihapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </x-card>
</x-layout>