<?php
/** @var Illuminate\Support\ViewErrorBag $errors */
/** @var string $name */
/** @var string $label */
/** @var array $data */
/** @var object $object */
/** @var array $disabled */

use Illuminate\Support\Str;
use App\Exceptions\WrongParametersException;

if (!isset($name) || !$name) {
    throw new WrongParametersException('`name` parameter is required');
}
$disabled = (isset($disabled) && is_array($disabled)) ? $disabled : [];
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
    @if($label !== false)
        {!! Form::label($name, $label . (in_array('required', $options) ? ' *' : null), ['class' => 'control-label']) !!}
    @endif
    {!! Form::mySelect($name, $data, $value, $disabled, $options + ['class' => 'form-control']) !!}
    @if($error)
        <span class="help-block">{{ $error }}</span>
    @elseif(isset($help))
        <span class="help-block">{{ $help }}</span>
    @endif
</div>