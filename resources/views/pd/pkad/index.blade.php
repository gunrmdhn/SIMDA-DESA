<x-layout :menu="$menu">
    <x-card :title="$title">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row text-center g-2">
                    <div class="col-sm-12">
                        <a href="{{ route('pagu.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Rekapitulasi Pagu ADD Dan Dana Desa {{ now()->year }}</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('apbdes.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Informasi APBDes {{ now()->year }}</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('realisasi-apbdes.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Informasi Realisasi APBDes {{ now()->year-1 }}</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Progres Penyaluran ADD Dan Dana Desa Tiap Bulan</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class=" card-body">Progres Penyaluran BLT Desa Tiap Bulan
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Informasi Jumlah KPM Setiap Desa</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('persyaratan-penyaluran') }}" class="card card-link card-link-pop">
                            <div class="card-body">Informasi Persyaratan Penyaluran ADD dan Dana Desa</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-layout>