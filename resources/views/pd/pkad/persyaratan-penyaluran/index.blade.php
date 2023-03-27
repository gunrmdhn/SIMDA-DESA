<x-layout :menu="$menu">
    <x-card :title="$title">
        @slot('button')
        <a href="{{ route('pkad') }}" class="btn btn-secondary col-12">Kembali</a>
        @endslot
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row text-center g-2">
                    <div class="col-sm-12">
                        <a href="#" class="card card-link card-link-pop" data-bs-toggle="modal"
                            data-bs-target="#modal-simple">
                            <div class="card-body">Persyaratan Penyaluran Siltap dan ADD Tahap 1</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppa2.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran ADD Tahap 2</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppa3.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran ADD Tahap 3</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppa4.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran ADD Tahap 4</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppdd1.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran Dana Desa Tahap 1</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppdd2.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran Dana Desa Tahap 2</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppdd3.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran Dana Desa Tahap 3</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppblt1.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran BLT Tahap 1</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppblt2.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran BLT Tahap 2</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppblt3.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran BLT Tahap 3</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('ppblt4.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Persyaratan Penyaluran BLT Tahap 4</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-layout>
<div class="modal modal-blur fade" id="modal-simple" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row text-center g-2">
                    <div class="col-sm-12">
                        <a href="{{ route('penyaluran-siltap-tunjangan.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Permohonan Penyaluran Siltap dan Tunjangan</div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <a href="{{ route('penyaluran-operasional-triwulan.index') }}"
                            class="card card-link card-link-pop">
                            <div class="card-body">Permohonan Penyaluran Operasional Triwulan I</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>