<?php

namespace App\Admin\Widgets;

use Arrilot\Widgets\AbstractWidget;

class ListButtons extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        // Checking for `id` existence
        if (array_key_exists('id', $this->config) === false || !$this->config['id']) {
            throw new \InvalidArgumentException('id');
        }
        // Checking for `id` existence
        if (array_key_exists('routeBase', $this->config) === false) {
            throw new \InvalidArgumentException('routeBase');
        }
        return view('admin.widgets.list-buttons', [
            'id' => $this->config['id'],
            'routeBase' => $this->config['routeBase'],
            'view' => array_get($this->config, 'view', true),
            'delete' => array_get($this->config, 'delete', true),
            'edit' => array_get($this->config, 'edit', true),
            'trashed' => array_get($this->config, 'trashed', false),
        ]);
    }
}