<?php
/** @var boolean $create */
$name = isset($name) ? $name : '';
$create = isset($create) ? (bool)$create : false;
$send = isset($send) ? (bool)$send : false;
$label = $create === true ? 'Создать' : 'Сохранить';
$label = $send === true ? 'Отправить' : 'Сохранить';
$currentRouteElements = explode('.', Route::currentRouteName());
array_pop($currentRouteElements);
$currentRouteElements[] = 'index';
$closeRoute = implode('.', $currentRouteElements);

$exceptions = ['back' => true, 'close' => true, 'add' => true];
if (isset($except) && is_array($except) && count($except)) {
    foreach ($except AS $exceptItem) {
        if (array_key_exists($exceptItem, $exceptions)) {
            $exceptions[$exceptItem] = false;
        }
    }
}
?>
<section class="buttons-block">
    <button type="submit" class="btn btn-m btn-success" name="{{$name ? $name : 'submit_only'}}">{{ $label }}</button>
    @if($exceptions['back'] === true)
        <button type="submit" class="btn btn-m btn-primary" name="submit_close">{{ $label }} и закрыть</button>
    @endif
    @if($exceptions['add'] === true)
        <button type="submit" class="btn btn-m btn-info" name="submit_add">{{ $label }} и добавить еще</button>
    @endif
    @if($exceptions['close'] === true)
        <a href="{{ route($closeRoute) }}" class="btn btn-m btn-danger"><i class="fa fa-close"></i> Закрыть</a>
    @endif
</section>
