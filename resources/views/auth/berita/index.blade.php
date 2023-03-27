<x-layout :menu="$menu">
    <x-card :title="$title">
        @if (Str::of(Route::currentRouteName())->after('.')=='create')
        <form method="post" action="{{ route('berita.store') }}" enctype="multipart/form-data">
            @csrf
            @include('auth/berita/_form')
        </form>
        @elseif(Str::of(Route::currentRouteName())->after('.')=='edit')
        <form method="post" action="{{ route('berita.update',$data->kode) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('auth/berita/_form')
        </form>
        @else
        @slot('button')
        <a href="{{ route('index') }}" class="btn btn-secondary col-12">Kembali</a>
        <a href="{{ route('berita.create') }}" class="btn btn-primary col-12 mt-2">Tambah</a>
        @endslot
        <div class="card shadow-sm">
            <div class="card-body">
                <table id="table" class="table table-responsive table-vcenter table-nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Judul</th>
                            <th>Gambar</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <a class="btn btn-info col-12" data-bs-toggle="modal"
                                    data-bs-target="#modal-simple-{{ $loop->iteration }}">
                                    Lihat
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning col-12" href="{{ route('berita.edit',$item->kode) }}">
                                    Ubah
                                </a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('berita.destroy', $item->kode) }}">
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
@if (Str::of(Route::currentRouteName())->after('.')=='index')
@foreach ($data as $item)
<div class="modal modal-blur fade" id="modal-simple-{{ $loop->iteration }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->kode }}" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title">
                            {{ $item->judul }}
                        </div>
                        <p class="lead">
                            {{ $item->keterangan }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif