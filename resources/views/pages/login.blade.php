@extends('layouts.front')

@section('title')
    Login
@endsection


@section('center')


<section class="logovi">



                <div class="kolona3 kolona4">


   @if(!session()->has('user'))

   <div class="kolona5 kolona6" style="margin:15px 0px -50px 140px">



                <form method="POST"  action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <h4 class="velicina">Login</h4>
                    <div class="form-group">

                        <input type="text" name="Username" class="form-control" placeholder="Korisničko ime"/>
                    </div>

                    <div class="form-group">

                        <input type="password" name="Password" class="form-control" placeholder="Lozinka"/>
                    </div>

                    <input type="submit" name="btnLogin" value="Prijavi se" class="btn contact-btn font-shadow-into-light" />

                  </form>
       @endif
                            </div>


                </div>
    </section>

@endsection