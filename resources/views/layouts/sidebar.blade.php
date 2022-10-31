<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('oportunidades.index')}}" class="brand-link text-center">
      <span class="brand-text font-weight-light text-center">Admin</span>
    </a>
    
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('oportunidades.index')}}" class="nav-link">
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('oportunidades.create')}}" class="nav-link">
                        <p>Cadastrar</p>
                    </a>
                </li>
                <br>
                <li class="nav-item">
                    <a href="javascript: void(0);" onclick="event.preventDefault(); document.getElementById('form-logout').submit();" class="nav-link">
                        <p>Sair</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<form id="form-logout" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf @method('delete')</form>