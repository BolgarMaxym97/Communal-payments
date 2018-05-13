<div class="col-md-3">
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ Auth::user()->showImage('icon') }}" alt="User profile picture">
            <h3 class="profile-username text-center">{{ Auth::user()->full_name }}</h3>
            <p class="text-muted text-center">{{ Auth::user()->role->name }}</p>
            <ul class="list-group text-bold">
                <li class="list-group-item {{ Route::currentRouteName() === 'profile' ? 'active' : null }}">
                    <a href="{{ route('admin.profile') }}">Личные данные</a>
                </li>
                <li class="list-group-item {{ Route::currentRouteName() === 'change-password' ? 'active' : null }}">
                    <a href="{{ route('admin.change-password') }}">Изменить пароль</a>
                </li>
                <li class="list-group-item {{ Route::currentRouteName() === 'change-avatar' ? 'active' : null }}">
                    <a href="{{ route('admin.change-avatar') }}">Изменить аватар</a>
                </li>
            </ul>
            <a href="{{ route('admin.logout') }}" class="btn btn-warning btn-block" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <b>Выход</b>
            </a>
        </div>
    </div>
</div>