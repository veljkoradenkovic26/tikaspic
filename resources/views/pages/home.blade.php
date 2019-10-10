@extends('layouts.front')

@section('title')
Početna
@endsection


    
  


@section('center')


    <hr/>
    <section class="blog ">

        <h2 class="vesti">News</h2>


                <div class="kolona1 kolona2>


            @isset($posts)
                @empty(!$posts)
                @foreach($posts as $post)




                                <div class="post-thumb">
                                    <img src="{{ asset('/').$post->slika }}" alt="{{ $post->alt }}" style='width:400px;height:250px;'>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="index.php/about" style="text-decoration: none"> {{ $post->korisnicko_ime }}</a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">
                                                <a href="#" style="text-decoration: none">{{ date("d.m.Y. H:i:s", $post->kreirano) }}</a>
                                            </div>
                                        </div>

                                    </div>
                                    <a href="{{ asset('/posts/'.$post->id_post )}}" style="text-decoration: none">
                                        <h4 class="post-headline" >{{ $post->naslov }}</h4>
                                    </a>
                                    <p> {{ $post->opis }} </p>
                                    <a href="{{ asset('/posts/'.$post->id_post )}}" class="read-more" style="border: 1px solid #e0e0d1; text-decoration: none">Read more...</a>
                                </div>



                                @endforeach
                                <div>
                                    {{ $posts->links() }}
                                </div>
                            @endempty
                        @endisset





                @include('components.sidebar')



    </section>

    @endsection
@section('appendJavascript')
    @parent
    <script type="text/javascript" src="{{ asset('/js/home.js')}}"></script>
@endsection