<?php

namespace App\Admin\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Status extends AbstractWidget
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
        // Checking for `status` existence
        if (array_key_exists('status', $this->config) === false) {
            throw new \InvalidArgumentException('status');
        }
        // Checking for `id` existence
        if (array_key_exists('id', $this->config) === false || !$this->config['id']) {
            throw new \InvalidArgumentException('id');
        }
        // Checking for `table` existence
        if (array_key_exists('table', $this->config) === false || !$this->config['table']) {
            throw new \InvalidArgumentException('table');
        }

        return view('admin.widgets.status', [
            'status' => $this->config['status'],
            'table' => $this->config['table'],
            'id' => $this->config['id'],
        ]);
    }
}