<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ Auth::user()->showImage('icon') }}" class="user-image" alt="{{ Auth::user()->full_name }}">
        <span class="hidden-xs">{{ Auth::user()->full_name }}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            <img src="{{ Auth::user()->showImage('icon') }}" class="img-circle" alt="{{ Auth::user()->full_name }}">
            <p>
                {{ Auth::user()->full_name }}
                <small>Участник с {{ Auth::user()->created_at->format('d.m.Y') }}</small>
            </p>
        </li>
        <li class="user-body nopadding">
            <ul class="menu">
                <li><a href="{{ route('admin.profile') }}">Личные данные</a></li>
                <li><a href="{{ route('admin.change-password') }}">Изменить пароль</a></li>
                <li><a href="{{ route('admin.change-avatar') }}">Изменить аватар</a></li>
            </ul>
        </li>
        <li class="user-footer">
            <div class="pull-right">
                <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Выход
                </a>
            </div>
        </li>
    </ul>
</li>