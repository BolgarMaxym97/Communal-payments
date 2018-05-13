<?php
$breadcrumbs = config('breadcrumbs', []);
?>
<section class="content-header text-right clearfix">
    @if(isset($h1))
        <h1>{{ $h1 }}</h1>
    @endif
    @if(is_array($breadcrumbs) && count($breadcrumbs) > 1)
        <ol class="breadcrumb" style="position: static; float: left;">
            @foreach(config('breadcrumbs', []) AS $element)
                @if(array_get($element, 'route'))
                    <li>
                        <a href="{{ route(array_get($element, 'route'), array_get($element, 'params', [])) }}">
                            @if(array_get($element, 'icon'))
                                <i class="{{ array_get($element, 'icon') }}"></i>
                            @endif
                            {{ array_get($element, 'name') }}
                        </a>
                    </li>
                @else
                    <li class="active">
                        @if(array_get($element, 'icon'))
                            <i class="{{ array_get($element, 'icon') }}"></i>
                        @endif
                        {{ array_get($element, 'name') }}
                    </li>
                @endif
            @endforeach
        </ol>
    @endif
    @yield('custom-buttons')
</section>