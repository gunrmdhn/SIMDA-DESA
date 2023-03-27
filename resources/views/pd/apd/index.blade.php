<x-layout :menu="$menu">
    <x-card :title="$title">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row text-center g-2">
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop" data-bs-toggle="modal"
                            data-bs-target="#modal-simple">
                            <div class="card-body">Masa Jabatan Kades Dan Perangkat Aktif</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Masa Jabatan Anggota BPD Aktif Dan Antar Waktu</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Kepesertaan Jaminan Naker</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Kepesertaan Jaminan Kesehatan</div>
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
                    <div class="col-sm-6">
                        <a href="{{ route('kades.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Kades</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('perangkat.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Perangkat</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>