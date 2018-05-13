<?php

namespace App\Widgets\Site;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Price;

class PricesDownloadLink extends AbstractWidget
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
        if(array_get($this->config, 'check', false)){
            $state_id = Price::getUserStateId();
            $prices = Price::getItems(['kiev', $state_id]);

            if(!count($prices)){
                return '';
            }
        }
        return view('site.widgets.prices-download-link');
    }
}
