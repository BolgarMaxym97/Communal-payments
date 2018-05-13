<?php
/** @var string|array $element */
?>

@if(is_string($element))
    <li class="header">{{ $element }}</li>
@elseif(is_array($element) && (Auth::user()->isAdmin() || (Auth::user()->isManager() && array_get($element, 'not_admin', false) === true && array_get($element, 'status', true) === true)))
    <li class="@if($element['active']) active @endif @if($element['hasMenu']) treeview @endif @if($element['hasMenu'] && $element['active']) menu-open @endif">
        <a href="{{ $element['url'] }}">
            @if($element['hasIcon'])
                <i class="{{ $element['icon'] }}"></i>
            @endif
            <span>{{ $element['title'] }}</span>
            @if($element['hasMenu'] === true)
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    @if($element['hasCounter'])
                        @foreach($element['counter'] as $name => $color)
                            @if($element['counter_value'][$name])
                                <small class="label pull-right bg-{{ $color }}">{{ $element['counter_value'][$name] }}</small>
                            @endif
                        @endforeach
                    @endif
                </span>
            @elseif($element['hasCounter'])
                <span class="pull-right-container">
                    @foreach($element['counter'] as $name => $color)
                        @if($element['counter_value'][$name])
                            <small class="label pull-right bg-{{ $color }}">{{ $element['counter_value'][$name] }}</small>
                        @endif
                    @endforeach
                </span>
            @endif
        </a>
        @if($element['hasMenu'] === true)
            <ul class="treeview-menu">
                @each('admin.widgets.aside-element', $element['menu'], 'element')
            </ul>
        @endif
    </li>
@endif
