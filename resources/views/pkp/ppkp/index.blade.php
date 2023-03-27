<x-layout :menu="$menu">
    <x-card :title="$title">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row text-center g-2">
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Kelompok Bermain Anak/DP3A</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('stunting.index') }}" class="card card-link card-link-pop">
                            <div class="card-body">Data Lokus Stunting Di Halmahera Barat</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Kelompok Perempuan Di Halmahera Barat</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Penerangan Jalanan Umum Di Halmahera Barat</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Kekerasan Anak Dan Perempuan Di Halmahera Barat</div>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="card card-link card-link-pop bg-danger text-white">
                            <div class="card-body">Data Sarana dan Prasarana Ekonomi Di Halmahera Barat </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</x-layout>