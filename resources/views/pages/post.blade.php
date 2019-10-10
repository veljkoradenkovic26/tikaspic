@extends('layouts.front')

@section('title')
    Post
@endsection


@section('center')
<section class="blog_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="row">
@isset($singlePost)


    <!-- ****** Single Blog Area Start ****** -->
    <section class="single_blog_area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="row no-gutters">

                        <!-- Single Post -->
                        <div class="col-11 col-sm-12">
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{ asset('/'.$singlePost->slika) }}" alt="{{ $singlePost->alt }}"  style="width:650px;height:400px;">
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">{{ $singlePost->korisnicko_ime }}</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#">{{ date("d.m.Y. H:i:s", $singlePost->kreirano ) }}</a>
                                            </div>
                                        </div>

                                    </div>
                                    <a href="#">
                                        <h2 class="post-headline">{{ $singlePost->naslov }}</h2>
                                    </a><br/>
                                    <p class="font-shadow-into-light" > {!! $singlePost->sadrzaj !!}</p>

                                </div>

                            </div>
                            <hr width="100%"/>
                        </div>
                            <div class="comment_area  clearfix">

                                <h4 class="mb-30">Komentari</h4>

                                <ol>
                                    @isset($comments)
                                    @foreach($comments as $comment)
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <div class="comment-wrapper d-flex">

                                            <!-- Comment Content -->
                                            <div class="comment-content">
                                                <h5>{{ $comment->korisnicko_ime }}</h5>
                                                <p> {{ $comment->tekst }} </p>

                                            </div>
                                        </div>

                                    </li>
                                   @endforeach
                                   @endisset
                                </ol>
                            </div>
                            @if(session()->has('user'))
                            <!-- Leave A Comment -->
                            <div class="leave-comment-area section_padding_50 clearfix">
                                <div class="comment-form">
                                    <h4 class="mb-30">Ostavite komentar</h4>

                                    <!-- Comment Form -->
                                    <form action="{{ route('unosKom') }}" method="post">
                                       {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type='hidden' value='{{ $singlePost->id_post }}' name='id_post' />
                                            <textarea class="form-control" name="comment" id="message" cols="90" rows="10" placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn contact-btn">Pošalji</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>


        </div>
        </div>
    </section>
  @endisset
     </div>
                </div>

                @include('components.sidebar')

            </div>
        </div>
    </section>

@endsection