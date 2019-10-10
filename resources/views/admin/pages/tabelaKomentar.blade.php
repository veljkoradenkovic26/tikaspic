@extends('admin.layouts.back')

@section('title')
    Komentari
@endsection


@section('center')


           


         @isset($komentari)

              Komentari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset('/komentar/create') }}"><input type="submit" name="btnNovi" value="NOVI KOMENTAR" class="btn btn-success"/></a>

                <table class="tabela" border="1px solid" id="dataTable" color="white" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tekst</th>
                      <th>ID Posta</th>
                      <th>Naziv Posta</th>
                      <th>ID Korisnika</th>
                      <th>Naziv Korisnika</th>
                      <th>Izmeni</th>
                      <th>Obriši</th>
                    </tr>
                  </thead>

                  <tbody>
                  
                @foreach($komentari as $k)
                  <tr>
                    <td> {{ $k->id_komentar }} </td>
                    <td> {{ $k->tekst }} </td>
                    <td> {{ $k->id_post }} </td>
                    <td> {{ $k->naslov }} </td>
                    <td> {{ $k->id_korisnik }} </td>
                    <td> {{ $k->korisnicko_ime }} </td>
                    <td> <a href="{{ asset('/komentar/create/'.$k->id_komentar) }}">Izmeni</a> </td>
                    <td> <a href="{{ asset('/komentar/delete/'.$k->id_komentar) }}">Obrisi</a> </td>
                  </tr>
                @endforeach
                @endisset
                  </tbody>
                </table>

@endsection



