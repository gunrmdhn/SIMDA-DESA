<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('surat-masuk.store') }}" enctype="multipart/form-data">
            @csrf
            @include('sekretariat-dpmpd/surat-masuk/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('surat-masuk.update',$data->kode) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('sekretariat-dpmpd/surat-masuk/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('index') }}" class="btn btn-secondary col-12">Kembali</a>
        <a href="{{ route('surat-masuk.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
        @endslot
        <div class="card shadow-sm">
            <div class="card-body">
                <table id="table" class="table table-responsive table-vcenter table-nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Tahun Terima</th>
                            <th>Bulan Terima</th>
                            <th>Tanggal Terima</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Asal Surat</th>
                            <th>Tujuan Surat</th>
                            <th>Perihal Surat</th>
                            <th>File Surat Masuk</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->tahun_terima }}</td>
                            <td>{{ $item->bulan_terima }}</td>
                            <td>{{ $item->tanggal_terima }}</td>
                            <td>{{ $item->nomor_surat }}</td>
                            <td>{{ $item->tanggal_surat }}</td>
                            <td>{{ $item->asal_surat }}</td>
                            <td>{{ $item->tujuan_surat }}</td>
                            <td>{{ $item->perihal_surat }}</td>
                            <td>
                                <a class="btn btn-info col-12" href="{{ asset('storage/'.$item->file_surat_masuk) }}"
                                    target="_blank">
                                    Lihat
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('surat-masuk.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('surat-masuk.destroy', $item->kode) }}">
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