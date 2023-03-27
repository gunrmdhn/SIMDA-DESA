<x-layout>
    <div class="row g-3">
        <div class="col-lg-12">
            <section id="index">
                <div class="card card-md text-center">
                    <div class="card-body">
                        <img width="15%" src="{{ asset('img/lambang.png') }}" alt="">
                        <h1 class="display-5">{{ config('app.name') }}</h1>
                        <div class="markdown mb-3">
                            <h3>
                                Mewujudkan <em>“Halmahera Barat yang Aman, Adil dan Sejahtera”</em>
                            </h3>
                        </div>
                        <div class="btn-group row gy-2" role="group" aria-label="Basic example">
                            <a href="#visi-misi" class="col-12 btn-square btn btn-primary btn-lg">
                                VISI MISI
                            </a>
                            <a href="#profil" class="col-6 btn-square btn btn-primary btn-lg">
                                PROFIL
                            </a>
                            <a href="#struktur" class="col-6 btn-square btn btn-primary btn-lg">
                                STRUKTUR
                            </a>
                            <a href="#berita" class="col-12 btn-square btn btn-primary btn-lg">
                                BERITA
                            </a>
                        </div>
                        <hr>
                        <h3>
                            Alamat :
                            <small class="text-muted">Lantai Dasar Kantor Bupati Halmahera Barat |
                                Jl. Pengabdian Nomor 01 – Jati Porniti Jailolo</small>
                        </h3>
                    </div>
                    <img class="card-img-bottom" src="{{ asset('img/background.png') }}" alt="background">
                </div>
            </section>
        </div>
        <div class="col-lg-12">
            <section id="visi-misi">
                <div class="card card-md text-center">
                    <div class="card-body">
                        <h1 class="display-6">VISI MISI</h1>
                        <hr>
                        <div class="markdown row justify-content-center">
                            <h1>Visi</h1>
                            <p>
                                Mewujudkan <strong><em>“Halmahera Barat yang Aman, Adil dan Sejahtera”</em></strong>
                            </p>
                            <h1>Misi</h1>
                            <div class="col-lg-9">
                                <em>
                                    <ol class="text-start" start="1">
                                        <li>
                                            Membangun masyarakat yang unggul dan berakhlak mulia berlandaskan kesetaraan
                                            serta nilai-nilai luhur agama, pancasila dan kearifan lokal,
                                        </li>
                                        <li>
                                            Membangun infrastruktur dan lingkungan yang berkelanjutan untuk
                                            mengakselerasi
                                            keterbukaan dan daya saing wilayah;
                                        </li>
                                        <li>
                                            Membangun kemandirian ekonomi daerah dengan mensinergikan sektor-sektor
                                            unggulan
                                            pertanian, perkebunan, peternakan, perikanan dan kelautan, pariwisata serta
                                            sumber
                                            daya alam strategis lainnya;
                                        </li>
                                    </ol>
                                </em>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-12">
            <section id="struktur">
                <div class="card card-md text-center">
                    <div class="card-body">
                        <h1 class="display-6 text-center">Struktur Organisasi</h1>
                        <hr>
                        <div class="markdown row justify-content-center">
                            <div class="col-lg-8">
                                <img src="{{ asset('img/struktur.png') }}" alt="">
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section id="profil">
                <div class="card card-md">
                    <div class="card-body">
                        <h1 class="display-6 text-center">Profil Kepala Dinas</h1>
                        <hr>
                        <div class="row row-0 flex-fill">
                            <div class="col-5">
                                <img src="{{ asset('img/kepala-dinas.png') }}" alt="">
                            </div>
                            <div class="col">
                                <div class="card-body">
                                    <div class="markdown mt-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <p class="row gy-2">
                                                    <span class="status status-primary">
                                                        Tempat / Tanggal Lahir :
                                                    </span>
                                                    <small class="text-dark col-12">Ambon, 25 Januari 1968</small>
                                                </p>
                                            </li>
                                            <li class="list-group-item">
                                                <p class="row gy-2">
                                                    <span class="status status-primary">
                                                        Agama :
                                                    </span>
                                                    <small class="text-dark col-12">Kristen</small>
                                                </p>
                                            </li>
                                            <li class="list-group-item">
                                                <p class="row gy-2">
                                                    <span class="status status-primary">
                                                        Alamat :
                                                    </span>
                                                    <small class="text-dark col-12">Desa Kuripasai Kecamatan
                                                        Jailolo</small>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-0">
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section id="berita">
                <div class="card card-md text-center">
                    <div class="card-body">
                        <h1 class="display-6">Berita</h1>
                        <hr>
                        <div class="accordion accordion-flush" id="accordion-example">
                            @foreach ($berita as $item)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $loop->iteration }}">
                                    <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $loop->iteration }}" aria-expanded="true">
                                        {{ $item->judul }}
                                    </button>
                                </h2>
                                <div id="collapse-{{ $loop->iteration }}"
                                    class="accordion-collapse collapse {{ $loop->iteration == 1 ? 'show' : null }}"
                                    data-bs-parent="#accordion-example">
                                    <div class="accordion-body">
                                        <div class="card shadow-sm">
                                            <img class="card-img-top" src="{{ asset('storage/'.$item->gambar) }}"
                                                alt="{{ $item->kode }}">
                                            <div class="card-body">
                                                <p class="mt-3">
                                                    {{ $item->keterangan }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $berita->links() }}
                        </div>
                        <hr>
                    </div>
                </div>
            </section>
        </div>
</x-layout>