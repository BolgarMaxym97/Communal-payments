<?php
/** @var Illuminate\Support\ViewErrorBag $errors */
/** @var string $name */
/** @var object $object */

use App\Exceptions\WrongParametersException;

if (!isset($name) || !$name) {
    throw new WrongParametersException('`name` parameter is required');
}
if (isset($lang) && $lang) {
    $elementName = $lang . '[' . $name . ']';
    $error = $errors->first($lang . '.' . $name);
} else {
    $elementName = $name;
    $error = $errors->first($name);
}
$options = (isset($options) && is_array($options)) ? $options : [];
$value = isset($value) ? $value : old($name, isset($object) ? $object->{$name} : null);
?>
<div class="form-group hidden-form-group {{ $error ? 'has-error' : null }} {{ isset($additionalClass) ? $additionalClass : null }}">
    {!! Form::input('hidden', $elementName, $value, $options) !!}
    @if($error)
        <span class="help-block">{{ $error }}</span>
    @elseif(isset($help))
        <span class="help-block">{{ $help }}</span>
    @endif
</div>