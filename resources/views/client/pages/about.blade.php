@extends('client.layout')

@section('title') Azure - About Page @endsection
@section('description') Our beginnings, motivation and crew.
@endsection
@section('keywords') music,about,history,beginnings @endsection

@section('content')

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>About Us</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>About Us</li>
                    </ol>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= About Section ======= -->
        <section class="about" data-aos="fade-up">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/img/about.jpg')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>Beginnings of Azure.</h3>
                        <p class="fst-italic">
                            Azure started as a mess of friends in Minneapolis, fooling around after school,
                            trying to make music without reading the manual. The group had varied tastes—rap, punk, indie rock,
                            pop—so the music they made together often bore the toolmarks of several styles.

                        </p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i> Passionate about music.</li>
                            <li><i class="bi bi-check2-circle"></i> Highly positive.</li>
                            <li><i class="bi bi-check2-circle"></i> Always trying for a better version of everything we're involved in.</li>
                        </ul>
                        <p>
                            A decade and fifty releases later, it’s all properly official—Azure is now a real,
                            live label with international distribution—but not that much has changed.
                            Azure still partners with people who aren’t jerks. If members can’t find something they need,
                            they make it themselves.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Facts Section ======= -->
        <section class="facts section-bg" data-aos="fade-up">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Clients</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Projects</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hard Workers</p>
                    </div>

                </div>

            </div>
        </section><!-- End Facts Section -->

        <!-- ======= Our Skills Section ======= -->
        <section class="skills" data-aos="fade-up">
            <div class="container">

                <div class="section-title">
                    <h2>Our Favorite Genres</h2>
                </div>

                <div class="skills-content">

                    <div class="progress">
                        <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <span class="skill">indie rock <i class="val">100%</i></span>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                            <span class="skill">alternative <i class="val">90%</i></span>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <span class="skill">baroque pop <i class="val">75%</i></span>
                        </div>
                    </div>

                    <div class="progress">
                        <div class="progress-bar bg-secondary" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                            <span class="skill">r&b <i class="val">55%</i></span>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Our Skills Section -->

        <!-- ======= Tetstimonials Section ======= -->
        <section class="testimonials" data-aos="fade-up">
            <div class="container">

                <div class="section-title">
                    <h2>Tetstimonials</h2>
                </div>

                <div class="testimonials-carousel swiper-container h-50">
                    <div class="swiper-wrapper">
                        <div class="testimonial-item swiper-slide">
                            <img src="{{ asset('assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Customer &amp;</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                 The easiest, most convenient music website there is! Can't count the number of records I've purchased. Still yet to experience a fault!
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>

                        <div class="testimonial-item swiper-slide">
                            <img src="{{ asset('assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    I can always find what I'm looking for here. A big recommendation to everyone reading this!
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Ttstimonials Section -->

    </main><!-- End #main -->

@endsection
