<?php
/** @var Illuminate\Support\ViewErrorBag $errors */
/** @var string $name */
/** @var string $label */

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
?>
<div class="form-group {{ $error ? 'has-error' : null }} {{ isset($additionalClass) ? $additionalClass : null }}">
    {!! Form::label($name, $label . (in_array('required', $options) ? ' *' : null), ['class' => 'control-label']) !!}
    {!! Form::password($name, array_merge(['class' => 'form-control'], $options)) !!}
    @if($error)
        <span class="help-block">{{ $error }}</span>
    @elseif(isset($help))
        <span class="help-block">{{ $help }}</span>
    @endif
</div>