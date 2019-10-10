@extends('layouts.front')

@section('title')
Profil
@endsection

@section('center')

<section class="profil">
        <div class="container">
            <h3 class="font-shadow-into-light">Izmenite profil</h3>
     <!-- ****** Single Blog Area Start ****** -->
    
                        <form action="{{ asset('/profil/update/'.$korisnik->id_korisnik) }}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                
                <input type="hidden" name="id" class="form-control" value="{{ $korisnik->id_korisnik  }}"/>
              </div>
              <div class="form-group">
                <label class="font-shadow-into-light">IME</label>
                <input type="text" name="ime" class="form-control" value="{{ $korisnik->ime  }}"/>
              </div>
              <div class="form-group">
                <label class="font-shadow-into-light">PREZIME</label>
                <input type="text" name="prezime" class="form-control" value="{{ $korisnik->prezime  }}"/>
              </div>
              <div class="form-group">
                <label class="font-shadow-into-light">EMAIL</label>
                <input type="text" name="email" class="form-control" value="{{ $korisnik->email  }}"/>
              </div>
              <div class="form-group">
                <label class="font-shadow-into-light">KORISNIČKO IME</label>
                <input type="text" name="korisnicko_ime" class="form-control" value="{{ $korisnik->korisnicko_ime  }}"/>
              </div>
              
              <div class="form-group">
                <input type="submit" name="addPost" value="Ažuriraj profil" class="btn btn-success" />
              </div> 
            </form>
                 
                   
        </div>
    </section>


@endsection
