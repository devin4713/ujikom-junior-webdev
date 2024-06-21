@extends('layouts.main_layout')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                        <h1>Selamat Datang di <span>Aplikasi Pencatat Data Pegawai</span></h1>
                        <p>Cara efektif dan efisien untuk memanajemen data pegawai anda.</p>
                        <div class="d-flex">
                            @auth
                                <a href="{{ url('/emplist') }}" class="btn btn-primary btn-lg mt-3 me-3">Kelola Pegawai</a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Logout</button>
                                </form>
                            @else
                                <a href="{{ url('/login') }}" class="btn btn-primary btn-lg mt-3">Login</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Hero Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-20 col-md-20 d-flex flex-column align-items-center">
                        <i class="bi bi-emoji-smile"></i>
                        <div class="stats-item">
                            <span data-purecounter-start="0" data-purecounter-end="{{$empcount}}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Jumlah Pegawai yang Terdaftar</p>
                        </div>
                    </div>
                    <!-- End Stats Item -->

                </div>

            </div>

        </section>
        <!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>
                <p><span class="description-title">Fitur / Layanan</span> <span>Dalam Aplikasi</span></p>
            </div>
            <!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-list"></i>
                            </div>
                            <a href="/emplist" class="stretched-link">
                                <h3>Daftar Pegawai</h3>
                            </a>
                            <p>Menampilkan daftar pegawai yang terdaftar pada sistem dan melihat detailnya.</p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-plus"></i>
                            </div>
                            <a href="/empcreate" class="stretched-link">
                                <h3>Menambahkan Pegawai</h3>
                            </a>
                            <p>Membuat atau menambahkan data pegawai baru ke dalam sistem.</p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-pencil"></i>
                            </div>
                            <a href="/emplist" class="stretched-link">
                                <h3>Mengedit Pegawai</h3>
                            </a>
                            <p>Mengubah data pegawai yang telah terdaftar pada sistem.</p>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-trash"></i>
                            </div>
                            <a href="/emplist" class="stretched-link">
                                <h3>Menghapus Pegawai</h3>
                            </a>
                            <p>Menghapus data pegawai dari sistem.</p>
                        </div>
                    </div>
                    <!-- End Service Item -->
                </div>

            </div>

        </section>
        <!-- /Services Section -->

        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>About</h2>
                <p><span class="description-title">Tentang</span> <span>Aplikasi Ini</span></p>
            </div>
            <!-- End Section Title -->

            <div class="container">

                <div class="row gy-3">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <img src="assets/img/about.jpg" alt="" class="img-fluid">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="about-content ps-0 ps-lg-3">
                            <h3>Aplikasi Pencatat Data Pegawai</h3>
                            <p class="fst-italic">
                                Aplikasi ini dirancang untuk mempermudah pengelolaan data pegawai secara efisien dan
                                efektif. Aplikasi ini dibangun menggunakan kombinasi teknologi berikut:
                            </p>
                            <ul>
                                <li>
                                    <i class="bi bi-code"></i>
                                    <div>
                                        <h4>HTML</h4>
                                        <p>Untuk membangun struktur konten dan menyediakan elemen semantik.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="bi bi-stars"></i>
                                    <div>
                                        <h4>CSS</h4>
                                        <p>Untuk styling aplikasi dan memastikan desain yang responsif.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="bi bi-gear"></i>
                                    <div>
                                        <h4>JavaScript</h4>
                                        <p>Untuk menambahkan interaktivitas dan meningkatkan pengalaman pengguna.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="bi bi-database"></i>
                                    <div>
                                        <h4>MySQL</h4>
                                        <p>Untuk menyimpan dan mengelola data pegawai dalam basis data relasional.</p>
                                    </div>
                                </li>
                            </ul>
                            <p>
                                Terima kasih telah mengunjungi aplikasi web ini.
                            </p>
                        </div>

                    </div>
                </div>

            </div>

        </section>
        <!-- /About Section -->

    </main>
@endsection
