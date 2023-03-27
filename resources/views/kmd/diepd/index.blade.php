<x-layout :menu="$menu">
    <x-card :title="$title">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row text-center g-2">
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Profil Kepala Desa Dan Perangkat</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Profil BPD</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Progres Penyusunan Profil Desa</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('idm.index') }}" class="card card-link card-link-pop">
                            <div class=" card-body">Data Rekapitulasi Jumlah Desa, Status Desa Berdasarkan IDM</div>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class=" card-body">Data Peta Wilayah Desa Berbasis Potensi</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-layout>