<?php

namespace App\Admin\Widgets;

use App\Helpers\Alert;
use Arrilot\Widgets\AbstractWidget;

class SystemMessage extends AbstractWidget
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
        $message = Alert::get();
        if (!$message || !is_array($message) || !array_get($message, 'text')) {
            return '';
        }
        return view('admin.widgets.system-message', [
            'type' => array_get($message, 'type', 'info'),
            'title' => array_get($message, 'title'),
            'text' => array_get($message, 'text'),
            'icon' => array_get($message, 'icon'),
        ]);
    }
}