<?php
/** @var Illuminate\Support\ViewErrorBag $errors */
/** @var string $name */
/** @var string $label */
/** @var object $object */

use Illuminate\Support\Str;
use App\Exceptions\WrongParametersException;

if (!isset($name) || !$name) {
    throw new WrongParametersException('`name` parameter is required');
}
$errorNameElements = explode('[', $name);
foreach ($errorNameElements AS $key => $errorNameElement) {
    $errorNameElements[$key] = Str::replaceLast(']', '', $errorNameElement);
}
$error = $errors->first(implode('.', $errorNameElements));
$options = (isset($options) && is_array($options)) ? $options : [];
$text = Lang::has('validation.attributes.' . $name) ? __('validation.attributes.' . $name) : Str::ucfirst(str_replace('_', ' ', $name));
$label = isset($label) ? $label : $text;
if (isset($placeholder) === false) {
    $placeholder = $label === false ? $text : false;
}
$value = isset($value) ? $value : old($name, isset($object) ? $object->{$name} : null);
$slug = false;
foreach ($options AS $option) {
    if ($option === 'data-slug-destination') {
        $slug = true;
    }
}
$class = isset($class) ? $class : 'form-control';
$type = isset($type) ? $type : 'text';
?>

<div class="form-group {{ $error ? 'has-error' : null }} {{ isset($additionalClass) ? $additionalClass : null }}">
    @if($label !== false)
        {!! Form::label($name, $label . (in_array('required', $options, true) ? ' *' : null), ['class' => 'control-label']) !!}
    @endif
    @if($slug)
    <div class="input-group">
        {!! Form::input($type, $name, $value, array_merge(['class' => $class, 'placeholder' => $placeholder], $options)) !!}
        <span class="input-group-btn">
            <button type="button" class="btn btn-info btn-flat" data-slug-button>Транслитерировать</button>
        </span>
    </div>
    @else
        {!! Form::input($type, $name, $value, array_merge(['class' => $class, 'placeholder' => $placeholder], $options)) !!}
    @endif
    @if($error)
        <span class="help-block">{{ $error }}</span>
    @elseif(isset($help))
        <span class="help-block">{{ $help }}</span>
    @endif
</div>
