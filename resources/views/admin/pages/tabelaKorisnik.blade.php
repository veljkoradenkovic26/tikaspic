@extends('admin.layouts.back')

@section('title')
    Korisnik
@endsection


@section('center')

             @isset($korisnici)

             Users &nbsp;&nbsp;&nbsp;<a href="{{ asset('/korisnik/create') }}"><input type="submit" name="btnNovi" value="New user" class="btn btn-success"/></a>


                <table class="tabela" border="1px solid" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Ime</th>
                      <th>Prezime</th>
                      <th>Email</th>
                      <th>Korisničko ime</th>
                      
                      <th>Izmeni</th>
                      <th>Obriši</th>
                    </tr>
                  </thead>

                  <tbody>
                   
                @foreach($korisnici as $korisnik)
                  <tr>
                    <td> {{ $korisnik->id_korisnik }} </td>
                    <td> {{ $korisnik->ime }} </td>
                    <td> {{ $korisnik->prezime }} </td>
                    <td> {{ $korisnik->email }} </td>
                    <td> {{ $korisnik->korisnicko_ime }} </td>
                    
                    <td> <a href="{{ asset('/korisnik/create/'.$korisnik->id_korisnik) }}">Izmeni</a> </td>
                    <td> <a href="{{ asset('/korisnik/delete/'.$korisnik->id_korisnik) }}">Obrisi</a> </td>
                  </tr>
                @endforeach
                @endisset
                  </tbody>
                </table>


      




        
@endsection
