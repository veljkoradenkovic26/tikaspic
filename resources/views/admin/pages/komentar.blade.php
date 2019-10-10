@extends('admin.layouts.back')

@section('title')
    Komentari
@endsection


@section('center')

@isset($errors)
              @if($errors->any())
                @foreach($errors->all() as $error)
                  <div class="alert alert-danger"> {{ $error }} </div>
                @endforeach
              @endif
            @endisset
           <h3>New comment</h3>
            
            <form action="{{ (isset($komentar))? asset('/komentar/update/'.$komentar->id_komentar) : asset('/komentar/store') }}" method="POST">
              {{ csrf_field() }}
              <table class="table" border="1px solid">
                  <tr>
               
                <input type="hidden" name="id" class="form-control" value="{{ (isset($komentar)) ? $komentar->id_komentar : '' }}"/>
              </tr>
              <tr>
                  <td><label>Post:</label></td>
                  <td><select class="form-control" id='id_post' name='id_post'>
                  @foreach($postovi as $post)
                  
                      <option value='{{ (isset($komentar)) ? $komentar->id_post : $post->id_post }}'> {{ (isset($komentar)) ? $komentar->naslov : $post->naslov }} </option>
                 
                @endforeach
                      </select></td>

                 </tr>
            
              <tr>
                  <td><label>Tekst:</label></td>
                  <td><textarea name="tekst" class="form-control" rows="7">{{ (isset($komentar)) ? $komentar->tekst : old('tekst') }}</textarea></td>
              </tr>
            
              <tr>
                  <td><input type="submit" name="addPost" value="{{ (isset($komentar))? 'Ažuriraj komentar' : 'Dodaj komentar'}}" class="btn btn-success" /></td>
              </tr>
              </table>
            </form>
           
           
@endsection


