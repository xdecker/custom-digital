<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo"  style="margin-bottom:3px; padding-bottom:3px">
    <a  class="simple-text logo-normal">
        <img src="{{ asset('material') }}/img/logo-customdigital.png" width="180px" alt="{{_('Custom Digital')}}">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

        <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
        @if(auth()->user()->role_id == 1)
        <li class="nav-item{{ $activePage == 'compañía' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('company') }}">
                <i class="material-icons">work</i>
                <p>{{ __('Compañía') }}</p>
            </a>
        </li>

        <li class="nav-item{{ $activePage == 'Estados' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('estado.index') }}">
                <i class="material-icons">dns</i>
                <p>{{ __('Estados') }}</p>
            </a>
        </li>

        <li class="nav-item{{ $activePage == 'Usuarios' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="material-icons">account_box</i>
                    <p>{{_('Usuarios')}}</p>
                </a>
        </li>

        <li class="nav-item{{ $activePage == 'Seller de Ventas' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="material-icons">group</i>
                    <p>{{_('Seller de Ventas')}}</p>
                </a>
        </li>

        <li class="nav-item{{ $activePage == 'Anuncios' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('anuncio') }}">
                    <i class="material-icons">assessment</i>
                    <p>{{_('Anuncios')}}</p>
                </a>
        </li>

        @endif
        <li class="nav-item{{ $activePage == 'Clientes' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="material-icons">list_alt</i>
                    <p>{{_('Clientes')}}</p>
                </a>
        </li>

        <li class="nav-item {{($activePage == 'Importar-BaseDatos' || $activePage == 'Ver Bases Asignadas') ? 'active' : ''}}">
            <a class="nav-link" data-toggle="collapse" href="#DropdownBD" aria-expended="true">
                <i class="material-icons">assignment</i>
                <p>{{_('Bases de Datos')}}
                    <b class="caret"></b>
                </p>
            </a>

        </li>

        <div class="collapse show" id="DropdownBD">
            <ul class="nav">
                <li class="nav-item{{$activePage == 'Importar-BaseDatos' ? 'active' : ''}}">
                    <a class="nav-link" href="{{url('in/import')}}">
                        <i class="material-icons">backup</i>
                        <span class="sidebar-normal">{{_('Importar Bases')}}</span>
                    </a>
                </li>
                <li class="nav-item{{$activePage == 'Ver Bases Asignadas' ? 'active' : ''}}">
                    <a class="nav-link" href="#">
                        <i class="material-icons">description</i>
                        <span class="sidebar-normal">{{_('Ver Bases Asignadas')}}</span>
                    </a>
                </li>
            </ul>
        </div>
        <br><br>
<div style="display:none">
        <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('upgrade') }}">
          <i class="material-icons">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li>
</div>
    </ul>
  </div>
</div>
