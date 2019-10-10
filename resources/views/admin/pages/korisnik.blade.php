@extends('admin.layouts.back')

@section('title')
    Korisnik
@endsection


@section('center')

    @isset($errors)
              @if($errors->any())
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger"> {{ $error }} </div>
                @endforeach
              @endif
            @endisset
           <h3>New user</h3>
            
            <form action="{{ (isset($korisnik))? asset('/korisnik/update/'.$korisnik->id_korisnik) : asset('/korisnik/store') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
                <table class="table" border="1px solid">
                <tr>

                    <td><input type="hidden" name="id" class="form-control" value="{{ (isset($korisnik)) ? $korisnik->id_korisnik : '' }}"/></td>
                </tr>
              <tr>
                  <td><label>Ime:</label></td>
                  <td><input type="text" name="ime" class="form-control" value="{{ (isset($korisnik)) ? $korisnik->ime : old('ime') }}"/></td>
              </tr>
              <tr>
                  <td><label>Prezime:</label></td>
                  <td><input type="text" name="prezime" class="form-control" value="{{ (isset($korisnik)) ? $korisnik->prezime : old('prezime') }}"/></td>
              </tr>
              <tr>
                  <td><label>Email:</label></td>
                  <td><input type="text" name="email" class="form-control" value="{{ (isset($korisnik)) ? $korisnik->email : old('email') }}"/></td>
              </tr>
              <tr>
                  <td><label>Korisnicko ime:</label></td>
                  <td><input type="text" name="korisnicko_ime" class="form-control" value="{{ (isset($korisnik)) ? $korisnik->korisnicko_ime : old('korisnicko_ime') }}"/></td>
              </tr>
              <tr>
                  <td><label>Lozinka:</label></td>
                  <td><input type="{{(isset($korisnik)) ? 'hidden' : 'password'}}" name="lozinka" class="form-control" value="{{ old('lozinka') }}"/></td>
              </tr>
              <tr>
                  <td><input type="submit" name="addPost" value="{{ (isset($korisnik))? 'Ažuriraj korisnika' : 'Dodaj korisnika'}}" class="btn btn-success" /></td>
              </tr>
                </table>
            </form>
           
           
         
        
@endsection