@extends('client.layout')

@section('title') Azure - Home Page @endsection
@section('description') Top music of the year. Featuring album reviews, ratings, charts, year end lists and more.
@endsection
@section('keywords') music,rate,albums,artists,group,singer @endsection

@section('content')
    <!-- ======= Hero No Slider Section ======= -->
    <section id="hero-no-slider" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h2>Welcome to Azure</h2>
                    <p>The world's largest online store for used and new records. Infinite variety for everyone.
                    </p>
                    <a href="{{ route('about') }}" class="btn-get-started ">Read More</a>
                </div>
            </div>
        </div>
    </section><!-- End Hero No Slider Sectio -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section class="services">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-center mb-lg-4"><h2>Labels</h2></div>
                @foreach($labels as $label)
                    @include('client.components.labels',['label' => $label])
                @endforeach
                </div>
            </div>

        </section><!-- End Services Section -->

        <!-- ======= Why Us Section ======= -->
        <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 video-box">
                        <img src="{{ asset('assets/img/why-us.jpg')}}" class="img-fluid" alt="">
                        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-gift"></i></div>
                            <h4 class="title"><a href="">Always Expanding</a></h4>
                            <p class="description">Our search for the new and the good is everlasting. Our team is tirelessly owrking to bring you the most expansive record collection!</p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Features Section ======= -->
        <section class="features mb-lg-5">
            <div class="container">

                <div class="section-title">
                    <h2>Coverage during the whole year</h2>
                    <p>Sit back and enjoy news we post live as all the biggest music award shows happen!</p>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5">
                        <img src="{{ asset('assets/img/grammy.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 pt-4">
                        <h3>The Grammys are the first of the Big Three networks' major music awards held annually.</h3>
                        <p class="fst-italic">
                            The annual award ceremony features performances by prominent artists and presentation of
                            awards that showcase achievements made by industry recording artists.
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> The first Grammy Awards ceremony was held on May 4, 1959.</li>
                            <li><i class="bi bi-check"></i> After the 2011 ceremony, the Academy overhauled many Grammy Award categories for 2012.</li>
                        </ul>
                    </div>
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-md-5 order-1 order-md-2">
                        <img src="{{ asset('assets/img/brits.jpg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 pt-5 order-2 order-md-1">
                        <h3>The Brits</h3>
                        <p class="fst-italic">
                            The 2021 Brit Awards will take place on 11 May 2021 and aim to celebrate the best in British and international music.
                        </p>
                        <p>
                            Usually held in February, the ceremony was delayed due to the COVID-19 pandemic.
                            The 2021 Brits will be hosted by comedian Jack Whitehall, who has hosted the awards since 2018,
                            who equals the record set by former host and The Late Late Show host James Corden by hosting
                            the ceremony in four consecutive years.
                        </p>
                    </div>
                </div>


            </div>
        </section><!-- End Features Section -->

    </main><!-- End #main -->



@endsection
