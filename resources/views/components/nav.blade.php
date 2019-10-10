




    <div class="meni">

        <div class="naslov">
            <h4 class="naslov">Red Star</h4>

        </div>



                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                            <ul class="navbar-nav font-shadow-into-light" id="yummy-nav" >
                                @isset($menus)
                                @foreach($menus as $menu)
                                <li class="nav-item {{ ($loop->first)? 'active' : '' }}">
                                    <a class="nav-link" href="{{ asset($menu->link) }}"> {{ $menu->naziv }}
                                 @if($loop->first)
                                    <span class="sr-only">(current)</span>
                                 @endif
                                    </a>
                                </li>
                                @endforeach
                                @endisset
                                
                                 @if(session()->has('user') && session()->get('user')[0]->naziv=='admin')
                                 <li>
                                    <a class='nav-link' href='{{ route('adminHome') }}' class="font-shadow-into-light">
                                               Admin
                                    </a>
                                 </li>
                                @endif

                                    @if(session()->has('user'))
                                        <div class="col-8 col-sm-6">
                                            <div class="signup-search-area d-flex align-items-center justify-content-end">
                                                <div class="login_register_area d-flex">
                                                    <div class="login">
                                                        <a href="{{ asset('/profil/create/'.session()->get('user')[0]->id_korisnik) }}"  style="color: white">{{ session()->get('user')[0]->korisnicko_ime }}</a>

                                                    </div>
                                                    <div class="register">

                                                        <a href="{{ route('logout') }}"  style="color: white">Logout</a>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                    @if(!session()->has('user'))


                                                <div class="logovanje">

                                                    <div class="log" >
                                                        <a href="{{ route('loginView') }}"   style="color: white">LOGIN</a>
                                                    </div>

                                                    <div class="reg">

                                                        <a href="{{ route('registracija') }}"  style="color: white" >REGISTER</a>

                                                    </div>


                                                </div>



                                    @endif


                            </ul>
                        </div>
                    </nav>



    </div>
    <!-- ****** Header Area End ****** -->
