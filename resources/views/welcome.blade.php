@extends('layouts.front')

@section('content')
    <section class="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="heading-home">
                        Selamat Datang di Website Resmi
                        <span class="prop">Kantor Kementerian Agama</span>
                        <span class="kre">Kabupaten Lampung Barat</span>
                        </h2>
                        <p class="subheading-home mt-3">
                            Temukan informasi yang anda butuhkan dan bantu kami untuk meningkatkan pelayanan yang lebih
                            baik
                        </p>

                        <div class="btn-home text-center text-lg-start">
                            <a href="#" class="btn-first d-block d-lg-inline">Cari Informasi</a>
                            <a href="#" class="btn-second ms-0 ms-lg-4 d-block d-lg-inline mt-4 mt-lg-0">Permohonan
                                Informasi/Pengaduan</a>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-home mx-auto mt-lg-0 mx-lg-0">
                        @if (!empty($sliders))
                            @foreach ($sliders as $slider)
                                <img src="{{ asset('storage/' . $slider->image) }}" class="img-fluid" alt="" />
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CATEGORY START -->
    <section class="category section-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <i class="bx bxs-check-square"></i>
                    <h3 class="label-section ms-2">Layanan Kami</h3>
                </div>
                <div class="col-md-6 text-md-end mt-4 mt-sm-0">
                    <a href="#" class="btn-second">Layanan lainnya</a>
                </div>
            </div>
            <div class="row row-card mt-5">
                @if (!empty($services))
                    @foreach ($services as $service)
                        <div class="col-lg-2 col-md-6 mt-3 mt-lg-0">
                            <a href="{{ $service->link }}">
                                <div class="card">
                                    <div class="card-body d-flex py-5 px-4 align-items-center justify-content-center">
                                        {{-- <img src="img/1618066326.svg" alt="" /> --}}
                                        <div class="detail ms-2">
                                            <h3 class="category-name">{{ $service->title }}</h3>
                                            <p class="class m-0">{{ $service->caption }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- CATEGORY END -->
    <section id="services" class="text-center">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 col-md-6">
                    <h5>Pengumuman</h5>
                    <div class="service">
                        <ol>
                            @if (!empty($infos))
                                @foreach ($infos as $info)
                                    <li><a href="{{ $info->link }}">{{ $info->title }}</a> </li>
                                @endforeach
                            @endif
                            <a href="">
                                <p class="mt-3 text-success">Pengumuman Lainnya</p>
                            </a>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Info Grafis</h5>
                    <!-- <div class="service"> -->

                    <div class="slideshow">
                        <div class="slider">
                            @if (!empty($infographics))
                                @foreach ($infographics as $infographic)
                                    <div>
                                        <a href="#">
                                            <img src="{{ asset('storage/' . $infographic->image) }}" height="300">
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- </div> -->
                    </div>


                </div>
            </div>
    </section>


    <section class="terkini">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Terkini</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Terkini</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">KUA</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Madrasah</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="row">
                                @if (!empty($post_kantor))
                                    @foreach ($post_kantor as $PostKantor)
                                        <div class="col-md-3">
                                            <article class="blog-post">
                                                <img src="{{ asset('storage/' . $PostKantor->image) }}" alt="">
                                                <div class="content">
                                                    <small>{{ $PostKantor->created_at->format('d M Y') }}</small>
                                                    <h5>{{ $PostKantor->title }}</h5>
                                                    <p>{{ str_limit(strip_tags($PostKantor->body), 10) }}</p>
                                                    <a href="{{ route('post.show', $PostKantor->slug) }}"
                                                        class="ms-auto">Selengkapnya</a>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="row">
                                @if (!empty($post_kua))
                                    @foreach ($post_kua as $PostKua)
                                        <div class="col-md-3">
                                            <article class="blog-post">
                                                <img src="{{ asset('storage/' . $PostKua->image) }}" alt="">
                                                <div class="content">
                                                    <small>{{ $PostKua->created_at->format('d M Y') }}</small>
                                                    <h5>{{ $PostKua->title }}</h5>
                                                    <p>{{ str_limit(strip_tags($PostKua->body), 10) }}</p>
                                                    <a href="{{ route('post.show', $PostKua->slug) }}"
                                                        class="ms-auto">Selengkapnya</a>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="row">
                                @if (!empty($post_madrasah))
                                    @foreach ($post_madrasah as $PostMadrasah)
                                        <div class="col-md-3">
                                            <article class="blog-post">
                                                <img src="{{ asset('storage/' . $PostMadrasah->image) }}" alt=""
                                                    height="170">
                                                <div class="content">
                                                    <small>{{ $PostMadrasah->created_at->format('d M Y') }}</small>
                                                    <h5>{{ $PostMadrasah->title }}</h5>
                                                    <p>{{ str_limit(strip_tags($PostMadrasah->body), 10) }}</p>
                                                    <a href="{{ route('post.show', $PostMadrasah->slug) }}"
                                                        class="ms-auto">Selengkapnya</a>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 ">
                <div class="col-12 d-flex justify-content-center align-content-center">
                    <div class="btn-home text-center text-lg-start">
                        <a href="{{ route('post.all') }}" class="btn-first d-block d-lg-inline">Berita Lainnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video" mt-5>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Video</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-md-12 ">
                    <div id="projects-slider" class="owl-theme owl-carousel">
                        @foreach ($videos as $video)
                            <div class="project">
                                <a href="">
                                    <div class="overlay"></div>
                                    <img src="{{ asset('storage/' . $video->image) }}" alt="" height="300">
                                    <div class="content">
                                        <h4>{{ $video->title }}</h4>
                                        <small class="text-white">{{ $video->caption }}</small>
                                    </div>
                                </a>

                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
