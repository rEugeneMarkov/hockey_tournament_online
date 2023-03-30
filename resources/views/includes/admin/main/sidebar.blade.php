<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.main.tournament.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Турниры
                    </p>
                </a>
            </li>
            
        </ul>    
    </div>
    <!-- /.sidebar -->
</aside>
