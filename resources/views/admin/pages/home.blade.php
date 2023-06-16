@extends('admin.layout')

@section('title') Azure - Home Page @endsection
@section('description') Top music of the year. Featuring album reviews, ratings, charts, year end lists and more.
@endsection
@section('keywords') music,rate,albums,artists,group,singer @endsection

@section('content')
    <!-- ======= Hero No Slider Section ======= -->
    <!--<section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <h2>Welcome to Moderna</h2>
                    <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                    <a href="" class="btn-get-started ">Read More</a>
                </div>
            </div>
        </div>
    </section> -->

    <main id="main">

        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Statistics</h2>
                </div>
                <h1 class="h3 mb-0 text-gray800">
                    Welcome back, {{ session()->get('user')->first_name. ' ' .session()->get('user')->last_name }}
                </h1>
            </div>
        </section>


        <div class="p-lg-5" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
             data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
            <div class="page-wrapper">
                <div class="page-breadcrumb">
                    <div class="row align-items-center">
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                           <h3 style="color: #a2cce3">Orders Stats</h3>
                        </div>
                        <!-- Column -->
                        <div class="col-sm-6 mb-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Number of Orders</h4>
                                    <div class="text-end">
                                        <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> {{ $orders }}</h2>
                                    </div>
                                    <span class="text-success">80%</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar"
                                             style="width: 80%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-sm-6 mb-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Income</h4>
                                    <div class="text-end">
                                        <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i> {{ $totalPrice }} $</h2>
                                    </div>
                                    <span class="text-info">30%</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-sm-12">
                            <h3 style="color: #a2cce3">User Stats</h3>
                        </div>
                        <!-- Column -->
                        <div class="col-sm-6  mb-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Users in Total</h4>
                                    <div class="text-end">
                                        <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i> {{ $users }}</h2>
                                    </div>
                                    <span class="text-info">30%</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-sm-12">
                            <h3 style="color: #a2cce3">Album Stats</h3>
                        </div>
                        <!-- Column -->
                        <div class="col-sm-6 mb-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Albums in Total</h4>
                                    <div class="text-end">
                                        <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i> {{ $albums }}</h2>
                                    </div>
                                    <span class="text-info">30%</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar"
                                             style="width: 30%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                             aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div><br><br><br>
                </div>
            </div>
        </div>


    </main>


@endsection
