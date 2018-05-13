<li class="dropdown notifications-menu">
    @if($unread > 0)
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{ $unread }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">У вас {{ $unread }} новых уведомлений</li>
            <li>
                <ul class="menu">
                    @foreach($notifications AS $notification)
                        <li>
                            <a href="{{ route('admin.notifications.read', ['notification' => $notification->id]) }}">
                                {!! $notification->icon !!} {{ $notification->message }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="footer"><a href="{{ route('admin.notifications') }}">Смотреть все</a></li>
        </ul>
    @else
        <a href="{{ route('admin.notifications') }}">
            <i class="fa fa-bell-o"></i>
        </a>
    @endif
</li>