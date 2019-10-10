@extends('admin.layouts.back')

@section('title')
    Postovi
@endsection


@section('center')

 @isset($errors)
              @if($errors->any())
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger"> {{ $error }} </div>
                @endforeach
              @endif
            @endisset
           <h3>Post</h3>

            <form action="{{ (isset($post))? asset('/post/update/'.$post->id_post) : asset('/post/store') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <table class="table" border="1px solid">
               <tr>
                <input type="hidden" name="id" class="form-control" value="{{ (isset($post)) ? $post->id_post : '' }}"/>
              </tr>
              <tr>
                  <td><label>Naslov:</label></td>
                  <td><input type="text" name="title" class="form-control" value="{{ (isset($post)) ? $post->naslov : old('title') }}"/></td>
              </tr>
              <tr>
                  <td><label>Opis:</label></td>
                  <td><textarea name="desc" class="form-control" rows="7">{{ (isset($post)) ? $post->opis : old('desc') }}</textarea></td>
              </tr>
              <tr>
                  <td><label>Sadrzaj:</label></td>
                  <td><textarea name="content" class="form-control" rows="7">{{ (isset($post)) ? $post->sadrzaj : old('content') }}</textarea></td>
              </tr>
              <tr>
                  <td><label>Slika:</label></td>
                <td>@isset($post)
                      <img src="{{ asset($post->slika) }}" width="150"/>
                    @endisset
                    <input type="file" name="photo" class="form-control"  /></td>
              </tr>
              <tr>
                <td><label>Naziv slike:</label></td>
                  <td><input type="text" name="alt" class="form-control" value="{{ (isset($post)) ? $post->alt : old('alt') }}"/></td>
              </tr>
              <tr>
                  <td><input type="submit" name="addPost" value="{{ (isset($post))? 'Ažuriraj post' : 'Dodaj novi post'}}" class="btn btn-success" /></td>
              </tr>
              </table>
            </form>


@endsection
