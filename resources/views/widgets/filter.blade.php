<?php
/**
 * @var array $fields
 * @var array|string $route
 */
?>
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['method' => 'get', 'route' => $route, 'class' => 'filter-form']) }}
            @foreach($fields AS $field)
                <div class="col-md-2" style="width: {{isset($field['width']) && $field['width'] !== 0 ? $field['width'] : '250' }}px">
                    @include('admin.widgets.form.' . $field['type'], [
                        'name' => $field['name'],
                        'value' => $field['value'],
                        'data' => ['' => 'Не выбрано'] + $field['data'],
                        'label' => $field['label'],
                        'placeholder' => $field['placeholder'],
                    ])
                </div>
            @endforeach
        <div style="padding-top: 1.8em;"></div>
            <div class="col-md-2">
                <div class="form-group">
                    <a type="submit" class="btn btn-sm btn-info"><i class="fa fa-search"></i></a>
                    <a href="{{ is_array($route) ? route(array_shift($route), $route) : route($route) }}" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></a>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
