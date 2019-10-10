@extends('layouts.front')

@section('title')
    Post
@endsection

@section('center')
    <div class="breadcumb-area" style="background-image: url( {{asset('/')}}images/back1.jpg); ">

        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2 class="font-shadow-into-light">{{ $singleO->naslov }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog_area section_padding_0_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <!-- ****** Single Blog Area Start ****** -->
                        <section class="single_blog_area section_padding_40">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-lg-12">
                                        <div class="row no-gutters">

                                            <!-- Single Post -->
                                            <div class="col-12 col-sm-12">
                                                <div class="single-post">

                                                    <!-- Post Content -->
                                                    <div class="post-content font-shadow-into-light">

                                                        <h2 class="post-headline"></h2>
                                                        <br/>
                                                        <p>
                                                            {{ $singleO->sadrzaj }}
                                                        </p>
                                                        <hr/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                        <!-- ****** Single Blog Area End ****** -->


                    </div>
                </div>



            </div>
        </div>
    </section>


@endsection
