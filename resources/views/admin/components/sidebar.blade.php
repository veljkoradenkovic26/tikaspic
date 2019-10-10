  <!-- Sidebar -->
  <div id="blok5">
      <ul class="nav">
          @isset($menus)
          @foreach($menus as $menu)
          <li class=" {{ ($loop->first)? 'active' : '' }}">
                                    <a  href="{{ asset($menu->link) }}"> {{ $menu->naziv }}
                                 @if($loop->first)
                                    <span class="sr-only">(current)</span>
                                 @endif
                                    </a>
          </li>
        @endforeach
        @endisset
        
         <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">
     
            Back </a>
        </li>
        
         <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">
     
            Logout </a>
        </li>
      </ul>
  </div>