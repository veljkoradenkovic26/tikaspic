@extends('layouts.front')

@section('title')
    Login
@endsection


@section('center')



<section class="regi">


                <div class="kolona7 kolona8">



   @if(!session()->has('user'))
 
   <div class="kolona9 kolona10" style="margin:15px 0px -5px 140px">


                        
                 @if($errors->any())
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger"> {{ $error }} </div>
                @endforeach
              @endif
           
            
            <form action="{{ asset('/registracija/store') }}" method="POST">
              {{ csrf_field() }}
            
              <div class="form-group">
                <label>Ime:</label>
                <input type="text" name="ime" class="form-control" value="{{ old('ime') }}"/>
              </div>
              <div class="form-group">
                <label>Prezime:</label>
                <input type="text" name="prezime" class="form-control" value="{{ old('prezime') }}"/>
              </div>
              <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}"/>
              </div>
              <div class="form-group">
                <label>Korisnicko ime:</label>
                <input type="text" name="korisnicko_ime" class="form-control" value="{{ old('korisnicko_ime') }}"/>
              </div>
              <div class="form-group">
                <label>Lozinka:</label>
                <input type="password" name="lozinka" class="form-control" value="{{ old('lozinka') }}"/>
              </div>
              <div class="form-group">
                  <input type="submit" name="addPost" value="Registracija" class="btn contact-btn" style="margin-top: -5px"/>
              </div> 
            </form>
                    
                  

                

            
            @endif
            



              
                



                            </div>
                            
                           
                        </div>
    </section>

@endsection
