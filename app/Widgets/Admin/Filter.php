<?php namespace App\Admin\Widgets;

use Route;
use Illuminate\Support\Arr;
use InvalidArgumentException;
use Arrilot\Widgets\AbstractWidget;
class Filter extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var array
     */
    protected $fieldTypes = ['input', 'date', 'select'];

    /**
     * @var string
     */
    protected $defaultFieldType = 'input';

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $fields = Arr::get($this->config, 'fields', []);
        // If `fields` is string
        if (is_string($fields)) {
            $fields = config('filter.' . $fields, []);
        }
        // Checking for `fields` existence
        if (is_array($fields) === false || empty($fields) === true) {
            throw new InvalidArgumentException('fields');
        }
        foreach ($fields AS $key => $field) {
            if (!$field) {
                unset($fields[$key]);
                continue;
            }
            $fields[$key] = $this->prepare($field);
        }
        return view('admin.widgets.filter', [
            'fields' => $fields,
            'route' => Arr::get($this->config, 'route', Route::currentRouteName()),
        ]);
    }

    /**
     * @param $field
     * @return array
     */
    public function prepare($field)
    {
        $field = is_array($field) ? $field : ['name' => $field];
        if (array_key_exists('type', $field) === false || in_array($field['type'], $this->fieldTypes) === false) {
            $field['type'] = $this->defaultFieldType;
        }
        $field['data'] = array_get($field, 'data', []);
        $field['value'] = request()->input($field['name'], '');
        if (array_key_exists('placeholder', $field)) {
            $field['placeholder'] = array_get($field, 'placeholder');
        } else {
            $field['placeholder'] = array_get($field, 'label');
        }
        if (array_key_exists('label', $field)) {
            $field['label'] = array_get($field, 'label');
        } else {
            $field['label'] = array_get($field, 'placeholder');
        }
        if (array_key_exists('width', $field)) {
            $field['width'] = array_get($field, 'width');
        } else {
            $field['width'] = '250';
        }
        return $field;
    }
}
