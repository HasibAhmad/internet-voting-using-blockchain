<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-3.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="http://localhost:8000/home" class="simple-text logo-normal" data-toggle='tooltip' data-placement='right' title='Internet Voting Using Blockchain'>
      <span class="h2 text-rose">{{ __('IVuB') }}<br></span>
        <small class="text-muted h6 text-capitalize">Internet Voting Using Blockchain</small>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">account_balance</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
{{--      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">--}}
{{--          <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">--}}
{{--              <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>--}}
{{--              <i class="material-icons">people</i>--}}
{{--              <p>{{ __('RA Management') }}--}}
{{--                  <b class="caret"></b>--}}
{{--              </p>--}}
{{--          </a>--}}
{{--          <div class="collapse show" id="laravelExample">--}}
{{--              <ul class="nav">--}}
{{--                  <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">--}}
{{--                      <a class="nav-link" href="{{ route('profile.edit') }}">--}}
{{--                          <span class="sidebar-mini"> RP </span>--}}
{{--                          <span class="sidebar-normal">{{ __('RA profile') }} </span>--}}
{{--                      </a>--}}
{{--                  </li>--}}
{{--                  <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">--}}
{{--                      <a class="nav-link" href="{{ route('user.index') }}">--}}
{{--                          <span class="sidebar-mini"> RM </span>--}}
{{--                          <span class="sidebar-normal"> {{ __('RA Management') }} </span>--}}
{{--                      </a>--}}
{{--                  </li>--}}
{{--              </ul>--}}
{{--          </div>--}}
{{--      </li>--}}
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#electionManagement" aria-expanded="true">
{{--          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>--}}
            <i class="material-icons">how_to_vote</i>
          <p>{{ __('Election Management') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="electionManagement">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="#">
                <span class="sidebar-mini"> MV </span>
                <span class="sidebar-normal">{{ __('Mail Voters') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
{{--                <a class="nav-link" href="{{ route('user.index') }}">--}}
                <a class="nav-link" href="#">
                <span class="sidebar-mini"> SE </span>
                <span class="sidebar-normal"> {{ __('Start Election') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
{{--      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('table') }}">--}}
{{--          <i class="material-icons">content_paste</i>--}}
{{--            <p>{{ __('Table List') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
      <li class="nav-item{{ $activePage == 'voter' ? ' active' : '' }}">
          <a class="nav-link" href="/voter">
            <i class="material-icons">people</i>
              <p>{{ __('Voters') }}</p>
          </a>
      </li>
{{--      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('typography') }}">--}}
{{--          <i class="material-icons">library_books</i>--}}
{{--            <p>{{ __('Typography') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
      <li class="nav-item{{ $activePage == 'candidate' ? ' active' : '' }}">
          <a class="nav-link", href="/candidate">
              <i class="material-icons">people</i>
               <p>{{ __('Cadidates') }}</p>
          </a>
      </li>
      <li class="nav-item{{ $activePage == 'blockchain' ? ' active' : '' }}">
        <a class="nav-link" href="/blockchain">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('BlockChain Management') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Demo 2') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Demo 3') }}</p>
        </a>
      </li>
{{--      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('language') }}">--}}
{{--          <i class="material-icons">language</i>--}}
{{--          <p>{{ __('RTL Support') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
    </ul>
  </div>
</div>
