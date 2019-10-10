@extends('admin.layouts.back')

@section('title')
    Postovi
@endsection


@section('center')



            @isset($postovi)

              <i class="fas fa-table"></i>
              Postovi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ asset('/post/create') }}"><input type="submit" name="btnNovi" value="NOVI POST" class="btn btn-success"/></a>

                <table class="tabela" border="1px solid" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Naslov</th>
                      <th>Opis</th>
                      <th>Sadržaj</th>
                      <th>Slika</th>
                      <th>Naziv slike</th>

                      <th>Izmeni</th>
                      <th>Obriši</th>
                    </tr>
                  </thead>

                  <tbody>

                @foreach($postovi as $post)
                  <tr>
                    <td> {{ $post->id_post }} </td>
                    <td> {{ $post->naslov }} </td>
                    <td> {{ str_limit($post->opis, 80) }} </td>
                    <td> {{ str_limit($post->sadrzaj, 80) }} </td>
                    <td> <img src="{{ asset($post->slika) }}" width="150"/> </td>
                    <td> {{ $post->alt }} </td>
                    <td> <a href="{{ asset('/post/create/'.$post->id_post) }}">Izmeni</a> </td>
                    <td> <a href="{{ asset('/post/delete/'.$post->id_post) }}">Obrisi</a> </td>
                  </tr>
                @endforeach
                @endisset
                  </tbody>
                </table>


@endsection

