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
                            <h3 style="color: #a2cce3">User Activity</h3>
                        </div>

                    </div><br><br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive mt-5">
                                        <table class="table stylish-table no-wrap">
                                            <thead>
                                            <tr>
                                                <th class="border-top-0" >User</th>
                                                <th class="border-top-0">Action</th>
                                                <th class="border-top-0">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($useractions as $useraction)
                                                <tr>
                                                    <td><span class="round round-danger">{{ $useraction->users->first_name}}</span></td>
                                                    <td class="align-middle">
                                                        <h6>{{ $useraction->action }}</h6>
                                                    </td>
                                                    <td class="align-middle">{{ $useraction->created_at }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
