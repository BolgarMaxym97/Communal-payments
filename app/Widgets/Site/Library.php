<?php

namespace App\Widgets\Site;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Library as Model;

class Library extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    static private $table;
    static private $id;

    static public function set($table, $id)
    {
        self::$table = $table;
        self::$id = $id;
    }

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $table = array_key_exists('table', $this->config) ? $this->config['table'] : self::$table;
        $id = array_key_exists('id', $this->config) ? $this->config['id'] : self::$id;
        $limit = array_key_exists('limit', $this->config) ? $this->config['limit'] : NULL;
        return view('site.widgets.library', [
            'libraries' => Model::getItems($table, $id, $limit),
        ]);
    }
}
