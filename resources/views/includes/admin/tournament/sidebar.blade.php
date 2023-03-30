<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Администратор
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tournament.index', $tournament->id)}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Старт
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tournament.arena.index', $tournament->id) }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Арены
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tournament.group.index', $tournament->id) }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Группы
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.tournament.team.index', $tournament->id) }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Команды
                    </p>
                </a>
            </li>
        </ul>    
    </div>
    <!-- /.sidebar -->
</aside>
