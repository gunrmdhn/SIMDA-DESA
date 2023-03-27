<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('ppblt4.store') }}" enctype="multipart/form-data">
            @csrf
            @include('pd/pkad/persyaratan-penyaluran/ppblt4/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('ppblt4.update',$data->kode) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('pd/pkad/persyaratan-penyaluran/ppblt4/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('persyaratan-penyaluran') }}" class="btn btn-secondary col-12">Kembali</a>
        @can('pengguna')
        <a href="{{ route('ppblt4.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
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
                            <td>{{ $item->ppblt4User->kode_kecamatan }}</td>
                            <td>{{ $item->ppblt4User->kecamatan }}</td>
                            <td>{{ $item->ppblt4User->kode_desa }}</td>
                            <td>{{ $item->ppblt4User->desa }}</td>
                            <td>
                                <a class="btn btn-info col-12" data-bs-toggle="modal"
                                    data-bs-target="#modal-simple-{{ $loop->iteration }}">
                                    Lihat
                                </a>
                            </td>
                            @can('pengguna')
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('ppblt4.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('ppblt4.destroy', $item->kode) }}">
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
@if (Str::of(Route::currentRouteName())->after('.')=='index')
@foreach ($data as $item)
<div class="modal modal-blur fade" id="modal-simple-{{ $loop->iteration }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row text-center g-2">
                    <div class="col-sm-12">
                        <a href="{{ asset('storage/'.$item->surat_pengantar_camat) }}" target="_blank"
                            class="card card-link card-link-pop">
                            <div class="card-body">Surat Pengantar Camat</div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <a href="{{ asset('storage/'.$item->surat_permohonan_penyaluran) }}" target="_blank"
                            class="card card-link card-link-pop">
                            <div class="card-body">Surat Permohonan Penyaluran Bulan Oktober/Desember</div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <a href="{{ asset('storage/'.$item->laporan_pembayaran) }}" target="_blank"
                            class="card card-link card-link-pop">
                            <div class="card-body">Laporan Pembayaran BLT Tahap 3</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif