<?php
/**
 * @var Illuminate\Support\ViewErrorBag $errors
 * @var string $preview
 * @var string $big
 * @var integer $id
 */

use Illuminate\Support\Str;

$name = isset($name) ? $name : 'image';
$errorNameElements = explode('[', $name);
foreach ($errorNameElements AS $key => $errorNameElement) {
	$errorNameElements[$key] = Str::replaceLast(']', '', $errorNameElement);
}
$error = $errors->first(implode('.', $errorNameElements));
$text = Lang::has('validation.attributes.' . $name) ? __('validation.attributes.' . $name) : Str::ucfirst(str_replace('_', ' ', $name));
$label = isset($label) ? $label : $text;

$currentRoute = Route::currentRouteName();
$currentRouteElements = explode('.', $currentRoute);
array_pop($currentRouteElements);
$currentRouteElements[] = 'delete-image';
if (isset($folder)) {
	$currentRouteElements[] = 'by-folder';
}
$newRouteName = implode('.', $currentRouteElements);

$defaultOptions = ['accept' => '.jpeg, .png, .jpg'];
$options = (isset($options) && is_array($options)) ? $options : [];
?>
<div class="form-group {{ $error ? 'has-error' : null }}">
	{!! Form::label($name, $label . (in_array('required', $options) ? '*' : null)) !!}
	@if(isset($preview) && isset($big))
		<div class="simple-image-block">
			<img src="{{ $preview }}">
			<div class="simple-image-actions">
				<a href="{{ $big }}" class="btn btn-xs btn-foursquare" data-lightbox="image"><i
						class="fa fa-search-plus"></i></a>
				@if(isset($id) && $id > 0 && Route::has($newRouteName))
					@php
						$parameters = ['id' => $id];
                        if (isset($folder)) {
                            $parameters['folder'] = $folder;
                        }
					@endphp
					<button type="href" href="{{ route($newRouteName, $parameters) }}"
							class="btn btn-xs btn-danger confirmation-window">
						<i class="fa fa-trash"></i>
					</button>
				@elseif(isset($withoutRoute) && $withoutRoute !== false && $withoutRoute !== null)
					<button type="button" class="btn btn-xs btn-danger del-without-route" data-id="{{$withoutRoute}}"
							data-model="{{$model}}">
						<i class="fa fa-trash"></i>
					</button>
				@endif
				@if((isset($crop) !== true || $crop === true) && isset($model))
					<a href="{{ route('admin.crop', [
                        'id' => $id,
                        'back' => URL::current(),
                        'model' => $model,
                        'field' => isset($field) ? $field : $name,
                        'folder' => isset($folder) ? $folder : $object->getFolder(),
                    ]) }}" class="btn btn-xs btn-twitter">
						<i class="fa fa-crop"></i>
					</a>
				@endif
			</div>
		</div>
	@else
		{!! Form::file($name, array_merge($defaultOptions, $options))!!}
		@if($error)
			<span class="help-block">{{ $error }}</span>
		@else
			<p class="help-block">Изображение не должно превышать размер
				в {{ \App\Helpers\Quantity::getMbFromKb(config('custom.image-max-size')) }} Мб</p>
		@endif
	@endif
</div>
