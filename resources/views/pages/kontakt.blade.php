@extends('layouts.front')

@section('title')
Kontakt
@endsection

@section('center')

 <div class="breadcumb-area" style="background-image: url({{ asset('/') }}images/back1.jpg); ">
    

</div>

<section class="blog_area" style="margin-top: 25px">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-11">
                    <div class="row">

<!-- ****** Contatc Area Start ****** -->
    <div class="contact-area ">
        <div class="container">
           
          <div class="contact-info-area ">
                <div class="row">
                   

                    <div class="col-12 col-md-4">

                            <h4>Kontakt telefon</h4>
                            <p>Phone: +381 11 7672 060<br>
                                Fax: +381 11 7672 070 </p>

                    </div>

                    <div class="col-12 col-md-4">

                            <h4>Adresa</h4>
                            <p> Љутице Богдана 1А<br> Београд</p>

                    </div>
                </div>
            </div>

            <!-- Contact Form  -->
            <div class="contact-form-area">
                <div class="row">
                    <div class="col-12 col-md-7">
                        


                        
                    </div>
                    <div class="col-12 col-md-5 item">

                            <h2 class="contact-form-title mb-30">Ako vam treba nesto, tu smo!</h2>
                            <!-- Contact Form -->

                            @if(Session::has('flash_message'))
                              <div class="alert alert-success">{{ Session::get('flash_message')    }}</div>
                            @endif
                            <form id="forma" method="POST" action="{{ route('kontakti') }}">
                                 {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" id="tbFirst" name="name" placeholder="Ime">
                                    @if ($errors->has('name'))

                                        <small class="form-text invalid-feedback">{{ $errors->first('name')   }}</small>
                                    @endif
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="tbLast" name="last" placeholder="Prezime">
                                     @if ($errors->has('last'))

                                         <small class="form-text invalid-feedback">{{ $errors->first('last')   }}</small>
                                     @endif
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="tbEmail" name="mail" placeholder="Email">
                                    @if ($errors->has('mail'))

                                        <small class="form-text invalid-feedback">{{ $errors->first('mail')   }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="tbS" name="naslov" placeholder="Naslov">
                                    @if ($errors->has('naslov'))

                                        <small class="form-text invalid-feedback">{{ $errors->first('naslov')   }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="tbPoruka" name="message" cols="30" rows="10" placeholder="Poruka"></textarea>
                                    @if ($errors->has('message'))

                                        <small class="form-text invalid-feedback">{{ $errors->first('message')   }}</small>
                                    @endif
                                </div>
                                <button type="submit" id="tbB" name="tbB" class="btn btn-success" style='margin-bottom: 50px'>Pošalji</button>
                            </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
  
     </div>
                </div>
            </div>
        </div>
    </section>

@endsection
