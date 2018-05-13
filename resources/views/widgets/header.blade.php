<header class="main-header">
    @include('admin.widgets.header.logo')

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @widget('notifications')
                @include('admin.widgets.header.user-menu')
            </ul>
        </div>

        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </nav>
</header>