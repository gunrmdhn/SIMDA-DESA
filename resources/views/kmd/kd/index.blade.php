<x-layout :menu="$menu">
    <x-card :title="$title">
        <div class="card card-shadow">
            <div class="card-body">
                <div class="row text-center g-2">
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Desa Intervensi Program Anak Putus Sekolah</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('rt.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Data Jumlah RT</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Informasi Pelaksanaan MUSDes dan MUSRENBANGDes</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class=" card-body">Data Kelembagaan Aktif Di Halmahera Barat</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-layout>