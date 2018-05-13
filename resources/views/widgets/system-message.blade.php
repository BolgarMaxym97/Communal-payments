<?php
/**
 * @var string $text
 * @var string $title
 * @var string $type
 * @var string $icon
 */
$class = 'alert-info';
if ($type === 'danger' || $type === 'warning' || $type === 'success') {
    $class = "alert-{$type}";
}
?>
<div class="col-md-12">
    <div class="alert alert-dismissible {{ $class }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @if($title)
            <h4>
                @if($icon)
                    <i class="icon fa fa-{{ $icon }}"></i>
                @endif
                {{ $title }}
            </h4>
        @endif
        {{ $text }}
    </div>
</div>