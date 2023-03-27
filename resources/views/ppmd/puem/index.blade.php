<x-layout :menu="$menu">
    <x-card :title="$title">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row text-center g-2">
                    <div class="col-sm-12">
                        <a href="{{ route('registrasi.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Registrasi BUMDes</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Kelembagaan BUMDes Teregistrasi Dan Belum Teregistrasi</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Profil BUMDes Aktif Di Halmahera Barat</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Kelompok UMKM Beserta Profil Di Halmahera Barat</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class=" card-body">Data Informasi Penyertaan Modal BUMDes</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-layout>