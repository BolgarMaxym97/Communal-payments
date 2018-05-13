<?php
/** @var Illuminate\Support\ViewErrorBag $errors */
/** @var string $name */
/** @var string $label */
/** @var array $data */
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
$data = (isset($data) && is_array($data)) ? $data : [];
$text = Lang::has('validation.attributes.' . $name) ? __('validation.attributes.' . $name) : Str::ucfirst(str_replace('_', ' ', $name));
$label = isset($label) ? $label : $text;
if (isset($placeholder) === false) {
    $placeholder = $label === false ? $text : false;
}
$value = isset($value) ? $value : old($name, isset($object) ? $object->{$name} : null);
?>
<div class="form-group {{ $error ? 'has-error' : null }} {{ isset($additionalClass) ? $additionalClass : null }}">
    @foreach($data AS $elementValue => $title)
        <label>
            {!! Form::checkbox($name, $elementValue, is_array($value) ? in_array($elementValue, $value) : $value == $elementValue, array_merge(['class' => 'flat-red'], $options)) !!}&nbsp;&nbsp;{{ $title }}
        </label>
    @endforeach
    @if($error)
        <span class="help-block">{{ $error }}</span>
    @elseif(isset($help))
        <span class="help-block">{{ $help }}</span>
    @endif
</div>